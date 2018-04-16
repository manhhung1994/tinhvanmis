
<div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-3">
            <div class="list-group">
                <a href="#" class="list-group-item active main-color-bg">
                    <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Nhân Viên
                </a>
                <a href="#" class="list-group-item modal-click" data-toggle="modal" data-target="#createModel" data-whatever="@mdo">
                    <span class="glyphicon glyphicon-pencil text-primary" aria-hidden="true"></span> Tạo đơn mới

                </a>

                <a href="<?php echo base_url('nghiphep/index')?>" class="list-group-item">
                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true">

                    </span> Danh sách
                </a>
            </div>
            <?php if($this->session->userdata['logged_in']->leader): ?>
            <div class="list-group">
                <a href="#" class="list-group-item active main-color-bg">
                    <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Quản Lý
                </a>
                <form action="<?php echo base_url('nghiphep/index')?>" method="post">
                    <input type="hidden"  name = "statusID" value="1">
                    <a href="" onclick="document.forms[0].submit();return false;" class="list-group-item" >
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                        Đơn chờ duyệt
                        <span class="badge"><?php echo $waiting_num;?></span>
                    </a>
                </form>
                <form action="<?php echo base_url('nghiphep/index')?>" method="post">
                    <input type="hidden"  name = "statusID" value="2">
                    <a href="" onclick="document.forms[1].submit();return false;" class="list-group-item" >
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        Đơn đã duyệt

                    </a>
                </form>
                <form action="<?php echo base_url('nghiphep/index')?>" method="post">
                    <input type="hidden"  name = "statusID" value="3">
                    <a href="" onclick="document.forms[2].submit();return false;" class="list-group-item" >
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        Đơn từ chối

                    </a>
                </form>
<!--                <a href="#" class="list-group-item"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Đơn đã duyệt</a>-->
<!--                <a href="#" class="list-group-item"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Đơn từ chối</a>-->
            </div>
            <?php endif;?>
<!--            <div class="panel-group" id="accordion">-->
<!--                <div class="panel-body">-->
<!--                    <table class="table">-->
<!--                        <tr>-->
<!--                            <td>-->
<!--                                <h6>-->
<!--                                    <span class="glyphicon glyphicon-user"></span>-->
<!--                                    <a href="">User</a>-->
<!--                                </h6>-->
<!---->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>-->
<!--                                <span class="glyphicon glyphicon-pencil text-primary"></span>-->
<!--                                <a href="">Tạo đơn mới</a>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>-->
<!--                                <span class="glyphicon glyphicon-list-alt"></span>-->
<!--                                <a href="">Danh sách</a>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>-->
<!--                                <h6>-->
<!--                                    <span class="glyphicon glyphicon-home"></span>-->
<!--                                    <a href="">Quản lý</a>-->
<!--                                </h6>-->
<!---->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>-->
<!--                                <span class="glyphicon glyphicon-envelope"></span>-->
<!--                                <a href="">Đơn chờ duyệt</a>-->
<!--                                <span class="badge">5</span>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>-->
<!--                                <span class="glyphicon glyphicon-ok"></span>-->
<!--                                <a href="">Đơn đã duyệt</a>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>-->
<!--                                <span class="glyphicon glyphicon-remove"></span>-->
<!--                                <a href="">Đơn từ chối</a>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                    </table>-->
<!--                </div>-->
<!--            </div>-->
        </div>
        <div class="col-sm-9 col-md-9">
            <label for="">Tổng số ngày nghỉ còn lại : <?php echo $this->session->userdata['logged_in']->dayoff_num ?></label>

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
                                <button type="button" id ="<?php echo $row->id ?>" class="btn btn-info modal-click" data-toggle="modal" data-target="#createModel" data-whatever="@mdo">Chi tiết</button>
                            </td>

                        </tr>
                    <?php endforeach; ?>

                    <div class="modal fade" id="createModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Đơn xin nghỉ</h5>
                                    <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                                    <!--                    <span aria-hidden="true">&times;</span>-->
                                    <!--                </button>-->
                                </div>
                                <div class="modal-body">
                                    <form id ="create" action="http://localhost/tinhvanmis/nghiphep/add" method="POST">
                                        <input type="hidden" name ="updateID" id = "updateID" value="">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Nhân Viên</label>
                                            <input readonly type="text" class="form-control" id="name" placeholder="Example input" name = "name" value="<?php echo $this->session->userdata['logged_in']->fullname ?>">
                                            <input type="hidden" name ="userID" value="<?php echo $this->session->userdata['logged_in']->id ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="approval">Người phụ trách</label>
                                            <select name="approval" id ="approval" class="form-control">
                                                <?php foreach ($leaders as $key => $leader): ?>
                                                    <?php if($leader->id !=$this->session->userdata['logged_in']->id  ) :?>
                                                        <option value="<?php echo $leader->id ?>"><?php echo $leader->fullname?></option>
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
                                            <input required type="datetime-local" class="form-control" value="" name= "start_at" id="start_at" >
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">Đến ngày</label>
                                            <input required type="datetime-local" class="form-control" value="" name ="end_at" id="end_at" onmouseup="sub()" onkeyup="sub()" >
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
                                <!--            <div class="modal-footer">-->
                                <!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                                <!--                <button type="button" class="btn btn-primary">Send message</button>-->
                                <!--            </div>-->
                            </div>
                        </div>
                    </div>



                    </tbody>
                </table>
        </div>
    </div>

</div>

<div class="container">
    <form class="navbar-form" role="search" method="post" action="<?php echo base_url('nghiphep/index')?>">
        <div class="form-group">
            <select name="letterTypeID" id="letterTypeID" class="form-control">
                    <option value="">Loại đơn</option>
                <?php foreach ($lettertypes as $type):?>
                    <option value="<?php echo $type->id?>"><?php echo $type->name?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <select name="statusID" id="statusID" class="form-control">
                <option value="">Trạng thái</option>
                <?php foreach ($status as $status):?>
                    <option value="<?php echo $status->id?>"><?php echo $status->name?></option>
                <?php endforeach;?>
            </select>
        </div>
<!--        <div class="form-group">-->
<!--            <select name="approvalID" id="approvalID" class="form-control">-->
<!--                <option value="">Người phê duyệt</option>-->
<!--                --><?php //foreach ($leaders as $leader):?>
<!--                    <option value="--><?php //echo $leader->id?><!--">--><?php //echo $leader->fullname?><!--</option>-->
<!--                --><?php //endforeach;?>
<!--            </select>-->
<!--        </div>-->




        <button type="submit" id="btn-filter-pending" class="btn btn-default">Tìm kiếm</button>
    </form>

    <button type="button" class="btn btn-danger modal-click" data-toggle="modal" data-target="#createModel" data-whatever="@mdo">Nộp đơn mới</button>
    <?php if($this->session->userdata['logged_in']->leader):?>
        <a class="btn btn-info" href="<?php echo base_url('duyetdon/index')?>">Duyệt đơn</a>
    <?php endif;?>
<!--    filter bar-->
    <div class='pagination'>
<!--        --><?php //echo $this->pagination->create_links();?>
    </div>
</div>

<script src="<?php echo public_url()?>assets/dest/js/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
    function sub() {
        var start = $('#start_at').val();
        var end = $('#end_at').val();
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
                // alert(data);
                var diff = (new Date(obj.end_at) - new Date(obj.start_at));
                // alert(new Date(diff).getDate());
                var start = obj.start_at.replace(" ","T");
                var end = obj.end_at.replace(" ","T");
                $('[name=approval]').val( obj.approvalID );
                $('[name=letterType]').val( obj.letterTypeID );
                $('[name=start_at]').val( start);
                $('[name=end_at]').val( end);
                $('[name=dayoff]').val( obj.dayoff_num);
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





