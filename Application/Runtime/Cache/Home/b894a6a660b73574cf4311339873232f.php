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
	<link rel="stylesheet" type="text/css" href="/Public/css/public.css">
	<link rel="stylesheet" type="text/css" href="/Public/css/message.css">
	<script type="text/javascript" src="/Public/ckeditor/ckeditor.js"></script>
</head>
<body>
	<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Seaweed's web</title>
        <link rel="shortcut icon" href="/Public/images/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="/Public/css/initialize.css">
        <link rel="stylesheet" type="text/css" href="/Public/css/jquery.dialogBox.css">
        <link rel="stylesheet" type="text/css" href="/Public/css/public.css">
    </head>
    <body>
        <div id="marks"></div>
        <div id="dialog-content"></div>
        <div id="simple-dialogBox"></div>
        <div id="LoginDiv">
            <h6><i class="icon-ban-circle" alt="关闭"></i></h6>
            <iframe name="QQlogins" id="QQlogins"></iframe>
        </div>
        <header class="header">
            <img src="<?php echo ($WebInfo["0"]["weblogo"]); ?>" alt="Seaweed's Web">
            <span><?php echo ($WebInfo["0"]["webname"]); ?></span>
            <ul>
                <!-- <li><a href="javascript:;" class="amouseon">首页</a></li> -->
                <li><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
                <li><a href="<?php echo U('Home/Article/articlelist');?>">文章</a></li>
                <li><a href="<?php echo U('Home/Message/message');?>">留言</a></li>
                <li id="userInfo">
                    <?php if(empty( $_SESSION['nickname'])): ?><a href="https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=101401635&redirect_uri=http://localhost/index.php/Home/QQLogin/callBack&state=123&scope=get_user_info" id="QQLogin" target="QQlogins"><img src="/Public/images/Connect_logo_1.png" style="width: 16px;height: 16px;float: left;margin:25px 0;">QQ登录</a>
                    <?php else: ?><a href="javascript:;"><?php echo (session('nickname')); ?><img src="<?php echo (session('avatar')); ?>" id="avatar"></a><i class="icon-ban-circle"></i><?php endif; ?>
                </li>
            </ul>
    	</header><!-- /header -->
    </body>
    <script type="text/javascript">
        let checkQQLoginUrl = "<?php echo U('Home/QQLogin/checkLogin');?>"
        let qqLogoutUrl = "<?php echo U('Home/QQLogin/qqlogout');?>";
        let makeCommentUrl = "<?php echo U('Home/Article/makeComment');?>"
        let answerCommentUrl = "<?php echo U('Home/Article/answerComment');?>";
        let leaveMessageUrl ="<?php echo U('Home/Message/leaveMessage');?>";
        let answerMessageUrl ="<?php echo U('Home/Message/answerMessage');?>";
        
    </script>
    <script type="text/javascript" src="/Public/js/jquery-3.2.1.min.js"></script>
<!--     <script type="text/javascript" src="/Public/js/jquery.dialogBox.js"></script>
    <script type="text/javascript" src="/Public/js/public.js"></script> -->
</html>
	<div class="container">
		<div class="urls">
			<small>
			当前位置：<a href="<?php echo U('Home/Index/index');?>"><i class="icon-home"></i>&nbsp;网站首页</a>
			&nbsp;&nbsp;/&nbsp;&nbsp;
			<a href="javascript:;"><i class="icon-comments"></i>&nbsp;留言</a>
			</small>
		</div>
		<div class="message">
			<h4>留言</h4>
			<div class="messages">
				<ul id="messageUl">
					<?php if(is_array($Messages)): foreach($Messages as $key=>$v): if($v["pid"] == 0): ?><li style="border-top:1px solid gray;">
							<input type="hidden" value="<?php echo ($v["mid"]); ?>">
							<img src="<?php echo ($v["avatar"]); ?>">
							<p><small><i class="icon-time"></i><?php echo (date("Y/m/d H:i:s",$v["mtime"])); ?></small></p>
							<p><span><?php echo ($v["nickname"]); ?></span> : <?php echo ($v["content"]); ?> <a href="javascript:;" class="answerMessage">回复</a></p>
						<?php else: ?>
							<li style="margin-left: 40px;">
							<input type="hidden" value="<?php echo ($v["mid"]); ?>">
							<img src="<?php echo ($v["avatar"]); ?>">
							<p><small><i class="icon-time"></i><?php echo (date("Y/m/d H:i:s",$v["mtime"])); ?></small></p>
							<p><span><?php echo ($v["nickname"]); ?></span> @ <?php echo ($v["to"]); ?> : <?php echo ($v["content"]); ?> <a href="javascript:;" class="answerMessage">回复</a></p><?php endif; ?>
						</li><?php endforeach; endif; ?>
				</ul>
			</div>
		</div>
		<div class="makeMess">
			<h4>留下脚印</h4>
			<textarea id="editor1" name="articleContent"></textarea>
			<p><input type="button" value="提交" id="leaveMessage"></p>
		</div>
	</div>
	<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Seaweed's web</title>
        <link rel="shortcut icon" href="/Public/images/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="/Public/css/initialize.css">
        <link rel="stylesheet" type="text/css" href="/Public/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/Public/css/public.css">
    </head>
    <body>
    	<footer>
            <i class="icon-arrow-up toTop" style="display: none;"></i>
    		<div class="footer_content">
    			<h4>站点统计</h4>
    			<p><span><i class="icon-info-sign"></i> 建站：0天</span><span><i class="icon-pencil"></i> 文章：<?php echo ($CountArticle); ?>篇</span></p>
    			<p><span><i class="icon-tags"></i> 访问：0次</span><span><i class="icon-envelope"></i> 留言：<?php echo ($CountMessage); ?>条</span></p>
    			<p><span><i class="icon-comment"></i> 评论：<?php echo ($CountComment); ?>个</span><span><i class="icon-link"></i> 链接：<?php echo ($CountLinkds); ?>个</span></p>
    			<p></p>
    		</div>
    		<div class="footer_content">
    			<h4>程序交流</h4>
    			<p><span><i class="icon-cog"></i> 程序：Seaweed's Blog</span><span><i class="icon-flag"></i> 框架：Thinkphp</span></p>
    			<p><span><i class="icon-cogs"></i> 编码：utf-8</span><span><i class="icon-user"></i> 作者：Seaweed</span></p>
    			<p><span><i class="icon-globe"></i> 语言：PHP/Mysql</span><span><i class="icon-comments"></i> 微信：LDW-Zyb</span></p>
    		</div>
    		<h4><span>&copy;2017  Seaweed's Blog All Rights Reserved</span><span><a href="###"><i class="icon-home"></i> 管理登陆</a> | 粤ICP备17005904号</span></h4>
    	</footer>
    </body>
    <script type="text/javascript" src="/Public/js/jquery-3.2.1.min.js"></script>
    <!-- <script type="text/javascript" src="/Public/js/public.js"></script> -->
</html>
</body>
<script type="text/javascript">
    CKEDITOR.replace( 'editor1',{
    	toolbar :
        [
            ['Bold','Italic','Underline'],['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],['FontSize'],
        ]
    }); 
</script>
<script type="text/javascript" src="/Public/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/Public/js/jquery.dialogBox.js"></script>
<script type="text/javascript" src="/Public/js/public.js"></script>
<script type="text/javascript" src="/Public/js/message.js"></script>
</html>