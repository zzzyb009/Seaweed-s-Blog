<?php
/**
 * @Author: zyb
 * @Date:   2017-05-25 09:49:48
 * @Last Modified by:   zyb
 * @Last Modified time: 2017-06-11 17:35:58
 */
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller {
	public function articledetail(){
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
        // 选出文章
        if(I('get.articleid')){
	        // 评论
	        // $Comments = D('comment') -> where(I('get.')) ->select();
	        $Comments = D('comment') -> where(I('get.')) -> order('commentid')->select();
	        // select * from comment group by commentid;
	        $this -> assign("Comments",$Comments);

        	$TheArticle = D('Article') -> where(I('get.')) -> find();
        	$TheArticle['content'] = htmlspecialchars_decode($TheArticle['content']);

        	$this -> assign('TheArticle',$TheArticle);
        	$this -> assign("TheArticle['content']",$TheArticle['content']);
        	// dump($TheArticle);
        }
		$this->display();
	}
	public function articleList(){
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
        // 选出文章分类和各类文章的数目
        $ArticleClassify = D("Article") -> getAC();
        $this -> assign("ArticleClassify",$ArticleClassify);

        if (I('get.')) {
        	$Articles = D('article') -> where(I('get.')) -> select();
        	$this -> assign("Articles",$Articles);
        }else{
        	$Articles = D('article') -> select();
        	$this -> assign("Articles",$Articles);
        }
		$this -> display();
	}
	// 发表评论
	public function makeComment(){
		if (I('post.')) {
			$data = I('post.');
			$data['commentid'] = time();
			$data['comtime'] = time();
			$data['nickname'] = $_SESSION['nickname'];
			$data['avatar'] = $_SESSION['avatar'];
			$data['pid'] = '0';
			$res = D('comment') -> add($data);
			if ($res) {
				$this -> ajaxReturn($data);
			}else{
				$this -> ajaxReturn(0);
			}
		}else{
			$this -> ajaxReturn(0);
		}
	}
	// 回复评论
	public function answerComment(){
		if (I('post.')) {
			$data = I('post.');
			$data['comtime'] = time();
			$data['nickname'] = $_SESSION['nickname'];
			$data['avatar'] = $_SESSION['avatar'];
			$data['pid'] = "1";
			if (D('comment') -> add($data)) {
				$this -> ajaxReturn($data);
			}else{
				$this -> ajaxReturn(0);
			}
		}
	}
}