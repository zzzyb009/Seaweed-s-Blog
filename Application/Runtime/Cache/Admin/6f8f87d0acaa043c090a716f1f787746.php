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
	<link rel="stylesheet" type="text/css" href="/Public/css/jquery.dialogbox.css">
	<link rel="stylesheet" type="text/css" href="/Public/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/Public/css/smessgeMan.css">
</head>
<body>
	<div class="main">
		<h3><i class="icon-comments"></i>留言管理</h3>
		<!-- message management -->
		<div class="mmm">
			<ul>
				<?php if(is_array($Messages)): foreach($Messages as $key=>$v): if($v["pid"] == 0): ?><li>
							<p>留言号：<?php echo ($v["mid"]); ?></p>
							<img src="<?php echo ($v["avatar"]); ?>" alt="">
							<span><i class="icon-time"></i><?php echo (date('Y/m/d H:i:s',$v["mtime"])); ?><a href="javascript:;" class="nickname"><i class="icon-user"></i><?php echo ($v["nickname"]); ?></a><a href="javascript:;" class="messageid"><i class="icon-leaf"></i><?php echo ($v["id"]); ?></a><a href="javascript:;" class="deleteMessage"><i class="icon-trash"></i>删除</a></span>
							<input type="hidden" value="<?php echo ($v["mid"]); ?>">
							<span><?php echo ($v["content"]); ?><a href="javascript:;" class="answerMessage">回复</a></span>
						</li>
					<?php else: ?>
						<li style="margin-left:40px;">
							<img src="<?php echo ($v["avatar"]); ?>" alt="">
							<span><i class="icon-time"></i><?php echo (date('Y/m/d H:i:s',$v["mtime"])); ?><a href="javascript:;" class="nickname"><i class="icon-user"></i><?php echo ($v["nickname"]); ?></a><a href="javascript:;" class="messageid"><i class="icon-leaf"></i><?php echo ($v["id"]); ?></a><a href="javascript:;" class="deleteMessage"><i class="icon-trash"></i>删除</a></span>
							<input type="hidden" value="<?php echo ($v["mid"]); ?>">
							<span><?php echo ($v["content"]); ?><a href="javascript:;" class="answerMessage">回复</a></span>
						</li><?php endif; endforeach; endif; ?>
			</ul>
		</div>
	</div>
</body>
<script type="text/javascript" src="/Public/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/Public/js/jquery.dialogBox.js"></script>
<script type="text/javascript" src="/Public/js/smessageMan.js"></script>
</html>