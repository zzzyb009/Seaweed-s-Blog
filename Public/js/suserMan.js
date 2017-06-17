/*
* @Author: zyb
* @Date:   2017-05-24 00:17:23
* @Last Modified by:   zyb
* @Last Modified time: 2017-06-03 15:27:02
*/

'use strict';
$(function(){
	// 编辑用户
	let edit = $(".icon-edit");
	for(let i = 0, a; a = edit[i++];){
		$(a).click(function(){
			let getTdCon = $(a).parents('tr').children('td');
			let $getTdCon = [];
			for(let j = 0, b; b = getTdCon[j++];){
				$getTdCon[j] = $(b).html();
			}
			$("#dialog-content").dialogBox({
				width:400,
				hasClose: true,
				hasMask: true,
				hasBtn: true,
				confirmValue: '确定',
				confirm: function(){
					$.post({
						type:'post',
						dataType:'json',
						data:$('#editAdminInfo').serialize(),
						url:UpdataAdminUrl,
						success:function(data){
							if (data !== '0') {
								$('#simple-dialogBox').dialogBox({
									width:400,
									autofadeOut:true,
									time:1000,
									content: '修改成功',
								})
							}else{
								$('#simple-dialogBox').dialogBox({
									width:400,
									autofadeOut:true,
									time:1000,
									content: '修改失败',
								})
							}
							$(a).parents('tr').children('td:nth-child(4)').html(data.email)
							$(a).parents('tr').children('td:nth-child(5)').html(data.wechat)
						},
						error:function(err){
							$('#simple-dialogBox').dialogBox({
								width:400,
								autofadeOut:true,
								time:1000,
								content: '系统错误',
							})
						}
					});
				},
				cancel:function(){},
				cancelValue: '取消',
				title: '用户信息编辑',
				content:"<form id='editAdminInfo'><table><tr><td>编号</td><td><input type='text' name='id' value='"+$getTdCon['1']+"' readonly='true' style='color:gray;cursor:not-allowed'></td></tr><tr><td>登陆用户名</td><td><input type='text' name='username' value='"+$getTdCon['2']+"' readonly='true' style='color:gray;cursor:not-allowed'></td></tr><tr><td>权限组</td><td><input type='text' name='level' value='"+$getTdCon['3']+"' readonly='true' style='color:gray;cursor:not-allowed'></td></tr><tr><td>联系邮箱</td><td><input type='text' name='email' value='"+$getTdCon['4']+"'></td></tr><tr><td>微信</td><td><input type='text' name='wechat' value='"+$getTdCon['5']+"' style=''></td></tr></table></form>"
			});
		});
	}
	//删除用户
	let deleteUser = $(".icon-trash");
	for(let k = 0,c; c = deleteUser[k++];){
		$(c).click(function() {
			$("#dialog-content").dialogBox({
				width:400,
				hasClose: true,
				hasMask: true,
				hasBtn: true,
				confirmValue: '确定',
				confirm: function(){
					$.post({
						type:'post',
						dataType:'json',
						data:{id:$(c).parents('tr').children('td').html()},
						url: DeleteAdminUrl,
						success:function(data){
							console.log(data)
							$('#simple-dialogBox').dialogBox({
								width:400,
								autofadeOut:true,
								time:2000,
								content: '删除成功',
							});
							$(c).parents('tr').remove();
						},
						error:function(err){
							console.log(err)
							$('#simple-dialogBox').dialogBox({
								width:400,
								autofadeOut:true,
								time:2000,
								content: '删除失败，系统出错',
							})
						}
					});
				},
				cancel:function(){},
				cancelValue: '取消',
				title: '删除用户',
				content:"确定删除？"
			});
		});
	}
	// 增加用户
	$("#addAdmin").submit(function(event){
		event.preventDefault();
		// console.log($("#addAdmin").serialize())
		if ($("#password").val() == $("#passwordAgain").val()) {
			$.post({
				type:'post',
				dataType:'json',
				data:$("#addAdmin").serialize(),
				url:AddAdminUrl,
				success:function(data){
					console.log(data)
					$('#simple-dialogBox').dialogBox({
						width:400,
						autofadeOut:true,
						time:2000,
						content: '增加成功',
					});
				},
				error:function(err){
					$('#simple-dialogBox').dialogBox({
						width:400,
						autofadeOut:true,
						time:2000,
						content: '系统错误',
					});
				}
			});
		}else{
			$('#simple-dialogBox').dialogBox({
				width:400,
				autofadeOut:true,
				time:2000,
				content: '两次输入的密码不一致',
			});
		}
	});
});