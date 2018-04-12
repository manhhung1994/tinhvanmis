<?php
/**
 * Created by PhpStorm.
 * User: manhh
 * Date: 3/29/2018
 * Time: 1:41 PM
 */

function public_url($url ='')
{
    return base_url('public/'.$url);
}

/** khoidh
 * Đường dẫn đến thư mục upload file
 *
 */
function upload_url($url ='')
{
    return base_url('upload/'.$url);
}

/** khoidh
 * Hàm convert gt date từ format 'Y-m-d' => 'd/m/Y'
 * $date : giá trị ngày tháng
 */
function public_date_convert($date='')
{
    if(isset($date) && $date!=null ) {
//        if (checkdate()) kiểm tra đầu vào có đúng định dạng ngày tháng chưa


            return date_format(date_create_from_format('Y-m-d', $date), 'd/m/Y');
    }
    else
        return null;
}

/** khoidh
 * Hàm convert gt date từ format 'd/m/Y' => 'Y-m-d'
 * $date : giá trị ngày tháng
 */
function public_date_unconvert($date='')
{
    if(isset($date) && $date!=null ) {
//        if (checkdate()) kiểm tra đầu vào có đúng định dạng ngày tháng chưa


        return date_format(date_create_from_format('d/m/Y', $date), 'Y-m-d');
    }
    else
        return null;
}



