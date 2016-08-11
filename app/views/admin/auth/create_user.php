
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

                                                <p>
                                                      <?php echo lang('create_user_name_label', 'user_name');?> <br />
                                                      <?php echo form_input($user_name);?>
                                                </p>

                                                <p>
                                                      <?php echo lang('create_user_company_label', 'company');?> <br />
                                                      <?php echo form_input($company);?>
                                                </p>

                                                <p>
                                                      <?php echo lang('create_user_email_label', 'email');?> <br />
                                                      <?php echo form_input($email);?>
                                                </p>

                                                <p>
                                                      <?php echo lang('create_user_phone_label', 'phone');?> <br />
                                                      <?php echo form_input($phone);?>
                                                </p>

                                                <p>
                                                      <?php echo lang('create_user_password_label', 'password');?> <br />
                                                      <?php echo form_input($password);?>
                                                </p>

                                                <p>
                                                      <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
                                                      <?php echo form_input($password_confirm);?>
                                                </p>


                                                <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>

                                          <?php echo form_close();?>
                                          
                                    </div>

                              </div>
                        </div>
                  </div>
            </section>

      </div>
