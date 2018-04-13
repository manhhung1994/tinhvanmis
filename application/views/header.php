
<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> Tầng 8, Khách sạn Thể Thao, Làng Sinh viên Hacinco, Quận Thanh Xuân, Hà Nội. </a></li>
                    <li><a href=""><i class="fa fa-phone"></i>  (04) 3558 9970</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    <?php if(isset($this->session->userdata['logged_in'])): ?>
                        <li><a href="<?php echo base_url('nghiphep')?>"><i class="fa fa-user"></i><?php echo $this->session->userdata['logged_in']->email ?></a></li>
                        <li><a href="<?php echo base_url('home/logout')?>">Đăng xuất</a></li>

                    <?php else: ?>
                        <li><a href="<?php echo base_url('signup')?>">Đăng kí</a></li>
                        <li><a href="<?php echo base_url('login')?>">Đăng nhập</a></li>
                    <?php endif; ?>

                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="<?php echo base_url('home')?>" id="logo"><img src="<?php echo public_url()?>assets/dest/images/tinhvan2.png" width="200px" alt=""></a>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="<?php echo base_url('profile') ?>">Thông tin cá nhân</a></li>
                    <li><a href="#">Đóng góp ý kiến</a></li>
                    <li><a href="#">Các khóa đào tạo</a></li>
                    <li><a href="#">Thông báo - Nội Quy</a></li>
                    <li><a href="#">Chức năng khác</a></li>
                    <li><a href="#">Đánh giá</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title"><?php echo $page_name?></h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Home</a> / <span><?php echo $page_name?></span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>