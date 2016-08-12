
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                  <h1>
                        <?php echo lang('create_user_heading');?>
                  </h1>
                  <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> 控制面板</a></li>
                        <li><a href="#"><?php echo lang('index_heading');?></a></li>
                        
                  </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                  <div class="row">
                        <div class="col-xs-12">
                              <div class="box">

                                    <?php echo $message;?>

                                    <div class="box-body">

                                          <?php echo form_open("admin/auth/create_user");?>
                                                <div class="box-body">

                                                      <div class="form-group">
                                                            <div class="col-xs-2 text-right">
                                                                  <?php echo lang('create_user_name_label', 'user_name');?>
                                                            </div>
                                                            <div class="col-xs-10">
                                                                  <?php echo form_input($user_name);?>
                                                                  <span class="help-block"></span>
                                                            </div>
                                                      </div>

                                                      <div class="form-group">
                                                            <div class="col-xs-2 text-right">
                                                                  <?php echo lang('create_user_company_label', 'company');?>
                                                            </div>
                                                            <div class="col-xs-10">
                                                                  <?php echo form_input($company);?>
                                                                  <span class="help-block"></span>
                                                            </div>
                                                      </div>

                                                      <div class="form-group">
                                                            <div class="col-xs-2 text-right">
                                                                  <?php echo lang('create_user_email_label', 'email');?>
                                                            </div>
                                                            <div class="col-xs-10">
                                                                  <?php echo form_input($email);?>
                                                                  <span class="help-block"></span>
                                                            </div>
                                                      </div>

                                                      <div class="form-group">
                                                            <div class="col-xs-2 text-right">
                                                                  <?php echo lang('create_user_phone_label', 'phone');?>
                                                            </div>
                                                            <div class="col-xs-10">
                                                                  <?php echo form_input($phone);?>
                                                                  <span class="help-block"></span>
                                                            </div>
                                                      </div>
                                                
                                                      <div class="form-group">
                                                            <div class="col-xs-2 text-right">
                                                                  <?php echo lang('create_user_password_label', 'password');?>
                                                            </div>
                                                            <div class="col-xs-10">
                                                                  <?php echo form_input($password);?>
                                                                  <span class="help-block"></span>
                                                            </div>
                                                      </div>

                                                      <div class="form-group">
                                                            <div class="col-xs-2 text-right">
                                                                  <?php echo lang('create_user_password_confirm_label', 'password_confirm');?>
                                                            </div>
                                                            <div class="col-xs-10">
                                                                  <?php echo form_input($password_confirm);?>
                                                                  <span class="help-block"></span>
                                                            </div>
                                                      </div>

                                                      <div class="form-group">
                                                            <div class="col-xs-10 text-left col-xs-offset-2">
                                                                  <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>
                                                            </div>
                                                      </div>

                                                </div>
                                          <?php echo form_close();?>
                                          
                                    </div>

                              </div>
                        </div>
                  </div>
            </section>

      </div>
