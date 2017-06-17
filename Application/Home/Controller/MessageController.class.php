<?php
/**
 * @Author: zyb
 * @Date:   2017-05-25 10:08:20
 * @Last Modified by:   zyb
 * @Last Modified time: 2017-06-11 18:27:52
 */
namespace Home\Controller;
use Think\Controller;
class MessageController extends Controller{
	public function message(){
        // 选出站点信息
    	$WebInfo = D('Webinfo') -> select();
    	$this -> assign('WebInfo',$WebInfo);
        // 计算评论数目
    	$CountComment = D('comment') -> count();
    	$this -> assign('CountComment',$CountComment);
        // 计算留言数目
    	$CountMessage = D('Message') -> count();
    	$this -> assign('CountMessage',$CountMessage);
        // 计算文章数目
    	$CountArticle = D('Article') -> count();
    	$this -> assign('CountArticle',$CountArticle);
        // 计算链接数目
    	$CountLinkds = D('Frilinks') -> count();
        $this -> assign('CountLinkds',$CountLinkds);
        // 选出留言
        $Messages = D('message') -> order('mid desc,mtime') -> select();
        foreach ($Messages as $key => $value) {
            $Messages[$key]['content'] = htmlspecialchars_decode($value['content']);
        }
        $this -> assign("Messages",$Messages);
		$this -> display();
	}
    // 发表留言
    public function leaveMessage(){
        $data = I('post.');
        $data['mtime'] = time();
        $data['mid'] = time();
        $data['nickname'] = $_SESSION['nickname'];
        $data['avatar'] = $_SESSION['avatar'];
        $data['pid'] = '0';
        if(D('message') -> add($data)){
            $info = D('message') -> where("id = ".D('message')->max("id")) -> find();
            $info['content'] = htmlspecialchars_decode($info['content']);
            $this -> ajaxReturn($info);
        }else{
            $this -> ajaxReturn(0);
        }
    }
    // 回复留言
    public function answerMessage(){
        $data = I('post.');
        $data['content'] = htmlspecialchars($data['content']);
        $data['mtime'] = time();
        $data['pid'] = '1';
        $data['nickname'] = $_SESSION['nickname'];
        $data['avatar'] =$_SESSION['avatar'];
        $res = D('message') -> add($data);
        if($res){
            $info = D('message') -> where("id = ".D('message')->max("id")) -> find();
            $info['content'] = htmlspecialchars_decode($info['content']);
            $this -> ajaxReturn($info);
        }else{
            $this -> ajaxReturn(0);
        }
    }
}