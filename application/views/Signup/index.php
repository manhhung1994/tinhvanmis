<div class="container">
    <div id="content">
        <?php $this->load->view('message',$this->data)?>
        <form action="<?php echo base_url() ?>signup/" method="post" class="beta-form-checkout">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng kí</h4>
                    <div class="space20">&nbsp;</div>


                    <div class="form-block">
                        <label for="email">Email address <span style="color: red">*</span></label>
                        <input name = "email" type="email" id="email" value="<?php echo set_value('email')?>">
                        <div style ="color: red;" name="name_error" class="clear error" ><?php echo form_error('email')?></div>

                    </div>
                    <div class="form-block">
                        <label for="password">Password<span style="color: red">*</label>
                        <input name ="password" type="password"  >
                        <div style ="color: red;"  name="name_error" class="clear error"><?php echo form_error('password')?></div>

                    </div>
                    <div class="form-block">
                        <label for="re_password">Re password<span style="color: red">*</label>
                        <input name = "re_password" type="password"  >
                        <div style ="color: red;"  name="name_error" class="clear error"><?php echo form_error('re_password')?></div>

                    </div>
                    <div class="form-block">
                        <label for="name">Fullname<span style="color: red">*</label>
                        <input name = "name" type="text" id="name" value="<?php echo set_value('name')?>">
                        <div  style ="color: red;" name="name_error" class="clear error"><?php echo form_error('name')?></div>

                    </div>

                    <div class="form-block">
                        <?php echo form_error('login')?>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
