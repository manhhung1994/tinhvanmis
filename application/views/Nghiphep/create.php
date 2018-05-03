<link href="<?php echo public_url('date')?>/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">


<div class="container">
    <!-- Sidebar -->
    <?php $this->load->view('nghiphep/sidebar')?>
    <!-- End sidebar -->
    <div class="col-sm-9 col-md-9">
        <form id ="create" action="<?php echo base_url('nghiphep/create')?>" method="POST">
            <input type="hidden" name ="updateID" id = "updateID" value="">
            <div class="form-group row">
                <label for="creator_name" class="col-sm-2 col-form-label col-form-label-sm">Người gửi</label>
                <div class="col-sm-10">
                    <input readonly type="text" class="form-control form-control-sm" name="creator_name" id="creator_name" value="<?php echo $this->session->userdata['logged_in']->fullname ?>">
                </div>
                <input type="hidden" name ="creator" value="<?php echo $this->session->userdata['logged_in']->id.'|'.$this->session->userdata['logged_in']->fullname ?>">
            </div>
            <div class="form-group row">
                <label for="approval" class="col-sm-2 col-form-label col-form-label-sm">Người duyệt</label>
                <div class="col-sm-10">
                    <!-- <input readonly type="text" id="input_approval" name="input_approval" value=""> -->
                    <select name="approval" id ="approval" class="form-control">
                        <?php foreach ($leaders as $key => $leader): ?>
                            <?php if($leader->id !=$this->session->userdata['logged_in']->id  ) :?>
                                <option value="<?php echo $leader->id.'|'.$leader->fullname; ?>"><?php echo $leader->fullname?></option>
                            <?php endif;?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row" >
                <label for="letterType" class="col-sm-2 col-form-label col-form-label-sm">Loại đơn</label>
                <div class="col-sm-10">
                    <select name="letterType" id ="letterType" class="form-control">
                        <?php foreach ($letterTypes as $key => $type): ?>
                            <option value="<?php echo $type->id ?>"><?php echo $type->name?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="formGroupExampleInput2" class="col-sm-2 col-form-label col-form-label-sm">Từ Ngày</label>
                <div class="col-sm-10">

                    <div class="input-group date form_datetime "  data-date-format="yyyy-mm-dd HH:ii p" data-link-field="start_at">
                        <input class="form-control"  size="16" type="text" name="start" id="start" value="" readonly>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                </div>
                <input type="hidden" name="start_at" id="start_at" value="" /><br/>

            </div>
            <div class="form-group row">
                <label for="formGroupExampleInput2" class="col-sm-2 col-form-label col-form-label-sm">Đến ngày</label>
                <div class="col-sm-10">

                    <div class="input-group date form_datetime "  data-date-format="yyyy-mm-dd HH:ii p" data-link-field="end_at">
                        <input class="form-control"  size="16" type="text" name="end" id="end" value="" onmouseup="sub()" onkeyup="sub()" readonly>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                </div>
                <input type="hidden" name="end_at" id="end_at" value="" /><br/>

            </div>
            <div class="form-group row">
                <label for="formGroupExampleInput2" class="col-sm-2 col-form-label col-form-label-sm"> Tổng sô ngày nghỉ</label>
                <div class="col-sm-10">
                    <input readonly type="text" class="form-control" name = "dayoff" id="dayoff" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="formGroupExampleInput2" class="col-sm-2 col-form-label col-form-label-sm"> Số ngày phép còn lại</label>
                <div class="col-sm-10">
                    <input readonly type="text" class="form-control" name = "dayoff" id="dayoff" value="">
                </div>
            </div>
            <div class = "form-group row">
                <label for="description" class="col-sm-2 col-form-label col-form-label-sm">Miêu tả</label>
                <div class="col-sm-10">

                    <textarea required class="form-control" name ="description" id="description" rows="3"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <button type="submit" class="btn btn-primary" style="text-align: center">Create</button>
            </div>
        </form>
        
    </div>
</div>

<script type="text/javascript">
    function sub() {
        var start = $('#start_at').val();
        var end = $('#end_at').val();
        // alert( Date.parse(end));
        var diff = new Date(end) - new Date(start);
        $('[name=dayoff]').val(new Date(diff).getDate());
    }
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