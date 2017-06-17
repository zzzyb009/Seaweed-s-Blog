<?php
/**
 * @Author: zyb
 * @Date:   2017-06-07 17:52:46
 * @Last Modified by:   zyb
 * @Last Modified time: 2017-06-09 10:19:43
 */
namespace Home\Controller;
use Think\Controller;
class QQLoginController extends Controller{
	// qq互联回调
	public function callback(){
        // 是否有Authorization Code
        // 有的话开始获取Access Token
        if($_GET['code']){
        	// 拿到code关闭登录页面
        	echo "<script src='http://code.jquery.com/jquery-1.8.0.min.js'></script><script type='text/javascript'>$('#marks',window.parent.document).fadeOut(1);$('#LoginDiv',window.parent.document).fadeOut(1)</script>";
            $url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id=101401635&client_secret=53d5dceab873469a93cecb0e121c3eb4&code=".$_GET['code']."&redirect_uri=http://localhost/index.php/Home/QQLogin/callBack";
            $AccessToken = file_get_contents($url);
            // 如果拿到Access Token，开始获取Openid
            if($AccessToken){
                $Openidurl = "https://graph.qq.com/oauth2.0/me?".$AccessToken;
                $Openid = file_get_contents($Openidurl);
                $Openid = substr($Openid,45,32);
                if ($Openid) {
                    // 用AccessToken、Openid、Appid来获取用户信息
                    $getInfoUrl = "https://graph.qq.com/user/get_user_info?$AccessToken&oauth_consumer_key=101401635&openid=$Openid";
                    $json = file_get_contents($getInfoUrl);
                    $QQUserInfo = json_decode($json);
                    session('[start]');
                    session('nickname',$QQUserInfo->nickname);
                    session('avatar',$QQUserInfo->figureurl_qq_1);
                    // $data['nickname'] =  $QQUserInfo->nickname;
                    // $data['accesstoken'] = $AccessToken;
                    // $data['opoenid'] = $Openid;
                    // M('qquser') -> data($data) -> add();
                    // dump($QQUserInfo);
                    // dump($AccessToken);
                    // dump($Openid);
                    echo "<script type='text/javascript'>$('#userInfo',window.parent.document).html(\"<a href='javascript:;'>".$QQUserInfo->nickname."<img src='".$QQUserInfo->figureurl_qq_1."' id='avatar'></a><i class='icon-ban-circle'></i>\")</script>";
                }
            }
        }
    }
    // 退出qq登录
    public function qqlogout(){
    	if (I('post.logout') == 1) {
	    	session('nickname',null);
	    	session('avatar',null);
	    	$this -> ajaxReturn(1);
    	}
    }
    // 检查登录
    public function checkLogin(){
        if($_SESSION['nickname']){
            $this -> ajaxReturn(1);
        }else{
            $this -> ajaxReturn(0);
        }
    }
}