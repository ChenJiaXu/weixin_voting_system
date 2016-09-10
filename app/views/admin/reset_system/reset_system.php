    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <b>
                    <?php echo lang('rsl_head_title'); ?> 
                </b>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">General Elements</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        <?php echo form_open($action); ?>
                           
                            <div class="box-body">

                                <!-- 操作信息提示 -->
                                <!-- success -->
                                <?php if($this->session->flashdata('success')){ ?> 
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-check"></i> <?php echo lang('rsl_success'); ?></h4>
                                     <?php echo $this->session->flashdata('success'); ?>
                                </div>
                                <?php } ?>
                                <!-- error -->
                                <?php if($this->session->flashdata('error')){ ?> 
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-ban"></i> <?php echo lang('rsl_error'); ?></h4>
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                                <?php } ?><!-- ./操作信息提示 -->

                                <span class="help-block">
                                    <h3><?php echo lang('rsl_help_reset_system');?></h3>
                                </span>

                                <!-- 验证密码 -->
                                <div class="form-group">
                                    <div class="col-xs-2 text-right">
                                        <label class="control-label" for="confirm_password"><?php echo lang('rsl_confirm_password'); ?></label>
                                    </div>
                                    <div class="col-xs-10 <?php if(form_error('confirm_password')){echo 'has-error';}?>">
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="<?php echo lang('cl_help_confirm_password'); ?>" value="">
                                        <span class="help-block">
                                            <?php if(form_error('confirm_password')){echo "<i class='fa fa-times-circle-o'></i>".form_error('confirm_password');} ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="box-footer text-center">
                                    <button type="submit" class="btn btn-default"><?php echo lang('rsl_reset_system'); ?></button>
                                </div>

                            </div>
                                
                            
                        <?php echo form_close();?> 

                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->