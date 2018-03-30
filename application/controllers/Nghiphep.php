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
        $id =$this->input->post('id');
        //lay du lieu
        if($id == 4)
            $data = array("name"=>"tu manh hung", "title"=>"phovoi");
        else
            $data = array("name"=>"nguyen van khoi", "title"=>"hung yen");

        echo json_encode($data);

//        $this->data['page'] = 'nghiphep/add';
//        $this->load->view('main',$this->data);
    }
}