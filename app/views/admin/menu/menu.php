
    <!-- 容器 -->
    <div class="content-wrapper">

        <!-- 模块标题、导航 -->
        <section class="content-header">
            <h1>
                <strong><?php echo lang('ml_head_title');?></strong>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
                <li><a href="#">菜单配置</a></li>
                <li class="active">菜单列表数据</li>
            </ol>
        </section>
        <!-- ./模块标题、导航 -->

        <!-- 表格 -->
        <section class="content"> 
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        <div class="box-header">
                            <a type="button" class="btn btn-default btn-sm menu-checkbox-toggle">
                                <i class="fa fa-square-o"></i>
                                <?php echo lang('ml_chioce_all'); ?>
                            </a>
                            <a type="button" class="btn btn-default btn-sm" href="<?php echo $menu_add_link;?>">
                                <i class="fa fa-plus"></i>
                                <?php echo lang('ml_add'); ?>
                            </a>
                            <a type="button" class="btn btn-default btn-sm">
                                <i class="fa fa-trash-o"></i>
                                <?php echo lang('ml_delete'); ?>
                            </a>
                        </div>

                        <!-- 表格数据 -->
                        <div class="box-body">

                            <!-- 操作信息提示 -->
                            <!-- success -->
                            <?php if($this->session->flashdata('success')){ ?> 
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> <?php echo lang('ml_success'); ?></h4>
                                 <?php echo $this->session->flashdata('success'); ?>
                            </div>
                            <?php } ?>
                            <!-- error -->
                            <?php if($this->session->flashdata('error')){ ?> 
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-ban"></i> <?php echo lang('ml_error'); ?></h4>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                            <?php } ?><!-- ./操作信息提示 -->

                            <table id="menu" class="table table-bordered table-striped">

                                <thead>
                                    <tr>
                                        <th><?php echo lang('ml_chioce'); ?></th>
                                        <th><?php echo lang('ml_name');?></th>
                                        <th><?php echo lang('ml_level');?></th>
                                        <th><?php echo lang('ml_belong_to');?></th>
                                        <th><?php echo lang('ml_routing');?></th>
                                        <th><?php echo lang('ml_icon');?></th>
                                        <th><?php echo lang('ml_status');?></th>
                                        <th><?php echo lang('ml_manage');?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if($menus){ ?>
                                    <?php foreach ($menus as $m) { ?>
                                        <tr>
                                            <td><input type="checkbox" class="minimal" value="<?php echo $m['menu_id'];?>"></td>
                                            <td><?php echo $m['name'];?></td>
                                            <td><?php echo $m['level'];?></td>
                                            <td><?php echo $m['belong_to'];?></td>
                                            <td><?php echo $m['routing'];?></td>
                                            <td><i class="<?php echo $m['icon'];?>"></i></td>
                                            <td>
                                                <?php if($m['status'] == 1){ ?>
                                                    <span class="label label-success"><?php echo lang('ml_status_on'); ?></span>
                                                <?php }else if($m['status'] == 0){ ?>
                                                    <span class="label label-danger"><?php echo lang('ml_status_off'); ?></span>
                                                <?php } ?>  
                                            </td>
                                            <td>
                                                <a type="button" class="btn btn-default btn-sm">
                                                    <i class="fa fa-search"></i>
                                                    <?php echo lang('ml_search'); ?>
                                                </a>
                                                <a type="button" class="btn btn-default btn-sm" href="<?php echo $m['menu_edit_link']; ?>">
                                                    <i class="fa fa-edit"></i>
                                                    <?php echo lang('ml_edit'); ?>
                                                </a>
                                                <a type="button" class="btn btn-default btn-sm" href="<?php echo $m['menu_delete_link']; ?>">
                                                    <i class="fa fa-trash-o"></i>
                                                    <?php echo lang('ml_delete'); ?>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php } ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>菜单ID</th>
                                        <th>菜单名</th>
                                        <th>级别</th>
                                        <th>所属</th>
                                        <th>路由</th>
                                        <th>图标</th>
                                        <th>操作管理</th>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>
                        <!-- /.表格数据 -->

                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- ./表格 -->

    </div>
    <!-- /.容器 -->