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
    }

    function index()
    {
        $this->data['page'] = 'nghiphep/index';
        $this->load->view('main',$this->data);
    }
    function add()
    {
        $id =$this->input->post('id');
        $data = $this->user_model->get_info($id);
        echo (json_encode($data));

    }
    function create()
    {

        if($this->input->post())
        {
            $name = $this->input->post('name');
            $approvalID = $this->input->post('approvalID');
            $letterTypeID = $this->input->post('letterTypeID');
            $start_at = $this->input->post('start_at');
            $end_at = $this->input->post('end_at');

            $data = array(
                'userID' => '1',
                'approvalID' => $approvalID,
                'letterTypeID' => $letterTypeID,
                'start_at' => $start_at,
                'end_at' => $end_at,
            );
            if($this->letter_model->create($data))
            {
                echo 'Tao don thanh cong';
            }
            else
                echo 'Khong thanh cong';
        }
    }

}