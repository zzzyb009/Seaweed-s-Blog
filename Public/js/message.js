/*
* @Author: zyb
* @Date:   2017-06-09 23:40:19
* @Last Modified by:   zyb
* @Last Modified time: 2017-06-11 18:25:14
*/

'use strict';
$(function(){
	// jq转化时间戳
	function getLocalTime(nS) {     
		return new Date(parseInt(nS) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ");
	}
	$("#leaveMessage").click(function(){
		// console.log(CKEDITOR.instances.editor1.getData())
		if (CKEDITOR.instances.editor1.getData() == "") {
			$('#simple-dialogBox').dialogBox({
				width:400,
				autofadeOut:true,
				time:1500,
				content: '输入内容为空!',
			});
			return false;
		}
		$.ajax({
			type:'get',
			dataType:'json',
			date:{},
			url:checkQQLoginUrl,
			success:function(data){
				if (data == 0) {
					$('#simple-dialogBox').dialogBox({
						width:400,
						autofadeOut:true,
						time:1500,
						content: '请先登录！',
					});
					return false;
				}
				else{
					$.ajax({
						dataType:'json',
						type:'post',
						data:{content:CKEDITOR.instances.editor1.getData()},
						url:leaveMessageUrl,
						success:function(data){
							if (data !== 0) {
								$('#simple-dialogBox').dialogBox({
									width:400,
									autofadeOut:true,
									time:1500,
									content: '留言成功！',
								});
								$("#messageUl").append('<li><img src="'+data.avatar+'"><p><small><i class="icon-time"></i>&nbsp;'+getLocalTime(data.mtime)+'</small><small><i class="icon-user"></i>'+data.nickname+'</small></p><p>'+data.content+'</p></li>')
							}else{
								$('#simple-dialogBox').dialogBox({
									width:400,
									autofadeOut:true,
									time:1500,
									content: '留言失败！',
								});
							}
						},
						error:function(err){
							console.log(err)
							$('#simple-dialogBox').dialogBox({
								width:400,
								autofadeOut:true,
								time:1500,
								content: '系统出错！',
							});
						}
					})
				}
			},
			error:function(err){
				console.log(err)
			}
		});
	});
	// 回复留言
	$(".answerMessage").click(function(){
		$(this).css("display","none");
		$(this).parents('li').after("<li style='margin-left: 40px'><input type='text' id='answerMessageCon' /><a href='javascript:;' class='confirmAnswer'>回复</a><a href='javascript:;' class='cancelAnswer'>取消</a></li>")
	});
	$("#messageUl").on("click",".cancelAnswer",function(){
		$(this).parent('li').prev('li').find("a").fadeIn(800);
		$(this).parent('li').remove();
	})
	$("#messageUl").on("click",".confirmAnswer",function(){
		let content = $(this).parent('li').children('input').val();
		let mid = $(this).parent('li').prev('li').find('input').val();
		let to = $(this).parent('li').prev('li').find('span').text();
		let myTarget = $(this);
		if ($(this).parent('li').children('input').val() == "") {
			$('#simple-dialogBox').dialogBox({
				width:400,
				autofadeOut:true,
				time:1500,
				content: '输入内容为空!',
			});
			return false;
		}
		$.ajax({
			type:'get',
			dataType:'json',
			date:{},
			url:checkQQLoginUrl,
			success:function(data){
				if (data == 0) {
					$('#simple-dialogBox').dialogBox({
						width:400,
						autofadeOut:true,
						time:1500,
						content: '请先登录！',
					});
					return false;
				}
				else{
					$.ajax({
						dataType:'json',
						type:'post',
						data:{content:content,mid:mid,to:to},
						url:answerMessageUrl,
						success:function(data){
							if (data !== 0) {
								$('#simple-dialogBox').dialogBox({
									width:400,
									autofadeOut:true,
									time:1500,
									content: '留言成功！',
								});
								myTarget.parent('li').html('<input type="hidden" value="'+data.mid+'"><img src="'+data.avatar+'"><p><small><i class="icon-time"></i>'+getLocalTime(data.mtime)+'</small></p><p><span>'+data.nickname+'</span> @ '+data.to+' : '+data.content+'</p>')

							}else{
								$('#simple-dialogBox').dialogBox({
									width:400,
									autofadeOut:true,
									time:1500,
									content: '留言失败！',
								});
							}
						},
						error:function(err){
							console.log(err)
							$('#simple-dialogBox').dialogBox({
								width:400,
								autofadeOut:true,
								time:1500,
								content: '系统出错！',
							});
						}
					})
				}
			},
			error:function(err){
				$('#simple-dialogBox').dialogBox({
					width:400,
					autofadeOut:true,
					time:1500,
					content: '系统出错！',
				});
			}
		});

	})
});