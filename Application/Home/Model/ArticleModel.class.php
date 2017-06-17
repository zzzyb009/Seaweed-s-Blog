<?php
/**
 * @Author: zyb
 * @Date:   2017-05-26 16:26:29
 * @Last Modified by:   zyb
 * @Last Modified time: 2017-06-06 22:30:01
 */
namespace Home\Model;
use Think\Model;
class ArticleModel extends Model{
	public function getAC(){
		return $info = $this -> field(array("count(*)"=>"num", "classify")) ->group("classify")->select();
	}
}
