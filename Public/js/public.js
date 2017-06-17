/*
* @Author: zyb
* @Date:   2017-05-11 14:18:39
* @Last Modified by:   zyb
* @Last Modified time: 2017-06-08 15:14:59
*/
$(function(){
	$(".header").on("click","#QQLogin",function(){
		$("#LoginDiv").fadeIn(800);
		$("#marks").fadeIn(800);
	});
	$(".icon-ban-circle").click(function(){
		$("#LoginDiv").fadeOut(800);
		$("#marks").fadeOut(800);
	});
	$(document).scroll(function(event) {
		if ($(document).scrollTop() > 100) {
			$('.toTop').fadeIn(1000);
		}
		if ($(document).scrollTop() < 100) {
			$('.toTop').fadeOut(1000);
		}
	});
	
	$('.toTop').click(function(event) {
		$('body').animate({scrollTop:0},1000);
	});

	$(".header").on('click', '.icon-ban-circle', function(event) {
		$('#dialog-content').dialogBox({
			hasClose: true,
			hasBtn: true,
			confirmValue: '退出',
			confirm: function(){
				$.post({
					type:'post',
					dataType:'json',
					data:{'logout':'1'},
					url:qqLogoutUrl,
					success:function(data){
						if (data == 1) {
							$("#userInfo").html("<a href='https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=101401635&redirect_uri=http://localhost/index.php/Home/QQLogin/callBack&state=123&scope=get_user_info' id='QQLogin' target='QQlogins'><img src='/Public/images/Connect_logo_1.png' style='width: 16px;height: 16px;float: left;margin:25px 0;'>QQ登录</a>");
							$('#simple-dialogBox').dialogBox({
								autofadeOut: true,
								time: 1000,
								content: '已退出QQ登录'
							});
						}
					},
					error:function(err){
						$('#simple-dialogBox').dialogBox({
							autoHide: true,
							time: 1500,
							content: '系统错误'
						});
					}
				});
			},
			cancelValue: '取消',
			title: '退出登录',
			content: '确认退出QQ？'
		});
	})
		
});