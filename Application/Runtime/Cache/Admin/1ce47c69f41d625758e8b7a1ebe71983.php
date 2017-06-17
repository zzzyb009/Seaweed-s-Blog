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
	<link rel="stylesheet" type="text/css" href="/Public/css/suserMan.css">
</head>
<body>
	<div class="main">
		<h3><i class="icon-group"></i>用户列表</h3>
		<div class="userList">
			<table>
				<tr>
					<th>编号</th><th>登陆用户名</th><th>权限组</th><th>联系邮箱</th><th>微信</th><th>操作</th>
				</tr>
				<?php if(is_array($AdminInfo)): foreach($AdminInfo as $key=>$v): ?><tr>
						<td><?php echo ($v["id"]); ?></td><td><?php echo ($v["username"]); ?></td><td><?php echo ($v["level"]); ?></td><td><?php echo ($v["email"]); ?></td><td><?php echo ($v["wechat"]); ?></td><td><i class="icon-edit"></i><i class="icon-trash"></i></td>
					</tr><?php endforeach; endif; ?>
			</table>
		</div>
		<div id="dialog-content"></div>
		<h3><i class="icon-plus"></i>新增用户</h3>
		<div class="addUser">
			<form action="javascript:;" method="post" accept-charset="utf-8" id="addAdmin">
				<p>
					<span>登陆用户名</span>
					<input type="text" name="username" value="" placeholder="登陆用户名">
				</p>
				<p>
					<span>权限组</span>
					<select name="level">
						<option value="1">1</option>
						<option value="2">2</option>
					</select>
				</p>
				<p>
					<span>联系邮箱</span>
					<input type="email" name="email" value="" placeholder="联系邮箱">
				</p>
				<p>
					<span>微信</span>
					<input type="text" name="wechat" value="" placeholder="微信">
				</p>
				<p>
					<span>密码</span>
					<input type="password" name="password" id="password" placeholder="密码">
				</p>
				<p>
					<span>确认密码</span>
					<input type="password" id="passwordAgain" placeholder="确认密码">
				</p>
				<p><input type="submit" name="submit" value="增加">
				<input type="reset" name="reset" value="取消"></p>
			</form>
		</div>
	</div>
</body>
<script type="text/javascript" src="/Public/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/Public/js/jquery.dialogBox.js"></script>
<script type="text/javascript" src="/Public/js/suserMan.js"></script>
</html>