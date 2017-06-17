<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
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
        // 选出最新的文章
        $condition['articleid'] = D("Article")->max(articleid);
        $NewArticle = D("Article") -> where($condition) -> select();
        $this -> assign('NewArticle',$NewArticle);
        // 选出文章按时间由早到晚排序
        $Articles = D("Article") -> where("articleid<".$condition['articleid']) -> order("articleid desc") -> select();
        $this -> assign("Articles",$Articles);
        // 选出文章分类和各类文章的数目
        $ArticleClassify = D("Article") -> getAC();
        $this -> assign("ArticleClassify",$ArticleClassify);
        
        $this ->display();
    }
    
}