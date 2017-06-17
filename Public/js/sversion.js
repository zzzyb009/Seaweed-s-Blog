/*
* @Author: zyb
* @Date:   2017-06-03 09:52:43
* @Last Modified by:   zyb
* @Last Modified time: 2017-06-03 10:30:33
*/

'use strict';
$(function(){
	$('#newVersionForm').submit(function(e){
		e.preventDefault();
		$.post({
			type:'post',
			dataType:'json',
			data:$('#newVersionForm').serialize(),
			url:NewVersionUrl,
			success:function(data){
				console.log(data)
			},
			error:function(err){
				console.log(err)
			}
		});
	});
});