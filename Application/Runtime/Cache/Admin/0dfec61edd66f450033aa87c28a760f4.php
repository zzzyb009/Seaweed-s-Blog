<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="format-detection" content="telephone=no">
<title>Seaweed's web</title>
<link rel="shortcut icon" href="/Public/images/favicon.ico"/>
<link rel="stylesheet" type="text/css" href="/Public/css/jquery.dialogbox.css">
<link rel="stylesheet" href="/Public/css/jq22.css">
</head>
<body>
<!-- begin -->
<h1>Seaweed's Blog</h1>
<div id="login">
    <div class="wrapper">
        <div class="login">
            <form action="#" method="post" class="container offset1 loginform" id="adminForm">
                <div id="owl-login">
                    <div class="hand"></div>
                    <div class="hand hand-r"></div>
                    <div class="arms">
                        <div class="arm"></div>
                        <div class="arm arm-r"></div>
                    </div>
                </div>
                <div class="pad">
                    <div class="control-group">
                        <div class="controls">
                            <label for="text" class="control-label fa fa-user"></label>
                            <input id="text" type="text" name="username" placeholder="Username" tabindex="1" autofocus="autofocus" class="form-control input-medium">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label for="password" class="control-label fa fa-asterisk"></label>
                            <input id="password" type="password" name="password" placeholder="Password" tabindex="2" class="form-control input-medium">
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <!-- <a href="#" tabindex="5" class="btn pull-left btn-link text-muted">Forgot password?</a>
                    <a href="#" tabindex="6" class="btn btn-link text-muted">Sign Up</a> -->
                    <button type="submit" tabindex="4" class="btn btn-primary" id="In">Login</button>
                </div>
            </form>
        </div>
    </div>
    <div id="simple-dialogBox"></div>
    <div id="mask-dialogBox"></div>
    <script src="/Public/js/jquery.min.js"></script>
    <script>
    $(function() {
        $('#login #password').focus(function() {
            $('#owl-login').addClass('password');
        }).blur(function() {
            $('#owl-login').removeClass('password');
        });
    });
    </script>
</div>
<!-- end -->
</body>
<script type="text/javascript" src="/Public/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/Public/js/login.js"></script>
<script type="text/javascript" src="/Public/js/jquery.dialogBox.js"></script>
<script type="text/javascript">
    let url = "<?php echo U('Login/checkLogin');?>";
    let url1 = "<?php echo U('Index/index');?>";
</script>
</html>