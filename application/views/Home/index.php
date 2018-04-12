<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            <form class="form-horizontal" method="post" action="">
                <fieldset>
                    Trang Home!
                </fieldset>
            </form>
        </div>
        <div class="col-md-2 hidden-xs">
            <img src="http://websamplenow.com/30/userprofile/images/avatar.jpg" class="img-responsive img-thumbnail ">
        </div>

    </div>
</div>


<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="<?php echo public_url() ?>/assets/dest/js/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<!--<script src="--><?php //echo public_url()?><!--/assets/dest/js/jquery.ui.datepicker-vi-VN.js" charset="UTF-8"></script>-->
<script type="text/javascript" src="<?php echo public_url() ?>/assets/dest/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="<?php echo public_url() ?>/assets/dest/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function () {
        var date_input = $('input[name="birthday"]'); //our date input has the name "date"
        var container = $('.input-group form').length > 0 ? $('.input-group form').parent() : "body";
        date_input.datepicker({
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
            // language: "vi-VN",
        })
    })
</script>

<script>
    $(document).ready(function () {
        var date_input = $('input[name="contract_start_at"]'); //our date input has the name "date"
        var container = $('.input-group form').length > 0 ? $('.input-group form').parent() : "body";
        date_input.datepicker({
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
            language: "vi-VN",
        })
    })
</script>

<script>
    $(document).ready(function () {
        var date_input = $('input[name="contract_end_at"]'); //our date input has the name "date"
        var container = $('.input-group form').length > 0 ? $('.input-group form').parent() : "body";
        date_input.datepicker({
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
            language: "vi-VN",
        })
    })
</script>
