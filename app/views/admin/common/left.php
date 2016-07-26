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
                <?php if($left['level'] == 1){ ?>
                    <li class="treeview">
                        <?php if($left['routing'] == '#'){ ?>
                            <?php echo anchor($left['routing'],'<i class="'.$left['icon'].'"></i> <span>'.$left['name'].'</span><i class="fa fa-angle-left pull-right"></i>');?>
                        <?php }else{ ?> 
                            <?php echo anchor($left['routing'],'<i class="'.$left['icon'].'"></i> <span>'.$left['name'].'</span>');?>
                        <?php } ?>
                        <?php if($left['routing'] == '#'){ ?>
                        <ul class="treeview-menu">
                        <?php } ?>
                        <?php foreach($lefts as $child){ ?>
                            <?php if($left['menu_id'] == $child['belong_to']){ ?>
                                <li class="<?php if(uri_string()==$child['routing']){echo 'active';}?>"><?php echo anchor($child['routing'],'<i class="'.$child['icon'].'"></i> <span>'.$child['name'].'</span>'); ?></li>
                            <?php } ?>
                        <?php } ?>
                        <?php if($left['routing'] == '#'){ ?>
                        </ul>
                        <?php } ?>
                    </li>
                <?php } ?> 
            <?php } ?>
        </ul>
        <?php } ?>
    </section>
    <!-- /.sidebar -->
</aside>