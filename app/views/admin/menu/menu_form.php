  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <b>
          <?php if($menu_action == 'add'){echo lang('ml_form_title_add');}else if($menu_action == 'edit'){echo lang('ml_form_title_edit');}; ?>  
        </b>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">菜单配置</a></li>
        <li class="active"><?php if($menu_action == 'add'){echo lang('ml_form_title_add');}else if($menu_action == 'edit'){echo lang('ml_form_title_edit');} ?> </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- general form elements disabled -->
          <div class="box box-warning">

            <div class="box-body">
              <?php if($menu_action == 'add'){ $action='add'; }else if($menu_action == 'edit'){ $action = 'edit/'.$menus['menu_id']; }?>  
              <?php echo form_open('admin/menu/'.$action); ?>
                <div class="box-body">

                  <!-- 菜单名 -->
                  <div class="form-group">
                    <div class="col-xs-2 text-right">
                      <label class="control-label" for="name"><?php echo lang('ml_name'); ?></label>
                    </div>
                    <div class="col-xs-10 <?php if(form_error('name')){echo 'has-error';}?>">
                      <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo lang('ml_help_name'); ?>" value="<?php echo $menu_action == 'add'?set_value(html_escape('name')):$menus['name']; ?>">
                      <span class="help-block"><?php if(form_error('name')){echo "<i class='fa fa-times-circle-o'></i>".form_error('name');} ?></span>
                    </div>
                  </div>

                  <!-- 级别 -->
                  <div class="form-group">
                    <div class="col-xs-2 text-right">
                      <label class="control-label" for="level"><?php echo lang('ml_level'); ?></label>
                    </div>
                    <div class="col-xs-10">
                      <select class="form-control" name="level" id="level" onchange="menu_form_level()">
                        <?php if($menu_action == 'add'){ ?>
                          <option value="1">lv.1</option>
                          <option value="2">lv.2</option>
                          <option value="3">lv.3</option>
                        <?php }else{  ?>
                          <?php if($menus['level'] == '1'){ ?>
                            <option value="1" select="selected">lv.1</option>
                            <option value="2">lv.2</option>
                            <option value="3">lv.3</option>
                          <?php }else if($menus['level'] == '2'){ ?>
                            <option value="2" select="selected">lv.2</option>
                            <option value="1">lv.1</option>
                            <option value="3">lv.3</option> 
                          <?php }else{ ?>
                            <option value="3" select="selected">lv.3</option>
                            <option value="2">lv.2</option>
                            <option value="1">lv.1</option> 
                          <?php } ?>
                        <?php } ?>
                      </select>
                      <span class="help-block"><?php echo form_error('level'); ?></span>
                    </div>
                  </div>

                  <!-- 所属 -->
                  <div class="form-group">
                    <div class="col-xs-2 text-right">
                      <label class="control-label" for="belong_to"><?php echo lang('ml_belong_to'); ?></label>
                    </div>
                    <div class="col-xs-10">
                        <select class="form-control" name="belong_to" id="belong_to">
                            <option value="0">----顶级节点----</option>
                        </select>
                        <span class="help-block"><?php echo form_error('belong_to'); ?></span>
                    </div>
                  </div>

                  <!-- 路由 -->
                  <div class="form-group">
                    <div class="col-xs-2 text-right">
                      <label class="control-label" for="routing"><?php echo lang('ml_routing'); ?></label>
                    </div>
                    <div class="col-xs-10 <?php if(form_error('routing')){echo 'has-error';}?>">
                      <input type="text" class="form-control" id="routing" name="routing" placeholder="<?php echo lang('ml_help_routing'); ?>" value="<?php echo $menu_action == 'add'?set_value(html_escape('routing')):$menus['routing']; ?>">
                      <span class="help-block"><?php if(form_error('routing')){echo "<i class='fa fa-times-circle-o'></i>".form_error('routing');} ?></span>
                    </div>
                  </div>

                  <!-- 图标 -->
                  <div class="form-group">
                    <div class="col-xs-2 text-right">
                      <label class="control-label" for="icon"><?php echo lang('ml_icon'); ?></label>
                    </div>
                    <div class="col-xs-10 <?php if(form_error('icon')){echo 'has-error';}?>">
                      <input type="text" class="form-control" id="icon" name="icon" placeholder="<?php echo lang('ml_help_icon'); ?>" value="<?php echo $menu_action == 'add'?set_value(html_escape('icon')):$menus['icon']; ?>">
                      <span class="help-block"><?php if(form_error('icon')){echo "<i class='fa fa-times-circle-o'></i>".form_error('icon');} ?></span>
                    </div>
                  </div>

                  <!-- 创建时间 -->
                  <div class="form-group">
                    <div class="col-xs-2 text-right">
                      <label class="control-label" for="date_add"><?php echo lang('ml_date_add'); ?></label>
                    </div>
                    <div class="col-xs-10">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" class="form-control" id="date_add" name="date_add" placeholder="<?php echo lang('ml_help_date_add'); ?>" value="<?php echo $menu_action == 'add'?'':$menus['date_add']; ?>" readonly>
                      </div>
                      <!-- /.input group -->
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <!-- /.form group -->

                  <!-- 更新时间 -->
                  <div class="form-group">
                    <div class="col-xs-2 text-right">
                      <label class="control-label" for="date_update"><?php echo lang('ml_date_update'); ?></label>
                    </div>
                    <div class="col-xs-10">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" class="form-control" id="date_update" name="date_update" placeholder="<?php echo lang('ml_help_date_update'); ?>" value="<?php echo $menu_action == 'add'?'':$menus['date_update']; ?>" readonly>
                      </div>
                      <!-- /.input group -->
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <!-- /.form group -->

                  <!-- 状态 -->
                  <div class="form-group">
                    <div class="col-xs-2 text-right">
                      <label class="control-label" for="status"><?php echo lang('ml_status'); ?></label>
                    </div>
                    <div class="col-xs-10">
                      <select class="form-control" name="status">
                        <?php if($menu_action == 'add'){ ?>
                          <option value="0"><?php echo lang('ml_status_off'); ?></option>
                          <option value="1"><?php echo lang('ml_status_on'); ?></option>
                        <?php }else{  ?>
                          <?php if($menus['status'] == '0'){ ?>
                            <option value="0" select="selected"><?php echo lang('ml_status_off'); ?></option>
                            <option value="1"><?php echo lang('ml_status_on'); ?></option>
                          <?php }else{ ?>
                            <option value="1" select="selected"><?php echo lang('ml_status_on'); ?></option>
                            <option value="0"><?php echo lang('ml_status_off'); ?></option> 
                          <?php } ?>
                        <?php } ?>
                      </select>
                    </div>
                    <span class="help-block"><?php echo form_error('status'); ?></span>
                  </div>

                  <div class="box-footer pull-right">
                    <button type="submit" class="btn btn-default"><?php echo lang('ml_save'); ?></button>
                    <a href="javascript:history.go(-1);location.reload()" class="btn btn-default"><?php echo lang('ml_return'); ?></a>
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
  <script>
    
    function menu_form_level(){
        $level_val = $("#level").val();
        if($level_val == 2 || $level_val == 3){
            $.ajax({
                url: "<?php echo $base_url;?>/index.php/admin/menu/auto_compare",  
                type: "POST",
                data:{level:$level_val},
                dataType:'json',
                error: function(){  
                    alert('系统错误');
                },  
                success: function(json,status){//如果调用php成功  
                    $("#belong_to").empty();
                    for(var p in json){//遍历json对象的每个key/value对,p为key
                       $("#belong_to").append("<option value="+json[p]['menu_id']+">"+json[p]['name']+"</option>");
                    }
                }
            });
        }else{
            $("#belong_to").empty();
            $("#belong_to").append("<option value='0'>----顶级节点----</option>");
        }
        
    }
  </script>