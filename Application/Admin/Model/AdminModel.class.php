<?php
/**
 * @Author: zyb
 * @Date:   2017-05-26 10:49:06
 * @Last Modified by:   zyb
 * @Last Modified time: 2017-06-02 12:33:49
 */
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{

	// 验证登陆并开始session
	public function in($user,$password){
		// dump($this == D('Admin'));    //D:\zybblog\ThinkPHP\Common\functions.php:842:boolean true
		$admin = $this -> where(array('username' => $user)) ->find();
		if ($admin) {
			if (md5($password) == $admin['password']) {
				session('uname',$admin['username']);
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}
	// 获取admin列表
	public function getAdminInfo(){
		return $this -> select();
	}
}