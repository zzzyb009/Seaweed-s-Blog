<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" type="text/css" href="/Public/css/initialize.css">
	<link rel="stylesheet" type="text/css" href="/Public/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/Public/css/smain.css">
	<link rel="stylesheet" type="text/css" href="/Public/css/jquery.dialogbox.css">
</head>
<body>
	<div class="main">
		<h3><i class="icon-signal"></i>站点统计</h3>
		<div>
			<table>
				<tr>
					<td><a href="javascript:;"><i class="icon-eye-open"></i>访问次数</a></td><td><a href="javascript:;"><i class="icon-edit"></i>文章数 : <?php echo ($ArticleNum); ?> 篇</a></td><td><a href="javascript:;"><i class="icon-comment"></i>评论数 : <?php echo ($CommentNum); ?> 条</a></td>
				</tr>
				<tr>
					<td><a href="javascript:;"><i class="icon-comments-alt"></i>留言 : <?php echo ($MessageNum); ?> 条</a></td><td><a href="javascript:;"><i class="icon-windows"></i>系统版本 : <?php echo ($WebVersion); ?></a></td><td><a href="javascript:;"><i class="icon-user"></i>作者 : <?php echo ($WebPublisher); ?></a></td>
				</tr>
			</table>
		</div>
		<h3><i class="icon-cogs"></i>站点设置</h3>
		<div class="logo">
			<p><i class="icon-pencil"></i>logo设置:</p>
			<form action="javascript:;" method="post" accept-charset="utf-8" class="cur_logo" id="LogoForm" enctype="multipart/form-data">
				<span>当前logo :</span>
				<img src="<?php echo ($weblogo); ?>" alt="logo" id="curLogo"><img src="" alt="" id="previewLogo" style="display: none">
				<span><label>更改Logo<input type="file" name="changeLogo" value="更改Logo" id="changeLogo" style="display: none"></label></span><span><input type="submit" id="uploadLogo" value="上传Logo"></span>
			</form>
		</div>
		<div class="webname">
			<p><i class="icon-globe"></i>站点名称设置:</p>
			<p>
				<span>当前站点名称：<input type="text" value="<?php echo ($webname); ?>" readonly="true" id="preName"><input type="button" value="更改站点名称" id="ChangeWebName"></span>
			</p>
		</div>
<!-- 		<div id="dialog-content"></div>
		<div id="simple-dialogBox"></div> -->
	</div>
</body>
<script type="text/javascript">
	// let url = "<?php echo U('Admin/Datas/change');?>"
	// let uploadUrl = "<?php echo U('Admin/Datas/logo');?>"
</script>
<script type="text/javascript" src="/Public/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/Public/js/jquery.dialogBox.js"></script>
<script type="text/javascript" src="/Public/js/sdatas.js"></script>
</html>