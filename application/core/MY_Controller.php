<?php
/**
 * Created by PhpStorm.
 * User: manhh
 * Date: 3/8/2018
 * Time: 2:05 PM
 */
Class MY_Controller extends CI_Controller
{
    public $data = array();
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('letter_model');
        $this->load->model('lettertype_model');

        $controller = $this->uri->rsegment(1);
        $controller = strtolower($controller);
//        var_dump($controller);die();
        $login = $this->session->userdata('logged_in');
        // neu chua dang nhap
        if(!$login && $controller != 'login')
        {
            redirect(base_url('login'));
        }
//         neu admin da login/
        if($login && $controller == 'login')
        {
            redirect(base_url('home'));
        }

    }
    /*
     * kiem tra trang thai dang nhap
     */
    public function _check_login()
    {
//        $controller = $this->uri->rsegment(1);
//        $controller = strtolower($controller);
//        $login = $this->session->userdata('login');
//        // neu chua dang nhap
//        if(!$login && $controller != 'login')
//        {
//            redirect(admin_url('login'));
//        }
//        // neu Profile da login
//        if($login && $controller == 'login')
//        {
//            redirect(admin_url('home'));
//        }
    }

    /*
     * upload 1 file ảnh
     * $file    : file upload (đường dẫn đầy đủ)
     * $upload_path : đường dẫn đến thư mục dích
     */
    public function upload_images($file, $upload_path='' ,$new_name='')
    {
        if(!isset($upload_path))
            $config['upload_path']      = upload_url();
        else
            $config['upload_path']      = $upload_path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['file_name']            = $new_name;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($file))
        {
            return array('error' => $this->upload->display_errors());
        }
        else
        {
            array('upload_data' => $this->upload->data());
            return true;
        }
    }
}

