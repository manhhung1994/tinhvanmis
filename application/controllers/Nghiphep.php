<?php
/**
 * Created by PhpStorm.
 * User: manhh
 * Date: 3/29/2018
 * Time: 2:12 PM
 */
class Nghiphep extends MY_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('letter_model');
        $this->load->model('lettertype_model');
        $this->load->model('status_model');
        $this->data['page_name'] = 'Danh Sách Đơn Xin Nghỉ';
        $this->data['page'] = 'nghiphep/index';
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
        }

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
                status.statusname,
                lettertype.lettertypename,
                ");

        $this->db->from('letter');
        $this->db->where('userid',$id);
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

        $this->db->join('user', 'letter.approvalID = user.id');
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
        $this->data['page'] = 'nghiphep/index';
        $this->load->view('main',$this->data);
    }
    function approvalData()
    {
        if($this->input->post('id'))
        {
            $input['where'] = array('leader' => 1);
            $leaders = $this->user_model->get_list($input);
            echo (json_encode($leaders));
        }



    }
    function letterTypeData()
    {
        $letterTypes = $this->lettertype_model->get_list();
        echo (json_encode($letterTypes));
    }
    function add()
    {
        $id =$this->input->post('id');
        $data = $this->user_model->get_info(1);
        $input['where'] = array('leader' => 1);
        $leaders = $this->user_model->get_list($input);
        array_push($leaders, $data);
        echo (json_encode($leaders));

    }
    function create()
    {
        if($this->input->post())
        {
            $id = $this->input->post('userID');
//            $name = $this->input->post('name');
            $approvalID = $this->input->post('approval');
            $letterTypeID = $this->input->post('letterType');
            $start_at = $this->input->post('start_at');
            $end_at = $this->input->post('end_at');
            $dayoff_num = $this->input->post('dayoff');
//            $date = date("Y-m-d H:i:s", strtotime($start_at));
            $data = array(
                'userID' => $id,
                'approvalID' => $approvalID,
                'letterTypeID' => $letterTypeID,
                'start_at' => $start_at,
                'end_at' => $end_at,
                'dayoff_num' => $dayoff_num,
            );
            $updateId= $this->input->post('updateID');
            if($updateId)
            {
                // process update
                $this->db->where('id', $updateId);
                if($this->db->update('letter', $data))
                    echo 'Update thanh cong';
                else
                    echo 'Khong update cong';
            }
            else
            {
                if($this->letter_model->create($data))
                    echo 'Tao don thanh cong';
                else
                    echo 'Khong thanh cong';
            }

        }
    }
    function update()
    {
        if($this->input->post())
        {
            $id = $this->input->post('userID');
            $approvalID = $this->input->post('approval');
            $letterTypeID = $this->input->post('letterType');
            $start_at = $this->input->post('start_at');
            $end_at = $this->input->post('end_at');
            $data = array(
                'userID' => $id,
                'approvalID' => $approvalID,
                'letterTypeID' => $letterTypeID,
                'start_at' => $start_at,
                'end_at' => $end_at,
            );
            $updateId= $this->input->post('updateID');
            $this->db->where('id', $updateId);

        }
    }
    function duyetdon()
    {
        $this->data['page'] = 'nghiphep/duyetdon';
        $this->load->view('main',$this->data);
    }
    function getLetterById()
    {
        if($this->input->post('id'))
        {
            $id = $this->input->post('id');
            $letter = $this->letter_model->get_info($id);
            echo (json_encode($letter));

        }
    }
}