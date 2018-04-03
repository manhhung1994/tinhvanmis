<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Danh sách đơn xin nghỉ</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <button type="button" class="btn btn-danger modal-click" data-toggle="modal" data-target="#createModel" data-whatever="@mdo">Nộp đơn mới</button>
<!--                <a href="--><?php //echo base_url('nghiphep/add')?><!--" class ="btn btn-danger">Nộp đơn mới</a>-->
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Người nộp đơn</th>
            <th scope="col">Loại đơn</th>
            <th scope="col">Ngày nộp đơn</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Người phê duyệt</th>
            <th scope="col">Ngày phê duyệt</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row):?>
        <tr>
            <th scope="row"><?php echo $row->id ?></th>
            <td><?php echo $row->userID ?></td>
            <td><?php echo $row->letterTypeID ?></td>
            <td><?php echo $row->created_at ?></td>
            <td><?php echo $row->statusID ?></td>
            <td><?php echo $row->approvalID ?></td>
            <td><?php echo $row->approval_at ?></td>
            <td><a href="#" id ="1" class="modal-click">edit</a></td>
<!--            <td><button type="button" class="modal-click" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"></button>-->
<!--            </td>-->

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
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nhân Viên</label>
                                <input readonly type="text" class="form-control" id="name" placeholder="Example input" name = "name" value="Từ Mạnh Hưng">
                            </div>
                            <div class="form-group">
                                <label for="approvalID">Người phụ trách</label>
                                <select name="approvalID" id ="approvalID" class="form-control">
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="letterTypeID">Loại đơn</label>
                                <select name="letterTypeID" id ="letterTypeID" class="form-control">

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Từ Ngày</label>

                                <input type="datetime-local" class="form-control" name= "start_at" id="" placeholder="Another input">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Đến ngày</label>
                                <input type="datetime-local" class="form-control" name ="end_at" id="" placeholder="Another input">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2"> Tổng sô ngày nghỉ</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                            <div class = "form-group">
                                <label for="description">Miêu tả</label>
                                <textarea class="form-control" name ="description" id="description" rows="3"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <!--            <div class="modal-footer">-->
                    <!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                    <!--                <button type="button" class="btn btn-primary">Send message</button>-->
                    <!--            </div>-->
                </div>
            </div>
        </div>


        </script>
        <script src="<?php echo public_url()?>assets/dest/js/jquery.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

        <script type="text/javascript">

            $('.modal-click').click(function (event) {
                var id = $(this).attr('id');
                    // alert(00);

                $.post('http://localhost/tinhvanmis/nghiphep/approvalData',{id:1},function (data) {
                    var obj= JSON.parse(data);
                    var length = obj.length;
                    $.each(obj, function (i, item) {
                        if(i < length)
                        {
                            $('#approvalID').append($('<option>', { 
                            value: item.id,
                            text : item.name, 
                            }));
                        }
                        
                    });

                });
                $.post('http://localhost/tinhvanmis/nghiphep/letterTypeData',{id:1},function (data) {
                    var obj= JSON.parse(data);
                    var length = obj.length;
                    $.each(obj, function (i, item) {
                        if(i < length)
                        {
                            $('#letterTypeID').append($('<option>', { 
                            value: item.id,
                            text : item.name, 
                            }));
                        }
                        
                    });

                    // $('#createModel .modal-body').find("#name").val(obj.name);
                    // $('#createModel .modal-body').find("#title").val(obj.id);
                });
                // $('#createModel').modal('show');

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

        </tbody>
    </table>
    </div>
</div>






