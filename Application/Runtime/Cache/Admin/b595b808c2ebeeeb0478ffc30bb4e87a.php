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
	<link rel="stylesheet" type="text/css" href="/Public/css/sindex.css">
	<link rel="stylesheet" type="text/css" href="/Public/css/jquery.dialogBox.css">
</head>
<body>
	<div class="container">
		<h4><img src="<?php echo ($Weblogo); ?>" id="topLogo"><a href="javascript:;" id="WebName"><?php echo ($Webinfo); ?></a> Management Center<span>Welcome,&nbsp;<i class="icon-user"></i><?php echo (session('uname')); ?><a href="javascript:;" id="Logout">Logout</a></span></h4>
		<div class="meuns">
			<ul>
				<li id="WebInfo"><a href="#WebInfo"><i class="icon-bar-chart"></i>站点数据</a></li>
				<li id="webIndex"><a href="<?php echo U('Home/index/index');?>" target="_blank"><i class="icon-home"></i>前端首页</a></li>
				<li id="ArticleList"><a href="#ArticleList"><i class="icon-file"></i>文章列表</a></li>
				<li id="WriteArticle"><a href="#WriteArticle"><i class="icon-edit"></i>发表文章</a></li>
				<li id="ArticleClassify"><a href="#ArticleClassify"><i class="icon-bookmark-empty"></i>文章类别管理</a></li>
				<li id="MessageManagement"><a href="#MessageManagement"><i class="icon-comments"></i>留言管理</a></li>
				<li id="UserManager"><a href="#UserManager"><i class="icon-group"></i>用户管理</a></li>
				<li id="VersionList"><a href="#VersionList"><i class="icon-smile"></i>版本列表</a></li>
			</ul>
		</div>
		<!-- 加载其他页面的内容 -->
		<div id="content">
			
		</div>
		<div id="btn-dialogBox"></div>
		<div id="dialog-content" class="none"></div>
		<div id="simple-dialogBox" class="none"></div>
	</div>
</body>
<script type="text/javascript" src="/Public/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
	// index.html
	let WebInfo = "<?php echo U('Admin/Datas/datas');?>"
	let ArticleList = "<?php echo U('Admin/Article/articlel');?>"
	let WriteArticle = "<?php echo U('Admin/Article/articlew');?>"
	let ArticleClassify = "<?php echo U('Admin/Article/articlec');?>"
	let MessageManagement = "<?php echo U('Admin/Message/messageMan');?>"
	let UserManager = "<?php echo U('Admin/User/userMan');?>"
	let VersionList = "<?php echo U('Admin/Version/versionList');?>"
	let logout = "<?php echo U('Admin/Login/logout');?>"
	let Login = "<?php echo U('Admin/Login/login');?>";
	// writeArticle.html
    let ArticleUrl = "<?php echo U('Admin/Article/articleAdd');?>";
    // datas.html
	let ChangeNameUrl = "<?php echo U('Admin/Datas/change');?>"
	let LogoUrl = "<?php echo U('Admin/Datas/logo');?>"
	// ArticleClassify.html
	let ChangeClassifyUrl = "<?php echo U('Admin/Article/changeClassify');?>";
	// ArticleList.html
	let getArticleUrl = "<?php echo U('Admin/Article/getArticleCon');?>";
	let SaveArticleUrl = "<?php echo U('Admin/Article/saveArticle');?>"
	// userMan.html
	let AddAdminUrl = "<?php echo U('Admin/User/addAdmin');?>";
	let DeleteAdminUrl = "<?php echo U('Admin/User/deleteAdmin');?>";
	let UpdataAdminUrl = "<?php echo U('Admin/User/updateAdmin');?>";
	// version.html
	let NewVersionUrl = "<?php echo U('Admin/Version/publishNewVersion');?>"
	// message.html
	let answerMessageUrl = "<?php echo U('Admin/Message/answerMessage');?>"
	let deleteMessageUrl = "<?php echo U('Admin/Message/deleteMessage');?>"
</script>
<script type="text/javascript" src="/Public/js/jquery.dialogBox.js"></script>
<script type="text/javascript" src="/Public/js/sroot.js"></script>
<script type="text/javascript" src="/Public/js/sindex.js"></script>
</html>