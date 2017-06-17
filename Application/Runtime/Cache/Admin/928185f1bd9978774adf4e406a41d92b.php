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
	<link rel="stylesheet" type="text/css" href="/Public/css/sversionList.css">
</head>
<body>
	<div class="main">
		<h3><i class="icon-smile"></i>版本信息列表</h3>
		<div class="versionList">
			<ul>
				<?php if(is_array($versionInfo)): foreach($versionInfo as $key=>$v): ?><li>
						<p><span>版本序号</span><span><?php echo ($v["versionid"]); ?></span></p>
						<p><span>更新次数</span><span>第<?php echo ($v["versiontimes"]); ?>次更新</span></p>
						<p><span>更新内容</span><span><?php echo ($v["content"]); ?></span></p>
						<p><i class="icon-user"></i>发布人：<?php echo ($v["publisher"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-time"></i>发布时间：<?php echo (date('Y-m-d H:i:s',$v["publishtime"])); ?></p>
					</li><?php endforeach; endif; ?>
			</ul>
		</div>
		<h3><i class="icon-smile"></i>发布新版本</h3>
		<div class="newVersion">
			<form action="javascript:;" method="post" accept-charset="utf-8" id="newVersionForm">
				<p><span>当前版本号</span><input type="text" readonly="true" style="cursor:not-allowed;" value="<?php echo ($versionid); ?>"></p>
				<p><span>新版版本号</span><input type="text" name="versionid" placeholder="v x.x.x"></p>
				<p><span>更新内容</span><textarea name="content"></textarea></p>
				<p><span>发布人</span><input type="text" name="publisher" value="<?php echo (session('uname')); ?>" readonly="true" style="cursor:not-allowed;"></p>
				<p><input type="submit" name="submit" value="发布"><input type="reset" name="reset" value="取消"></p>
			</form>
		</div>
	</div>
</body>
<script type="text/javascript" src="/Public/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/Public/js/sversion.js"></script>
</html>