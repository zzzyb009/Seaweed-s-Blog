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
	<link rel="stylesheet" type="text/css" href="/Public/css/swrite.css">
	<script type="text/javascript" src="/Public/ckeditor/ckeditor.js"></script>
</head>
<body>
	<div class="main">
		<h3><i class="icon-edit"></i>发表文章</h3>
		<div class="writeArticle">
			<form action="javascript:;" id="newArticle" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<p><span>文章标题</span><input type="text" name="title"></p>
				<p><span>文章关键词</span><input type="text" name="keyword"></p>
				<p><span>文章梗概</span><input type="text" name="summary"></p>
				<p><span>是否原创</span><span>是<input type="radio" name="orignal" value="1"></span><span>否<input type="radio" name="orignal" value="0"></span></p>
				<p>
					<span>发表类别</span>
					<select name="classify" style="width: 50%" id="classify">
						<?php if(is_array($ArticleC)): foreach($ArticleC as $key=>$v): ?><option value="<?php echo ($v["classify"]); ?>"><?php echo ($v["classify"]); ?></option><?php endforeach; endif; ?>
					</select>
					<button type="button" id="newClassify">添加新类</button>
				</p>
				<p><span>文章作者</span><input type="text" name="author"></p>
				<p>
					<span>封面</span><img src="/Public/images/a.jpg" id="preArticlePic">
					<label>更改封面<input type="file" name="articlePic" id="articlePic"></label>
				</p>
				<textarea id="editor1"></textarea>
				<p><input type="submit" value="发表文章" id="submit"><input type="reset" value="取消" id="reset"></p>
			</form>
		</div>
	</div>
	<!-- <div id="simple-dialogBox"></div> -->
</body>
<script type="text/javascript" src="/Public//js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/Public/js/jquery.dialogBox.js"></script>
<script type="text/javascript" src="/Public/js/swriteArticle.js"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'editor1',{
    	height:'450px',
    	filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
		filebrowserUploadUrl: "<?php echo U('Admin/Article/ckupload');?>",
    }); 
    // let ArticleUrl = "<?php echo U('Admin/Article/articleAdd');?>";
</script>  
<!-- ckfinder的相关js -->
<script>
    // Helper function to get parameters from the query string.
    function getUrlParam( paramName ) {
        var reParam = new RegExp( '(?:[\?&]|&)' + paramName + '=([^&]+)', 'i' );
        var match = window.location.search.match( reParam );

        return ( match && match.length > 1 ) ? match[1] : null;
    }
    // Simulate user action of selecting a file to be returned to CKEditor.
    function returnFileUrl() {
        var funcNum = getUrlParam( 'CKEditorFuncNum' );
        var fileUrl = '/path/to/file.txt';
        window.opener.CKEDITOR.tools.callFunction( funcNum, fileUrl );
        window.close();
    }
</script>
</html>