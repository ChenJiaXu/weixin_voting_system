<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>投票模板</title>
		<!-- Bootstrap -->
		<link href="<?php echo $base_url;?>/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- semantic -->
		<link href="<?php echo $base_url;?>/static/semantic-ui/semantic.min.css" rel="stylesheet">
		<link href="//cdn.bootcss.com/normalize/4.2.0/normalize.css" rel="stylesheet">
		<style type="text/css">
			img{
				width: 100%;
				max-width: 100%;
			}
			.col-xs-12{
				padding-top: 15px;
			}
			.ui.card>.content{
				min-height:0px;
			}
			/* 小火箭css */
			#gotop {
			    width: 50px;
			    position: fixed;
			    bottom: 0px;
			    cursor: pointer;
			    z-index: 99998;
			    right: -2%;
			    margin-right: 1%;
			}
			/* 小火箭悬停特效 */
			#gotop:hover {
			    animation: rubberBand 1s;
			}

			@keyframes rubberBand {
			  from {
			    transform: scale3d(1, 1, 1);
			  }

			  30% {
			    transform: scale3d(1.25, 0.75, 1);
			  }

			  40% {
			    transform: scale3d(0.75, 1.25, 1);
			  }

			  50% {
			    transform: scale3d(1.15, 0.85, 1);
			  }

			  65% {
			    transform: scale3d(.95, 1.05, 1);
			  }

			  75% {
			    transform: scale3d(1.05, .95, 1);
			  }

			  to {
			    transform: scale3d(1, 1, 1);
			  }
			}
			/* end 小火箭 */
		</style>

	</head>

	<body>
		
		<div class="container-fluid">
				
			<div class="row">
				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">投票</h4>
					  </div>
					  
						 <div class="modal-body">
						  	<div class="form-group">
								<label for="bp_id" class="control-label">编号</label>
								<input type="text" class="form-control" id="vm_bp_id" value="" readonly>
								<input type="text" class="form-control" readonly value="<?php if($ap){ echo $ap['vm_id'];}?>" id="vm_id">
						  	</div>
					  	</div>
					  	<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">再考虑一下</button>
							<button type="button" class="btn btn-primary" id="ap_votes">投票</button>
					  	</div>
					  
					</div>
				  </div>
				</div>
			</div>

			
			<div class="row">
								
				<!-- banner-top -->
				<div class="col-xs-12">
					<?php if($vm_banner){ ?>
						<?php foreach ($vm_banner as $vmb) { ?>
							<?php if($vmb['layout'] == 1){ ?> 
							<a class="fluid ui image">
								<img class="ui fluid image" src="<?php echo $base_url;?>/upload/voting_management/<?php echo $vmb['banner'];?>" />
							</a>
							<?php } ?>
						<?php } ?>
					<?php } ?>
				</div>

				<!-- title  -->
				<div class="col-xs-12">
					<h3 class="ui blue huge header">
						<?php if($ap){?>
							<?php echo $ap['title']; ?>
						<?php } ?>
					</h3>
					<hr />
				</div>

				<!-- description -->
				<div class="col-xs-12">
					<div class="ui teal dividing header">
						<h5>
							<?php if($ap){?>
								<?php echo htmlspecialchars_decode(html_entity_decode($ap['description'])); ?>
							<?php } ?>
						</h5>
					</div>
					<hr />
				</div>

				<!-- data_count -->
				<div class="col-xs-12">
					<table class="ui unstackable table">
						<thead>
							<tr>
							  <th class="center aligned">总报名人数</th>
							  <th class="center aligned">总投票数</th>
							  <th class="center aligned">总访问流量</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							  <td class="center aligned"><?php echo count($vm_bp);?>人</td>
							  <td class="center aligned">
								<?php if(isset($vm_bp_vote_list)){
									echo count($vm_bp_vote_list);
								} ?>
								票
							  </td>
							  <td class="center aligned"><?php if($vm_traffic){ echo $vm_traffic['traffic'];}?></td>
							</tr>
						</tbody>
					</table>
				</div>

				<!-- banner-content -->
				<div class="col-xs-12">
					<?php if($vm_banner){ ?>
						<?php foreach ($vm_banner as $vmb) { ?>
							<?php if($vmb['layout'] == 2){ ?> 
							<a class="fluid ui image">
								<img class="ui fluid image" src="<?php echo $base_url;?>/upload/voting_management/<?php echo $vmb['banner'];?>" />
							</a>
							<?php } ?>
						<?php } ?>
					<?php } ?>
				</div>

				<div class="col-xs-12">
					
					<div class="ui secondary pointing three item teal menu">
						<a class="active item" data-tab="first">
							参赛选手
						</a>
						<a class="item" data-tab="second">
							排行版
						</a>
						<a class="item" data-tab="third">
							活动说明
						</a>
					</div>

					<!-- tab.1 -->
					<div class="fluid ui fluid tab active" data-tab="first">

						<!-- card -->
						<div class="ui two column grid">
							
							<?php if($vm_bp){ ?>
							<?php foreach($vm_bp as $vb){ ?>
							<div class="column">
								<div class="ui fluid doubling card">
									<div class="image">
										<a class="ui red ribbon label"><?php echo $vb['name'];?></a>
										<?php foreach ($bp_image as $bpi) { ?>
											<?php if($bpi['bp_id'] == $vb['bp_id']){ ?>
											<img src="<?php echo $base_url;?>/upload/basic_personnel/<?php echo $bpi['image'];?>">
											<?php } ?>
										<?php } ?>
										
									</div>
									<div class="content">
										<a class="ui bottom attached inverted blue label" data-toggle="modal" data-target="#myModal" data-whatever="<?php echo $vb['vm_bp_id'];?>">
											<i class="star icon"></i>
											<?php echo $vb['votes'];?>票
										</a>
									</div>
									
								</div>
							</div>
							<?php } ?>
							<?php } ?>

						</div>
					</div>
					<!-- ./tab.1 -->

					<div class="fluid ui fluid tab" data-tab="second">
						<?php if($vm_bp){ ?>
						<table class="ui unstackable table">
						  <thead>
							<tr>
							  <th>编号</th>
							  <th>姓名</th>
							  <th class="center aligned">票数</th>
							</tr>
						  </thead>
						  <tbody>
							<?php foreach($vm_bp as $vb){ ?>
							<tr>
							  <td><?php echo '00'.$vb['bp_id'];?></td>
							  <td><?php echo $vb['name'];?></td>
							  <td class="center aligned"><?php echo $vb['votes'];?>票</td>
							</tr>
							<?php } ?>
						  </tbody>
						</table>
						<?php } ?>
					</div>

					<div class="fluid ui fluid tab" data-tab="third">
						<div class="ui message">
							<?php if($ap){?>
								<?php echo htmlspecialchars_decode(html_entity_decode($ap['rules_config'])); ?>
							<?php } ?>
						</div>
					</div>

					<hr />
					
				</div>

				<!-- banner-down -->
				<div class="col-xs-12">
					<?php if($vm_banner){ ?>
						<?php foreach ($vm_banner as $vmb) { ?>
							<?php if($vmb['layout'] == 3){ ?> 
							<a class="fluid ui image">
								<img class="ui fluid image" src="<?php echo $base_url;?>/upload/voting_management/<?php echo $vmb['banner'];?>" />
							</a>
							<?php } ?>
						<?php } ?>
					<?php } ?>
				</div>

				<!-- 右侧小火箭图标返回顶部 -->
				<div id="gotop">
					<img src="<?php echo $base_url;?>/upload/system/huojian.svg" alt="返回顶部小火箭">
				</div>

			</div>
		</div>

	</body>

	<script src="<?php echo $base_url;?>/static/plugins/jQuery/jQuery-2.2.0.min.js"></script>
	<script src="<?php echo $base_url;?>/static/bootstrap/js/bootstrap.min.js"></script>
	<!-- semantic-ui -->
	<script src="<?php echo $base_url;?>/static/semantic-ui/semantic.min.js"></script>
	<script type="text/javascript">
		$('.menu .item')
		  .tab()
		;
		$('.menu .item')
		  .on('click', function() {
			
			  $(this)
				.addClass('active')
				.closest('.ui.menu')
				.find('.item')
				  .not($(this))
				  .removeClass('active')
			  ;
			
		  })
		;
		$('#myModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient = button.data('whatever') // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  /*modal.find('.modal-title').text('为【' + recipient + '】投票');*/
		  modal.find('.modal-body #vm_bp_id').val(recipient)
		})

		$('#ap_votes').on('click',function(){
			$vm_id = $("#vm_id").val();
			$vm_bp_id = $("#vm_bp_id").val();
			$.ajax({
				url: "<?php echo $base_url;?>/home/vote_activity/votes",  
				type: "POST",
				data:{vm_id:$vm_id,vm_bp_id:$vm_bp_id},
				//dataType: "json",
				error: function(){  
					alert('投票异常');
					
				},  
				success: function(data,status){//如果调用php成功    
					alert(data);//解码，显示汉字
					window.location.reload();
				}
			});
		});
	</script>
	<script src="http://cdn.bootcss.com/gsap/1.19.0/TweenMax.min.js"></script>
	<script src="http://cdn.bootcss.com/gsap/1.19.0/plugins/ScrollToPlugin.min.js"></script>
	<script type="text/javascript">
		$(function() {

			// 默认速度
			$("#gotop").click(function() {
				TweenMax.to(window, 1, {scrollTo:0});
			});

		});
	</script>

</html>
