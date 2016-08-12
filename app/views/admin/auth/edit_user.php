    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo lang('edit_user_heading');?>
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

                            <?php echo form_open(uri_string());?>

                                <div class="box-body">

                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <?php echo lang('edit_user_name_label', 'user_name');?>
                                        </div>
                                        <div class="col-xs-10">
                                            <?php echo form_input($user_name);?>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <?php echo lang('edit_user_company_label', 'company');?>
                                        </div>
                                        <div class="col-xs-10">
                                            <?php echo form_input($company);?>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <?php echo lang('edit_user_phone_label', 'phone');?>
                                        </div>
                                        <div class="col-xs-10">
                                            <?php echo form_input($phone);?>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-4 text-left">
                                            <?php echo lang('edit_user_password_label', 'password');?>
                                        </div>
                                        <div class="col-xs-8">
                                            <?php echo form_input($password);?>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-xs-4 text-left">
                                            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?>
                                        </div>
                                        <div class="col-xs-8">
                                            <?php echo form_input($password_confirm);?>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <?php if ($this->ion_auth->is_admin()): ?>
                                        <div class="form-group">
                                            <div class="col-xs-2 text-right">
                                                <?php echo lang('edit_user_groups_heading');?>
                                            </div>
                                            <div class="col-xs-10">
                                                <?php foreach ($groups as $group):?>
                                                <label class="checkbox">
                                                <?php
                                                $gID=$group['id'];
                                                $checked = null;
                                                $item = null;
                                                foreach($currentGroups as $grp) {
                                                  if ($gID == $grp->id) {
                                                      $checked= ' checked="checked"';
                                                  break;
                                                  }
                                                }
                                                ?>
                                                <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                                                <?php echo $group['name'];?>
                                                </label>
                                                <?php endforeach?>
                                            </div>
                                        </div>
                                    <?php endif ?>

                                    <?php echo form_hidden('id', $user->id);?>
                                    <?php echo form_hidden($csrf); ?>

                                    <div class="form-group">
                                        <div class="col-xs-10 text-left col-xs-offset-2">
                                            <?php echo form_submit('submit', lang('edit_user_submit_btn'));?>
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
    
