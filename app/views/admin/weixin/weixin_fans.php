
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<?php echo lang('wxfl_head_title'); ?>
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
						
						<div class="box-body">

							<table id="weixin_fans" class="table table-hover">
								<thead>
									<tr>
										<th><?php echo lang('wxfl_headimgurl'); ?></th>
										<th><?php echo lang('wxfl_nickname'); ?></th>
										<th><?php echo lang('wxfl_location'); ?></th>
										<th><?php echo lang('wxfl_sex'); ?></th>
										<th><?php echo lang('wxfl_subscribe_time'); ?></th>
										<th><?php echo lang('wxfl_focus'); ?></th>
									</tr>
								</thead>

								<tbody>
									<?php if($weixin_fanss){ ?>
									<?php foreach ($weixin_fanss as $wxf) { ?>
									<tr>
										<td><img src="<?php echo $wxf['headimgurl'];?>" width="50px;" height="50px;"/></td>
										<td style="padding-top: 25px;"><?php echo $wxf['nickname']; ?></td>
										<td style="padding-top: 25px;"><?php echo $wxf['location']; ?></td>
										<td style="padding-top: 25px;"><?php echo $wxf['sex']; ?></td>
										<td style="padding-top: 25px;"><?php echo $wxf['subscribe_time']; ?></td>
										<td style="padding-top: 25px;"><?php foreach($wxf['wxp_name'] as $wxf_name){ echo '['.$wxf_name['name']."],"; } ?></td>
										<td style="padding-top: 25px;">
											<a type="button" class="btn btn-default btn-sm" href="<?php echo $wxf['read'];?>">
												<i class="fa fa-search"></i>
												<?php echo lang('wxfl_read'); ?>
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

