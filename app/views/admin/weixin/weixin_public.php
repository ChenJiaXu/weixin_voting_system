
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<?php echo lang('wxpl_head_title'); ?>
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
								<?php echo lang('wxpl_chioce_all'); ?>
							</a>
							<a type="button" class="btn btn-default btn-sm" href="<?php echo $wxp_add_link;?>">
								<i class="fa fa-plus"></i>
								<?php echo lang('wxpl_add'); ?>
							</a>
						  	<a type="button" class="btn btn-default btn-sm">
								<i class="fa fa-trash-o"></i>
								<?php echo lang('wxpl_delete'); ?>
							</a>
						</div>
			            <!-- /.box-header -->
						<div class="box-body">

							<!-- 操作信息提示 -->
							<!-- success -->
							<?php if($this->session->flashdata('success')){ ?> 
							<div class="alert alert-success alert-dismissible">
			               		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                	<h4><i class="icon fa fa-check"></i> <?php echo lang('wxpl_success'); ?></h4>
			               		 <?php echo $this->session->flashdata('success'); ?>
			              	</div>
			              	<?php } ?>
			              	<!-- error -->
			              	<?php if($this->session->flashdata('error')){ ?> 
			              	<div class="alert alert-danger alert-dismissible">
				                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                <h4><i class="icon fa fa-ban"></i> <?php echo lang('wxpl_error'); ?></h4>
				                <?php echo $this->session->flashdata('error'); ?>
			             	</div>
			             	<?php } ?>
			             	<!-- ./操作信息提示 -->

							<table id="weixin_public" class="table table-hover">
								<thead>
									<tr>
										<th><?php echo lang('wxpl_chioce'); ?></th>
										<th><?php echo lang('wxpl_name'); ?></th>
										<th><?php echo lang('wxpl_appid'); ?></th>
										<th><?php echo lang('wxpl_secret'); ?></th>
										<th><?php echo lang('wxpl_type'); ?></th>
										<th><?php echo lang('wxpl_status'); ?></th>
										<th><?php echo lang('wxpl_operation'); ?></th>
									</tr>
								</thead>

								<tbody>
									<?php if($weixin_publics){ ?>
									<?php foreach ($weixin_publics as $wxp) { ?>
									<tr>
										<td><input type="checkbox" class="minimal" value="<?php echo $wxp['wxp_id']; ?>"></td>
										<td><?php echo $wxp['name']; ?></td>
										<td><?php echo $wxp['appid']; ?></td>
										<td><?php echo $wxp['secret']; ?></td>
										<td><?php echo $wxp['wxt_type']; ?></td>
										<td>
											<?php if($wxp['status'] == 1){ ?>
												<span class="label label-success"><?php echo lang('wxpl_status_on'); ?></span>
											<?php }else if($wxp['status'] == 0){ ?>
												<span class="label label-danger"><?php echo lang('wxpl_status_off'); ?></span>
											<?php } ?>	
										</td>
										<td>
											<a type="button" class="btn btn-default btn-sm">
												<i class="fa fa-search"></i>
												<?php echo lang('wxpl_search'); ?>
											</a>
											<a type="button" class="btn btn-default btn-sm" href="<?php echo $wxp['edit']; ?>">
												<i class="fa fa-edit"></i>
												<?php echo lang('wxpl_edit'); ?>
											</a>
											<a type="button" class="btn btn-default btn-sm" href="<?php echo $wxp['delete']; ?>">
												<i class="fa fa-trash-o"></i>
												<?php echo lang('wxpl_delete'); ?>
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

