<link href="<?php echo public_url('date')?>/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<div class="container">
    <!-- Sidebar -->
    <?php $this->load->view('nghiphep/sidebar'); ?>
    <!-- End Sidebar -->

    <!-- Content -->
    <div class="col-md-9 col-sm-9">
        <!-- <?php $comment = array();?>
        <?php foreach ($data as $key => $value) :?>
            <?php array_push($comment,intval($value->count)); ?>
        <?php endforeach; ?> -->
    	<!--Filter thống kê-->
        <!-- <?php echo json_encode($data) ?> -->
        <input type="hidden" name="comment" id="comment" value='<?php echo json_encode($data)?>'>
        <input type="hidden" name="label" id="label" value='<?php echo json_encode($label)?>'>
        <div style="margin-bottom: 10px">
            <form class="navbar-form" role="search" method="post" action="<?php echo base_url('nghiphep/comments')?>">
                <div class="form-group">
                    <select value="" name="year" id="year" _autocheck="true" class="form-control">
                        <option value="">Chọn năm</option>
                        <?php for($i=2015; $i<=date("Y"); $i++):?>
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
        <label style="color: red"><?php if($this->session->flashdata('comments')) echo $this->session->flashdata('comments');?></label>
        <!--End filter thống kê-->
        <h3>コメントまとめ</h3>
        <canvas id="chart_0" height="440vw" width="880vw"></canvas>

        <form action="<?php echo base_url('nghiphep/exportcsv')?>" method="post">
            <input type="hidden" name="csv_data" value='<?php echo json_encode($data)?>'>
            <button type= "submit" class="btn btn-primary">Xuất CSV tất cả</button>
        </form>
        <!-- <a class="btn btn-primary" href="<?php echo base_url('nghiphep/exportcsv') ?>">Xuất CSV tất cả</a> -->
    </div>
    
    <!-- End content -->
</div>



<script type ="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js">
</script>
<script>
    var temp = $("#comment").val();
    var data = (JSON.parse(temp));
    var comment = [];
    var label = [];
    for (i = 0; i < data.length; i++) { 
        comment.push(data[i]['count']);
        time = data[i]['month'] + "-" +data[i]['year'];
        label.push(time);
    }
    // alert(comment);
    var data = {
  labels: label,
  datasets: [{
    label: "Comment numbers",
    backgroundColor: "rgba(54, 162, 235, 0.2)",
    borderColor: "rgba(54, 162, 235, 1)",
    borderWidth: 2,
    hoverBackgroundColor: "rgba(255,99,132,0.4)",
    hoverBorderColor: "rgba(255,99,132,1)",
    data: comment,
  }]
};

var option = {
  responsive: false,
  scales: {
    yAxes: [{
      stacked: true,
      gridLines: {
        display: true,
        color: "rgba(255,99,132,0.2)"
      }
    }],
    xAxes: [{
      gridLines: {
        display: false
      }
    }]
  }
};

Chart.Bar('chart_0', {
  options: option,
  data: data
});

</script>