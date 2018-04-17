<?php
/**
 * Created by PhpStorm.
 * User: khoidh
 * Date: 4/10/2018
 * Time: 4:48 PM
 */

Class Profile extends MY_Controller
{
    var $id = '1';
    var $field='image'; //Tên trường chứa file ảnh upload

    function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');

        if(!empty($this->session->userdata['logged_in']->id))
            $this->id= $this->session->userdata['logged_in']->id;

    }

    /**
     *
     */
    function index()
    {
        //Chỉnh sửa thông tin cá nhân

        //Nếu có dữ liệu post lên
        if ($this->input->post()) {

            $this->form_validation->set_rules('fullname', 'tên', 'required|min_length[8]');

            //Nhập liệu chính xác
//            if($this->form_validation->run())
//            {

            //update vào csdl
            $fullname = $this->input->post('fullname');

            //Biến kiểm tra trạng thái image change
            $check_upload_image = false;
            if ($_FILES[$this->field]['name']) {
                $image      = $_FILES[$this->field]['name'];
                $check_upload_image = true;

                //set image new name = 'id_user'.image_extension (vd: 1.jpg)
                $file_ext = pathinfo($image, PATHINFO_EXTENSION);
                $image=$this->id.'.'.$file_ext;
                var_dump($image);
            }
            else {
                $image      = $this->input->post('old_image');
            }
            $birthday       = public_date_unconvert($this->input->post('birthday')); //Convert lại định dạng trong csdl
            $gender         = $this->input->post('gender');
            $married        = $this->input->post('married');
            $department     = $this->input->post('department');
            $phone          = $this->input->post('phone');
            $contract_start_at = public_date_unconvert($this->input->post('contract_start_at'));    //Convert lại định dạng trong csdl
            $contract_end_at = public_date_unconvert($this->input->post('contract_end_at'));      //Convert lại định dạng trong csdl
            $leader         = $this->input->post('leader');

            $data = array(
                'fullname'  => $fullname,
                'image'     => $image,
                'birthday'  => $birthday,
                'gender'    => $gender,
                'married'   => $married,
                'department' => $department,
                'phone'     => $phone,
                'contract_start_at'     => $contract_start_at,
                'contract_end_at'   => $contract_end_at,
                'leader'    => $leader
            );

            if ($this->user_model->update($this->id, $data)) {
                if ($check_upload_image == true) {
                    //Upload file image

                    $this->upload_images($this->field, 'upload/user', $image, true);
                }

                $this->data['notification'] = "Cập nhật thông tin thành công!";
            } else {
                $this->data['notification'] = "Có lỗi trong quá trình cập nhật!";
            }
//            }
        }

        $this->data['result']       = $this->user_model->get_info($this->id);
//        echo "<pre>";
//        var_dump($this->data['result']);

        $this->data['field']        =  $this->field;
        $this->data['page']         = 'Profile/index';
        $this->data['page_name']    = 'Trang chủ';
        $this->load->view('main', $this->data);
    }

    /*
 * upload 1 file ảnh
 * $file    : file upload (đường dẫn đầy đủ)
 * $upload_path : đường dẫn đến thư mục dích
 * $delete  : xóa file đích nếu đã tồn tại true/false (xóa/không xóa)
 */
    public function upload_images($field = 'userfile', $upload_path='' ,$new_name='',$delete=false)
    {
        $config['upload_path']          =  $upload_path;
        $config['allowed_types']        = 'jpeg|gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['file_name']            = $new_name;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if($delete==true && !empty($new_name)) {
            //xóa file đích nếu tồn tại
            $this->delete_file($upload_path.'/'.$new_name);
        }

        //Upload file
        if ( ! $this->upload->do_upload($field))
        {
            return array('error' => $this->upload->display_errors());
        }
        else
        {
            array('upload_data' => $this->upload->data());
            return true;
        }
    }

    function delete_file($file_dir)
    {
        if (is_file($file_dir))
        {
//            echo  $file_dir.' file ton tai  = ';
            $deleted_file = unlink($file_dir);
//            $deleted_file = delete_file($file_dir);
//            $deleted_file = delete_file($file_dir);
            if(!$deleted_file)
                return false;     //errors occured
        }
        return true;               //deleted successfully || file not exist
    }

}

