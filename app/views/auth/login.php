
<div class="login-box">
  <div class="login-logo">
    <b><?php echo lang('login_heading');?></b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><?php echo lang('login_subheading');?></p>

    <div id="infoMessage"><?php echo $message;?></div>

   <?php echo form_open("auth/login");?>
      <div class="form-group has-feedback">
        <?php echo form_input($identity);?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?php echo form_input($password);?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> <?php echo lang('login_remember_label', 'remember');?>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo lang('login_submit_btn');?></button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close();?>

    <a href="forgot_password"><?php echo lang('login_forgot_password');?></a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->