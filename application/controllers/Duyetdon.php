<?php
/**
 * Created by PhpStorm.
 * User: hungtm
 * Date: 4/10/2018
 * Time: 3:00 PM
 */
class Duyetdon extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('letter_model');
        $this->load->model('lettertype_model');
        $this->load->model('status_model');
        $this->data['page_name'] = 'Danh Sách Đơn Cần Duyệt';
        $this->data['page'] = 'duyetdon/index';
    }
    function index()
    {
        if(isset($this->session->userdata['logged_in']))
        {
            $id = $this->session->userdata['logged_in']->id;
            $input['where'] = array('leader' => 1);
            $leaders = $this->user_model->get_list($input);
            $status = $this->status_model->get_list();
            $lettertypes = $this->lettertype_model->get_list();
            $this->data['leaders'] = $leaders;
            $this->data['status'] = $status;
            $this->data['lettertypes'] = $lettertypes;
            $this->db->select("
                letter.id,
                letter.userID,
                letter.approvalID,
                letter.statusID,
                letter.approval_at,
                letter.created_at,
                letter.start_at,
                letter.end_at,
                letter.description,
                user.fullname,
                status.name as statusname,
                lettertype.name as lettertypename,
                ");

            $this->db->from('letter');
            $this->db->where('approvalID',$id);
//        filter
            if($this->input->post('letterTypeID'))
            {
                $this->db->where('letterTypeID',$this->input->post('letterTypeID'));
            }
            if($this->input->post('statusID'))
            {
                $this->db->where('statusID',$this->input->post('statusID'));
            }
            if($this->input->post('approvalID'))
            {
                $this->db->where('approvalID',$this->input->post('approvalID'));
            }
            //end filter

            // phan trang
//        $this->load->library('pagination');
//        $total_rows = $this->user_model->get_total();
//
//        $config['total_rows'] = $total_rows;//tong cac san pham
//        $config['base_url'] = base_url('nghiphep/index');
//        $config['per_page'] = 4;
//        $config['uri_segment'] = 4;
//        $config['next_link'] = 'Trang kế tiếp';
//        $config['prev_link'] = 'Trang trước';
//
//        $this->pagination->initialize($config);
//
//        $segment = $this->uri->segment(4);
//        $segment = intval($segment);
////        $input['limit'] = array($config['per_page'] , $segment);
//
//        $this->db->limit(4);
            // end phan trang

            $this->db->join('user', 'letter.userID = user.id');
            $this->db->join('lettertype', 'letter.letterTypeID = lettertype.id');
            $this->db->join('status', 'letter.statusID = status.id');
            $query = $this->db->get();
            $this->data['data'] = $query->result();
//        var_dump($query->result());die();
            // leaders
            $input['where'] = array('leader' => 1);
            $leaders = $this->user_model->get_list($input);
            $this->data['leaders'] = $leaders;
            // letterType
            $letterTypes = $this->lettertype_model->get_list();
            $this->data['letterTypes'] = $letterTypes;
            $this->load->view('main',$this->data);
        }
//        $this->load->view('main',$this->data);
    }
    function approval()
    {
//        var_dump($this->input->post());die();
        if($this->input->post())
        {
            $id = $this->input->post('updateID');
            $approvalID = $this->input->post('approval');
            $this->db->set('statusID','2' );
            $this->db->set('approval_at',mdate("%Y-%m-%d %H:%i:%s") );
            $this->db->where('id', $id);
            if($this->db->update('letter'))
            {
                echo 'Đã duyệt thành công';
            }
            else
            {
                echo 'Không thể duyệt';
            }
        }
    }
}