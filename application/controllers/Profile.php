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
    var $field='image';         //Tên trường chứa file ảnh upload
    var $notification=array(    //Biến chứa messeger error
        "upload_image"  =>  "", //Boolean: upload thành công | Mảng error
        "upload_data"  =>  "",
    );

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
        // *===* Nếu có dữ liệu post lên
        if ($this->input->post()) {

            $this->form_validation->set_rules('fullname', 'tên', 'required|min_length[8]');

            // *===* Nhập liệu chính xác
//            if($this->form_validation->run())
//            {

            $fullname = $this->input->post('fullname');
            if (  isset($_FILES[$this->field]) && !empty($_FILES[$this->field]['name']))  {
                // *===* Selected new image: set $image -> new image
                $image      = $_FILES[$this->field]['name'];

                // *===* Set image new name = 'id_user'.image_extension (vd: 1.jpg)
                // *===* Set image new name = 'image_temp'.image_extension (vd: image_temp.jpg)
                $file_ext = pathinfo($image, PATHINFO_EXTENSION);
                $image_temp='image_temp.'.$file_ext;                             //ex: image_temp.jpg
                $image=$this->id.'.'.$file_ext;

                // *===* Upload file ex: 'image_temp.jpg'
                $check_upload_image= $this->upload_images($this->field, 'upload/user', true, $image_temp, $image);

                if(!is_bool($check_upload_image))
                {
                    //Upload image error
                    $this->notification['upload_image']=$check_upload_image["error"];
                    //Set set $image -> old image
                    $image      = $this->input->post('old_image');
                }
            }
            else {
                // *===* No select new image: set $image -> old image
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

            // *===* update for DATABASE
            if ($this->user_model->update($this->id, $data)) {
                $this->notification['upload_data']="Cập nhật thông tin thành công!";
            } else {
                $this->notification['upload_data']="Có lỗi trong quá trình cập nhật!";
            }
            $this->data['notification'] =  $this->notification;

//            }
        }

        $this->data['result']       = $this->user_model->get_info($this->id);
        $this->data['field']        =  $this->field;
        $this->data['page']         = 'Profile/index';
        $this->data['page_name']    = 'Trang chủ';
        $this->load->view('main', $this->data);
    }

    /**
     * upload 1 file ảnh
     * $file    : file upload (đường dẫn đầy đủ)
     * $upload_path : đường dẫn đến thư mục dích
     * $delete  : xóa file đích nếu đã tồn tại true/false (xóa/không xóa: upload bình thường)
     * Nếu $delete == true:
     * $temp_name   : tên file tạm
     * $new_name    : tên file mới sau khi upload thành công
     */
    public function upload_images($field = 'userfile', $upload_path='' ,$delete=false, $temp_name ='',$new_name='')
    {
        $config['upload_path']          =  $upload_path;
        $config['allowed_types']        = 'jpeg|gif|jpg|png';
        $config['max_size']             = 100;  //KB
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        if($delete){
            $config['file_name']        = $temp_name;
        }
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // ==***== Nếu xóa file          $delete = true
        if($delete)
        {
            $temp_dir   =$upload_path.'/'.$temp_name;
            $new_dir    =$upload_path.'/'.$new_name;

            // 1. Xóa file tạm nếu tồn tại
            $this->delete_file($temp_dir);

            // 2. Upload file tạm
            if ( ! $this->upload->do_upload($field))
            {//Error
                return array('error' => $this->upload->display_errors());
            }
            else
            {//Success : Đổi tên file tạm => $new_name

                //xóa file đích ($new_name) nếu tồn tại
                $this->delete_file($new_dir);
                //Đổi tên file tạm => $new_name
                rename($temp_dir,$new_dir);

                //Trả kết quả về mảng chứa thông tin file upload
                array('upload_data' => $this->upload->data());
                return true;
            }

        }
        // ==***== Nếu không xóa file    $delete = false
        else
        {
            //Upload file
            if ( ! $this->upload->do_upload($field))
            {//Error
                return array('error' => $this->upload->display_errors());
            }
            else
            {//Success
                //Trả kết quả về mảng chứa thông tin file upload
                array('upload_data' => $this->upload->data());
                return true;
            }

        }

    }

    function delete_file($file_dir)
    {
        if (is_file($file_dir))
        {
            $deleted_file = unlink($file_dir);
//            $deleted_file = delete_file($file_dir);
            if(!$deleted_file)
                return false;     //errors occured
        }
        return true;               //deleted successfully || file not exist
    }

}

