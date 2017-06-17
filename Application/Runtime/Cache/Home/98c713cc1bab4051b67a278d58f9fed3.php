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
	<link rel="stylesheet" type="text/css" href="/Public/css/Public.css">
	<link rel="stylesheet" type="text/css" href="/Public/css/index.css">
	<link rel="stylesheet" type="text/css" href="/Public/css/articles.css">
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
			<small>当前位置：<a href="<?php echo U('Home/Index/index');?>"><i class="icon-home"></i>&nbsp;网站首页</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="javascript:;"><i class="icon-list-alt"></i>&nbsp;文章列表</a></small>
		</div>
		<div class="clasifys">
			<h3>文章分类</h3>
			<ul>
				<?php if(is_array($ArticleClassify)): foreach($ArticleClassify as $key=>$v): ?><li><a href="<?php echo U('Home/Article/articleList',array('classify' => $v['classify']));?>"><?php echo ($v["classify"]); ?><span class="num">共有<?php echo ($v["num"]); ?>篇</span></a></li><?php endforeach; endif; ?>
			</ul>
		</div>
		<div class="articlelist">
			<h4>文章列表</h4>
			<!-- <h4>文章列表<small><a href="javascript:;">按时间</a></small><small><a href="javascript:;">按浏览量</a></small></h4> -->
			<ul>
				<?php if(is_array($Articles)): foreach($Articles as $key=>$v): ?><li>
						<p class="articletitle">
						<?php if($v["orignal"] == 1): ?>【原创】
						<?php else: ?>【非原创】<?php endif; ?>
						<a href="<?php echo U('Home/Article/articledetail',array('articleid' => $v['articleid']));?>"><?php echo ($v["title"]); ?></a></p>
						<div class="articleimg">
							<a href="<?php echo U('Home/Article/articledetail',array('articleid' => $v['articleid']));?>">
								<div class="bgimg" style="background-image: url('<?php echo ($v["img"]); ?>');"></div>
							</a>
						</div>
						<div class="articleinfo">
							<?php echo ($v["summary"]); ?>
						</div>
						<p class="articletag">
							<i class="icon-tag"></i><small><?php echo ($v["keyword"]); ?></small>
							<i class="icon-time"></i><small><?php echo (date("Y-m-d H:i:s",$v["addtime"])); ?></small>
							<i class="icon-eye-open"></i><small><?php echo ($v["view"]); ?></small>
							<small class="readmore"><a href="<?php echo U('Home/Article/articledetail',array('articleid' => $v['articleid']));?>">阅读全文<i class="icon-arrow-right"></i></a></small>
						</p>
					</li><?php endforeach; endif; ?>
			</ul>
		</div>
		<!-- <div class="message">
			<h3>留言板</h3>
			<ul>
				<li>
					<a href="javascript:;"><img src="/Public/images/logo.jpeg"></a>
					<div><i class="icon-comments-alt"></i>Seaweed&nbsp;<i class="icon-time"></i>2017-05-07</div>
					<div><a href="javascript:;">随便说点什么</a></div>
				</li>
				<li>
					<img src="/Public/images/logo.jpeg">
					<div><i class="icon-comments-alt"></i>Seaweed&nbsp;<i class="icon-time"></i>2017-05-07</div>
					<div><a href="javascript:;">随便说点什么</a></div>
				</li>
				<li>
					<img src="/Public/images/logo.jpeg">
					<div><i class="icon-comments-alt"></i>Seaweed&nbsp;<i class="icon-time"></i>2017-05-07</div>
					<div><a href="javascript:;">随便说点什么</a></div>
				</li>
			</ul>
		</div> -->
		<div class="links">
			<h3>碎碎念</h3>
			<ul>
				<li><a href="javascript:;"><i class="icon-link"></i>我有一只小毛驴，我从来也不骑，有一天我心血来潮绮他去看戏~~~ </a></li>
			</ul>
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
<script type="text/javascript" src="/Public/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/Public/js/jquery.dialogBox.js"></script>
<script type="text/javascript" src="/Public/js/public.js"></script>
<script type="text/javascript" src="/Public/js/articles.js"></script>
</html>