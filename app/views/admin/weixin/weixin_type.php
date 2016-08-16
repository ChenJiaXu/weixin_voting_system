
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<?php echo lang('wxtl_head_title'); ?>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> 控制面板</a></li>
				<li><a href="#">活动分类</a></li>
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
								<?php echo lang('wxtl_chioce_all'); ?>
							</a>
							<a type="button" class="btn btn-default btn-sm" href="<?php echo $wxt_add_link;?>">
								<i class="fa fa-plus"></i>
								<?php echo lang('wxtl_add'); ?>
							</a>
						  	<a type="button" class="btn btn-default btn-sm">
								<i class="fa fa-trash-o"></i>
								<?php echo lang('wxtl_delete'); ?>
							</a>
						</div>
			            <!-- /.box-header -->
						<div class="box-body">

							<!-- 操作信息提示 -->
							<!-- success -->
							<?php if($this->session->flashdata('success')){ ?> 
							<div class="alert alert-success alert-dismissible">
			               		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                	<h4><i class="icon fa fa-check"></i> <?php echo lang('wxtl_success'); ?></h4>
			               		 <?php echo $this->session->flashdata('success'); ?>
			              	</div>
			              	<?php } ?>
			              	<!-- error -->
			              	<?php if($this->session->flashdata('error')){ ?> 
			              	<div class="alert alert-danger alert-dismissible">
				                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                <h4><i class="icon fa fa-ban"></i> <?php echo lang('wxtl_error'); ?></h4>
				                <?php echo $this->session->flashdata('error'); ?>
			             	</div>
			             	<?php } ?>
			             	<!-- ./操作信息提示 -->

							<table id="weixin_type" class="table table-hover">
								<thead>
									<tr>
										<th><?php echo lang('wxtl_chioce'); ?></th>
										<th><?php echo lang('wxtl_wxt_id'); ?></th>
										<th><?php echo lang('wxtl_name'); ?></th>
										<th><?php echo lang('wxtl_sort'); ?></th>
										<th><?php echo lang('wxtl_date_add'); ?></th>
										<th><?php echo lang('wxtl_status'); ?></th>
										<th><?php echo lang('wxtl_operation'); ?></th>
									</tr>
								</thead>

								<tbody>
									<?php if($weixin_types){ ?>
									<?php foreach ($weixin_types as $wxt) { ?>
									<tr>
										<td><input type="checkbox" class="minimal" value="<?php echo $wxt['wxt_id']; ?>"></td>
										<td><?php echo $wxt['wxt_id']; ?></td>
										<td><?php echo $wxt['name']; ?></td>
										<td><?php echo $wxt['sort']; ?></td>
										<td><?php echo $wxt['date_add']; ?></td>
										<td>
											<?php if($wxt['status'] == 1){ ?>
												<span class="label label-success"><?php echo lang('wxtl_status_on'); ?></span>
											<?php }else if($wxt['status'] == 0){ ?>
												<span class="label label-danger"><?php echo lang('wxtl_status_off'); ?></span>
											<?php } ?>	
										</td>
										<td>
											<a type="button" class="btn btn-default btn-sm">
												<i class="fa fa-search"></i>
												<?php echo lang('wxtl_search'); ?>
											</a>
											<a type="button" class="btn btn-default btn-sm" href="<?php echo $wxt['edit']; ?>">
												<i class="fa fa-edit"></i>
												<?php echo lang('wxtl_edit'); ?>
											</a>
											<a type="button" class="btn btn-default btn-sm" href="<?php echo $wxt['delete']; ?>">
												<i class="fa fa-trash-o"></i>
												<?php echo lang('wxtl_delete'); ?>
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

