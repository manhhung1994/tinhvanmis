<?php
/**
 * Created by PhpStorm.
 * User: manhh
 * Date: 3/29/2018
 * Time: 2:19 PM
 */
class Signup extends MY_Controller
{
    function index()
    {
        $this->data['page'] = 'signup/index';
        $this->load->view('main',$this->data);
    }

}