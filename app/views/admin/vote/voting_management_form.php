  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <b>
          <?php if($vm_action == 'add'){echo lang('vml_form_title_add');}else if($vm_action == 'edit'){echo lang('vml_form_title_edit');} ?>  
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
              <li class="active"><a href="#tab_1" data-toggle="tab">基础信息</a></li>
              <li><a href="#tab_2" data-toggle="tab">人员配置</a></li>
              <li><a href="#tab_3" data-toggle="tab">活动配置</a></li>
            </ul>
            <div class="tab-content">

              <div class="tab-pane active" id="tab_1">

                <?php if($vm_action == 'add'){ $action='add'; }else if($vm_action == 'edit'){ $action = 'edit/'.$vms['vm_id']; }?>  
                <?php echo form_open('admin/voting_management/'.$action); ?>
                  <div class="box-body">

                    <!-- 活动信息标题 -->
                    <div class="form-group">
                      <div class="col-xs-2 text-right">
                        <label class="control-label" for="title"><?php echo lang('vml_title'); ?></label>
                      </div>
                      <div class="col-xs-10 <?php if(form_error('title')){echo 'has-error';}?>">
                        <input type="text" class="form-control" id="title" name="title" placeholder="<?php echo lang('vml_help_title'); ?>" value="<?php echo $vm_action == 'add'?set_value(html_escape('title')):$vms['title']; ?>">
                        <span class="help-block"><?php if(form_error('title')){echo "<i class='fa fa-times-circle-o'></i>".form_error('title');} ?></span>
                      </div>
                    </div>

                    <!-- 活动信息描述 -->
                    <div class="form-group">
                      <div class="col-xs-2 text-right">
                        <label class="control-label" for="title"><?php echo lang('vml_description'); ?></label>
                      </div>
                      <div class="col-xs-10 <?php if(form_error('description')){echo 'has-error';}?>">
                        <input type="text" class="form-control" id="description" name="description" placeholder="<?php echo lang('vml_help_description'); ?>" value="<?php echo $vm_action == 'add'?set_value(html_escape('description')):$vms['description']; ?>">
                        <span class="help-block"><?php if(form_error('description')){echo "<i class='fa fa-times-circle-o'></i>".form_error('description');} ?></span>
                      </div>
                    </div>
                    <!-- 标识码 -->
                    <div class="form-group">
                      <div class="col-xs-2 text-right">
                        <label class="control-label" for="code"><?php echo lang('vml_code'); ?></label>
                      </div>
                      <div class="col-xs-10">
                        <input type="text" class="form-control" id="code" name="code" placeholder="<?php echo lang('vml_help_code'); ?>" value="<?php echo $vm_action == 'add'?'':$vms['code']; ?>" readonly>
                        <span class="help-block"></span>
                      </div>
                    </div>

                    <!-- 创建时间 -->
                    <div class="form-group">
                      <div class="col-xs-2 text-right">
                        <label class="control-label" for="date_add"><?php echo lang('vml_date_add'); ?></label>
                      </div>
                      <div class="col-xs-10">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                          <input type="text" class="form-control" id="date_add" name="date_add" placeholder="<?php echo lang('vml_help_date_add'); ?>" value="<?php echo $vm_action == 'add'?'':$vms['date_add']; ?>" readonly>
                        </div>
                        <span class="help-block"></span>
                      </div>
                    </div>
                    
                    <!-- 开始时间 -->
                    <div class="form-group">
                      <div class="col-xs-2 text-right">
                        <label class="control-label" for="date_start"><?php echo lang('vml_date_start'); ?></label>
                      </div>
                      <div class="col-xs-10 <?php if(form_error('date_start')){echo 'has-error';}?>">
                        <div class="input-group date form_datetime">
                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                          <input type="text" class="form-control" id="vm_date_start" name="date_start" placeholder="<?php echo lang('vml_help_date_start'); ?>" value="<?php echo $vm_action == 'add'?'':$vms['date_start']; ?>" readonly>
                        </div>
                        <span class="help-block"><?php if(form_error('date_start')){echo "<i class='fa fa-times-circle-o'></i>".form_error('date_start');} ?></span>
                      </div>
                    </div>

                    <!-- 结束时间 -->
                    <div class="form-group">
                      <div class="col-xs-2 text-right">
                        <label class="control-label" for="date_end"><?php echo lang('vml_date_end'); ?></label>
                      </div>
                      <div class="col-xs-10  <?php if(form_error('date_end')){echo 'has-error';}?>">
                        <div class="input-group date">
                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                          <input type="text" class="form-control" id="vm_date_end" name="date_end" placeholder="<?php echo lang('vml_help_date_end'); ?>" value="<?php echo $vm_action == 'add'?'':$vms['date_end']; ?>" readonly>
                        </div>
                        <span class="help-block"><?php if(form_error('date_end')){echo "<i class='fa fa-times-circle-o'></i>".form_error('date_end');} ?></span>
                      </div>
                    </div>

                    <!-- 进展状态 -->
                    <div class="form-group">
                      <div class="col-xs-2 text-right">
                        <label class="control-label" for="statusing"><?php echo lang('vml_statusing'); ?></label>
                      </div>
                      <div class="col-xs-10">
                        <div class="input-group date">
                          <?php if($vm_action == 'add'){ ?>
                            <a class="btn btn-block btn-social btn-openid">
                                <i class="fa fa-calendar-times-o"></i> <?php echo lang('vml_statusing_notstarted'); ?> 
                            </a>
                          <?php }else{  ?>
                            <?php if($vms['statusing'] == '1'){ ?>
                              <a class="btn btn-block btn-social btn-openid">
                                <i class="fa fa-calendar-times-o"></i> <?php echo lang('vml_statusing_notstarted'); ?> 
                              </a>
                            <?php }else if($vms['statusing'] == '2'){ ?>
                              <a class="btn btn-block btn-social btn-twitter">
                                <i class="fa fa-calendar-minus-o"></i> <?php echo lang('vml_statusing_ongoing'); ?>
                              </a>
                            <?php }else if($vms['statusing'] == '3'){ ?>
                              <a class="btn btn-block btn-social btn-github">
                                <i class="fa fa-calendar-check-o"></i> <?php echo lang('vml_statusing_complete'); ?>
                              </a>
                            <?php } ?>
                          <?php } ?>
                          <input type="hidden" class="form-control" id="statusing" name="statusing" value="<?php echo $vm_action == 'add'?'1':$vms['statusing']; ?>">
                        </div>
                        <span class="help-block"><?php echo form_error('statusing'); ?></span>
                      </div>
                    </div>

                    <!-- select -->
                    <div class="form-group">
                      <div class="col-xs-2 text-right">
                        <label class="control-label" for="status"><?php echo lang('vml_status'); ?></label>
                      </div>
                      <div class="col-xs-10">
                        <select class="form-control" name="status">
                          <?php if($vm_action == 'add'){ ?>
                            <option value="0"><?php echo lang('vml_status_off'); ?></option>
                            <option value="1"><?php echo lang('vml_status_on'); ?></option>
                          <?php }else{  ?>
                            <?php if($vms['status'] == '0'){ ?>
                              <option value="0" select="selected"><?php echo lang('vml_status_off'); ?></option>
                              <option value="1"><?php echo lang('vml_status_on'); ?></option>
                            <?php }else{ ?>
                              <option value="1" select="selected"><?php echo lang('vml_status_on'); ?></option>
                              <option value="0"><?php echo lang('vml_status_off'); ?></option> 
                            <?php } ?>
                          <?php } ?>
                        </select>
                        <span class="help-block"><?php echo form_error('status'); ?></span>
                      </div>   
                    </div>

                    <!-- 投票分类 -->
                    <div class="form-group">
                      <div class="col-xs-2 text-right">
                        <label class="control-label" for="vc_id"><?php echo lang('vcl_name'); ?></label>
                      </div>
                      <div class="col-xs-10">
                        <select class="form-control" name="vc_id">
                          <?php if($vcs){ ?>
                            <?php foreach ($vcs as $vc) { ?>
                              <?php if($vm_action == 'add'){ ?>
                                  <option value='<?php echo $vc['vc_id']; ?>'><?php echo $vc['name']; ?></option>
                              <?php }else{ ?>
                                <?php if($vc['vc_id'] == $vm_vc['vc_id']){?>
                                  <option value="<?php echo $vc['vc_id']; ?>" selected="selected"><?php echo $vc['name']; ?></option>
                                <?php }else if($vc['vc_id'] != $vm_vc['vc_id']){ ?>
                                  <option value="<?php echo $vc['vc_id']; ?>"><?php echo $vc['name']; ?></option>
                                <?php } ?>
                              <?php } ?>
                            <?php } ?>
                          <?php } ?>
                        </select>
                      </div>
                    </div>


                    <div class="box-footer pull-right">
                      <button type="submit" class="btn btn-default"><?php echo lang('vml_save'); ?></button>
                      <a href="javascript:history.go(-1);location.reload()" class="btn btn-default"><?php echo lang('vml_return'); ?></a>
                    </div>

                  </div>
                
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="box-body">
                  <!-- 基础人员配置 -->
                  <div class="form-group">
                    <div class="col-xs-2 text-right">
                        <label><?php echo lang('vml_basic_personnel'); ?></label>
                    </div>
                    <div class="col-xs-10 <?php if(form_error('vm_bp')){echo 'has-error';}?>">
                      <select class="form-control select2" id="vm_bp" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                        
                      </select>
                      <input type="hidden" id="userSelect" name="vm_bp" style="width: 300px" />
                      <span class="help-block"><?php echo form_error('vm_bp'); ?></span>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <div class="box-body">

                  <!-- 规则配置 -->
                  <div class="form-group">
                    <div class="col-xs-2 text-right">
                      <label class="control-label" for="title"><?php echo lang('vml_rules_config'); ?></label>
                    </div>
                    <div class="col-xs-10 <?php if(form_error('rules_config')){echo 'has-error';}?>">
                      <textarea class="form-control" id="rules_config" name="rules_config" placeholder="<?php echo lang('vml_help_rules_config'); ?>" value="<?php echo $vm_action == 'add'?set_value(html_escape('rules_config')):$vms['rules_config']; ?>">
                      </textarea>
                      <span class="help-block"><?php if(form_error('rules_config')){echo "<i class='fa fa-times-circle-o'></i>".form_error('rules_config');} ?></span>
                    </div>
                  </div>

                </div>
              </div>
              <!-- /.tab-pane -->
              <?php echo form_close();?>      
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->

          
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- jQuery 2.2.0 -->
  <script src="<?php echo $base_url;?>/static/plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <script type="text/javascript">
    //------------------人员配置-----------------------------
    $(function(){
      vm_bp();
    });
    function vm_bp(){
      var data = <?php print_r(json_encode($bps));?>;
     
      var $vm_bp_select = $("#vm_bp").select2({
        language: "zh-CN",
        closeOnSelect: false,
        maximumSelectionLength: 10,//限制选择的选项数量
        data: data
      });
      $("#vm_bp").change(function(){
        $("#userSelect").attr("value","");
        $("#userSelect").attr("value",$("#vm_bp").val());
      });

      //编辑状态下,回填本活动已关联的相关人员信息
      <?php if($vm_action == 'edit'){ ?>
      <?php if($vm_bps){ ?>
        var old_data = <?php echo '['.$vm_bps.']';?>;
        $vm_bp_select.val(old_data).trigger("change");
      <?php } ?>
      <?php } ?>

    }

  </script>
