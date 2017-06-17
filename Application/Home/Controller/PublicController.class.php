<?php
/**
 * @Author: zyb
 * @Date:   2017-05-25 10:14:41
 * @Last Modified by:   zyb
 * @Last Modified time: 2017-06-06 17:24:43
 */
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller{
	public function head(){
		$this -> display();
	}
	public function foot(){
		$this -> display();
	}
}