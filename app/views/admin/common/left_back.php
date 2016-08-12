                        <?php if($left['routing'] == '#'){ ?>
                        <ul class="treeview-menu">
                        <?php } ?>
                        <?php foreach($lefts as $child){ ?>
                            <?php if($left['menu_id'] == $child['belong_to']){ ?>
                                <?php if($child['level'] == 2){ ?>
                                    <?php if($child['routing'] == '#'){ ?>
                                        <li><?php echo anchor($child['routing'],'<i class="'.$child['icon'].'"></i> <span>'.$child['name'].'</span><i class="fa fa-angle-left pull-right"></i>'); ?></li>
                                    <?php }else{ ?>
                                        <li class="<?php if(uri_string()==$child['routing']){echo 'active';}?>"><?php echo anchor($child['routing'],'<i class="'.$child['icon'].'"></i> <span>'.$child['name'].'</span>'); ?></li>
                                    <?php } ?>
                                <?php }else if($child['level'] == 3){ ?>
                                    <ul class="treeview-menu">
                                        <?php foreach($lefts as $lv3){ ?>
                                        <?php if($child['menu_id'] == $lv3['belong_to']){ ?> 
                                        <li class="<?php if(uri_string()==$lv3['routing']){echo 'active';}?>">
                                            <?php echo anchor($lv3['routing'],'<i class="'.$lv3['icon'].'"></i> <span>'.$lv3['name'].'</span>');?>
                                        </li>
                                        <?php } ?>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        <?php if($left['routing'] == '#'){ ?>
                        </ul>
                        <?php } ?>