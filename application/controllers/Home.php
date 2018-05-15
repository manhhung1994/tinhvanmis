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
        // $fp = @fopen('grand_sphere_comment.txt', "r");
  
        // // Kiểm tra file mở thành công không
        // if (!$fp) {
        //     echo 'Mở file không thành công';
        // }
        // else
        // {
        //     // Lặp qua từng dòng để đọc
        //     while(!feof($fp))
        //     {
        //         echo fgets($fp);
        //     }
        // }

        // $read = file('grand_sphere_comment.txt');
        // for($i=0; $i< count($read);$i = $i+4)
        // {
        //     $date = $read[$i+1];
        //     $search = array("年", "月", "日");
        //     $replace   = array("-", "-", "");
        //     $date = str_replace($search, $replace, $date);
        //     $date = new DateTime($date);
        //     // var_dump($date);die();
        //     $data = array(
        //             'username' => $read[$i],
        //             'comment_at'=> date_format($date,'Y-m-d'),
        //             'content' => $read[$i+2],
        //         );

        //     if($this->comments_model->create($data))
        //         {
        //             echo 'import thanh cong';

        //         }
        //         else
        //         {
        //             echo 'import that bai';
        //         }
        // } 

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
?>