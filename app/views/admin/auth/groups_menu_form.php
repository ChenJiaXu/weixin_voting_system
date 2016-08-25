    <style type="text/css">
        #groups_menu ul,li{
            list-style:none;
        }
        #groups_menu .icheckbox_flat-blue{
            margin-left: 5px;
        }
    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <b>
                    <?php echo lang('gml_form_title_edit_menu'); ?>  
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
                        <div class="box-body" id="groups_menu">
                            <?php echo form_open('admin/groups/edit_menu/'.$groups['id']); ?>
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

                                <!-- menu -->
                                <div class="form-group">
                                    <div class="col-xs-2 text-right">
                                        <label class="control-label" for="groups_menu[]"><?php echo lang('gml_menu'); ?></label>
                                    </div>
                                    <div class="col-xs-10">
                                        
                                        <?php foreach ($menus as $m) { ?>
                                            <!-- lv.1 -->
                                            <?php if($m['level'] == 1){ ?>
                                            
                                            <ul><li>
                                                <i class="fa fa-flag-o" aria-hidden="true"></i>
                                                <?php if($m['routing'] != '#'){ ?>
                                                    <?php echo $m['name'];?>
                                                    <input type="checkbox" class="minimal" value="<?php echo $m['menu_id']; ?>" name="groups_menu[]" <?php 
                                                if(isset($groups_menus)){foreach ($groups_menus as $gm) {if($gm['menu_id'] == $m['menu_id']){echo 'checked="checked"';}}
                                            } ?> >
                                                <?php }else if($m['routing'] == '#'){ ?>
                                                    <?php echo $m['name'];?>
                                                   <input type="checkbox" class="minimal" value="<?php echo $m['menu_id']; ?>" name="groups_menu[]" <?php 
                                                if(isset($groups_menus)){foreach ($groups_menus as $gm) {if($gm['menu_id'] == $m['menu_id']){echo 'checked="checked"';}}
                                            } ?> >
                                                    <!-- lv.2 -->
                                                    <ul>
                                                        <?php foreach ($menus as $lv2) { ?>

                                                            <?php if($lv2['belong_to'] == $m['menu_id']){ ?>
                                                                <?php if($lv2['routing'] != '#'){ ?>  
                                                                    <li>
                                                                    <i class="fa fa-level-up fa-rotate-90" aria-hidden="true"></i>
                                                                    <?php echo $lv2['name'];?><input type="checkbox" class="minimal" value="<?php echo $lv2['menu_id']; ?>" name="groups_menu[]" <?php 
                                                if(isset($groups_menus)){foreach ($groups_menus as $gm) {if($gm['menu_id'] == $lv2['menu_id']){echo 'checked="checked"';}}
                                            } ?> ></li>
                                                                <?php }else if($lv2['routing'] == '#'){ ?>
                                                                    <li>
                                                                    <i class="fa fa-level-up fa-rotate-90" aria-hidden="true"></i>
                                                                    <?php echo $lv2['name'];?><input type="checkbox" class="minimal" value="<?php echo $lv2['menu_id']; ?>" name="groups_menu[]" <?php 
                                                if(isset($groups_menus)){foreach ($groups_menus as $gm) {if($gm['menu_id'] == $lv2['menu_id']){echo 'checked="checked"';}}
                                            } ?> >
                                                                        <!-- lv.3 -->
                                                                        <ul>
                                                                            <?php foreach ($menus as $lv3) { ?>
                                                                                <?php if($lv3['belong_to'] == $lv2['menu_id']){ ?>
                                                                                    <li><i class="fa fa-level-up fa-rotate-90" aria-hidden="true"></i>
                                                                                    <?php echo $lv3['name'];?><input type="checkbox" class="minimal" value="<?php echo $lv3['menu_id']; ?>" name="groups_menu[]" <?php 
                                                if(isset($groups_menus)){foreach ($groups_menus as $gm) {if($gm['menu_id'] == $lv3['menu_id']){echo 'checked="checked"';}}
                                            } ?> ></li>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </ul>
                                                                        <!-- ./lv.3 -->
                                                                    </li>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </ul>
                                                    <!-- ./lv.2 -->
                                                <?php } ?>   
                                            </li></ul>
                                            <hr />
                                            <?php } ?>
                                            <!-- ./lv.1 -->
                                        <?php } ?>
                                        <span class="help-block">
                                            <?php if(form_error('groups_menu[]')){echo "<i class='fa fa-times-circle-o'></i>".form_error('groups_menu[]');} ?>
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
