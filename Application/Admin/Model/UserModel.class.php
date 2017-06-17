<?php
/**
 * @Author: zyb
 * @Date:   2017-06-02 11:56:00
 * @Last Modified by:   zyb
 * @Last Modified time: 2017-06-02 11:58:53
 */
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
	public function getUserInfo(){
		return $this -> select();
	}
}