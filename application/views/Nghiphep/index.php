<link href="<?php echo public_url('date')?>/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<div class="container">

    <!-- Sidebar -->
    <?php $this->load->view('nghiphep/sidebar'); ?>
    <!-- End Sidebar -->

    <!-- Content -->
    
    <div class="col-sm-9 col-md-9">
        <!-- Notification -->
    
        <h3 style="color: red"><?php if($this->session->flashdata('message')) echo $this->session->flashdata('message');?></h3>
        <!-- End notification -->
        <!--Filter thống kê-->
        <?php if(isset($thongke)):?>
        <div style="margin-bottom: 10px">
            <form class="navbar-form" role="search" method="post" action="<?php echo base_url('nghiphep/thongke')?>">
                <div class="form-group">
                    <select name="year" id="year" class="form-control">
                        <option value="">Chọn năm</option>
                        <?php for($i=2000; $i<=date("Y"); $i++):?>
                            <option value="<?php echo $i?>"><?php echo $i?></option>
                        <?php endfor;?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="month" id="month" class="form-control">
                        <option value="">Chọn tháng</option>
                        <?php for($i=1; $i<=12; $i++):?>
                            <option value="<?php echo $i?>"><?php echo $i?></option>
                        <?php endfor;?>
                    </select>
                </div>
                <button type="submit" id="btn-filter-pending" class="btn btn-default">Tìm kiếm</button>
            </form>
        </div>
        <?php endif;?>
        <!--End filter thống kê-->
        <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <?php if(isset($manager)):?>
                    <th scope="col">Người gửi</th>
                    <?php else:?>
                    <th scope="col">Người duyệt</th>
                    <?php endif;?>
                    <th scope="col">Từ ngày</th>
                    <th scope="col">Đến ngày</th>
                    <th scope="col">Ngày nộp đơn</th>
                    <th scope="col">Ngày duyệt</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $key=> $row):?>
                    <tr>
                        <th scope="row"><?php echo $key+1 ?></th>
                        <td><?php echo $row->fullname ?></td>
                        <td><?php echo $row->start_at ?></td>
                        <td><?php echo $row->end_at ?></td>
                        <td><?php echo $row->created_at ?></td>
                        <td><?php echo $row->approval_at ?></td>
                        <td><?php echo $row->statusname ?></td>

                        <td>
                                <a  href="#" id ="<?php echo $row->id ?>" class="modal-click glyphicon glyphicon-pencil" data-toggle="modal" data-target="#createModel" data-whatever="@mdo" title="Chi tiết"></a>
                            <?php if(isset($manager)):?>
                                <a href="#" id="<?php echo $row->id ?>" class= "glyphicon glyphicon-thumbs-up approval"   title="Đồng ý"></a>
                                <a href="#" id="<?php echo $row->id ?>" class = "glyphicon glyphicon-thumbs-down reject" title ="Từ chối" ></a>
                            <?php endif;?>
                        </td>

                    </tr>
                <?php endforeach; ?>

                <div class="modal fade" id="createModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Đơn xin nghỉ</h5>
                            </div>
                            <div class="modal-body">
                                <form id ="create" action="<?php echo base_url('nghiphep/add')?>" method="POST">
                                    <input type="hidden" name ="updateID" id = "updateID" value="">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Người gửi</label>
                                        <input readonly type="text" class="form-control" name="creator_name" placeholder="Example input" name = "name" value="<?php echo $this->session->userdata['logged_in']->fullname ?>">
                                        <input type="hidden" name ="creator" value="<?php echo $this->session->userdata['logged_in']->id.'|'.$this->session->userdata['logged_in']->fullname ?>">
                                    </div>
                                    <div class="form-group">

                                        <label for="approval">Người duyệt</label>
                                        <input readonly type="text" id="input_approval" name="input_approval" value="">
                                        <select name="approval" id ="approval" class="form-control">
                                            <?php foreach ($leaders as $key => $leader): ?>
                                                <?php if($leader->id !=$this->session->userdata['logged_in']->id  ) :?>
                                                    <option value="<?php echo $leader->id.'|'.$leader->fullname; ?>"><?php echo $leader->fullname?></option>
                                                <?php endif;?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="letterType">Loại đơn</label>
                                        <select name="letterType" id ="letterType" class="form-control">
                                            <?php foreach ($letterTypes as $key => $type): ?>
                                                <option value="<?php echo $type->id ?>"><?php echo $type->name?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Từ Ngày</label>
                                        <div class="input-group date form_datetime "  data-date-format="yyyy-mm-dd HH:ii p" data-link-field="start_at">
                                            <input class="form-control"  size="16" type="text" name="start" id="start" value="" readonly>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                        </div>
                                        <input type="hidden" name="start_at" id="start_at" value="" /><br/>

                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Đến ngày</label>
                                        <div class="input-group date form_datetime "  data-date-format="yyyy-mm-dd HH:ii p" data-link-field="end_at">
                                            <input class="form-control"  size="16" type="text" name="end" id="end" value="" onmouseup="sub()" onkeyup="sub()" readonly>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                        </div>
                                        <input type="hidden" name="end_at" id="end_at" value="" /><br/>

                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2"> Tổng sô ngày nghỉ</label>
                                        <input readonly type="text" class="form-control" name = "dayoff" id="dayoff" value="">
                                    </div>
                                    <div class = "form-group">
                                        <label for="description">Miêu tả</label>
                                        <textarea required class="form-control" name ="description" id="description" rows="3"></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>



                </tbody>
            </table>

        <!--Table thống kê-->
        <?php if(isset($thongke)):?>

        <?php endif;?>

        <!--End table thống kê-->
    </div>
    <!-- End content -->
</div>




<script src="<?php echo public_url()?>assets/dest/js/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
    // khi click button đồng ý
    $('.approval').click(function (event) {
        var id = $(this).attr('id');
        var r = confirm("Bạn có chắc chắn");
        if (r == true) {
            $.post('http://localhost/tinhvanmis/nghiphep/approval',{id:id},function (data) {
                alert(data);
                location.reload();

            });
        }
    });
    // khi click vào button từ chối
    $('.reject').click(function (event) {
        var id = $(this).attr('id');
        var r = confirm("Bạn có chắc chắn");
        if (r == true) {
            $.post('http://localhost/tinhvanmis/nghiphep/reject',{id:id},function (data) {
                alert(data);
                location.reload();

            });
        }
    });
    function sub() {
        var start = $('#start_at').val();
        var end = $('#end_at').val();
        // alert( Date.parse(end));
        var diff = new Date(end) - new Date(start);
        $('[name=dayoff]').val(new Date(diff).getDate());
    }
    $('.modal-click').click(function (event) {
        var id = $(this).attr('id');
        $('#end_at').val(null);
        $('#start_at').val(null);
        $('#subtract').val(null);
        $('#updateID').val(null);
        $('#dayoff').val(null);
        if(id)
        {
            $('#updateID').val(id);
            $.post('http://localhost/tinhvanmis/nghiphep/getLetterById',{id:id},function (data) {
                var obj= JSON.parse(data);

                // alert(obj.approval_name);
                $("#approval").remove();
                // $("#input_approval").attr('type','text');
                $("#input_approval").val(obj.approval_name);
                $('[name=creator_name]').val( obj.creator_name );
                $('[name=letterType]').val( obj.letterTypeID );
                $('[name=start]').val( obj.start_at);
                $('[name=end]').val( obj.end_at);

                $('[name=start_at]').val( obj.start_at);
                $('[name=end_at]').val( obj.end_at);

                $('[name=dayoff]').val( obj.dayoff_num);
                $('[name=description]').val( obj.description);
            });
        }
    });
    $("#create").submit(function(e) {
        var url = "http://localhost/tinhvanmis/nghiphep/create"; // the script where you handle the form input.
        $.ajax({
            type: "POST",
            url: url,
            data: $("#create").serialize(), // serializes the form's elements.
            success: function(data)
            {
                alert(data); // show response from the php script.
                $('#createModel').modal('hide');
                location.reload();
            }
        });
        e.preventDefault(); // avoid to execute the actual submit of the form.
    });
</script>




<!--Datetime picker-->
<script type="text/javascript" src="<?php echo public_url('date')?>/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo public_url('date')?>/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo public_url('date')?>/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo public_url('date')?>/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
</script>
<!--end-->

