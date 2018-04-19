
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: khoidh-->
<!-- * Date: 4/10/2018-->
<!-- * Time: 4:53 PM-->
<!-- */-->

<head>
    <script type="text/javascript" language="JavaScript" >
        function Show_upload_image_mess(notification){
            if (notification) {
                alert(notification);
            }
        }
    </script>
</head>

<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url() . 'Profile'; ?>">
                <fieldset>

                    <!-- Messager -->
                    <h4 style="text-align: center;color: red">
                        <?php if (!empty($notification['upload_data'])) echo $notification['upload_data'];?>
                    </h4>

                    <!-- Text input :  Họ và tên-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="fullname">Tên (Họ và tên) <font color="Red">*</font></label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user">
                                    </i>
                                </div>
                                <input required id="fullname" name="fullname" type="text" placeholder="Tên (Họ và tên)" class="form-control input-md"
                                 value="<?php echo $result->fullname ?>">
                            </div>
                        </div>
                    </div>

                    <!-- File Button : Ảnh đại diện -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="image">Ảnh đại diện</label>
                        <div class="col-md-4">
                            <input type="hidden" id="old_image" name="old_image" value="<?php echo $result->image ?>">
<!--                            <input type="file" name="image" id="getFile">-->
                            <input id="i_image" name=<?php echo $field ?> class="input-file" type="file"
                                   onchange="loadFile(event)"
                                   accept=".jpg, .jpeg, .png, .gif">
                        </div>
                    </div>

                    <!-- data-date-format="dd-mm-yyyy"-->
                    <!-- Text input : Ngày sinh-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="birthday">Ngày sinh <font
                                    color="Red">*</font></label>

                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input required type="text" id="birthday" name="birthday" placeholder="dd/mm/yyyy"
                                           class="form-control" size="35" maxlength="10"
                                           value="<?php echo public_date_convert($result->birthday) ?>">
                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- Multiple Radios (inline): Giới tính -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="gender">Giới tính</label>
                        <div class="col-md-4">
                            <label class="radio-inline" for="gender-0">
                                <input type="radio" name="gender" id="gender-0" value="0"
                                       <?php if(!$result->gender)echo "checked='checked'" ?> >
                                Nam
                            </label>
                            <label class="radio-inline" for="gender-1">
                                <input type="radio" name="gender" id="gender-1" value="1"
                                    <?php if($result->gender) echo "checked='checked'" ?> >
                                Nữ
                            </label>
                        </div>
                    </div>

                    <!-- Multiple Radios (inline) : Gia đình -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="married">Gia đình:</label>
                        <div class="col-md-4">
                            <label class="radio-inline" for="married-0">
                                <input type="radio" name="married" id="married-0" value="0"
                                    <?php if(!$result->married)echo "checked='checked'" ?>>
                                Độc thân
                            </label>
                            <label class="radio-inline" for="married-1">
                                <input type="radio" name="married" id="married-1" value="1"
                                    <?php if($result->married)echo "checked='checked'" ?>>
                                Có gia đình
                            </label>
                        </div>
                    </div>

                    <!-- Text input : Phòng ban-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="department">Phòng ban <font
                                    color="Red">*</font></label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="glyphicon glyphicon-th-large"></i>

                                </div>
                                <input required id="department" name="department" type="text" placeholder="Phòng ban" class="form-control input-md"
                                       value="<?php echo $result->department ?>">
                            </div>


                        </div>
                    </div>

                    <!-- Text input : Số điện thoại-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="phone">Số điện thoại <font
                                    color="Red">*</font></label>
                        <div class="col-md-4">
                            <div class="input-group othertop">
                                <div class="input-group-addon">
                                    <i class="fa fa-mobile fa-1x" style="font-size: 20px;"></i>

                                </div>
                                <input required id="phone" name="phone" type="text" placeholder=" Số điện thoại" class="form-control input-md"
                                       value="<?php echo $result->phone ?>">
                            </div>

                        </div>
                    </div>

                    <!-- Text input : Ngày bắt đầu hợp đồng-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="contract_start_at">Ngày bắt đầu hợp đồng <font
                                    color="Red">*</font></label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input required type="text" id="contract_start_at" name="contract_start_at"
                                           placeholder="dd/mm/yyyy" class="form-control" size="35" maxlength="10"
                                           value="<?php echo public_date_convert($result->contract_start_at)?>"
                                           >
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Text input : Ngày kết thúc hợp đồng-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="contract_end_at">Ngày kết thúc hợp đồng <font
                                    color="Red">*</font></label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input required type="text" id="contract_end_at" name="contract_end_at"
                                           placeholder="dd/mm/yyyy" class="form-control" size="35" maxlength="10"
                                           value="<?php echo public_date_convert($result->contract_end_at) ?>">
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Multiple Radios (inline) : Chức vụ -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="leader">Chức vụ</label>
                        <div class="col-md-4">
                            <label class="radio-inline" for="leader-0">
                                <input type="radio" name="leader" id="leader-0" value="0"
                                    <?php if(!$result->leader)echo "checked='checked'" ?>>
                                Nhân viên
                            </label>
                            <label class="radio-inline" for="leader-1">
                                <input type="radio" name="leader" id="leader-1" value="1"
                                    <?php if($result->leader)echo "checked='checked'" ?>>
                                Quản lý
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> Cập nhật </button>
                            <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Xóa </button>
<!--                            <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> Đăng ký</a>-->
<!--                            <a href="#" class="btn btn-danger" value=""><span class="glyphicon glyphicon-remove-sign"></span> Xóa</a>-->
                        </div>
                    </div>
<!---->


                </fieldset>
            </form>
        </div>

        <div class="col-md-2 hidden-xs">
            <img id="output"
                 src="<?php
            $image_url=upload_url('user/').$result->image;
            if(!empty($result->image) && !file_exists($image_url))
                echo $image_url;
            else
                echo "http://websamplenow.com/30/userprofile/images/avatar.jpg";
            ?>" class="img-responsive img-thumbnail " >
        </div>

        <?php
        $notifi= "";
        if (!empty($notification['upload_image']))
            $notifi= $notification['upload_image'];
        ?>
        <script>

            var notification= <?php echo json_encode($notifi);?>;
                Show_upload_image_mess(notification);

        </script>

    </div>


</div>



<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="<?php echo public_url() ?>/assets/dest/js/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<!--<script src="--><?php //echo public_url()?><!--/assets/dest/js/jquery.ui.datepicker-vi-VN.js" charset="UTF-8"></script>-->
<script type="text/javascript" src="<?php echo public_url() ?>/assets/dest/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="<?php echo public_url() ?>/assets/dest/css/bootstrap-datepicker3.css"/>

<script>
$(document).ready(function () {
    var date_input = $('input[name="birthday"]'); //our date input has the name "date"
    var container = $('.input-group form').length > 0 ? $('.input-group form').parent() : "body";
    date_input.datepicker({
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
            // language: "vi-VN",
        })
    })
</script>

<script>
$(document).ready(function () {
    // $('#image').val('xxx');
    var date_input = $('input[name="contract_start_at"]'); //our date input has the name "date"
    var container = $('.input-group form').length > 0 ? $('.input-group form').parent() : "body";
    date_input.datepicker({
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
            language: "vi-VN",
        })
    })
</script>

<script>
$(document).ready(function () {
    var date_input = $('input[name="contract_end_at"]'); //our date input has the name "date"
    var container = $('.input-group form').length > 0 ? $('.input-group form').parent() : "body";
    date_input.datepicker({
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
            language: "vi-VN",
        })
    })
</script>

<!-- Script Select image -->
<!--<input type="file" accept="image/*" onchange="loadFile(event)">-->
<!--<img id="output"/>-->
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

<noscript>Trinh duyet cua ban khong ho tro Javascript!</noscript>
