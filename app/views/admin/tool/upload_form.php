<html>
	<head>
		<title>Upload Form</title>
	</head>
	<link href="<?php echo $base_url;?>/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>/static/font-awesome-4.5.0/css/font-awesome.min.css">
    <link href="<?php echo $base_url;?>/static/plugins/fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>/static/plugins/zTree/css/zTreeStyle/zTreeStyle.css">
    
    <style type="text/css">
    	#tree-image{
    		padding-top: 1em;
    		height: 300px;
    		min-height:300px;
    		max-height:300px;
    	}
    	.file-drop-zone{
    		overflow-y: auto;
    	}
    	#fileinput{
    		padding-top: 0.5em;
    		height: 300px;
    		min-height: 300px;
    		max-height: 300px;
    	}
    	#image .panel-body{
    		height: 250px;
    		max-height: 250px;
    		min-height: 250px;
    	}
    	#image .panel-heading{
    		height: 30px;
    		max-height: 30px;
    		min-height: 30px;
    	}
    </style>
	<body>
		<div class="container-fliud">
			
			<div class="row-fliud" id="tree-image">

				<div class="col-lg-2">
					<ul id="tree" class="ztree"></ul>
				</div>

				<div class="col-lg-9 col-lg-offset-1" id="image">
					<div class="panel panel-default">
					  	<div class="panel-heading" id="image-heading"></div>
					  	<div class="panel-body" id="image-body">
					    
					  	</div>
					</div>
				</div>
				
			</div>

			<hr />
			<div class="row-fliud" id="fileinput">
				<input id="file" name="file" type="file" multiple class="file">		
			</div>
		</div>
	<script src="<?php echo $base_url;?>/static/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <script src="<?php echo $base_url;?>/static/plugins/fileinput/js/fileinput.js" type="text/javascript"></script>
    <script src="<?php echo $base_url;?>/static/plugins/fileinput/js/lang/zh.js" type="text/javascript"></script>
    <script src="<?php echo $base_url;?>/static/bootstrap/js/bootstrap.min.js"></script>
    <script>
    	$('#file').fileinput({
	        language: 'zh',
	        uploadUrl: '<?php echo $base_url;?>/admin/tool/upload/do_upload',
	        //allowedFileTypes: ['image', 'html', 'text', 'video', 'audio', 'flash', 'object'],
	        allowedFileExtensions : ['jpg', 'png','gif'],
	        showCaption: true,//是否显示文件的标题。默认值true
	        showPreview: true,//是否显示文件的预览图。默认值true
	        showRemove: true,//是否显示删除/清空按钮。默认值true
	        showUpload: true,//是否显示文件上传按钮。默认是submit按钮，除非指定了uploadUrl属性。默认值true
	        showBrowse: true,//是否显示选择文件按钮。
	        browseOnZoneClick: true,//是否启用文件浏览/选择点击预览区
	        //minFileCount: 1,//最少必须选择一张图片
	        //maxFileCount: 5,//最多只能选择五张图片
	        //maxFileWidth: 50,
	        enctype: 'multipart/form-data',
	        previewSettings: {
	        	image: {width: "100px", height: "100px"}
	        }
	    });
	    $("#file").on("fileuploaded", function (event, data, previewId, index) {
	        console.log(data.response+"--"+previewId+"--"+index);
	        $('#file').fileinput('clear');
	    });
		$('#file').on('fileerror', function(event, data, msg) {
		   console.log(data.id);
		   console.log(data.index);
		   console.log(data.file);
		   console.log(data.reader);
		   console.log(data.files);
		   // get message
		   alert(msg);
		});
		
    </script>
    <script type="text/javascript" src="<?php echo $base_url;?>/static/plugins/zTree/js/jquery.ztree.core.js"></script>
    <script type="text/javascript" src="<?php echo $base_url;?>/static/plugins/zTree/js/jquery.ztree.excheck.js"></script>
    <script>
    	var setting = {
			check: {
				enable: true
			},
			data: {
				simpleData: {
					enable: true
				}
			},
			callback: {
				onClick: zTreeOnClick
			}
		};

		var data =[
			{
				name: "父节点1",
				children: [
					{name: "子节点1-1"},
					{name: "子节点2-1"}
				]
			},
			{
				name: "父节点2",
				children: [
					{name: "子节点2-1"},
					{name: "子节点2-2"}
				]
			},
			{
				name: "父节点3",
				children: [
					{name: "子节点3-1"},
					{name: "子节点3-2"}
				]
			}
		];
		
		$(document).ready(function(){
			$.fn.zTree.init($("#tree"), setting, data);//初始化树
		});

		function zTreeOnClick(event, treeId, treeNode) {

			//获取当前选中节点的父节点
			var treeObj = $.fn.zTree.getZTreeObj("tree");
			var sNodes = treeObj.getSelectedNodes();
			if (sNodes.length > 0) {
				var node = sNodes[0].getParentNode();
			}
		    $('#image-heading').empty();
		    $('#image-body').empty();
		    $('#image-heading').append('<p>当前位置: '+node.name+' > '+treeNode.name+'</p>');//添加head路径
		    $('#image-body').append(treeNode.name);//添加到正文
		};
    </script>
	</body>
</html>