/*
* @Author: zyb
* @Date:   2017-05-19 00:29:47
* @Last Modified by:   zyb
* @Last Modified time: 2017-06-02 13:50:45
*/

'use strict';
$(function(){
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
	$("#changeLogo").change(function(){
		$('#previewLogo').fadeIn(1000);
		$('#uploadLogo').fadeIn(1000);
		var objUrl = getObjectURL(this.files[0]) ;
		// console.log("objUrl = "+objUrl) ;
		if (objUrl) {
			$("#previewLogo").attr("src", objUrl) ;
		}
	}) ;
	//上传Logo
	let LogoForm = document.getElementById('LogoForm');
	LogoForm.onsubmit = function(event){
		event.preventDefault();
		let fd = new FormData(LogoForm);
		let xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function(){
			if(xhr.readyState == 4){
				if (xhr.responseText == "false") {
					$('#simple-dialogBox').dialogBox({
						width:400,
						autofadeOut:true,
						time:2000,
						content: '修改失败',
					})
				}else{
					$('#simple-dialogBox').dialogBox({
						width:400,
						autofadeOut:true,
						time:2000,
						content: '修改成功',
					});
					$('#previewLogo').fadeOut(1000);
					$('#uploadLogo').fadeOut(1000);
					$('#curLogo').attr('src',xhr.responseText);
					$('#topLogo').attr('src',xhr.responseText);
				}
			}
		}
		xhr.open('post',LogoUrl);
		xhr.send(fd);
	}


	// 修改站点的名称
	$("#ChangeWebName").click(function(){
		let con =$("#preName").val();
		$("#dialog-content").dialogBox({
			width:400,
			hasClose: true,
			hasMask: true,
			hasBtn: true,
			confirmValue: '确定',
			confirm: function(){
				if ($("#webname").val()) {
					$.post({
						type:'post',
						dataType:'json',
						url:ChangeNameUrl,
						data:{webname:$("#webname").val()},
						success:function(data){
							if (data == 1) {
								$('#simple-dialogBox').dialogBox({
									width:400,
									autofadeOut:true,
									time:1500,
									content: '修改成功',
								});
								$("#preName").val($("#webname").val());
								$("#WebName").html($("#webname").val());
							}else if(data == 0){
								$('#simple-dialogBox').dialogBox({
									width:400,
									autofadeOut:true,
									time:1000,
									content: '错误',
								});
							}
						},
						error:function(err){
							console.log(err)
							$('#simple-dialogBox').dialogBox({
								width:400,
								autofadeOut:true,
								time:1000,
								content: '错误',
							});
						}
					});
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
			title: '站点名称修改',
			content:"<input type='text' id='webname' value='' placeholder='New Name' autofocus='true'>"
		});
	})
});