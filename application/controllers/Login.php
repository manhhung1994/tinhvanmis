<?php
/**
 * Created by PhpStorm.
 * User: manhh
 * Date: 3/29/2018
 * Time: 2:12 PM
 */
class Login extends MY_Controller
{
    function index()
    {
        $this->data['page'] = 'login/index';
        $this->load->view('main',$this->data);
    }

}