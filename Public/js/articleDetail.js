/*
* @Author: zyb
* @Date:   2017-06-08 23:55:27
* @Last Modified by:   zyb
* @Last Modified time: 2017-06-09 22:50:13
*/

'use strict';
$(function(){
	// jq转化时间戳
	function getLocalTime(nS) {     
		return new Date(parseInt(nS) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ");
	}
	// 品论前检查是否已经登陆
	$("#commentCon").focus(function(){
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
					$("#commentCon").attr({"readonly":'true'});
				}
				else{
					$("#commentCon").removeAttr("readonly");
				}
			},
			error:function(err){
				console.log(err)
			}
		});
	});
	// 发表评论
	$('#makeCommentForm').submit(function(e){
		e.preventDefault();
		$.post({
			type:'post',
			dataType:'json',
			data:$("#makeCommentForm").serialize(),
			url:makeCommentUrl,
			success:function(data){
				if (data !== 0) {
					$('#simple-dialogBox').dialogBox({
						width:400,
						autofadeOut:true,
						time:1500,
						content: '评论成功！'
					});
					$("#commentCon").val("");
					$(".comments ul").append('<li style="border-top:1px solid gray;"><img src='+data.avatar+'><p><i class="icon-time"></i>'+getLocalTime(data.comtime)+'</p><p>'+data.nickname+' : '+data.content+' <a href="javascript:;" class="Answer">回复</a></p>');
				}else{
					$('#simple-dialogBox').dialogBox({
						width:400,
						autofadeOut:true,
						time:1500,
						content: '评论失败！'
					});
				}
			},
			error:function(err){
				console.log(err)
				$('#simple-dialogBox').dialogBox({
					width:400,
					autofadeOut:true,
					time:1500,
					content: '系统错误！'
				});
			}
		});
	});
	// 回复评论
	// $('.Answer').one('click', function(event) {
	// 	$(this).parents('li').after('<li><input type="text" id="answerComCon"/><a class="answerComment" href="javascript:;"> 回复 </a><a class="answerCancel" href="javascript:;"> 取消 </a></li>');
	// });
	$(".Answer").click(function(event) {
		$(this).fadeOut(1);
		$(this).parents('li').after('<li><input type="text" id="answerComCon"/><a class="answerComment" href="javascript:;"> 回复 </a><a class="answerCancel" href="javascript:;"> 取消 </a></li>');
	});
	$(".comments ul").on("click",".answerCancel",function(){
		$(this).parents('li').remove();
		$(".Answer").fadeIn(800);
	})
	$(".comments ul").on("focus","#answerComCon",function(){
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
					$("#answerComCon").attr({"readonly":'true'});
				}
				else{
					$("#answerComCon").removeAttr("readonly");
				}
			},
			error:function(err){
				console.log(err)
			}
		});
	})
	$(".comments ul").on("click",".answerComment",function(){
		// console.log($('#answerComCon').val())
		let content = $('#answerComCon').val();
		// console.log($(this).parents('li').prev('li').children('input').val())
		let commentid = $(this).parents('li').prev('li').children('input').val();
		// console.log($(this).parents('li').prev('li').children('p').children('span').text())
		let to = $(this).parents('li').prev('li').children('p').children('span').text();
		if (!content) {
			$('#simple-dialogBox').dialogBox({
				width:400,
				autofadeOut:true,
				time:1500,
				content: '未输入'
			});	
		}else{
			$.ajax({
				type:'post',
				dataType:'json',
				data:{articleid:articleid,content:content,commentid:commentid,to:to},
				url:answerCommentUrl,
				success:function(data){
					if (data !== 0) {
						$('#simple-dialogBox').dialogBox({
							width:400,
							autofadeOut:true,
							time:1500,
							content: '回复成功'
						});	
						$(".answerComment").parent('li').html('<li style="margin-left: 40px;"><input type="hidden" value="'+data.commentid+'"><img src="'+data.avatar+'"><p><i class="icon-time"></i>'+getLocalTime(data.comtime)+'</p><p><span>'+data.nickname+'</span>@'+data.to+' : '+data.content+'</p>');
						$(".Answer").fadeIn(800)
					}else{
						$('#simple-dialogBox').dialogBox({
							width:400,
							autofadeOut:true,
							time:1500,
							content: '回复失败'
						});	
					}
				},
				error:function(err){
					$('#simple-dialogBox').dialogBox({
						width:400,
						autofadeOut:true,
						time:1500,
						content: '系统错误'
					});	
				}
			});
		}
		
	})
});