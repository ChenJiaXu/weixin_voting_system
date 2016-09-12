    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo lang('dl_head_title'); ?>
            <small><?php echo lang('dl_version'); ?> 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo lang('dl_head_title'); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Info boxes -->
        <div class="row">

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?php echo lang('dl_bp'); ?></span>
                        <span class="info-box-number"><h1><?php echo $bp;?><small><?php echo lang('dl_person'); ?></small></h1></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?php echo lang('dl_vm'); ?></span>
                        <span class="info-box-number"><h1><?php echo $vm;?><small><?php echo lang('dl_entries'); ?></small></h1></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?php echo lang('dl_wxp'); ?></span>
                        <span class="info-box-number"><h1><?php echo $wxp;?><small><?php echo lang('dl_home'); ?></small></h1></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->

        
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->