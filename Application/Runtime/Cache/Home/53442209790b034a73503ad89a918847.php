<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AjaxTest</title>
</head>
<body>
	<input type="button" id="GetMessage" value="GetMessage">
</body>
<script type="text/javascript" src="/Public/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
	$(function(){
		$("#GetMessage").click(function(){
			$.ajax({
				type:'post',
				dataType:'jsonp',
				jsonp:'callback',
				data:{id:'1'},
				// url:"<?php echo U('Home/Ajax/ajaxGetMessage');?>",
				url:"http://www.easyexchange.top/index.php/Home/Ajax/ajaxtest",
				success:function(data){
					alert(data)
				},
				error:function(err){
					console.log(err)
				}
			});
		});
	});
</script>
</html>