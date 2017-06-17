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
	<link rel="stylesheet" type="text/css" href="/Public/css/jquery.dialogbox.css">
	<link rel="stylesheet" type="text/css" href="/Public/css/sarticleClassify.css">
</head>
<body>
	<div class="main">
		<h3><i class="icon-bookmark-empty"></i>文章类别管理</h3>
		<div class="articleClassifyList">
			<ul>
			<?php if(is_array($ArticleC)): foreach($ArticleC as $key=>$v): ?><li><i class="icon-circle-blank"></i><strong><?php echo ($v["classify"]); ?></strong><span>现有文章<?php echo ($v["num"]); ?>篇</span><span class="edit"><a href="javascript:;"><i class="icon-edit"></i>编辑分类</a></span><span class="delete"></li><?php endforeach; endif; ?>
			</ul>
		</div>
		<!-- <h3><i class="icon-cog"></i>新增分类</h3>
		<div class="addClassify">
			<form action="javascript:;" method="get" accept-charset="utf-8">
				<p><span>新增分类</span><input type="text" name="newClassify"><input type="submit" value="确认"><input type="reset" value="取消"></p>
			</form>
		</div> -->
	</div>
<!-- 		<div id="dialog-content" class="none"></div>
		<div id="simple-dialogBox" class="none"></div> -->
</body>
<script type="text/javascript">
	// let changeClassifyurl = "<?php echo U('Admin/Article/changeClassify');?>";
</script>
<script type="text/javascript" src="/Public/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/Public/js/jquery.dialogBox.js"></script>
<script type="text/javascript" src="/Public/js/sarticleClassify.js"></script>
</html>