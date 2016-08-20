    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <b>
                    <?php echo lang('wxfl_read_fans'); ?>  
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
                            
                            <div class="box-body">
                                <?php if($weixin_fanss){ ?>
                                <?php foreach ($weixin_fanss as $wxfs) { ?>
                                <div class="form-group">
                                    <div class="col-xs-4 text-right">
                                        <label class="control-label" for="subscribe"><?php echo lang('wxfl_subscribe'); ?></label>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="text" class="form-control" id="subscribe" name="subscribe" value="<?php echo $wxfs['subscribe']; ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-4 text-right">
                                        <label class="control-label" for="openid"><?php echo lang('wxfl_openid'); ?></label>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="text" class="form-control" id="openid" name="openid" value="<?php echo $wxfs['openid']; ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-4 text-right">
                                        <label class="control-label" for="nickname"><?php echo lang('wxfl_nickname'); ?></label>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="text" class="form-control" id="nickname" name="nickname" value="<?php echo $wxfs['nickname']; ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-4 text-right">
                                        <label class="control-label" for="sex"><?php echo lang('wxfl_sex'); ?></label>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="text" class="form-control" id="sex" name="sex" value="<?php echo $wxfs['sex']; ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-4 text-right">
                                        <label class="control-label" for="location"><?php echo lang('wxfl_location'); ?></label>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="text" class="form-control" id="location" name="location" value="<?php echo $wxfs['location']; ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-4 text-right">
                                        <label class="control-label" for="language"><?php echo lang('wxfl_language'); ?></label>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="text" class="form-control" id="language" name="language" value="<?php echo $wxfs['language']; ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-4 text-right">
                                        <label class="control-label" for="headimgurl"><?php echo lang('wxfl_headimgurl'); ?></label>
                                    </div>
                                    <div class="col-xs-8">
                                    <img src="<?php echo $wxfs['headimgurl']; ?>" width="50px" height="50px" />
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-4 text-right">
                                        <label class="control-label" for="subscribe_time"><?php echo lang('wxfl_subscribe_time'); ?></label>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="text" class="form-control" id="subscribe_time" name="subscribe_time" value="<?php echo $wxfs['subscribe_time']; ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-4 text-right">
                                        <label class="control-label" for="unionid"><?php echo lang('wxfl_unionid'); ?></label>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="text" class="form-control" id="unionid" name="unionid" value="<?php echo $wxfs['unionid']; ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-4 text-right">
                                        <label class="control-label" for="remark"><?php echo lang('wxfl_remark'); ?></label>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="text" class="form-control" id="remark" name="remark" value="<?php echo $wxfs['remark']; ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-4 text-right">
                                        <label class="control-label" for="groupid"><?php echo lang('wxfl_groupid'); ?></label>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="text" class="form-control" id="groupid" name="groupid" value="<?php echo $wxfs['groupid']; ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-4 text-right">
                                        <label class="control-label" for="date_add"><?php echo lang('wxfl_date_add'); ?></label>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="text" class="form-control" id="date_add" name="date_add" value="<?php echo $wxfs['date_add']; ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-4 text-right">
                                        <label class="control-label" for="wxp_name"><?php echo lang('wxfl_focus'); ?></label>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="text" class="form-control" id="wxp_name" name="wxp_name" value="<?php foreach($wxfs['wxp_name'] as $wxf_name){ echo '['.$wxf_name['name']."],"; } ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="box-footer pull-right">
                                    <a href="javascript:history.go(-1);location.reload()" class="btn btn-default"><?php echo lang('wxfl_return'); ?></a>
                                </div>
                                <?php } ?>
                                <?php } ?>
                            </div>
                            

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