
<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            <form class="form-horizontal">
                <fieldset>

                    <!-- Form Name -->
                    <legend>User profile form requirement</legend>

                    <!-- Text input-->




                    <div class="form-group">
                        <label class="col-md-4 control-label" for="fullname">Tên (Họ và tên)</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user">
                                    </i>
                                </div>
                                <input id="fullname" name="fullname" type="text" placeholder="Tên (Họ và tên)" class="form-control input-md">
                            </div>
                        </div>
                    </div>

                    <!-- File Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="image">Ảnh đại diện</label>
                        <div class="col-md-4">
                            <input id="image" name="image" class="input-file" type="file">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="birthday">Ngày sinh</label>
                        <div class="col-md-4">

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-birthday-cake"></i>

                                </div>
                                <input id="birthday" name="birthday" type="text" placeholder="Ngày sinh" class="form-control input-md">
                            </div>


                        </div>
                    </div>


                    <!-- Text input-->
<!--                    <div class="form-group">-->
<!--                        <label class="col-md-4 control-label" for="Father">Father's name</label>-->
<!--                        <div class="col-md-4">-->
<!--                            <div class="input-group">-->
<!--                                <div class="input-group-addon">-->
<!--                                    <i class="fa fa-male" style="font-size: 20px;"></i>-->
<!---->
<!--                                </div>-->
<!--                                <input id="Father" name="Father" type="text" placeholder="Father's name" class="form-control input-md">-->
<!---->
<!--                            </div>-->
<!---->
<!--                        </div>-->
<!--                    </div>-->

                    <!-- Text input-->
<!--                    <div class="form-group">-->
<!--                        <label class="col-md-4 control-label" for="Mother">Mother's Name</label>-->
<!--                        <div class="col-md-4">-->
<!--                            <div class="input-group">-->
<!--                                <div class="input-group-addon">-->
<!--                                    <i class="fa fa-female" style="font-size: 20px;"></i>-->
<!---->
<!--                                </div>-->
<!--                                <input id="Mother" name="Mother" type="text" placeholder="Mother's Name" class="form-control input-md">-->
<!---->
<!--                            </div>-->
<!---->
<!--                        </div>-->
<!--                    </div>-->

                    <!-- Multiple Radios (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="gender">Giới tính</label>
                        <div class="col-md-4">
                            <label class="radio-inline" for="gender-0">
                                <input type="radio" name="gender" id="gender-0" value="1" checked="checked">
                                Nam
                            </label>
                            <label class="radio-inline" for="gender-1">
                                <input type="radio" name="gender" id="gender-1" value="2">
                                Nữ
                            </label>
                            <label class="radio-inline" for="gender-2">
                                <input type="radio" name="gender" id="gender-2" value="3">
                                hác
                            </label>
                        </div>
                    </div>

                    <!-- Multiple Radios (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="narried">Gia đình:</label>
                        <div class="col-md-4">
                            <label class="radio-inline" for="narried-0">
                                <input type="radio" name="narried" id="narried-0" value="1" checked="checked">
                                Đã lập gia đình
                            </label>
                            <label class="radio-inline" for="narried-1">
                                <input type="radio" name="narried" id="narried-1" value="2">
                                Còn độc thân
                            </label>
                        </div>
                    </div>

                    <!-- Text input-->
                    <!-- <div class="form-group">
                      <label class="col-md-4 control-label" for="Temporary Address">Temporary Address</label>
                      <div class="col-md-4">

                      <div class="input-group">
                           <div class="input-group-addon">
                         <i class="fa fa-home" style="font-size:20px;"></i>

                           </div>
                     <input id="Temporary Address" name="Temporary Address" type="text" placeholder="Temporary Address" class="form-control input-md">
                          </div>


                      </div>
                    </div>
                     -->


<!--                    <div class="form-group">-->
<!--                        <label class="col-md-4 control-label col-xs-12" for="Permanent Address">Permanent Address</label>-->
<!--                        <div class="col-md-2  col-xs-4">-->
<!--                            <input id="Permanent Address" name="Permanent Address" type="text" placeholder="District" class="form-control input-md ">-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-md-2 col-xs-4">-->
<!---->
<!--                            <input id="Permanent Address" name="Permanent Address" type="text" placeholder="Area" class="form-control input-md ">-->
<!--                        </div>-->
<!---->
<!---->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-md-4 control-label" for="Permanent Address"></label>-->
<!--                        <div class="col-md-2  col-xs-4">-->
<!--                            <input id="Permanent Address" name="Permanent Address" type="text" placeholder="Street" class="form-control input-md ">-->
<!---->
<!--                        </div>-->
<!---->
<!---->
<!---->
<!---->
<!--                    </div>-->




<!--                    <div class="form-group">-->
<!--                        <label class="col-md-4 control-label col-xs-12" for="Temporary Address">Temporary Address</label>-->
<!--                        <div class="col-md-2  col-xs-4">-->
<!--                            <input id="Temporary Address" name="Temporary Address" type="text" placeholder="District" class="form-control input-md ">-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-md-2 col-xs-4">-->
<!---->
<!--                            <input id="Temporary Address" name="Temporary Address" type="text" placeholder="Area" class="form-control input-md ">-->
<!--                        </div>-->
<!---->
<!---->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-md-4 control-label" for="Temporary Address"></label>-->
<!--                        <div class="col-md-2  col-xs-4">-->
<!--                            <input id="Temporary Address" name="Temporary Address" type="text" placeholder="Street" class="form-control input-md ">-->
<!---->
<!--                        </div>-->
<!---->
<!---->
<!---->
<!---->
<!--                    </div>-->




                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="department">Phòng ban</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-briefcase"></i>

                                </div>
                                <input id="department" name="department" type="text" placeholder="Phòng ban" class="form-control input-md">
                            </div>


                        </div>
                    </div>

                    <!-- Text input-->
<!--                    <div class="form-group">-->
<!--                        <label class="col-md-4 control-label" for="Secondary Occupation (if any)">Secondary Occupation (if any)</label>-->
<!--                        <div class="col-md-4">-->
<!--                            <div class="input-group">-->
<!--                                <div class="input-group-addon">-->
<!--                                    <i class="fa fa-briefcase"></i>-->
<!---->
<!--                                </div>-->
<!--                                <input id="Secondary Occupation (if any)" name="Secondary Occupation (if any)" type="text" placeholder="Secondary Occupation (if any)" class="form-control input-md">-->
<!--                            </div>-->
<!---->
<!---->
<!--                        </div>-->
<!--                    </div>-->

                    <!-- Text input-->
<!--                    <div class="form-group">-->
<!--                        <label class="col-md-4 control-label" for="Skills">Skills</label>-->
<!--                        <div class="col-md-4">-->
<!--                            <div class="input-group">-->
<!--                                <div class="input-group-addon">-->
<!--                                    <i class="fa fa-graduation-cap"></i>-->
<!---->
<!--                                </div>-->
<!--                                <input id="Skills" name="Skills" type="text" placeholder="Skills" class="form-control input-md">-->
<!--                            </div>-->
<!---->
<!---->
<!--                        </div>-->
<!--                    </div>-->

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="phone">Số điện thoại</label>
                        <div class="col-md-4">
<!--                            <div class="input-group">-->
<!--                                <div class="input-group-addon">-->
<!--                                    <i class="fa fa-phone"></i>-->
<!---->
<!--                                </div>-->
<!--                                <input id="phone" name="phone" type="text" placeholder="Primary phone" class="form-control input-md">-->
<!---->
<!--                            </div>-->
                            <div class="input-group othertop">
                                <div class="input-group-addon">
                                    <i class="fa fa-mobile fa-1x" style="font-size: 20px;"></i>

                                </div>
                                <input id="phone" name="phone" type="text" placeholder=" Số điện thoại" class="form-control input-md">

                            </div>

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="email">Địa chỉ mail</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope-o"></i>

                                </div>
<!--                                <input id="email" name="email" type="text" placeholder="email" class="form-control input-md">-->
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Địa chỉ mail">

                            </div>
                            <small id="emailHelp" class="form-text text-muted">Mail của bạn sẽ được bảo mật.</small>

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="password">Mật khẩu</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope-o"></i>

                                </div>
<!--                                <input id="password" name="password" type="text" placeholder="password" class="form-control input-md">-->
                                <input type="password" name="password" class="form-control" id="exampleInputpassword1" placeholder="Mật khẩu">

                            </div>

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="repassword">Nhập lại mật khẩu</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope-o"></i>

                                </div>
<!--                                <input id="repassword" name="repassword" type="text" placeholder="password" class="form-control input-md">-->
                                <input type="repassword" name="repassword" class="form-control" id="exampleInputpassword1" placeholder="Mật khẩu">

                            </div>

                        </div>
                    </div>
<!---->
<!--                    <div class="form-group">-->
<!--                        <label for="exampleInputEmail1">email</label>-->
<!--                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">-->
<!--                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="exampleInputpassword1">password</label>-->
<!--                        <input type="password" class="form-control" id="exampleInputpassword1" placeholder="Mật khẩu">-->
<!--                    </div>-->

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="contract_start_at">Ngày bắt đầu hợp đồng</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>

                                </div>
                                <input id="contract_start_at" name="contract_start_at" type="text" placeholder="Ngày bắt đầu hợp đồng" class="form-control input-md">

                            </div>


                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="contract_end_at">Ngày kết thúc hợp đồng</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>

                                </div>
                                <input id="contract_end_at" name="contract_end_at" type="text" placeholder="Ngày kết thúc hợp đồng" class="form-control input-md">

                            </div>


                        </div>
                    </div>

                    <!-- Text input-->
<!--                    <div class="form-group">-->
<!--                        <label class="col-md-4 control-label" for="department">department</label>-->
<!--                        <div class="col-md-4">-->
<!--                            <div class="input-group">-->
<!--                                <div class="input-group-addon">-->
<!--                                    <i class="fa fa-street-view"></i>-->
<!---->
<!--                                </div>-->
<!--                                <input id="department" name="department" type="text" placeholder="department" class="form-control input-md">-->
<!---->
<!--                            </div>-->
<!---->
<!---->
<!--                        </div>-->
<!--                    </div>-->


                    <!-- Multiple Radios (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="leader">Chức vụ</label>
                        <div class="col-md-4">
                            <label class="radio-inline" for="leader-0">
                                <input type="radio" name="leader" id="leader-0" value="1" checked="checked">
                                Nhân viên
                            </label>
                            <label class="radio-inline" for="leader-1">
                                <input type="radio" name="leader" id="leader-1" value="2">
                                Quản lý
                            </label>
<!--                            <label class="radio-inline" for="Quản lý-2">-->
<!--                                <input type="radio" name="leader" id="leader-2" value="3">-->
<!--                                Other-->
<!--                            </label>-->
                        </div>
                    </div>







                    <!-- Text input-->
<!--                    <div class="form-group">-->
<!--                        <label class="col-md-4 control-label" for="Citizenship No.">Citizenship No.</label>-->
<!--                        <div class="col-md-4">-->
<!--                            <div class="input-group">-->
<!--                                <div class="input-group-addon">-->
<!--                                    <i class="fa fa-sticky-note-o"></i>-->
<!---->
<!--                                </div>-->
<!--                                <input id="Citizenship No." name="Citizenship No." type="text" placeholder="Citizenship No." class="form-control input-md">-->
<!---->
<!--                            </div>-->
<!---->
<!---->
<!--                        </div>-->
<!--                    </div>-->

                    <!-- Multiple Checkboxes -->
<!--                    <div class="form-group">-->
<!--                        <label class="col-md-4 control-label" for="Languages Known">Languages Known</label>-->
<!--                        <div class="col-md-4">-->
<!--                            <div class="checkbox">-->
<!--                                <label for="Languages Known-0">-->
<!--                                    <input type="checkbox" name="Languages Known" id="Languages Known-0" value="1">-->
<!--                                    Nepali-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <div class="checkbox">-->
<!--                                <label for="Languages Known-1">-->
<!--                                    <input type="checkbox" name="Languages Known" id="Languages Known-1" value="2">-->
<!--                                    Newari-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <div class="checkbox">-->
<!--                                <label for="Languages Known-2">-->
<!--                                    <input type="checkbox" name="Languages Known" id="Languages Known-2" value="3">-->
<!--                                    English-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <div class="checkbox">-->
<!--                                <label for="Languages Known-3">-->
<!--                                    <input type="checkbox" name="Languages Known" id="Languages Known-3" value="4">-->
<!--                                    Hindi-->
<!--                                </label>-->
<!--                            </div>-->
<!---->
<!--                            <div class="othertop">-->
<!--                                <label for="Languages Known-4">-->
<!---->
<!---->
<!---->
<!--                                </label>-->
<!---->
<!--                                <input type="input" name="LanguagesKnown" id="Languages Known-4"  placeholder="Other Language">-->
<!--                            </div>-->
<!---->
<!--                        </div>-->
<!--                    </div>-->

                    <!-- Text input-->
<!--                    <div class="form-group">-->
<!--                        <label class="col-md-4 control-label" for="License No.">License No.</label>-->
<!--                        <div class="col-md-4">-->
<!--                            <div class="input-group">-->
<!--                                <div class="input-group-addon">-->
<!--                                    <i class="fa fa-sticky-note-o"></i>-->
<!---->
<!--                                </div>-->
<!--                                <input id="License No." name="License No." type="text" placeholder="License No." class="form-control input-md">-->
<!---->
<!--                            </div>-->
<!---->
<!---->
<!--                        </div>-->
<!--                    </div>-->

                    <!-- Multiple Radios -->
<!--                    <div class="form-group">-->
<!--                        <label class="col-md-4 control-label" for="Owns Vehicle">Owns Vehicle?</label>-->
<!--                        <div class="col-md-4">-->
<!--                            <div class="checkbox">-->
<!--                                <label for="Owns Vehicle-0">-->
<!--                                    <input type="checkbox" name="Owns Vehicle" id="Owns Vehicle-0" value="1">-->
<!--                                    4 wheeler-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <div class="checkbox">-->
<!--                                <label for="Owns Vehicle-1">-->
<!--                                    <input type="checkbox" name="Owns Vehicle" id="Owns Vehicle-1" value="2">-->
<!--                                    Bike-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <div class="checkbox">-->
<!--                                <label for="Owns Vehicle-2">-->
<!--                                    <input type="checkbox" name="Owns Vehicle" id="Owns Vehicle-2" value="3">-->
<!--                                    Bicycle-->
<!--                                </label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->


                    <!-- Text input-->
<!--                    <div class="form-group">-->
<!--                        <label class="col-md-4 control-label" for="Working Experience (time period)">Working Experience (time period)</label>-->
<!--                        <div class="col-md-4">-->
<!--                            <div class="input-group">-->
<!--                                <div class="input-group-addon">-->
<!--                                    <i class="fa fa-clock-o"></i>-->
<!---->
<!--                                </div>-->
<!--                                <input id="Working Experience (time period)" name="Working Experience" type="text" placeholder="Enter time period " class="form-control input-md">-->
<!---->
<!---->
<!--                            </div>-->
<!---->
<!--                        </div>-->
<!--                    </div>-->

                    <!-- Textarea -->
<!--                    <div class="form-group">-->
<!--                        <label class="col-md-4 control-label" for="Overview (max 200 words)">Overview (max 200 words)</label>-->
<!--                        <div class="col-md-4">-->
<!--                            <textarea class="form-control" rows="10"  id="Overview (max 200 words)" name="Overview (max 200 words)">Overview</textarea>-->
<!--                        </div>-->
<!--                    </div>-->


                    <div class="form-group">
                        <label class="col-md-4 control-label" ></label>
                        <div class="col-md-4">
                            <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> Đăng ký</a>
                            <a href="#" class="btn btn-danger" value=""><span class="glyphicon glyphicon-remove-sign"></span> Xóa</a>

                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
        <div class="col-md-2 hidden-xs">
            <img src="http://websamplenow.com/30/userprofile/images/avatar.jpg" class="img-responsive img-thumbnail ">
        </div>


    </div>
</div>
