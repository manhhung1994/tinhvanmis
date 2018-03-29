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
        $this->load->view('main',$this->data);
    }
}