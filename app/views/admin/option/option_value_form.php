    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <b>
                    <?php if($ov_action == 'add'){echo lang('ovl_form_title_add');
                    }else if($ov_action == 'edit'){echo lang('ovl_form_title_edit');} ?>  
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
                            <?php if($ov_action == 'add'){ $action='add'; }else if($ov_action == 'edit'){ $action = 'edit/'.$ovs['ov_id']; }?>  
                            <?php echo form_open('admin/option_value/'.$action); ?>
                            <div class="box-body">

                            <!-- key -->
                            <div class="form-group">
                                <div class="col-xs-2 text-right">
                                    <label class="control-label" for="key"><?php echo lang('ovl_key'); ?></label>
                                </div>
                                <div class="col-xs-10 <?php if(form_error('key')){echo 'has-error';}?>">
                                    <input type="text" class="form-control" id="key" name="key" placeholder="<?php echo lang('ovl_help_key'); ?>" value="<?php echo $ov_action == 'add'?set_value(html_escape('key')):$ovs['key']; ?>">
                                    <span class="help-block">
                                        <?php if(form_error('key')){echo "<i class='fa fa-times-circle-o'></i>".form_error('key');} ?>
                                    </span>
                                </div>
                            </div>

                            <!-- value -->
                            <div class="form-group">
                                <div class="col-xs-2 text-right">
                                    <label class="control-label" for="value"><?php echo lang('ovl_value'); ?></label>
                                </div>
                                <div class="col-xs-10 <?php if(form_error('value')){echo 'has-error';}?>">
                                    <input type="text" class="form-control" id="value" name="value" placeholder="<?php echo lang('ovl_help_value'); ?>" value="<?php echo $ov_action == 'add'?set_value(html_escape('value')):$ovs['value']; ?>">
                                    <span class="help-block">
                                        <?php if(form_error('value')){echo "<i class='fa fa-times-circle-o'></i>".form_error('value');} ?>
                                    </span>
                                </div>
                            </div>

                            <!-- ov_type -->
                            <div class="form-group">
                                <div class="col-xs-2 text-right">
                                    <label class="control-label" for="ot_id"><?php echo lang('ovl_type'); ?></label>
                                </div>
                                <div class="col-xs-10">
                                    <select class="form-control" name="ot_id">
                                    <?php if($ot_types){ ?>
                                    <?php foreach ($ot_types as $ots) { ?>
                                    <?php if($ov_action == 'add'){ ?>
                                    <option value='<?php echo $ots['ot_id']; ?>'><?php echo $ots['name']; ?></option>
                                    <?php }else{ ?>
                                    <?php if($ovs['ot_id'] == $ots['ot_id']){?>
                                    <option value="<?php echo $ots['ot_id']; ?>" selected="selected"><?php echo $ots['name']; ?></option>
                                    <?php }else if($ovs['ot_id'] != $ots['ot_id']){ ?>
                                    <option value="<?php echo $ots['ot_id']; ?>"><?php echo $ots['name']; ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="box-footer pull-right">
                                <button type="submit" class="btn btn-default"><?php echo lang('ovl_save'); ?></button>
                                <a href="javascript:history.go(-1);location.reload()" class="btn btn-default"><?php echo lang('ovl_return'); ?></a>
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