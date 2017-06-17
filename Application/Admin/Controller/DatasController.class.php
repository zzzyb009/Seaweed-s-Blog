<?php
/**
 * @Author: zyb
 * @Date:   2017-05-25 12:10:08
 * @Last Modified by:   zyb
 * @Last Modified time: 2017-06-03 13:45:07
 */
namespace Admin\Controller;
use Think\Controller;
class DatasController extends AuthController{
	public function datas(){
		$WebInfo = D('Webinfo') -> getWebInfo();
		$this ->assign('weblogo',$WebInfo['0']['weblogo']);
		$this ->assign('webname',$WebInfo['0']['webname']);

		$VersionInfo = D('Version') -> max('versiontimes');
		$VersionInfo = D('Version') -> where("versiontimes=$VersionInfo") ->field('versionid,publisher') ->select();
		$this -> assign('WebVersion',$VersionInfo['0']['versionid']);
		$this -> assign('WebPublisher',$VersionInfo['0']['publisher']);

		$ArticleNum = M('Article') -> count();
		$this -> assign('ArticleNum',$ArticleNum);

		$MessageNum = M('Message') -> count();
		$this -> assign('MessageNum',$MessageNum);

		$CommentNum = M('Comment') -> count();
		$this -> assign('CommentNum',$CommentNum);

		$this -> display();
	}
	// 更改站点名称
	public function change(){
		$res = D('Webinfo') -> changeWebName(I('post.'));
		// dump($res);
		$this -> ajaxReturn($res);
	}
	// 修改网站logo
	public function logo(){
		$upload = new \Think\Upload();// 实例化上传类    
		$upload->maxSize   =     3145728 ;// 设置附件上传大小    
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
		$upload->savePath  =      './logo/'; // 设置附件上传目录  
		$upload->saveName  =	 '';
		$upload->replace   = 	 true;
		$upload->autoSub   =     false;
		// 上传文件
		$info   =   $upload -> upload();
		if(!$info) {// 上传错误提示错误信息   
			$this -> ajaxReturn(0);
		}else{// 上传成功        
			$logo['weblogo'] = "/Uploads/logo/".$_FILES['changeLogo']['name'];
			if (D("Webinfo") -> changeLogo($logo)) {
				echo $logo['weblogo'];
			}
			else{
				$this -> ajaxReturn(false);
			}
		}
	}
}