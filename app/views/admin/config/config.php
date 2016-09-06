    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <b>
                    <?php echo lang('cl_head_title'); ?> 
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
                    <!-- 选项卡 -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#cl_tab_basic_config" data-toggle="tab"><?php echo lang('cl_tab_basic_config');?></a></li>
                            <li><a href="#cl_tab_global_config" data-toggle="tab"><?php echo lang('cl_tab_global_config');?></a></li>
                        </ul>
                        
                        <?php echo form_open($action); ?>
                        <div class="tab-content">
                            <!-- vml_tab_basic -->
                            <div class="tab-pane active" id="cl_tab_basic_config">
                                <div class="box-body">

                                    <!-- 资源包根路径 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="root_upload"><?php echo lang('cl_root_upload'); ?></label>
                                        </div>
                                        <div class="col-xs-10 <?php if(form_error('root_upload')){echo 'has-error';}?>">
                                            <input type="text" class="form-control" id="root_upload" name="root_upload" placeholder="<?php echo lang('cl_help_root_upload'); ?>" value="<?php echo $root_upload; ?>">
                                            <span class="help-block">
                                                <?php if(form_error('root_upload')){echo "<i class='fa fa-times-circle-o'></i>".form_error('root_upload');} ?>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- 基础人员图片上传路径 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="bp_upload_path"><?php echo lang('cl_bp_upload_path'); ?></label>
                                        </div>
                                        <div class="col-xs-10 <?php if(form_error('bp_upload_path')){echo 'has-error';}?>">
                                            <input type="text" class="form-control" id="bp_upload_path" name="bp_upload_path" placeholder="<?php echo lang('cl_help_bp_upload_path'); ?>" value="<?php echo $bp_upload_path; ?>">
                                            <span class="help-block">
                                                <?php if(form_error('bp_upload_path')){echo "<i class='fa fa-times-circle-o'></i>".form_error('bp_upload_path');} ?>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- 投票活动广告图上传路径 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="vm_upload_path"><?php echo lang('cl_vm_upload_path'); ?></label>
                                        </div>
                                        <div class="col-xs-10 <?php if(form_error('vm_upload_path')){echo 'has-error';}?>">
                                            <input type="text" class="form-control" id="vm_upload_path" name="vm_upload_path" placeholder="<?php echo lang('cl_help_vm_upload_path'); ?>" value="<?php echo $vm_upload_path; ?>">
                                            <span class="help-block"><?php if(form_error('vm_upload_path')){echo "<i class='fa fa-times-circle-o'></i>".form_error('vm_upload_path');} ?></span>
                                        </div>
                                    </div>

                                    <!-- 投票活动背景音乐上传路径 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="vm_music_upload_path"><?php echo lang('cl_vm_music_upload_path'); ?></label>
                                        </div>
                                        <div class="col-xs-10 <?php if(form_error('vm_music_upload_path')){echo 'has-error';}?>">
                                            <input type="text" class="form-control" id="vm_music_upload_path" name="vm_music_upload_path" placeholder="<?php echo lang('cl_help_vm_music_upload_path'); ?>" value="<?php echo $vm_music_upload_path; ?>">
                                            <span class="help-block"><?php if(form_error('vm_music_upload_path')){echo "<i class='fa fa-times-circle-o'></i>".form_error('vm_music_upload_path');} ?></span>
                                        </div>
                                    </div>


                                    <!-- 上传的图片类型 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="allow_image_type"><?php echo lang('cl_allow_image_type'); ?></label>
                                        </div>
                                        <div class="col-xs-10 <?php if(form_error('allow_image_type')){echo 'has-error';}?>">
                                            <input type="text" class="form-control" id="allow_image_type" name="allow_image_type" placeholder="<?php echo lang('cl_help_allow_image_type'); ?>" value="<?php echo $allow_image_type; ?>">
                                            <span class="help-block"><?php if(form_error('allow_image_type')){echo "<i class='fa fa-times-circle-o'></i>".form_error('allow_image_type');} ?></span>
                                        </div>
                                    </div>

                                    <!-- 人员照片张数限制 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="bp_image_limit"><?php echo lang('cl_bp_image_limit'); ?></label>
                                        </div>
                                        <div class="col-xs-10 <?php if(form_error('bp_image_limit')){echo 'has-error';}?>">
                                            <input type="text" class="form-control" id="bp_image_limit" name="bp_image_limit" placeholder="<?php echo lang('cl_help_bp_image_limit'); ?>" value="<?php echo $bp_image_limit; ?>">
                                            <span class="help-block"><?php if(form_error('bp_image_limit')){echo "<i class='fa fa-times-circle-o'></i>".form_error('bp_image_limit');} ?></span>
                                        </div>
                                    </div>

                                    <!-- 默认人员图片名 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="default_bp_image_name"><?php echo lang('cl_default_bp_image_name'); ?></label>
                                        </div>
                                        <div class="col-xs-10 <?php if(form_error('default_bp_image_name')){echo 'has-error';}?>">
                                            <input type="text" class="form-control" id="default_bp_image_name" name="default_bp_image_name" placeholder="<?php echo lang('cl_help_default_bp_image_name'); ?>" value="<?php echo $default_bp_image_name; ?>">
                                            <span class="help-block"><?php if(form_error('default_bp_image_name')){echo "<i class='fa fa-times-circle-o'></i>".form_error('default_bp_image_name');} ?></span>
                                        </div>
                                    </div>



                                    <div class="box-footer pull-right">
                                        <button type="submit" class="btn btn-default"><?php echo lang('cl_save'); ?></button>
                                    </div>

                                </div>
                            </div>
                            <!-- ./vml_tab_basic -->

                            <!-- vml_tab_bp -->
                            <div class="tab-pane" id="cl_tab_global_config">
                                <div class="box-body">

                                    <!-- 最高权限组 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="global_groups"><?php echo lang('cl_global_groups'); ?></label>
                                        </div>
                                        <div class="col-xs-10 <?php if(form_error('global_groups')){echo 'has-error';}?>">
                                            <?php if(isset($groups)){ foreach ($groups as $g) { ?>
                                                <input type="radio" class="minimal" name="global_groups" value="<?php echo $g['id'];?>" <?php if($g['id'] == $global_groups){ echo "checked"; } ?>>
                                                <label class="control-label"><?php echo $g['description']; ?></label>
                                            <?php }} ?>
                                            <span class="help-block"><?php if(form_error('global_groups')){echo "<i class='fa fa-times-circle-o'></i>".form_error('global_groups');} ?></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- ./vml_tab_bp -->

                            

                        </div>
                        <!-- /.tab-content -->
                        <?php echo form_close();?>

                    </div>
                    <!-- nav-tabs-custom -->  
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->