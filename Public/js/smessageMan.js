/*
* @Author: zyb
* @Date:   2017-06-10 21:49:24
* @Last Modified by:   zyb
* @Last Modified time: 2017-06-11 11:59:08
*/

'use strict';
$(function(){
	// jq转化时间戳
	function getLocalTime(nS) {     
		return new Date(parseInt(nS) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ");
	}
	// 
	$(".mmm ul").on("click",".answerMessage",function(){
		$(this).parents('li').after("<li style='margin-left:40px;'><input type='text' id='answerMessageCon'/><a href='javascript:;' class='confirmAnswer'>回复</a><a href='javascript:;' class='cancelAnswer'>取消</a></li>");
		$(this).css({'display':'none'});
	});
	$('.mmm ul').on('click', '.cancelAnswer', function(event) {
		$(this).parents('li').prev('li').find('a.answerMessage').fadeIn(800);
		$(this).parent('li').remove();
	});
	$('.mmm ul').on('click', '.confirmAnswer', function(event) {
		let content = $(this).prev('input').val();
		let mid = $(this).parents('li').prev('li').find('input').val();
		let to = $(this).parents('li').prev('li').find('a.nickname').text();
		let a = $(this);
		if (content == '') {
			$('#simple-dialogBox').dialogBox({
				width:400,
				autofadeOut:true,
				time:1500,
				content: '输入为空',
			});
			return false;
		}
		$.ajax({
			type:'post',
			dataType:'json',
			data:{content:content,mid:mid,to:to},
			url:answerMessageUrl,
			success:function(data){
				console.log(data)
				if (data !== 0) {
					$('#simple-dialogBox').dialogBox({
						width:400,
						autofadeOut:true,
						time:1500,
						content: '回复成功',
					});
				}else{
					$('#simple-dialogBox').dialogBox({
						width:400,
						autofadeOut:true,
						time:1500,
						content: '回复失败',
					});
				}
			},
			error:function(err){
				console.log(err)
				$('#simple-dialogBox').dialogBox({
					width:400,
					autofadeOut:true,
					time:1500,
					content: '系统错误',
				});
			}
		});
		$(this).parents('li').prev('li').find('a.answerMessage').fadeIn(800);
		$(this).parents('li').remove();
	});
	// 删除留言
	$(".mmm ul").on('click', '.deleteMessage', function() {
		console.log($(this))
		let mydelete = $(this);
		let messageid = $(this).prev('a').text();
		let mid = $(this).parents('li').children('p').text();
		if (mid) {
			mid = mid.substr(-10);
		}else{
			mid = '0';
		}
		$.ajax({
			type:'post',
			dataType:'json',
			data:{mid:mid,messageid:messageid},
			url:deleteMessageUrl,
			success:function(data){
				if (data) {
					$('#simple-dialogBox').dialogBox({
						width:400,
						autofadeOut:true,
						time:1500,
						content: '删除成功',
					});
					mydelete.parents('li').remove();
				}else{
					$('#simple-dialogBox').dialogBox({
						width:400,
						autofadeOut:true,
						time:1500,
						content: '删除失败',
					});
				}
			},
			error:function(err){
				$('#simple-dialogBox').dialogBox({
					width:400,
					autofadeOut:true,
					time:1500,
					content: '系统错误',
				});
			}
		})
	});
});