<link href="<?php echo public_url('date')?>/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<div class="container">
    <!-- Sidebar -->
    <?php $this->load->view('nghiphep/sidebar'); ?>
    <!-- End Sidebar -->

    <!-- Content -->
    <div class="col-md-9 col-sm-9">

    	<!--Filter thống kê-->
        <div style="margin-bottom: 10px">
            <form class="navbar-form" role="search" method="post" action="<?php echo base_url('nghiphep/thongke')?>">
                <div class="form-group">
                    <select value="" name="year" id="year" _autocheck="true" class="form-control">
                        <option value="">Chọn năm</option>
                        <?php for($i=2000; $i<=date("Y"); $i++):?>
                            <option value="<?php echo $i?>"><?php echo $i?></option>
                        <?php endfor;?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="month" id="month" _autocheck="true" class="form-control">
                        <option value="">Chọn tháng</option>
                        <?php for($i=1; $i<=12; $i++):?>
                            <option value="<?php echo $i?>"><?php echo $i?></option>
                        <?php endfor;?>
                    </select>
                </div>
                <button type="submit" id="btn-filter-pending" class="btn btn-default">Tìm kiếm</button>
            </form>
        </div>
        <label style="color: red"><?php if($this->session->flashdata('thongke')) echo $this->session->flashdata('thongke');?></label>
        <!--End filter thống kê-->
    	<table class="table table-bordered">
    		<thead>
    			<tr>
    				<th scope="col">STT</th>
    				<th scope="col">Họ tên</th>
    				<th scope="col">Tổng số ngày phép đã nghỉ</th>
    				<th scope="col">Tổng số ngày nghỉ không phép</th>
    				<th scope="col">Số ngày nghỉ còn lại</th>
    				<!-- <th scope="col">Thao tác</th> -->
    			</tr>
    		</thead>
    		<tbody>
    			<?php foreach ($data as $key => $db): ?>
    			<tr>
    				<th scope="row">1</th>
    				<td><?php echo $db['creator_name'] ?></td>
    				<td><?php echo $db['dayoff_num'] ?></td>
    				<td>3</td>
    				<td>5</td>
    				<!-- <td>
                        <form action="<?php echo base_url('nghiphep/exportcsv')?>" method="post">
                            <input type="hidden" name="csv_data" value="<?php  echo json_encode($db) ?>">
                            <button type= "submit" class="btn btn-primary">Xuất CSV </button>
                        </form>
                    </td> -->

    			</tr>
    			<?php endforeach;?>	
    		</tbody>
    	</table>
        <form action="<?php echo base_url('nghiphep/exportcsv')?>" method="post">
            <input type="hidden" name="csv_data" value='<?php echo json_encode($data)?>'>
            <button type= "submit" class="btn btn-primary">Xuất CSV tất cả</button>
        </form>
        <!-- <a class="btn btn-primary" href="<?php echo base_url('nghiphep/exportcsv') ?>">Xuất CSV tất cả</a> -->
    </div>
    
    <!-- End content -->
</div>




