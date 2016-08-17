    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <b>
                    <?php if($ot_action == 'add'){echo lang('otl_form_title_add');}
                    else if($ot_action == 'edit'){echo lang('otl_form_title_edit');} ?>  
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
                    <!-- general form elements disabled -->
                    <div class="box box-warning">

                        <div class="box-body">

                            <?php if($ot_action == 'add'){ $action='add'; }else if($ot_action == 'edit'){ $action = 'edit/'.$ots['ot_id']; }?>  
                            <?php echo form_open('admin/option_type/'.$action); ?>
                            <div class="box-body">

                                <!-- input states -->
                                <div class="form-group">
                                    <div class="col-xs-2 text-right">
                                        <label class="control-label" for="name"><?php echo lang('otl_name'); ?></label>
                                    </div>
                                    <div class="col-xs-10 <?php if(form_error('name')){echo 'has-error';}?>">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo lang('otl_help_name'); ?>" value="<?php echo $ot_action == 'add'?set_value(html_escape('name')):$ots['name']; ?>">
                                        <span class="help-block">
                                            <?php if(form_error('name')){echo "<i class='fa fa-times-circle-o'></i>".form_error('name');} ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-2 text-right">
                                        <label class="control-label" for="type"><?php echo lang('otl_type'); ?></label>
                                    </div>
                                    <div class="col-xs-10 <?php if(form_error('type')){echo 'has-error';}?>">
                                        <input type="text" class="form-control" id="type" name="type" placeholder="<?php echo lang('otl_help_type'); ?>" value="<?php echo $ot_action == 'add'?set_value(html_escape('type')):$ots['type']; ?>">
                                        <span class="help-block">
                                            <?php if(form_error('type')){echo "<i class='fa fa-times-circle-o'></i>".form_error('type');} ?>
                                        </span>
                                    </div>
                                </div>

                                <!-- Date -->
                                <div class="form-group">
                                    <div class="col-xs-2 text-right">
                                        <label class="control-label" for="date_add"><?php echo lang('otl_date_add'); ?></label>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" class="form-control" id="date_add" name="date_add" placeholder="<?php echo lang('otl_help_date_add'); ?>" value="<?php echo $ot_action == 'add'?'':$ots['date_add']; ?>" readonly>
                                        </div>
                                        <!-- /.input group -->
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <!-- Date -->
                                <div class="form-group">
                                    <div class="col-xs-2 text-right">
                                        <label class="control-label" for="date_edit"><?php echo lang('otl_date_edit'); ?></label>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" class="form-control" id="date_edit" name="date_edit" placeholder="<?php echo lang('otl_help_date_edit'); ?>" value="<?php echo $ot_action == 'add'?'':$ots['date_edit']; ?>" readonly>
                                        </div>
                                        <!-- /.input group -->
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <!-- /.form group -->

                                <div class="box-footer pull-right">
                                    <button type="submit" class="btn btn-default"><?php echo lang('otl_save'); ?></button>
                                    <a href="javascript:history.go(-1);location.reload()" class="btn btn-default"><?php echo lang('otl_return'); ?></a>
                                </div>

                            </div>
                            <?php echo form_close();?>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->