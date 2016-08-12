
	<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo lang('edit_group_heading');?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 控制面板</a></li>
                <li><a href="#"><?php echo lang('edit_group_subheading');?></a></li>   
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        <?php echo $message;?>

                        <div class="box-body">

                            <?php echo form_open(current_url());?>

                                <div class="box-body">

    								<div class="form-group">
                                        <div class="col-xs-2 text-right">
    								        <?php echo lang('edit_group_name_label', 'group_name');?>
                                        </div>
                                        <div class="col-xs-10">
    								        <?php echo form_input($group_name);?>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

    								<div class="form-group">
                                        <div class="col-xs-2 text-right">
    								        <?php echo lang('edit_group_desc_label', 'description');?>
                                        </div>
                                        <div class="col-xs-10">
    								        <?php echo form_input($group_description);?>
                                        <span class="help-block"></span>
                                        </div>
                                    </div>
    								
                                    <div class="form-group">
                                        <div class="col-xs-10 text-left col-xs-offset-2">
    								        <?php echo form_submit('submit', lang('edit_group_submit_btn'));?>
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