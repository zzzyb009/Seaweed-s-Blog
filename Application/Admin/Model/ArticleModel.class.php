<?php
/**
 * @Author: zyb
 * @Date:   2017-05-26 16:26:29
 * @Last Modified by:   zyb
 * @Last Modified time: 2017-06-04 16:41:35
 */
namespace Admin\Model;
use Think\Model;
class ArticleModel extends Model{
	// 获取文章分类以及个分类的文章的数目
	public function getAC(){
		return $info = $this -> field(array("count(*)"=>"num", "classify")) ->group("classify")->select();
	}
	// 编辑分类
	public function changeAC($data,$new){
		return $info = $this -> where($data) -> save($new);
	}
	//发表文章
	public function addArticle($data){
		return $this -> add($data);
	}
	
}
