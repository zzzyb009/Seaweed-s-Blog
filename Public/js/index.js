/*
* @Author: zyb
* @Date:   2017-05-06 21:30:52
* @Last Modified by:   zyb
* @Last Modified time: 2017-05-06 21:49:59
*/
/**
 * 菜单栏强调
 */
$(function(){
	let mya = $('.zul li a');
	for(let i =0, a; a = mya[i++];){
		$(a).click(function(event) {
			for(let j = 0, b; b = mya[j++];){
				$(b).removeClass('amouseon');
			}
			$(this).addClass('amouseon');
		});
	}
});