	
	
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<?php echo lang('vml_head_title'); ?>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> 控制面板</a></li>
				<li><a href="#"><?php echo lang('vml_head_title'); ?></a></li>
				<li class="active">列表</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						
						<div class="box-header">
							<a type="button" class="btn btn-default btn-sm checkbox-toggle">
								<i class="fa fa-square-o"></i>
								<?php echo lang('vml_chioce_all'); ?>
							</a>
							<a type="button" class="btn btn-default btn-sm" href="<?php echo $vm_add_link;?>">
								<i class="fa fa-plus"></i>
								<?php echo lang('vml_add'); ?>
							</a>
						  	<a type="button" class="btn btn-default btn-sm">
								<i class="fa fa-trash-o"></i>
								<?php echo lang('vml_delete'); ?>
							</a>
						</div>
			            <!-- /.box-header -->
						<div class="box-body">

							<!-- 操作信息提示 -->
							<!-- success -->
							<?php if($this->session->flashdata('success')){ ?> 
							<div class="alert alert-success alert-dismissible">
			               		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                	<h4><i class="icon fa fa-check"></i> <?php echo lang('vml_success'); ?></h4>
			               		 <?php echo $this->session->flashdata('success'); ?>
			              	</div>
			              	<?php } ?>
			              	<!-- error -->
			              	<?php if($this->session->flashdata('error')){ ?> 
			              	<div class="alert alert-danger alert-dismissible">
				                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                <h4><i class="icon fa fa-ban"></i> <?php echo lang('vml_error'); ?></h4>
				                <?php echo $this->session->flashdata('error'); ?>
			             	</div>
			             	<?php } ?><!-- ./操作信息提示 -->

							<table id="voting_classification" class="table table-hover">
								<thead>
									<tr>
										<th><?php echo lang('vml_chioce'); ?></th>
										<th><?php echo lang('vml_vm_id'); ?></th>
										<th><?php echo lang('vml_title'); ?></th>
										<th><?php echo lang('vml_status'); ?></th>
										<th><?php echo lang('vml_date_start'); ?></th>
										<th><?php echo lang('vml_date_end'); ?></th>
										<th><?php echo lang('vml_progress'); ?></th>
										<th><?php echo lang('vml_percentage'); ?></th>
										<th><?php echo lang('vml_statusing'); ?></th>
										<th><?php echo lang('vml_operation'); ?></th>
									</tr>
								</thead>

								<tbody>
									<?php if($voting_managements){ ?>
									<?php foreach ($voting_managements as $vm) { ?>
									<tr>
										<td><input type="checkbox" class="minimal" value="<?php echo $vm['vm_id']; ?>"></td>
										<td><?php echo $vm['vm_id']; ?></td>
										<td><?php echo $vm['title']; ?></td>
										<td>
											<?php if($vm['status'] == 1){ ?>
												<span class="label label-success"><?php echo lang('vml_status_on'); ?></span>
											<?php }else if($vm['status'] == 0){ ?>
												<span class="label label-danger"><?php echo lang('vml_status_off'); ?></span>
											<?php } ?>	
										</td>
										<td><?php echo $vm['date_start']; ?></td>
										<td><?php echo $vm['date_end']; ?></td>
										<!-- 进度效果后面再进行处理 -->
										<?php date_default_timezone_set("Asia/Shanghai");?>
										<td>
											<?php if($vm['statusing'] == 1){ ?>
												<div class="progress progress-xs progress-striped">
							                      <div class="progress-bar progress-bar-yellow" style="width: 0%"></div>
							                    </div>
											<?php }else if($vm['statusing'] == 2){ ?>
												<?php 
													$now = strtotime(date('Y-m-d H:i:s'));
													$start = strtotime($vm['date_start']);
													$end = strtotime($vm['date_end']);
													$end_start = $end - $start;
													if($now > $start){
														$count = round(($now-$start)/$end_start*100);
													}else if($now == $start || $now < $start){
														$count = 0;
													}
												?>
												<div class="progress progress-xs progress-striped active">
							                      <div class="progress-bar progress-bar-primary" style="width: <?php echo $count;?>%"></div>
							                    </div>
											<?php }else if($vm['statusing'] == 3){ ?>
												<div class="progress progress-xs progress-striped active">
							                      <div class="progress-bar progress-bar-success" style="width: 100%"></div>
							                    </div>
											<?php }	?>
										</td>
										<td>
											<?php if($vm['statusing'] == 1){ ?>
							                    <span class="badge bg-yellow">0%</span>
											<?php }else if($vm['statusing'] == 2){ ?>
							                    <span class="badge bg-light-blue"><?php echo $count;?>%</span>
											<?php }else if($vm['statusing'] == 3){ ?>
							                    <span class="badge bg-green">100%</span>
											<?php }	?>
										</td>
										<!-- 进度效果后面再进行处理 -->
										<td>
											<?php if($vm['statusing'] == 1){ ?>
												<span class="label label-warning"><?php echo lang('vml_statusing_notstarted'); ?></span>
											<?php }else if($vm['statusing'] == 2){ ?>
												<span class="label label-primary"><?php echo lang('vml_statusing_ongoing'); ?></span>
											<?php }else if($vm['statusing'] == 3){ ?>
												<span class="label label-success"><?php echo lang('vml_statusing_complete'); ?></span>
											<?php }	?>
										</td>
										<td>
											<a type="button" class="btn btn-default btn-sm" href="<?php echo $vm_ap_link.'/'.$vm['vm_id']; ?>">
												<i class="fa fa-search"></i>
												<?php echo lang('vml_search'); ?>
											</a>
											<?php if($vm['statusing'] != 3 && $vm['statusing'] != 2){ ?>
											<a type="button" class="btn btn-default btn-sm" href="<?php echo $vm_edit_link.'/'.$vm['vm_id']; ?>">
												<i class="fa fa-edit"></i>
												<?php echo lang('vml_edit'); ?>
											</a>
											<a type="button" class="btn btn-default btn-sm" href="<?php echo $vm_delete_link.'/'.$vm['vm_id']; ?>">
												<i class="fa fa-trash-o"></i>
												<?php echo lang('vml_delete'); ?>
											</a>
											<?php } ?>
										</td>
									</tr>
									<?php } ?>	
									<?php } ?>
								</tbody>
							</table>
						</div>
						<!-- /.box-body -->
						<div class="box-footer clearfix">
							<ul class="pagination pagination-sm no-margin pull-right">
								<li><a href="#">&laquo;</a></li>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">&raquo;</a></li>
							</ul>
			            </div>
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

