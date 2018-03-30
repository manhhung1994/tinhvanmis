<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Danh sách đơn xin nghỉ</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Nộp dơn mới</button>
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
            <th scope="col">Lý do</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Từ Mạnh Hưng</td>
            <td>Nghỉ phép</td>
            <td>28:04:2018 15:30:00</td>
            <td>Chờ xử lý</td>
            <td>Nguyễn Văn Thắng</td>
            <td>28:04:2018 15:30:00</td>
            <td>Nghỉ ốm</td>
            <td><a href="#" id ="6" class="modal-click">edit</a></td>
<!--            <td><button type="button" class="modal-click" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"></button>-->
<!--            </td>-->

        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Từ Mạnh Hưng</td>
            <td>Nghỉ phép</td>
            <td>28:04:2018 15:30:00</td>
            <td>Chờ xử lý</td>
            <td>Nguyễn Văn Thắng</td>
            <td>28:04:2018 15:30:00</td>
            <td>Nghỉ ốm</td>
            <td><a href="#" id ="4" class="modal-click">edit</a></td>
<!--            <td><button type="button" class="modal-click" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"></button>-->
<!--            </td>-->

        </tr>
       // modal
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Đơn xin nghỉ</h5>
                        <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                        <!--                    <span aria-hidden="true">&times;</span>-->
                        <!--                </button>-->
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nhân Viên</label>
                                <input readonly type="text" class="form-control" id="name" placeholder="Example input" name = "name" value="Từ Mạnh Hưng">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Lý do</label>
                                <select name="cars" class="form-control">
                                    <option value="volvo">Nghỉ ốm</option>
                                    <option value="saab">Vợ đẻ</option>
                                    <option value="fiat">Việc gia đình</option>
                                    <option value="audi">Việc cá nhân</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Tiêu đề</label>
                                <input type="text" name = "title" id ="title" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Từ Ngày</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Đến ngày</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2"> Tổng sô ngày nghỉ</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Người phụ trách</label>
                                <select name="cars" class="form-control">
                                    <option value="volvo"> Nguyễn Văn Thắng</option>
                                    <option value="saab"> Nguyễn Ích Vinh</option>
                                    <option value="fiat"> Nguyễn Thị Phượng</option>
                                    <option value="audi"> Từ Mạnh Hưng</option>
                                </select>
                            </div>
                            <div class = "form-group">
                                <label for="exampleFormControlTextarea1">Miêu tả</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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

        <script src="<?php echo public_url()?>assets/dest/js/jquery.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $('.modal-click').click(function (event) {
                var id = $(this).attr('id');
                $.post('http://localhost/tinhvanmis/nghiphep/add',{id:id},function (data) {
                    var obj= JSON.parse(data);
                     // alert(obj.Peter);

                    $('#exampleModal .modal-body').find("#name").val(obj.name);
                    $('#exampleModal .modal-body').find("#title").val(obj.title);
                });
                $('#exampleModal').modal('show');

            });
        </script>
        </tbody>
    </table>
    </div>
</div>






