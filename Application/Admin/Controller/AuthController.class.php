<?php
/**
 * @Author: zyb
 * @Date:   2017-05-26 15:14:54
 * @Last Modified by:   zyb
 * @Last Modified time: 2017-05-26 15:22:19
 */
/**
 * 后台登陆权限验证
 */
namespace Admin\Controller;
use Think\Controller;
class AuthController extends Controller{
	public function _initialize(){
		if(!session("uname")){
			$this->redirect("Admin/Login/login");
		}
	}
}