
	<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo lang('deactivate_heading');?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 控制面板</a></li>
                <li><a href="#"></a></li>   
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        <div class="box-body">
                        	<h1><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></h1>

                            <?php echo form_open("admin/auth/deactivate/".$user->id);?>

								<p>
									<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
									<input type="radio" name="confirm" value="yes" checked="checked" />
									<?php echo lang('deactivate_confirm_n_label', 'confirm');?>
									<input type="radio" name="confirm" value="no" />
								</p>

								<?php echo form_hidden($csrf); ?>
								<?php echo form_hidden(array('id'=>$user->id)); ?>

								<p><?php echo form_submit('submit', lang('deactivate_submit_btn'));?></p>

							<?php echo form_close();?>
                              
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>