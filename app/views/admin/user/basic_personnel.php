
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<?php echo lang('bpl_head_title'); ?>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> 控制面板</a></li>
				<li><a href="#"><?php echo lang('bpl_head_title'); ?></a></li>
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
								<?php echo lang('bpl_chioce_all'); ?>
							</a>
							<a type="button" class="btn btn-default btn-sm" href="<?php echo $bp_add_link;?>">
								<i class="fa fa-plus"></i>
								<?php echo lang('bpl_add'); ?>
							</a>
						  	<a type="button" class="btn btn-default btn-sm">
								<i class="fa fa-trash-o"></i>
								<?php echo lang('bpl_delete'); ?>
							</a>
						</div>
			            <!-- /.box-header -->
						<div class="box-body">

							<!-- 操作信息提示 -->
							<!-- success -->
							<?php if($this->session->flashdata('success')){ ?> 
							<div class="alert alert-success alert-dismissible">
			               		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                	<h4><i class="icon fa fa-check"></i> <?php echo lang('bpl_success'); ?></h4>
			               		 <?php echo $this->session->flashdata('success'); ?>
			              	</div>
			              	<?php } ?>
			              	<!-- error -->
			              	<?php if($this->session->flashdata('error')){ ?> 
			              	<div class="alert alert-danger alert-dismissible">
				                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                <h4><i class="icon fa fa-ban"></i> <?php echo lang('bpl_error'); ?></h4>
				                <?php echo $this->session->flashdata('error'); ?>
			             	</div>
			             	<?php } ?><!-- ./操作信息提示 -->

							<table id="voting_classification" class="table table-hover">
								<thead>
									<tr>
										<th><?php echo lang('bpl_chioce'); ?></th>
										<th><?php echo lang('bpl_bp_id'); ?></th>
										<th><?php echo lang('bpl_name'); ?></th>
										<th><?php echo lang('bpl_date_add'); ?></th>
										<th><?php echo lang('bpl_date_update'); ?></th>
										<th><?php echo lang('bpl_status'); ?></th>
										<th><?php echo lang('bpl_operation'); ?></th>
									</tr>
								</thead>

								<tbody>
									<?php if($basic_personnels){ ?>
									<?php foreach ($basic_personnels as $bp) { ?>
									<tr>
										<td><input type="checkbox" class="minimal" value="<?php echo $bp['bp_id']; ?>"></td>
										<td><?php echo $bp['bp_id']; ?></td>
										<td><?php echo $bp['name']; ?></td>
										<td><?php echo $bp['date_add']; ?></td>
										<td><?php echo $bp['date_update']; ?></td>
										<td>
											<?php if($bp['status'] == 1){ ?>
												<span class="label label-success"><?php echo lang('bpl_status_on'); ?></span>
											<?php }else if($bp['status'] == 0){ ?>
												<span class="label label-danger"><?php echo lang('bpl_status_off'); ?></span>
											<?php } ?>	
										</td>
										<td>
											<a type="button" class="btn btn-default btn-sm">
												<i class="fa fa-search"></i>
												<?php echo lang('bpl_search'); ?>
											</a>
											<a type="button" class="btn btn-default btn-sm" href="<?php echo $bp['edit']; ?>">
												<i class="fa fa-edit"></i>
												<?php echo lang('bpl_edit'); ?>
											</a>
											<a type="button" class="btn btn-default btn-sm" href="<?php echo $bp['delete']; ?>" onclick="if(confirm('确定删除?')==false)return false;">
												<i class="fa fa-trash-o"></i>
												<?php echo lang('bpl_delete'); ?>
											</a>
											<?php if($bp['force_del'] == TRUE){ ?> 
											<a type="button" class="btn btn-default btn-sm" href="<?php echo $bp['force_del']; ?>" onclick="if(confirm('确定强制删除么?')==false)return false;">
												<i class="fa fa-trash-o"></i>
												<?php echo lang('bpl_force_del'); ?>
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

