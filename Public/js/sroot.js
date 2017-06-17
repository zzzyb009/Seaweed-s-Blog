/*
* @Author: zyb
* @Date:   2017-05-13 15:02:24
* @Last Modified by:   zyb
* @Last Modified time: 2017-06-05 11:00:35
*/

'use strict';
$(function(){
	// 页面指示
	let myAs = $(".meuns ul li");
	for(let i = 0, a; a = myAs[i++];){
		$(a).removeClass('active');
	}
	for(let i = 0, a; a = myAs[i++];){
		$(a).click(function(){
			for(let j = 0, b; b = myAs[j++];){
				$(b).removeClass('active');
			}
			$(this).addClass('active');
			// 页面间的跳转
			$("#content").load(eval($(this).attr('id')))
		});
	}
    // 判断是否有页面信息以获取对应的页面
	var hash = location.hash;
	if(!hash){
		$("#content").load(WebInfo)
		$("#WebInfo").addClass('active')
	}else{
		$(hash).addClass('active')
		$("#content").load(eval(hash.substr(1)));
	}

});