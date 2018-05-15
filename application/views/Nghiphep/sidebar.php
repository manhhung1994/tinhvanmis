<div class="col-sm-3 col-md-3">
        <div class="list-group">
            <a href="#" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Nhân Viên
            </a>
            <!-- <a href="" class="list-group-item modal-click" data-toggle="modal" data-target="#createModel" data-whatever="@mdo">
                <span class="glyphicon glyphicon-pencil text-primary" aria-hidden="true"></span> Tạo đơn mới

            </a> -->
            <a href="<?php echo base_url('nghiphep/create')?>" class="list-group-item" >
                <span class="glyphicon glyphicon-pencil" aria-hidden="true">

                </span> Tạo đơn mới
            </a>
            <a href="<?php echo base_url('nghiphep/index')?>" class="list-group-item">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true">

                </span> Danh sách
            </a>
        </div>
        <?php if($this->session->userdata['logged_in']->leader): ?>
        <div class="list-group">
            <a href="#" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Quản Lý
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
            <form action="<?php echo base_url('nghiphep/thongke')?>" method="post">
                <input type="hidden"  name = "statusID" value="4">
                <a href="" onclick="document.forms[3].submit();return false;" class="list-group-item" >
                    <span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
                    Thống kê

                </a>
            </form>
            <form action="<?php echo base_url('nghiphep/comments')?>" method="post">
                <input type="hidden"  name = "statusID" value="4">
                <a href="" onclick="document.forms[4].submit();return false;" class="list-group-item" >
                    <span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
                    Comment

                </a>
            </form>
        </div>
        <?php endif;?>
    </div>