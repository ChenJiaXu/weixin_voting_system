
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<?php echo lang('gml_head_title'); ?>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> 控制面板</a></li>
				<li><a href="#">用户组权限菜单</a></li>
				<li class="active">列表</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						
						<div class="box-body">

							<!-- 操作信息提示 -->
							<!-- success -->
							<?php if($this->session->flashdata('success')){ ?> 
							<div class="alert alert-success alert-dismissible">
			               		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                	<h4><i class="icon fa fa-check"></i> <?php echo lang('gml_success'); ?></h4>
			               		 <?php echo $this->session->flashdata('success'); ?>
			              	</div>
			              	<?php } ?>
			              	<!-- error -->
			              	<?php if($this->session->flashdata('error')){ ?> 
			              	<div class="alert alert-danger alert-dismissible">
				                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                <h4><i class="icon fa fa-ban"></i> <?php echo lang('gml_error'); ?></h4>
				                <?php echo $this->session->flashdata('error'); ?>
			             	</div>
			             	<?php } ?>
			             	<!-- ./操作信息提示 -->

							<table id="users_groups" class="table table-hover">
								<thead>
									<tr>
										<th><?php echo lang('gml_groups_id'); ?></th>
										<th><?php echo lang('gml_groups_name'); ?></th>
										<th><?php echo lang('gml_groups_description'); ?></th>
										<th><?php echo lang('gml_operation'); ?></th>
									</tr>
								</thead>

								<tbody>
									<?php if($groups){ ?>
									<?php foreach ($groups as $g) { ?>
									<tr>
										<td><?php echo $g['id']; ?></td>
										<td><?php echo $g['name']; ?></td>
										<td><?php echo $g['description']; ?></td>
										<td>
											<a type="button" class="btn btn-default btn-sm" href="<?php echo $g['edit']; ?>">
												<i class="fa fa-edit"></i>
												<?php echo lang('gml_edit'); ?>
											</a>
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

