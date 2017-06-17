<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<title>Seaweed's web</title>
	<link rel="shortcut icon" href="/Public/images/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="/Public/css/initialize.css">
	<link rel="stylesheet" type="text/css" href="/Public/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/Public/css/sarticleList.css">
	<link rel="stylesheet" type="text/css" href="/Public/css/swrite.css">
</head>
<body>
	<div class="main">
		<h3><i class="icon-file"></i>文章列表</h3>
		<div class="articleList">
			<ul>
				<?php if(is_array($list)): foreach($list as $key=>$v): ?><li><a href="javascript:;"><input type="hidden" name="articleid" value="<?php echo ($v["articleid"]); ?>"><i class="icon-circle"></i><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>
			</ul>
		</div>
	</div>
</body>
<script type="text/javascript" src="/Public/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/Public/js/jquery.dialogBox.js"></script>
<script type="text/javascript" src="/Public/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/Public/js/sarticleList.js"></script>
</html>