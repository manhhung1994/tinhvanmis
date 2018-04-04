<?php
/**
 * Created by PhpStorm.
 * User: manhh
 * Date: 3/29/2018
 * Time: 11:54 AM
 */

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        $this->data['page'] = 'home/index';
        $this->data['page_name'] = 'Trang chủ';
        $this->load->view('main',$this->data);
    }
    function logout()
    {
        if($this->session->userdata('logged_in'))
        {
            $this->session->unset_userdata('logged_in');
        }
        redirect(base_url('home'));
    }
}