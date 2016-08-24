    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <b>
                    <?php if($wxp_action == 'add'){echo lang('wxpl_form_title_add');
                    }else if($wxp_action == 'edit'){echo lang('wxpl_form_title_edit');} ?>  
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
                            <?php if($wxp_action == 'add'){ $action='add'; }else if($wxp_action == 'edit'){ $action = 'edit/'.$wxps['wxp_id']; }?>  
                            <?php echo form_open('admin/weixin_public/'.$action); ?>
                            <div class="box-body">

                            <!-- name -->
                            <div class="form-group">
                                <div class="col-xs-2 text-right">
                                    <label class="control-label" for="name"><?php echo lang('wxpl_name'); ?></label>
                                </div>
                                <div class="col-xs-10 <?php if(form_error('name')){echo 'has-error';}?>">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo lang('wxpl_help_name'); ?>" value="<?php echo $wxp_action == 'add'?set_value(html_escape('name')):$wxps['name']; ?>">
                                    <span class="help-block">
                                        <?php if(form_error('name')){echo "<i class='fa fa-times-circle-o'></i>".form_error('name');} ?>
                                    </span>
                                </div>
                            </div>

                            <!-- appid -->
                            <div class="form-group">
                                <div class="col-xs-2 text-right">
                                    <label class="control-label" for="appid"><?php echo lang('wxpl_appid'); ?></label>
                                </div>
                                <div class="col-xs-10 <?php if(form_error('appid')){echo 'has-error';}?>">
                                    <input type="text" class="form-control" id="appid" name="appid" placeholder="<?php echo lang('wxpl_help_appid'); ?>" value="<?php echo $wxp_action == 'add'?set_value(html_escape('appid')):$wxps['appid']; ?>">
                                    <span class="help-block">
                                        <?php if(form_error('appid')){echo "<i class='fa fa-times-circle-o'></i>".form_error('appid');} ?>
                                    </span>
                                </div>
                            </div>

                            <!-- secret -->
                            <div class="form-group">
                                <div class="col-xs-2 text-right">
                                    <label class="control-label" for="secret"><?php echo lang('wxpl_secret'); ?></label>
                                </div>
                                <div class="col-xs-10 <?php if(form_error('secret')){echo 'has-error';}?>">
                                    <input type="text" class="form-control" id="secret" name="secret" placeholder="<?php echo lang('wxpl_help_secret'); ?>" value="<?php echo $wxp_action == 'add'?set_value(html_escape('secret')):$wxps['secret']; ?>">
                                    <span class="help-block">
                                        <?php if(form_error('secret')){echo "<i class='fa fa-times-circle-o'></i>".form_error('secret');} ?>
                                    </span>
                                </div>
                            </div>

                            <!-- wxp_type -->
                            <div class="form-group">
                                <div class="col-xs-2 text-right">
                                    <label class="control-label" for="wxt_id"><?php echo lang('wxpl_type'); ?></label>
                                </div>
                                <div class="col-xs-10">
                                    <select class="form-control" name="wxt_id">
                                    <?php if($wxp_types){ ?>
                                    <?php foreach ($wxp_types as $wxt) { ?>
                                    <?php if($wxp_action == 'add'){ ?>
                                    <option value='<?php echo $wxt['wxt_id']; ?>'><?php echo $wxt['name']; ?></option>
                                    <?php }else{ ?>
                                    <?php if($wxps['wxt_id'] == $wxt['wxt_id']){?>
                                    <option value="<?php echo $wxt['wxt_id']; ?>" selected="selected"><?php echo $wxt['name']; ?></option>
                                    <?php }else if($wxps['wxt_id'] != $wxt['wxt_id']){ ?>
                                    <option value="<?php echo $wxt['wxt_id']; ?>"><?php echo $wxt['name']; ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <!-- sort -->
                            <div class="form-group">
                                <div class="col-xs-2 text-right">
                                    <label class="control-label" for="sort"><?php echo lang('wxpl_sort'); ?></label>
                                </div>
                                <div class="col-xs-10 <?php if(form_error('sort')){echo 'has-error';}?>">
                                    <input type="text" class="form-control" id="sort" name="sort" placeholder="<?php echo lang('wxpl_help_sort'); ?>" value="<?php echo $wxp_action == 'add'?set_value(html_escape('sort')):$wxps['sort']; ?>">
                                    <span class="help-block">
                                        <?php if(form_error('sort')){echo "<i class='fa fa-times-circle-o'></i>".form_error('sort');} ?>
                                    </span>
                                </div>
                            </div>

                            <!-- date_add -->
                            <div class="form-group">
                                <div class="col-xs-2 text-right">
                                    <label class="control-label" for="date_add"><?php echo lang('wxpl_date_add'); ?></label>
                                </div>
                                <div class="col-xs-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control" id="date_add" name="date_add" placeholder="<?php echo lang('wxpl_help_date_add'); ?>" value="<?php echo $wxp_action == 'add'?'':$wxps['date_add']; ?>" readonly>
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <!-- date_edit -->
                            <div class="form-group">
                                <div class="col-xs-2 text-right">
                                    <label class="control-label" for="date_edit"><?php echo lang('wxpl_date_edit'); ?></label>
                                </div>
                                <div class="col-xs-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control" id="date_edit" name="date_edit" placeholder="<?php echo lang('wxpl_help_date_edit'); ?>" value="<?php echo $wxp_action == 'add'?'':$wxps['date_edit']; ?>" readonly>
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            

                            <!-- select -->
                            <div class="form-group">
                                <div class="col-xs-2 text-right">
                                    <label class="control-label" for="status"><?php echo lang('wxpl_status'); ?></label>
                                </div>
                                <div class="col-xs-10">
                                    <select class="form-control" name="status">
                                        <?php if($wxp_action == 'add'){ ?>
                                            <option value="0"><?php echo lang('wxpl_status_off'); ?></option>
                                            <option value="1"><?php echo lang('wxpl_status_on'); ?></option>
                                        <?php }else{  ?>
                                            <?php if($wxps['status'] == '0'){ ?>
                                                <option value="0" select="selected"><?php echo lang('wxpl_status_off'); ?></option>
                                                <option value="1"><?php echo lang('wxpl_status_on'); ?></option>
                                            <?php }else{ ?>
                                                <option value="1" select="selected"><?php echo lang('wxpl_status_on'); ?></option>
                                                <option value="0"><?php echo lang('wxpl_status_off'); ?></option> 
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <span class="help-block"><?php echo form_error('status'); ?></span>
                            </div>

                            <div class="box-footer pull-right">
                                <button type="submit" class="btn btn-default"><?php echo lang('wxpl_save'); ?></button>
                                <a href="javascript:history.go(-1);location.reload()" class="btn btn-default"><?php echo lang('wxpl_return'); ?></a>
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