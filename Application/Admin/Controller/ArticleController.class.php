<?php
/**
 * @Author: zyb
 * @Date:   2017-05-25 11:09:17
 * @Last Modified by:   zyb
 * @Last Modified time: 2017-06-04 22:41:22
 */
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends AuthController{
	//
	// 文章分类块
	// 
	public function articlec(){
		$ArticleC = D("Article") -> getAC();
		// dump($ArticleC);
		$this -> assign('ArticleC',$ArticleC);
		$this -> display('Article/articleClassify');
	}
	// 编辑分类
	public function changeClassify(){
		$data['classify'] = I('post.old');
		$newData['classify'] = I('post.new');
		$info = D("Article") -> changeAC($data,$newData);
		// dump($info);
		$this -> ajaxReturn($info);
	}
	//
	// 发表文章块
	//
	public function articlew(){
		$ArticleC = D("Article") -> getAC();
		$this -> assign('ArticleC',$ArticleC);
		$this -> display('Article/writeArticle');
	}
	// ckeditor图片上传
	public function ckupload(){
		$upload = new \Think\Upload();// 实例化上传类    
		$upload->maxSize   =     3145728 ;// 设置附件上传大小    
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
		$upload->savePath  =      './article/'; // 设置附件上传目录  
		$upload->saveName  =	 '';
		$upload->replace   = 	 true;
		$upload->autoSub   =     false;
		$info = $upload->upload();
		// 上传文件
		if(!$info) {// 上传错误提示错误信息   
			echo "<script type='text/javascript'>alert('a')</script>";;
		}else{// 上传成功        
			$funcNum = $_GET['CKEditorFuncNum'] ;
			$CKEditor = $_GET['CKEditor'] ;
			// $langCode = $_GET['langCode'] ;
			$token = $_POST['ckCsrfToken'] ;
			$url = "/Uploads/article/".$_FILES['upload']['name'];
			$message = 'The uploaded file has been renamed';
			echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
		}
	}
	//发表文章
	public function articleAdd(){
		$upload = new \Think\Upload();// 实例化上传类    
		$upload->maxSize   =     3145728 ;// 设置附件上传大小    
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
		$upload->savePath  =      './article/cover/'; // 设置附件上传目录
		$upload->saveName  =	 '';
		$upload->replace   = 	 true;
		$upload->autoSub   =     false;
		// 上传文件
		$info   =   $upload -> upload();
		if(!$info) {// 上传错误提示错误信息   
			$this -> ajaxReturn(0);
		}else{// 上传成功        
			foreach (I('post.') as $key => $value) {
				$data[$key] = $value;
			}
			$data['img'] = "/Uploads/article/cover/".$_FILES['articlePic']['name'];
			$data['articleid'] = time();
			$data['addtime'] = time();
			$data['view'] = '0';
			$info = D('Article') -> addArticle($data);
			$this -> ajaxReturn($info);
		}
	}
	//
	// 文章列表块
	// 
	public function articlel(){
		$list = D('Article') -> field('title,articleid') -> select();
		$this -> assign('list',$list);
		$this -> display('Article/articleList');
	}
	//获取某一篇文章的内容
	public function getArticleCon(){
		$ArticleCon = D('Article') -> where(I('post.')) -> select();
		// dump($ArticleCon);
		$this -> ajaxReturn($ArticleCon);
	}
	public function saveArticle(){
		// 有修改封面的情况
		if ($_FILES['articlePic']['name']) {
			$upload = new \Think\Upload();// 实例化上传类    
			$upload->maxSize   =     3145728 ;// 设置附件上传大小    
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
			$upload->savePath  =      './article/cover/'; // 设置附件上传目录
			$upload->saveName  =	 '';
			$upload->replace   = 	 true;
			$upload->autoSub   =     false;
			// 上传文件
			$info   =   $upload -> upload();
			// $this -> ajaxReturn($info);
			if(!$info) {// 上传错误提示错误信息   
				$this -> ajaxReturn(0);
			}else{// 上传成功        
				foreach (I('post.') as $key => $value) {
					$data[$key] = $value;
				}
				$data['img'] = "/Uploads/article/cover/".$_FILES['articlePic']['name'];
				$data['addtime'] = time();
				$condition['articleid'] = $data['articleid'];
				$info = D('Article') -> where($condition) -> data($data) ->save();
				$this -> ajaxReturn($info);
			}
		}else{
			$this -> ajaxReturn(0);
		}
	}
	
}