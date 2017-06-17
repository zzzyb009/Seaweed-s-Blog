<?php
/**
 * @Author: zyb
 * @Date:   2017-05-25 12:12:16
 * @Last Modified by:   zyb
 * @Last Modified time: 2017-06-11 18:32:18
 */
namespace Admin\Controller;
use Think\Controller;
class MessageController extends AuthController{
	public function messageMan(){
		// 选出全部留言
		$Messages = D('message') -> order('mid desc,mtime') -> select();
		foreach ($Messages as $key => $value) {
			$Messages[$key]['content'] = htmlspecialchars_decode($value['content']);
		}
		$this -> assign("Messages",$Messages);

		$this -> display();
	}
	// 回复留言
	public function answerMessage(){
		if (I('post.')) {
			$data = I('post.');
			$data['content'] = htmlspecialchars($data['content']);
			$data['nickname'] = $_SESSION['uname'];
			$avatar = D('webinfo') -> field('weblogo') -> find();
			$data['avatar'] = $avatar['weblogo'];
			$data['mtime'] = time();
			$data[pid] = '1';
			$res = D('message') -> add($data);
			if ($res) {
				$this -> ajaxReturn($data);
			}else{
				$this -> ajaxReturn(0);
			}
		}
	}
	// 删除留言
	public function deleteMessage(){
		if (I('post.mid') == 0) {
			$res = D('message') -> where("id = ".I('post.messageid')) -> delete();
			if ($res) {
				$this -> ajaxReturn($res);
			}else{
				$this -> ajaxReturn(0);
			}
		}else{
			$res = D('message') -> where("mid = ".I('post.mid')) -> delete();
			if ($res) {
				$this -> ajaxReturn($res);
			}else{
				$this -> ajaxReturn(0);
			}
		}
	}
}