/*
* @Author: zyb
* @Date:   2017-05-26 11:13:48
* @Last Modified by:   zyb
* @Last Modified time: 2017-05-26 14:16:51
*/

'use strict';
$(function(){
	$('#adminForm').submit(function(event) {
		event.preventDefault();
		let Fd = $("#adminForm").serialize();
		$.post({
			type:'post',
			data:Fd,
			dataType:'json',
			url:url,
			success:function(data){
				if (data.error == 0) {
					$('#simple-dialogBox').dialogBox({
						width:400,
						content: '欢迎回来，'+data.data
					});
					setTimeout("window.location.href=url1",1500)
				}else if(data.error == 1){
					$('#mask-dialogBox').dialogBox({
						width:400,
						hasClose: true,
						hasMask: true,
						title: "登陆失败",
						content: data.data
					});
				}
			},
			error:function(err){
				console.log(err);
				$('#simple-dialogBox').dialogBox({
					width:400,
					content: "系统错误404"
				});
			}
		});
	});
});
