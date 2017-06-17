<?php
/**
 * @Author: zyb
 * @Date:   2017-05-26 16:09:59
 * @Last Modified by:   zyb
 * @Last Modified time: 2017-06-02 13:19:54
 */
namespace Admin\Model;
use Think\Model;
class WebinfoModel extends Model{
	public function getWebInfo(){
		$Info = $this -> select();
		return $Info;
	}
	public function changeWebName($data){
		$res = $this -> where('id=1') -> save($data);
		return $res;
	}
	public function changeLogo($logo){
		$res = $this -> where('id=1') -> save($logo);
		return $res;
	}
}