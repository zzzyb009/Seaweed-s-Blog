/*
* @Author: zyb
* @Date:   2017-05-30 11:46:04
* @Last Modified by:   zyb
* @Last Modified time: 2017-06-04 22:56:42
*/

'use strict';
$(function(){
	// 将时间戳转化成时间
	function getLocalTime(nS) {     
		return new Date(parseInt(nS) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ");
	}
	// 点击生成文章
	$('.icon-circle').parents('a').click(function(event) {
		let articleid = $(this).children('input').val();
		$.post({
			type:'post',
			dataType:'json',
			data:{articleid:articleid},
			url:getArticleUrl,
			success:function(data){
				// 组合页面元素
				// 页面标题信息
				let content = data['0']['content'];
				let html = "<h3><i class='icon-edit'></i>修改文章</h3>";
				//文章编辑表单
				html += "<div class='writeArticle'><form action='javascript:;' id='SaveArticleForm' method='post' accept-charset='utf-8' enctype='multipart/form-data'>";
				// 文章标题
				html += "<p><span>文章标题</span><input type='text' name='title' value='"+data[0]['title']+"'></p>"
				// 文章id
				html += "<p><span>文章id</span><input type='text' name='articleid' value='"+data[0]['articleid']+"' readonly='true' style='cursor:not-allowed'></p>"
				// 文章发表时间
				html += "<p><span>发表时间</span><input type='text' value='"+getLocalTime(data[0]['articleid'])+"' readonly='true' style='cursor:not-allowed'></p>"
				// 文章关键词
				html +="<p><span>文章关键词</span><input type='text' name='keyword' value='"+data[0]['keyword']+"'></p>"
				// 是否原创
				if (data['0']['orignal'] == 1) {
					html +="<p><span>是否原创</span><span>是<input type='radio' name='orignal' value='1' checked='true'></span><span>否<input type='radio' name='orignal' value='0'></span></p>"
				}else{
					html +="<p><span>是否原创</span><span>是<input type='radio' name='orignal' value='1'></span><span>否<input type='radio' name='orignal' value='0' checked='true'></span></p>"
				}
				//发表类别
				html +="<p><span>发表类别</span><input  name='classify' value='"+data['0']['classify']+"'/></p>"
				//author
				html +="<p><span>文章作者</span><input type='text' name='author' value='"+data['0']['author']+"'></p>";
				// 封面
				html +="<p><span>封面</span><img src='"+data['0']['img']+"' id='preArticlePic'><label>更改封面<input type='file' name='articlePic'  id='articlePic' src='"+data['0']['img']+"'></label></p>";
				// 编辑器
				html +="<textarea id='editor1'>"+data['0']['content']+"</textarea>";
				// 按钮
				html +="<p><input type='submit' value='保存文章' id='submit'><input type='reset' value='取消' id='reset'></p>";
				html +="</form></div>";
				html +='<script type="text/javascript">CKEDITOR.replace( "editor1",{height:"450px"});</script>';
				$('.main').html(html)
			},
			error:function(err){
				$('#simple-dialogBox').dialogBox({
					width:400,
					autofadeOut:true,
					time:1500,
					content: '系统错误',
				});
			}
		});
	});
	//建立一個可存取到該file的url
	function getObjectURL(file) {
		var url = null ; 
		if (window.createObjectURL!=undefined) { // basic
			url = window.createObjectURL(file) ;
		} else if (window.URL!=undefined) { // mozilla(firefox)
			url = window.URL.createObjectURL(file) ;
		} else if (window.webkitURL!=undefined) { // webkit or chrome
			url = window.webkitURL.createObjectURL(file) ;
		}
		return url ;
	}
	// 生成Logo上传的预览图
	$(".main").on("change","#articlePic",function(){
		var objUrl = getObjectURL(this.files[0]) ;
		// console.log("objUrl = "+objUrl) ;
		if (objUrl) {
			$("#preArticlePic").attr("src", objUrl) ;
		}
	})
	// 保存文章
	$('.main').on("click",'#submit',function(e){
		let Form = document.getElementById('SaveArticleForm');
		Form.onsubmit=function(){
			event.preventDefault();
			let ArticleFormData = new FormData(Form);
			ArticleFormData.append('content',CKEDITOR.instances.editor1.getData());
			// console.log(ArticleFormData)
			let xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function(){
				if (xhr.readyState == 4) {
					// console.log(xhr.responseText == "0")
					console.log(xhr.responseText)
					if(xhr.responseText == 0){
						$('#simple-dialogBox').dialogBox({
							width:400,
							autofadeOut:true,
							time:2000,
							content: '保存失败',
						})
					}else{
						$('#simple-dialogBox').dialogBox({
							width:400,
							autofadeOut:true,
							time:2000,
							content: '保存成功',
						})
					}
				}
			}
			xhr.open('post',SaveArticleUrl);
			xhr.send(ArticleFormData);
		}
	})
	$('.main').on("click","#reset",function(){
		$("#content").load($file2);
	})
});