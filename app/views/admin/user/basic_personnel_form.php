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
          <?php if($bp_action == 'add'){echo lang('bpl_form_title_add');}else if($bp_action == 'edit'){echo lang('bpl_form_title_edit');} ?>  
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
              <?php if($bp_action == 'add'){ $action='add'; }else if($bp_action == 'edit'){ $action = 'edit/'.$bps['bp_id']; }?>  
              <?php echo form_open('admin/basic_personnel/'.$action); ?>
                <div class="box-body">
                  <!-- input states -->
                  <div class="form-group">
                    <div class="col-xs-2 text-right">
                      <label class="control-label" for="name"><?php echo lang('bpl_name'); ?></label>
                    </div>
                    <div class="col-xs-10 <?php if(form_error('name')){echo 'has-error';}?>">
                      <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo lang('bpl_help_name'); ?>" value="<?php echo $bp_action == 'add'?set_value(html_escape('name')):$bps['name']; ?>">
                      <span class="help-block"><?php if(form_error('name')){echo "<i class='fa fa-times-circle-o'></i>".form_error('name');} ?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-xs-2 text-right">
                      <label class="control-label" for="description"><?php echo lang('bpl_description'); ?></label>
                    </div>
                    <div class="col-xs-10 <?php if(form_error('description')){echo 'has-error';}?>">
                      <input type="text" class="form-control" id="description" name="description" placeholder="<?php echo lang('bpl_help_description'); ?>" value="<?php echo $bp_action == 'add'?set_value(html_escape('description')):$bps['description']; ?>">
                      <span class="help-block"><?php if(form_error('description')){echo "<i class='fa fa-times-circle-o'></i>".form_error('description');} ?></span>
                    </div>
                  </div>

                  <div class="form-group" >
                      <div class="col-xs-2 text-right">
                          <label class="control-label"><?php echo lang('bpl_image'); ?></label>
                      </div>
                      <div class="col-xs-10 <?php if(form_error('image')){echo 'has-error';}?>">
                        <?php if($bp_action == 'edit' && isset($bp_images)){ ?>
                            <div class="row">
                                <?php foreach ($bp_images as $bpi) { ?>
                                    <div class="col-xs-4">
                                        <div class="thumbnail">
                                            <img src="<?php echo $base_url.'/upload/basic_personnel/'.$bpi['image'];?>" style="width:100px;height:100px;">
                                            <div class="text-center caption">
                                                <?php if($bpi['main_image'] == 0){ ?> 
                                                
                                                    <a onclick="add_main_image('<?php echo $bps['bp_id'];?>','<?php echo $bpi['bp_image_id'];?>');" class="btn btn-primary" role="button"><?php echo lang('bpl_main_image');?></a>
                                                
                                                <?php }else if($bpi['main_image'] == 1){ ?>
                                                
                                                    <a onclick="cancel_main_image('<?php echo $bps['bp_id'];?>','<?php echo $bpi['bp_image_id'];?>');" class="btn btn-primary" role="button"><?php echo lang('bpl_cancel_main_image');?></a>
                                                
                                                <?php } ?>
                                                
                                                    <a onclick="del_image('<?php echo $bpi['bp_image_id'];?>','<?php echo $bpi['image'];?>');" class="btn btn-primary" role="button">删除</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <input id="file" name="file" type="file" multiple class="file" accept="image/*">
                        <div id="fileinput"></div>
                        <span class="help-block"></span>
                      </div>
                  </div>

                  <!-- 创建时间 -->
                  <div class="form-group">
                    <div class="col-xs-2 text-right">
                      <label class="control-label" for="date_add"><?php echo lang('bpl_date_add'); ?></label>
                    </div>
                    <div class="col-xs-10">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" class="form-control" id="date_add" name="date_add" placeholder="<?php echo lang('bpl_help_date_add'); ?>" value="<?php echo $bp_action == 'add'?'':$bps['date_add']; ?>" readonly>
                      </div>
                      <!-- /.input group -->
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <!-- /.form group -->

                  <!-- 更新时间 -->
                  <div class="form-group">
                    <div class="col-xs-2 text-right">
                      <label class="control-label" for="date_update"><?php echo lang('bpl_date_update'); ?></label>
                    </div>
                    <div class="col-xs-10">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" class="form-control" id="date_update" name="date_update" placeholder="<?php echo lang('bpl_help_date_update'); ?>" value="<?php echo $bp_action == 'add'?'':$bps['date_update']; ?>" readonly>
                      </div>
                      <!-- /.input group -->
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <!-- /.form group -->

                  <!-- select -->
                  <div class="form-group">
                    <div class="col-xs-2 text-right">
                      <label class="control-label" for="status"><?php echo lang('bpl_status'); ?></label>
                    </div>
                    <div class="col-xs-10">
                      <select class="form-control" name="status">
                        <?php if($bp_action == 'add'){ ?>
                          <option value="0"><?php echo lang('bpl_status_off'); ?></option>
                          <option value="1"><?php echo lang('bpl_status_on'); ?></option>
                        <?php }else{  ?>
                          <?php if($bps['status'] == '0'){ ?>
                            <option value="0" select="selected"><?php echo lang('bpl_status_off'); ?></option>
                            <option value="1"><?php echo lang('bpl_status_on'); ?></option>
                          <?php }else{ ?>
                            <option value="1" select="selected"><?php echo lang('bpl_status_on'); ?></option>
                            <option value="0"><?php echo lang('bpl_status_off'); ?></option> 
                          <?php } ?>
                        <?php } ?>
                      </select>
                    </div>
                    <span class="help-block"><?php echo form_error('status'); ?></span>
                  </div>

                  <div class="box-footer pull-right">
                    <button type="submit" class="btn btn-default"><?php echo lang('bpl_save'); ?></button>
                    <a href="javascript:history.go(-1);location.reload()" class="btn btn-default"><?php echo lang('bpl_return'); ?></a>
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

    <script src="<?php echo $base_url;?>/static/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <script src="<?php echo $base_url;?>/static/plugins/fileinput/js/fileinput.js" type="text/javascript"></script>
    <script src="<?php echo $base_url;?>/static/plugins/fileinput/js/lang/zh.js" type="text/javascript"></script>
    <script src="<?php echo $base_url;?>/static/bootstrap/js/bootstrap.min.js"></script>
    <script>
        //图片上传控件
        $('#file').fileinput({
            language: 'zh',
            uploadUrl: '<?php echo $base_url;?>/admin/user/basic_personnel/upload',
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
            $('#fileinput').append("<input value='"+response.file_name+"' name='image["+i+"]' hidden>");
            i++;
        });
        

        //删除已存在图片
        function del_image(bp_image_id,image){
            $.ajax({
                url: "<?php echo $base_url;?>/admin/user/basic_personnel/del_image",  
                type: "POST",
                data:{bp_image_id:bp_image_id,image:image},
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

        //设置为主图
        function add_main_image(bp_id,bp_image_id){
            $.ajax({
                url: "<?php echo $base_url;?>/admin/user/basic_personnel/add_main_image",  
                type: "POST",
                data:{bp_id:bp_id,bp_image_id:bp_image_id},
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

        //取消主图
        function cancel_main_image(bp_id,bp_image_id){
            $.ajax({
                url: "<?php echo $base_url;?>/admin/user/basic_personnel/cancel_main_image",  
                type: "POST",
                data:{bp_id:bp_id,bp_image_id:bp_image_id},
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

