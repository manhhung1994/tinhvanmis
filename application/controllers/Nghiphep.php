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
        $this->data['waiting_num'] = $this->getWaitingLetter();
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
                $statusID = $this->input->post('statusID');
                $this->db->where('approvalID',$id);
                $this->db->where('statusID',$this->input->post('statusID'));
                $this->db->join('user', 'letter.userID = user.id');
                switch ($statusID)
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
                    case 4 :
                        $this->data['page_name'] = 'Thống kê';
                        $this->data['thongke'] = 1;
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
            $creator = explode('|', $this->input->post('creator'));
            $id = intval($creator[0]);
            $creator_name = $creator[1];
            $approval = explode('|', $this->input->post('approval'));
            $approvalID = intval($approval[0]);
            $approval_name = $approval[1];
            $letterTypeID = $this->input->post('letterType');
            $start_at = $this->input->post('start_at');
            $end_at = $this->input->post('end_at');
            $dayoff_num = $this->input->post('dayoff');
            $description = $this->input->post('description');
            $data = array(
                'userID' => $id,
                'creator_name' => $creator_name,
                'approvalID' => $approvalID,
                'approval_name' => $approval_name,
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
                {
                    // $this->data['message'] = 'Tạo đơn thành công';
                    $this->session->set_flashdata('message','Tạo đơn thành công');
                    redirect(base_url('nghiphep/index'));
                }
                else
                {
                    $this->session->set_flashdata('message','Tạo đơn không thành công');
                    redirect(base_url('nghiphep/create'));
                }

            }

        }

        /*Lấy loại đơn*/
        $letterTypes = $this->lettertype_model->get_list();
            $this->data['letterTypes'] = $letterTypes;
        /*End*/

        /*Lấy người approval*/
        $input['where'] = array('leader' => 1);
        $leaders = $this->user_model->get_list($input);
        $this->data['leaders'] = $leaders;
        /*End*/
        $this->data['page'] = 'nghiphep/create';
        $this->load->view('main',$this->data);

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

        $id = $this->input->post('id');
        $this->db->select("
                letter.id,
                letter.userID,
                letter.approval_name,
                letter.creator_name,
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

    /* chức năng thống kê */

    function thongke()
    {
        $this->db->select('userID,creator_name');
        $this->db->select_sum('dayoff_num');
        $this->db->from('letter');
        if($this->input->post())
        {
            if($year = $this->input->post('year'))
            {
                $this->session->set_flashdata('thongke','Thống kê trong năm '.$year);
                $start = new DateTime();
                $start->setDate($year,1,1);
                $start->setTime(0,0,0);
                $start = $start->format('Y-m-d-H-i-s');
                $end = new DateTime();
                $end = $end->setDate($year,12,31);
                $end->setTime(24,0,0);
                $end = $end->format('Y-m-d-H-i-s');
                $this->db->where('created_at >',$start);
                $this->db->where('created_at <',$end);
            }
            if($this->input->post('year') && $this->input->post('month'))
            {
                $year = $this->input->post('year');
                $month = $this->input->post('month');
                $this->session->set_flashdata('thongke','Thống kê trong tháng '.$month.' năm '.$year);
                $start = new DateTime();
                $start->setDate($year,$month,1);
                $start->setTime(0,0,0);
                $start = $start->format('Y-m-d-H-i-s');
                $end = new DateTime();
                $end = $end->setDate($year,$month+1,null);
                $end->setTime(24,0,0);
                $end = $end->format('Y-m-d-H-i-s');
                $this->db->where('created_at >',$start);
                $this->db->where('created_at <',$end);
            }
            else if($this->input->post('month'))
            {
                $month = $this->input->post('month');
                $this->session->set_flashdata('thongke','Thống kê từ đầu nằm cho đến hết tháng '.$month);
                $start = new DateTime();
                $start->setDate(date('Y'),1,1);
                $start->setTime(0,0,0);
                $start = $start->format('Y-m-d-H-i-s');
                $end = new DateTime();
                $end = $end->setDate(date('Y'),$month+1,null);
                $end->setTime(24,0,0);
                $end = $end->format('Y-m-d-H-i-s');
                $this->db->where('created_at >',$start);
                $this->db->where('created_at <',$end);
            }
        }
        $this->db->group_by('userID'); 
        $query = $this->db->get();
        $this->data['data'] = $query->result_array();
        $this->data['page'] = 'nghiphep/thongke';
        $this->load->view('main',$this->data);
    }
    /*End thong ke*/

    /*Comment*/
    function comments()
    {
        // $this->db->select('*');
        
        // $this->db->from('comments');

        // $query = $this->db->get();
        // $this->data['data'] = $query->result_array();
        if($this->input->post())
        {
            if($this->input->post('year'))
            {
                $year = $this->input->post('year');
                $sql = 
                "SELECT    COUNT(*) as count, MONTH(comment_at) as month, YEAR(comment_at) as year
                 FROM      tinhvanmis.comments 
                 WHERE     YEAR(comment_at) = $year
                 GROUP BY  MONTH(comment_at)";
                 // var_dump($sql);
            }
            else
            {
                $sql =  
                    "SELECT    COUNT(*) as count, MONTH(comment_at) as month, YEAR(comment_at) as year
                     FROM      tinhvanmis.comments 
                     -- WHERE     YEAR(comment_at) = '2015'
                     GROUP BY   YEAR(comment_at), MONTH(comment_at)";
            }
        }

        $result = $this->db->query($sql);
        $this->data['data'] = $result->result();
        $label = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul","Agu","Sep","Oct","Nov","Dec");
        $this->data['label'] = $label;

        // var_dump($result->result());die();            
        $this->data['page'] = 'nghiphep/comments';
        $this->load->view('main',$this->data);
    }
    /*End comment*/
    /*Export file csv*/
    function exportcsv()
    {
        if($data_csv = $this->input->post('csv_data'))
        {
            $filename = "CSV_FILE_".date("Y_m_d_H_i").'.csv';
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename='.$filename);
            header('Cache-Control: no-store, no-cache, must-revalidate');
            header('Cache-Control: post-check=0, pre-check=0');
            header('Expires:0');

            $handle = fopen('php://output','w');
            fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));
            fputcsv($handle, array(
                'ID',
                'Họ tên',
                'Tổng số ngày phép đã nghỉ',
            ));
            // fputcsv($handle,'1234');
            foreach (json_decode($data_csv) as $key => $row) {

                // var_dump($row);
                $row = (array)$row;
                fputcsv($handle, $row);
            }
            fclose($handle);
        }
        
    }
    /*End export file csv*/

}