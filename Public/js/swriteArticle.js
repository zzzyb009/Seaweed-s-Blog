/*
* @Author: zyb
* @Date:   2017-05-28 23:33:25
* @Last Modified by:   zyb
* @Last Modified time: 2017-06-02 21:41:33
*/

'use strict';
$(function(){
	/*
	 * WriteArticle
	*/
	// 从表单中获取json对象
	// function getFormJson(form) {
	// 	let o = {};
	// 	let a = $(form).serializeArray();
	// 	$.each(a, function () {
	// 		if (o[this.name] !== undefined) {
	// 			if (!o[this.name].push) {
	// 				o[this.name] = [o[this.name]];
	// 			}
	// 			o[this.name].push(this.value || '');
	// 		} else {
	// 			o[this.name] = this.value || '';
	// 		}
	// 	});
	// 	return o;
	// }
	// 拼接json
	// function hebingjson(jsonbject1, jsonbject2) {
	// 	var resultJsonObject={};
	// 	for(var attr in jsonbject1){
	// 		resultJsonObject[attr]=jsonbject1[attr];
	// 	}
	// 	for(var attr in jsonbject2){
	// 		resultJsonObject[attr]=jsonbject2[attr];
	// 	}
	// 	return resultJsonObject;
	// };
	// 添加新分类
	$('#newClassify').click(function(){
		$("#dialog-content").dialogBox({
			width:400,
			hasClose: true,
			hasMask: true,
			hasBtn: true,
			confirmValue: '确定',
			confirm: function(){
				console.log($("#AddNewClssify").val())
				if ($("#AddNewClssify").val()) {
					console.log($('#classify').append("<option value='"+$('#AddNewClssify').val()+"'>"+$('#AddNewClssify').val()+"</option>"))
				}else{
					$('#simple-dialogBox').dialogBox({
						width:400,
						autofadeOut:true,
						time:1000,
						content: '不能为空',
					});
				}
			},
			cancelValue: '取消',
			title: '添加新分类',
			content:"<input type='text' id='AddNewClssify' value='' placeholder='New Classify' autofocus='true' style='border:none;border-bottom:1px solid gray;width:100%;text-align:center'>"
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
	$("#articlePic").change(function(){
		var objUrl = getObjectURL(this.files[0]) ;
		// console.log("objUrl = "+objUrl) ;
		if (objUrl) {
			$("#preArticlePic").attr("src", objUrl) ;
		}
	}) ;
	// 发表文章
	let Form = document.getElementById('newArticle');
	Form.onsubmit=function(){
		event.preventDefault();
		let ArticleFormData = new FormData(Form);
		ArticleFormData.append('content',CKEDITOR.instances.editor1.getData());
		// console.log(ArticleFormData)
		let xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function(){
			if (xhr.readyState == 4) {
				if(xhr.responseText == 0){
					$('#simple-dialogBox').dialogBox({
						width:400,
						autofadeOut:true,
						time:2000,
						content: '发表失败',
					})
				}else{
					$('#simple-dialogBox').dialogBox({
						width:400,
						autofadeOut:true,
						time:2000,
						content: '发表成功',
					})
				}
			}
		}
		xhr.open('post',ArticleUrl);
		xhr.send(ArticleFormData);
	}
});