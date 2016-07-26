  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <b>
          <?php if($vc_action == 'add'){echo lang('vcl_form_title_add');}else if($vc_action == 'edit'){echo lang('vcl_form_title_edit');} ?>  
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
              <?php if($vc_action == 'add'){ $action='add'; }else if($vc_action == 'edit'){ $action = 'edit/'.$vcs['vc_id']; }?>  
              <?php echo form_open('admin/voting_classification/'.$action); ?>
                <div class="box-body">
                  <!-- input states -->
                  <div class="form-group">
                    <div class="col-xs-2 text-right">
                      <label class="control-label" for="name"><?php echo lang('vcl_name'); ?></label>
                    </div>
                    <div class="col-xs-10 <?php if(form_error('name')){echo 'has-error';}?>">
                      <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo lang('vcl_help_name'); ?>" value="<?php echo $vc_action == 'add'?set_value(html_escape('name')):$vcs['name']; ?>">
                      <span class="help-block"><?php if(form_error('name')){echo "<i class='fa fa-times-circle-o'></i>".form_error('name');} ?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-xs-2 text-right">
                      <label class="control-label" for="code"><?php echo lang('vcl_code'); ?></label>
                    </div>
                    <div class="col-xs-10">
                      <input type="text" class="form-control" id="code" name="code" placeholder="<?php echo lang('vcl_help_code'); ?>" value="<?php echo $vc_action == 'add'?'':$vcs['code']; ?>" readonly>
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <!-- Date -->
                  <div class="form-group">
                    <div class="col-xs-2 text-right">
                      <label class="control-label" for="date_add"><?php echo lang('vcl_date_add'); ?></label>
                    </div>
                    <div class="col-xs-10">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" class="form-control" id="date_add" name="date_add" placeholder="<?php echo lang('vcl_help_date_add'); ?>" value="<?php echo $vc_action == 'add'?'':$vcs['date_add']; ?>" readonly>
                      </div>
                      <!-- /.input group -->
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <!-- /.form group -->

                  <!-- select -->
                  <div class="form-group">
                    <div class="col-xs-2 text-right">
                      <label class="control-label" for="status"><?php echo lang('vcl_status'); ?></label>
                    </div>
                    <div class="col-xs-10">
                      <select class="form-control" name="status">
                        <?php if($vc_action == 'add'){ ?>
                          <option value="0"><?php echo lang('vcl_status_off'); ?></option>
                          <option value="1"><?php echo lang('vcl_status_on'); ?></option>
                        <?php }else{  ?>
                          <?php if($vcs['status'] == '0'){ ?>
                            <option value="0" select="selected"><?php echo lang('vcl_status_off'); ?></option>
                            <option value="1"><?php echo lang('vcl_status_on'); ?></option>
                          <?php }else{ ?>
                            <option value="1" select="selected"><?php echo lang('vcl_status_on'); ?></option>
                            <option value="0"><?php echo lang('vcl_status_off'); ?></option> 
                          <?php } ?>
                        <?php } ?>
                      </select>
                    </div>
                    <span class="help-block"><?php echo form_error('status'); ?></span>
                  </div>

                  <div class="box-footer pull-right">
                    <button type="submit" class="btn btn-default"><?php echo lang('vcl_save'); ?></button>
                    <a href="javascript:history.go(-1);location.reload()" class="btn btn-default"><?php echo lang('vcl_return'); ?></a>
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