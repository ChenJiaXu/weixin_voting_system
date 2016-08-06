    <link href="<?php echo $base_url;?>/static/plugins/fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .file-drop-zone{
            height: 200px;
            max-height: 200px;
            overflow-y: auto;
        }
    </style>
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
              <li class="active"><a href="#vml_tab_basic" data-toggle="tab"><?php echo lang('vml_tab_basic');?></a></li>
              <li><a href="#vml_tab_bp" data-toggle="tab"><?php echo lang('vml_tab_bp');?></a></li>
              <li><a href="#vml_tab_vm" data-toggle="tab"><?php echo lang('vml_tab_vm');?></a></li>
              <li><a href="#vml_tab_banner" data-toggle="tab"><?php echo lang('vml_tab_banner');?></a></li>
              <li><a href="#vml_tab_layout" data-toggle="tab"><?php echo lang('vml_tab_layout');?></a></li>
            </ul>
            <div class="tab-content">

              <div class="tab-pane active" id="vml_tab_basic">

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
              <div class="tab-pane" id="vml_tab_bp">
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

              <div class="tab-pane" id="vml_tab_vm">
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

                <!-- 广告配置 -->
                <div class="tab-pane" id="vml_tab_banner">
                    <div class="box-body">

                        <!-- 广告 -->
                        <div class="form-group">

                            <div class="col-xs-2 text-right">
                                <label class="control-label" for="title"><?php echo lang('vml_banner'); ?></label>
                            </div>
                            <div class="col-xs-10">
                                <div class="row" id="banner">
                                    
                                </div>

                                <div class="row">
                                    <input id="file" name="file" type="file" multiple class="file" accept="image/*">
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
                <!-- ./广告配置 -->

              <div class="tab-pane" id="vml_tab_layout">
                <div class="box-body">

                </div>
              </div>


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

    <script src="<?php echo $base_url;?>/static/plugins/fileinput/js/fileinput.js" type="text/javascript"></script>
    <script src="<?php echo $base_url;?>/static/plugins/fileinput/js/lang/zh.js" type="text/javascript"></script>
    <script src="<?php echo $base_url;?>/static/bootstrap/js/bootstrap.min.js"></script>
    <script>
        //图片上传控件
        $('#file').fileinput({
            language: 'zh',
            uploadUrl: '<?php echo $base_url;?>/admin/vote/voting_management/upload',
            //allowedFileTypes: ['image', 'html', 'text', 'video', 'audio', 'flash', 'object'],
            allowedFileExtensions : ['jpg', 'png','gif'],
            showCaption: true,//是否显示文件的标题。默认值true
            showPreview: true,//是否显示文件的预览图。默认值true
            showRemove: true,//是否显示删除/清空按钮。默认值true
            showUpload: true,//是否显示文件上传按钮。默认是submit按钮，除非指定了uploadUrl属性。默认值true
            showBrowse: true,//是否显示选择文件按钮。
            browseOnZoneClick: true,//是否启用文件浏览/选择点击预览区
            //minFileCount: 1,//最少必须选择一张图片
            //maxFileCount: 5,//最多只能选择五张图片
            //maxFileWidth: 50,
            enctype: 'multipart/form-data',
            previewSettings: {
                image: {width: "100px", height: "100px"}
            }
        });
        //错误
        $('#file').on('fileerror', function(event, data, msg) {
           console.log(data.id);
           console.log(data.index);
           console.log(data.file);
           console.log(data.reader);
           console.log(data.files);
           // get message
           alert(msg);
        });
        //上传后返回的数据赋值给文本框以便保存可以存储数据
        var i = 0;
        $("#file").on("fileuploaded", function (event, data, previewId, index) {
            var form = data.form, files = data.files, extra = data.extra,
            response = data.response, reader = data.reader;
            //console.log(response.file_name);
           
            $('#banner').append('<div class="col-xs-6"><div class="thumbnail">'+
            '<img src="<?php echo $base_url.'/upload/voting_management/'?>'+response.file_name+'" width="100%;" height="50%;">'+
            '<input type="text" name="banner['+i+']" value='+ response.file_name +' hidden>'+
            '<div class="text-center caption"><select class="form-control">'+
            '<option value="">请选择插入广告的位置</option><option value="0">顶部</option><option value="1">中间</option><option value="2">底部</option></select>'+
            '<hr /><div class="row"><div class="col-xs-4 text-right"><label class="control-label" for="banner_sort"><?php echo lang('vml_banner_sort'); ?></label>'+
            '</div><div class="col-xs-8"><input type="text" class="form-control" id="banner_sort" name="banner_sort" placeholder="<?php echo lang('vml_help_banner_sort'); ?>" value=""><span class="help-block"></span></div></div></div></div></div>');
            
            i++;
        });
        

        //删除已存在图片
        function del_banner(vm_banner_id,banner){
            $.ajax({
                url: "<?php echo $base_url;?>/admin/vote/voting_management/del_banner",  
                type: "POST",
                data:{vm_banner_id:vm_banner_id,banner:banner},
                //dataType: "json",
                error: function(){  
                    alert('异常');
                },  
                success: function(data,status){//如果调用php成功    
                    //解码，显示汉字
                    window.location.reload();
                }
            });
        }

    </script>

