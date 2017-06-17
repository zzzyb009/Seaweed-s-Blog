<?php
/**
 * @Author: zyb
 * @Date:   2017-05-25 12:14:53
 * @Last Modified by:   zyb
 * @Last Modified time: 2017-06-03 15:27:54
 */
namespace Admin\Controller;
use Think\Controller;
class UserController extends AuthController{
	// 获取用户列表
	public function userMan(){
		$AdminInfo = D('Admin') -> getAdminInfo();
		$this -> assign("AdminInfo",$AdminInfo);
		$this -> display();
	}
	// 添加用户
	public function addAdmin(){
		$data = I('post.');
		$data['password'] = md5($data['password']);
		$res = D('Admin') ->add($data);
		$this -> ajaxReturn($res);
	}
	// 删除用户
	public function deleteAdmin(){
		$this -> ajaxReturn(D('Admin') -> where(I('post.')) -> delete());
	}
	// 修改用户信息
	public function updateAdmin(){
		$condition['id'] = I('post.id');
		$res = D('Admin') -> where($consition) -> save(I('post.'));
		if ($res) {
			$info = D('Admin') -> where($condition) -> field('email,wechat') -> find();
	 		$this -> ajaxReturn($info);
		}else{
			$this -> ajaxReturn('0');
		}
 	}
}