<div class="container">
    <div id="content">

        <form action="<?php echo base_url() ?>login" method="post" class="beta-form-checkout">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng nhập</h4>
                    <div class="space20">&nbsp;</div>


                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input name = "email" type="email" id="email" value="<?php echo set_value('email')?>" >


                    </div>
                    <div class="form-block">
                        <label for="password">Password*</label>
                        <input name = "password" type="password" id="password" >

                    </div>
                    <div class="form-block">
                        <div style="color: red;text-align: center;"><?php echo form_error('login')?></div>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
