<?php
/**
 * Created by PhpStorm.
 * User: manhh
 * Date: 3/29/2018
 * Time: 2:19 PM
 */
class Signup extends MY_Controller
{
    private $_message = 'message';
    function __construct()
    {
        parent::__construct();
        $this->data['page_name'] = 'Đăng ký';
        $this->data['page'] = 'signup/index';
    }

    function index()
    {
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        // neu co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name','Tên','required');
            $this->form_validation->set_rules('email','Email','required|callback_check_email');
            $this->form_validation->set_rules('password','Mật khẩu','required|min_length[6]');
            $this->form_validation->set_rules('re_password','Nhập lại mật khẩu','required|matches[password]');

            if (!($this->form_validation->run()))
            {
//                echo 'Validation false';
            }
            else
            {
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $data = array(
                    'fullname' => $name,
                    'email'=> $email,
                    'password' => $password,
                );
                if ($password)
                {
                    $data['password'] = md5($password);
                }
                if($this->user_model->create($data))
                {
                    $this->session->set_flashdata('message','Thêm mới thành công');

                }
                else
                {
                    $this->session->set_flashdata('message','Không thêm được');
                }
                redirect(base_url().'login');
            }

        }
        $this->data['page'] = 'signup/index';
        $this->load->view('main',$this->data);

    }
    function check_email()
    {
        $email = $this->input->post('email');
        $where= array('email' => $email );
        if($this->user_model->check_exists($where)){

            $this->form_validation->set_message(__FUNCTION__,'Email đã được đăng ký');
            return false;
        }
        return true;
    }

}