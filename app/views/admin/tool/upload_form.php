<html>
	<head>
		<title>Upload Form</title>
	</head>
	<link href="<?php echo $base_url;?>/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url;?>/static/plugins/fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <style type="text/css">
    	.file-drop-zone{
    		overflow-y: auto;
    	}
    </style>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2" style="height:300px;">
					<input id="file" name="file" type="file" multiple class="file">	
				</div>
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
	</body>
</html>