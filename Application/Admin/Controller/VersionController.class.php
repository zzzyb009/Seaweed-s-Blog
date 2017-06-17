<?php
/**
 * @Author: zyb
 * @Date:   2017-05-25 12:19:13
 * @Last Modified by:   zyb
 * @Last Modified time: 2017-06-03 13:34:35
 */
namespace Admin\Controller;
use Think\Controller;
class VersionController extends AuthController{
	public function versionList(){
		$versionInfo = D('Version') -> select();
		$this -> assign("versionInfo",$versionInfo);
		$maxVersionid = D('Version') -> max('versiontimes');
		$versionid = D('Version') -> where("versiontimes=$maxVersionid") -> field('versionid') -> select();
		$this -> assign("versionid",$versionid['0']['versionid']);
		$this -> display();
	}
	public function publishNewVersion(){
		$data = I('post.');
		$versiontimes = D('Version') ->max('versiontimes');
		$data['versiontimes'] = ++$versiontimes;
		$data['publishtime'] = time();
		$res = D('Version') -> add($data);
		$this -> ajaxReturn($res);
	}
}