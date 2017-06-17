/*
* @Author: zyb
* @Date:   2017-05-24 17:45:29
* @Last Modified by:   zyb
* @Last Modified time: 2017-05-29 00:38:34
*/

'use strict';
$(function(){
	// ArticleClassify
	// 编辑分类
	let edit = $(".edit");
	for( let i = 0,a; a = edit[i++];){
		$(a).click(function(){
			let Con = $(this).parents('li').children('strong').html();
			$("#dialog-content").dialogBox({
				width:400,
				hasClose: true,
				hasMask: true,
				hasBtn: true,
				confirmValue: '确定',
				confirm: function(){
					let Con1 = $('.changeClassify').val();
					$.post({
						type:'post',
						dataType:'json',
						data:{old:Con,new:Con1},
						url:ChangeClassifyUrl,
						success:function(data){
							if ( data==0 ) {
								$('#simple-dialogBox').dialogBox({
									width:400,
									autofadeOut:true,
									time:1500,
									content: '没有修改新分类',
								});
							}else{
								$('#simple-dialogBox').dialogBox({
									width:400,
									autofadeOut:true,
									time:1500,
									content: '修改新分类成功',
								});
								$(a).parents('li').children('strong').html(Con1);
							}
						},
						error:function(data){
							$('#simple-dialogBox').dialogBox({
								width:400,
								autofadeOut:true,
								time:1500,
								content: '系统错误',
							});
						}
					});
				},
				cancelValue: '取消',
				title: '修改分类',
				content:"<input type='text' value='"+Con+"' class='changeClassify'/>"
			});
		});
	}
});