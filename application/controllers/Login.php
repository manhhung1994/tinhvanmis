<?php
/**
 * Created by PhpStorm.
 * User: manhh
 * Date: 3/8/2018
 * Time: 2:06 PM
 */
Class Login extends MY_Controller
{
    function index()
    {
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        if($this->input->post()) {
            $this->form_validation->set_rules('login', 'login', 'callback_check_login');
            if ($this->form_validation->run())
            {
                $session_data = array(
                    'email' => $this->input->post('email'),
                );
                $this->session->set_userdata('logged_in',$session_data);
//                var_dump($this->session->userdata('login'));die();

                redirect(base_url().'home');
            }
        }
        $this->data['page'] = 'login/index';
        $this->load->view('main',$this->data);
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