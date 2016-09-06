
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <b>
                    <?php echo lang('gsl_form_title_edit_setting'); ?>  
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
                        <div class="box-body" id="groups_setting">
                            <?php echo form_open('admin/groups/edit_setting/'.$groups['id']); ?>
                            <div class="box-body">

                                <!-- name -->
                                <div class="form-group">
                                    <div class="col-xs-2 text-right">
                                        <label class="control-label" for="groups_name"><?php echo lang('gl_groups_name'); ?></label>
                                    </div>
                                    <div class="col-xs-10 <?php if(form_error('groups_name')){echo 'has-error';}?>">
                                        <input type="text" class="form-control" id="groups_name" name="groups_name" value="<?php echo $groups['name']; ?>" readonly>
                                        <span class="help-block">
                                        </span>
                                    </div>
                                </div>

                                <!-- description -->
                                <div class="form-group">
                                    <div class="col-xs-2 text-right">
                                        <label class="control-label" for="groups_description"><?php echo lang('gl_groups_description'); ?></label>
                                    </div>
                                    <div class="col-xs-10 <?php if(form_error('groups_description')){echo 'has-error';}?>">
                                        <input type="text" class="form-control" id="groups_description" name="groups_description" value="<?php echo $groups['description']; ?>" readonly>
                                        <span class="help-block">
                                        </span>
                                    </div>
                                </div>

                                <!-- level -->
                                <div class="form-group">
                                    <div class="col-xs-2 text-right">
                                        <label class="control-label" for="level"><?php echo lang('gsl_level'); ?></label>
                                    </div>
                                    <div class="col-xs-10 <?php if(form_error('level')){echo 'has-error';}?>">
                                        <input type="text" class="form-control" id="level" name="level" value="<?php echo $groups_settings['level']; ?>">
                                        <span class="help-block">
                                        </span>
                                    </div>
                                </div>

                                <!-- vote_more -->
                                <div class="form-group">
                                    <div class="col-xs-2 text-right">
                                        <label class="control-label" for="vote_more"><?php echo lang('gsl_vote_more'); ?></label>
                                    </div>
                                    <div class="col-xs-10 <?php if(form_error('vote_more')){echo 'has-error';}?>">
                                        <input type="text" class="form-control" id="vote_more" name="vote_more" value="<?php echo $groups_settings['vote_more']; ?>">
                                        <span class="help-block">
                                        </span>
                                    </div>
                                </div>

                                <div class="box-footer pull-right">
                                    <button type="submit" class="btn btn-default"><?php echo lang('gl_save'); ?></button>
                                    <a href="javascript:history.go(-1);location.reload()" class="btn btn-default"><?php echo lang('gl_return'); ?></a>
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
