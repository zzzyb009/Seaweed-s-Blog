<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends AuthController {
    public function index(){
    	$WebInfo = D('Webinfo') -> getWebInfo();
    	// dump($WebInfo);
    	$this -> assign('Webinfo',$WebInfo['0']['webname']);
    	$this -> assign('Weblogo',$WebInfo['0']['weblogo']);
    	$this -> display();
    }
}