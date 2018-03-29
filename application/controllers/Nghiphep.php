<?php
/**
 * Created by PhpStorm.
 * User: manhh
 * Date: 3/29/2018
 * Time: 2:12 PM
 */
class Nghiphep extends MY_Controller
{
    function index()
    {
        $this->data['page'] = 'nghiphep/index';
        $this->load->view('main',$this->data);
    }
    function add()
    {
        $this->data['page'] = 'nghiphep/add';
        $this->load->view('main',$this->data);
    }
}