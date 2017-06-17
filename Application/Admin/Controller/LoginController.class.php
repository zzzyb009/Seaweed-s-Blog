<?php
/**
 * @Author: zyb
 * @Date:   2017-05-25 12:51:06
 * @Last Modified by:   zyb
 * @Last Modified time: 2017-05-26 15:10:25
 */
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
	public function login(){
		$this -> display();
	}
	// 登陆验证
	public function checkLogin(){
		$info = D('Admin') -> in(I('post.username'),I('post.password'));
		if ($info) {
			$this -> ajaxReturn(array('error' => 0,'data' => $_SESSION['uname']));
		}else{
			$this -> ajaxReturn(array('error' => 1,'data' => '用户名或者密码错误'));
		}
	}
	// 退出登录,清楚session
	public function logout(){
		if (I('post.quit') == 1) {
			session(null);
			$this->ajaxReturn(1);
		}
	}
}