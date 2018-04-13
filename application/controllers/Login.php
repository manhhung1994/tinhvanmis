<?php
/**
 * Created by PhpStorm.
 * User: manhh
 * Date: 3/8/2018
 * Time: 2:06 PM
 */
Class Login extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->data['page_name'] = 'Đăng nhập';
        $this->data['page'] = 'login/index';

    }

    function index()
    {
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        if($this->input->post()) {
            $this->form_validation->set_rules('login', 'login', 'callback_check_login');
            if ($this->form_validation->run())
            {
                $this->update_dayoff();
                $email = $this->input->post('email');
                $input = array();
                $input['where'] = array('email'=> $email);

                $session_data = $this->user_model->get_row($input);
                $this->session->set_userdata('logged_in',$session_data);


                redirect(base_url('home'));
            }
        }
        $this->load->view('main',$this->data);
    }
    function update_dayoff()
    {

    }
    function check_login()
    {
        // var_dump($this->input->post());die();
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password = md5($password);

        $this->load->model('user_model');
        $where = array('email' => $email, 'password' => $password);

        if($this->user_model->check_exists($where))
        {
            return true;
        }
        $this->form_validation->set_message(__FUNCTION__, 'Đăng nhập thất bại');
        return false;
    }
}