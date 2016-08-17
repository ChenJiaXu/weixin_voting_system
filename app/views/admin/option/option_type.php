
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<?php echo lang('otl_head_title'); ?>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> 控制面板</a></li>
				<li><a href="#">选项类型</a></li>
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
								<?php echo lang('otl_chioce_all'); ?>
							</a>
							<a type="button" class="btn btn-default btn-sm" href="<?php echo $ot_add_link;?>">
								<i class="fa fa-plus"></i>
								<?php echo lang('otl_add'); ?>
							</a>
						  	<a type="button" class="btn btn-default btn-sm">
								<i class="fa fa-trash-o"></i>
								<?php echo lang('otl_delete'); ?>
							</a>
						</div>
			            <!-- /.box-header -->
						<div class="box-body">

							<!-- 操作信息提示 -->
							<!-- success -->
							<?php if($this->session->flashdata('success')){ ?> 
							<div class="alert alert-success alert-dismissible">
			               		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                	<h4><i class="icon fa fa-check"></i> <?php echo lang('otl_success'); ?></h4>
			               		 <?php echo $this->session->flashdata('success'); ?>
			              	</div>
			              	<?php } ?>
			              	<!-- error -->
			              	<?php if($this->session->flashdata('error')){ ?> 
			              	<div class="alert alert-danger alert-dismissible">
				                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                <h4><i class="icon fa fa-ban"></i> <?php echo lang('otl_error'); ?></h4>
				                <?php echo $this->session->flashdata('error'); ?>
			             	</div>
			             	<?php } ?>
			             	<!-- ./操作信息提示 -->

							<table id="weixin_type" class="table table-hover">
								<thead>
									<tr>
										<th><?php echo lang('otl_chioce'); ?></th>
										<th><?php echo lang('otl_ot_id'); ?></th>
										<th><?php echo lang('otl_name'); ?></th>
										<th><?php echo lang('otl_type'); ?></th>
										<th><?php echo lang('otl_operation'); ?></th>
									</tr>
								</thead>

								<tbody>
									<?php if($option_types){ ?>
									<?php foreach ($option_types as $ot) { ?>
									<tr>
										<td><input type="checkbox" class="minimal" value="<?php echo $ot['ot_id']; ?>"></td>
										<td><?php echo $ot['ot_id']; ?></td>
										<td><?php echo $ot['name']; ?></td>
										<td>
											<?php if($ot['type'] == 'radio'){ ?>
												<i class="fa fa-dot-circle-o"></i>
											<?php }else if($ot['type'] == 'checkbox'){ ?>
												<i class="fa fa-check-square-o"></i>
											<?php }else if($ot['type'] == 'select'){ ?>
												<i class="fa fa-list-ul"></i> 
											<?php }else{ ?>
												<i class="fa fa-question-circle-o"></i> 
											<?php } ?>	
										</td>
										<td>
											<a type="button" class="btn btn-default btn-sm">
												<i class="fa fa-search"></i>
												<?php echo lang('otl_search'); ?>
											</a>
											<a type="button" class="btn btn-default btn-sm" href="<?php echo $ot['edit']; ?>">
												<i class="fa fa-edit"></i>
												<?php echo lang('otl_edit'); ?>
											</a>
											<a type="button" class="btn btn-default btn-sm" href="<?php echo $ot['delete']; ?>">
												<i class="fa fa-trash-o"></i>
												<?php echo lang('otl_delete'); ?>
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

