/*
* @Author: zyb
* @Date:   2017-05-26 14:41:54
* @Last Modified by:   zyb
* @Last Modified time: 2017-05-26 16:12:56
*/

'use strict';
$(function(){
	$('#Logout').click(function(){
		$('#btn-dialogBox').dialogBox({
			width:400,
			hasClose: true,
			hasBtn: true,
			confirmValue: 'Yes',
			confirm: function(){
				$.post({
					type:'post',
					dataType:'json',
					url:logout,
					data:{quit:1},
					success:function(data){
						if (data == 1) {
							window.location.href=Login;
						}else{
							alert("系统错误404")
						}
					},
					error:function(data){
						console.log(data)
					}
				});
			},
			cancelValue: 'No',
			cancel:function(){},
			title: '退出登录',
			content: '确认退出？'
		});
	});
});