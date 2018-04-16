
<div class="container">

    <form class="navbar-form" role="search" method="post" action="<?php echo base_url('duyetdon/index')?>">
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




        <button type="submit" id="btn-filter-pending" class="btn btn-default">Tìm kiếm</button>
    </form>

    <?php if($this->session->userdata['logged_in']->leader):?>
        <a class="btn btn-info" href="<?php echo base_url('nghiphep/index')?>">Quay Lại</a>
    <?php endif;?>
    <!--    filter bar-->
    <div class='pagination'>
        <!--        --><?php //echo $this->pagination->create_links();?>
    </div>
    <div id="content">


        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Người nộp đơn</th>
                <th scope="col">Loại đơn</th>
                <th scope="col">Từ Ngày</th>
                <th scope="col">Đến ngày</th>
                <th scope="col">Người phê duyệt</th>
                <th scope="col">Ngày phê duyệt</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $key=> $row):?>
                <tr>
                    <th scope="row"><?php echo $key+1 ?></th>
                    <td><?php echo $row->fullname ?></td>
                    <td><?php echo $row->lettertypename ?></td>
                    <td><?php echo $row->start_at ?></td>
                    <td><?php echo $row->end_at ?></td>
                    <td><?php echo $this->session->userdata['logged_in']->fullname ?></td>
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
                            <form id ="detail" action="http://localhost/tinhvanmis/duyetdon/approval" method="POST">
                                <input type="hidden" name ="updateID" id = "updateID" value="">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Nhân Viên</label>
                                    <input readonly type="text" class="form-control" id="name" placeholder="Example input" name = "name" value="<?php echo $this->session->userdata['logged_in']->fullname ?>">
                                    <input type="hidden" name ="userID" id="userID" value="<?php echo $this->session->userdata['logged_in']->id ?>">
                                </div>
                                <div class="form-group">
                                    <label for="approval">Người phụ trách</label>
                                    <select readonly="" name="approval" id ="approval" class="form-control">
                                        <option selected value="<?php echo $this->session->userdata['logged_in']->id ?>"><?php echo $this->session->userdata['logged_in']->fullname ?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="letterType">Loại đơn</label>
                                    <select readonly name="letterType" id ="letterType" class="form-control">
                                        <?php foreach ($letterTypes as $key => $type): ?>
                                            <option value="<?php echo $type->id ?>"><?php echo $type->name?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Từ Ngày</label>
                                    <input readonly type="datetime-local" class="form-control" value="" name= "start_at" id="start_at" >
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Đến ngày</label>
                                    <input readonly type="datetime-local" class="form-control" value="" name ="end_at" id="end_at" onmouseup="sub()" onkeyup="sub()" >
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2"> Tổng sô ngày nghỉ</label>
                                    <input readonly type="text" class="form-control" name = "dayoff" id="dayoff" value="">
                                </div>
                                <div class = "form-group">
                                    <label for="description">Miêu tả</label>
                                    <textarea readonly class="form-control" name ="description" id="description" rows="3"></textarea>
                                </div>
<!--                                <input type="submit" class="btn btn-primary" name="action" value ="Accept">-->
<!--                                <input type="submit" class="btn btn-danger" name="action" value ="Reject">-->
                                <button type="submit" class="btn btn-primary">Duyệt đơn</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>



            </tbody>
        </table>
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
                $('[name=name]').val( obj.fullname );
                $('[name=letterType]').val( obj.letterTypeID );
                $('[name=start_at]').val( start);
                $('[name=end_at]').val( end);
                $('[name=dayoff]').val( obj.dayoff_num);
                $('[name=description]').val( obj.description);
            });
        }
    });
    $("#detail").submit(function(e) {
        var url = "http://localhost/tinhvanmis/duyetdon/approval"; // the script where you handle the form input.
        $.ajax({
            type: "POST",
            url: url,
            data: $("#detail").serialize(), // serializes the form's elements.
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





