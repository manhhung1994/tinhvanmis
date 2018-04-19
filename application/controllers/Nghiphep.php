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
        $this->data['page_name'] = 'Quản lý đơn xin nghỉ ';
        $this->data['page'] = 'nghiphep/index';
    }

    function index()
    {
//        if($this->input->post())
//        {
//            var_dump($this->input->post());die();
//        }
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
            if($this->input->post('statusID'))
            {
                $this->db->where('approvalID',$id);
                $this->db->where('statusID',$this->input->post('statusID'));
                $this->db->join('user', 'letter.userID = user.id');
                switch ($this->input->post('statusID'))
                {
                    case 1 :
                        $this->data['page_name'] = 'Đơn chờ duyệt ';
                        break;
                    case 2 :
                        $this->data['page_name'] = 'Đơn đã duyệt ';
                        break;
                    case 3 :
                        $this->data['page_name'] = 'Đơn từ chối ';
                        break;
                    default:
                        break;
                }
            }
            else
            {
                $this->db->where('userID',$id);
                $this->db->join('user', 'letter.approvalID = user.id');
            }


            $this->db->join('lettertype', 'letter.letterTypeID = lettertype.id');
            $this->db->join('status', 'letter.statusID = status.id');
            $query = $this->db->get();
            $this->data['data'] = $query->result();
            // leaders
            $input['where'] = array('leader' => 1);
            $leaders = $this->user_model->get_list($input);
            $this->data['leaders'] = $leaders;
            // letterType
            $letterTypes = $this->lettertype_model->get_list();
            $this->data['letterTypes'] = $letterTypes;

            // nếu là đơn chờ duyệt
            if($this->input->post('statusID') == 1)
            {
                $this->data['manager'] = 1;
            }
            // lấy số đơn đang chờ duyệt

            $this->data['waiting_num'] = $this->getWaitingLetter();
            $this->data['page'] = 'nghiphep/index';
            $this->load->view('main',$this->data);
        }


    }
    function getWaitingLetter()
    {
        $id = $this->session->userdata['logged_in']->id;
        $this->db->select('*');
        $this->db->from('letter');
        $this->db->where('approvalID',$id);
        $this->db->where('statusID','1');
        return $this->db->count_all_results();
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
            $description = $this->input->post('description');

//            $date = date("Y-m-d H:i:s", strtotime($start_at));
            $data = array(
                'userID' => $id,
                'approvalID' => $approvalID,
                'letterTypeID' => $letterTypeID,
                'start_at' => $start_at,
                'end_at' => $end_at,
                'dayoff_num' => $dayoff_num,
                'description' => $description,
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
//    function duyetdon()
//    {
//        $this->data['page'] = 'nghiphep/duyetdon';
//        $this->load->view('main',$this->data);
//    }
    function getLetterById()
    {
//        if($this->input->post('id'))
//        {
//            $id = $this->input->post('id');
//            $letter = $this->letter_model->get_info($id);
//            echo (json_encode($letter));
//        }
        $id = $this->input->post('id');
        $this->db->select("
                letter.id,
                letter.userID,
                letter.approvalID,
                letter.statusID,
                letter.letterTypeID,
                letter.approval_at,
                letter.created_at,
                letter.start_at,
                letter.end_at,
                letter.description,
                letter.dayoff_num,
                user.fullname ,
                ");

        $this->db->from('letter');
        $this->db->where('letter.id',$id);
        $this->db->join('user', 'letter.userID = user.id');
        $query = $this->db->get();
        echo(json_encode($query->row()));
    }
    function approval()
    {
        if($this->input->post())
        {
            $id = $this->input->post('id');
            $this->db->set('statusID',2 );
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
        }    }
    function reject()
    {
        if($this->input->post())
        {
            $id = $this->input->post('id');
            $this->db->set('statusID',3 );
            $this->db->set('approval_at',mdate("%Y-%m-%d %H:%i:%s") );
            $this->db->where('id', $id);
            if($this->db->update('letter'))
            {
                echo 'Đã từ chối';
            }
            else
            {
                echo 'Không thể từ chối';
            }
        }
    }

}