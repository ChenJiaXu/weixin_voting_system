<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo $base_url;?>/static/adminlte/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>系统管理员</p>
                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php if(isset($lefts) && $lefts){ ?> 
        <ul class="sidebar-menu">
            <li class="header">功能菜单列表</li>

            <?php foreach ($lefts as $left) { ?>
                <!-- lv.1 -->
                <?php if($left['level'] == 1){ ?>
                <li class="treeview">
                    <?php if($left['routing'] != '#'){ ?>
                        <?php echo anchor($left['routing'],'<i class="'.$left['icon'].'"></i> <span>'.$left['name'].'</span>');?>
                    <?php }else if($left['routing'] == '#'){ ?> 
                        <?php echo anchor($left['routing'],'<i class="'.$left['icon'].'"></i> <span>'.$left['name'].'</span><i class="fa fa-angle-left pull-right"></i>');?>
                        <!-- lv.2 -->
                        <ul class="treeview-menu lv2">
                            <?php foreach ($lefts as $lv2) { ?>
                                <?php if($lv2['belong_to'] == $left['menu_id']){ ?>
                                    <?php if($lv2['routing'] != '#'){ ?> 
                                        <li><?php echo anchor($lv2['routing'],'<i class="'.$lv2['icon'].'"></i> <span>'.$lv2['name'].'</span>');?></li>
                                    <?php }else if($lv2['routing'] == '#'){ ?>
                                        <li class="<?php if(uri_string()==$lv2['routing']){echo 'active';}?>"><?php echo anchor($lv2['routing'],'<i class="'.$lv2['icon'].'"></i> <span>'.$lv2['name'].'</span><i class="fa fa-angle-left pull-right"></i>');?>
                                            <!-- lv.3 -->
                                            <ul class="treeview-menu lv3">
                                                <?php foreach ($lefts as $lv3) { ?>
                                                    <?php if($lv3['belong_to'] == $lv2['menu_id']){ ?>
                                                        <li><?php echo anchor($lv3['routing'],'<i class="'.$lv3['icon'].'"></i> <span>'.$lv3['name'].'</span>');?></li>
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
                </li>
                <?php } ?>
                <!-- ./lv.1 -->
            <?php } ?>

        </ul>
        <?php } ?>


    </section>
    <!-- /.sidebar -->
</aside>