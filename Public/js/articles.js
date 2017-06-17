/*
* @Author: zyb
* @Date:   2017-05-10 16:24:50
* @Last Modified by:   zyb
* @Last Modified time: 2017-05-10 16:32:43
*/

let ali = $('.clasifys ul li');
for(let i =0, a; a = ali[i++];){
	$(a).click(function(event) {
		for(let j = 0, b; b = ali[j++];){
			$(b).removeClass('yellowgreen');
		}
		$(this).addClass('yellowgreen');
	});
}