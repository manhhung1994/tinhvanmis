<?php
/**
 * Created by PhpStorm.
 * User: khoidh
 * Date: 4/10/2018
 * Time: 4:48 PM
 */

Class Admin extends MY_Controller
{
    var $id='1';
    function __construct()
    {
        parent::__construct();
//        $this->load->model('admin_model');
//        $this->load->helper(array('form', 'url'));
//        $this->load->library(array('session'));
    }

    /**
     *
     */
    function index()
    {
        //Chỉnh sửa thông tin cá nhân

        $this->load->library('form_validation');
        $this->load->helper('form');

        //Nếu có dữ liệu post lên
        if($this->input->post())
        {
//            echo "<pre>";
//            var_dump($_FILES['image']['name']);
//            die;
            $this->form_validation->set_rules('fullname','tên','required|min_length[8]');

            //Nhập liệu chính xác
//            if($this->form_validation->run())
//            {
                //update vào csdl
                $fullname           =$this->input->post('fullname');
                if($this->input->post('image')){
                    $image          =$this->input->post('image');
                }
                else
                    $image          =$this->input->post('old_image');
                $birthday           =public_date_unconvert($this->input->post('birthday')); //Convert lại định dạng trong csdl
                $gender             =$this->input->post('gender');
                $married            =$this->input->post('married');
                $department         =$this->input->post('department');
                $phone              =$this->input->post('phone');
                $contract_start_at  =public_date_unconvert($this->input->post('contract_start_at'));    //Convert lại định dạng trong csdl
                $contract_end_at    =public_date_unconvert($this->input->post('contract_end_at'));      //Convert lại định dạng trong csdl
                $leader             =$this->input->post('leader');

                $data=array(
                    'fullname'      => $fullname,
                    'image'         => $image,
                    'birthday'      => $birthday,
                    'gender'        => $gender,
                    'married'       => $married,
                    'department'    => $department,
                    'phone'         => $phone,
                    'contract_start_at'  => $contract_start_at,
                    'contract_end_at'    => $contract_end_at,
                    'leader'        => $leader
                );

                if($this->user_model->update($this->id,$data))
                {
                    //Upload file image

//                    upload_images()
                    echo 'Update thanh cong';
                    die;
                }
                else{
                    echo 'Update that bai';
                }
//            }
        }


        $this->data['result'] = $this->user_model->get_info($this->id);

        $this->data['page'] = 'admin/index';
        $this->data['page_name'] = 'Trang chủ';
        $this->load->view('main',$this->data);
    }

}

