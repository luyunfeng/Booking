<?php
namespace Home\Controller;
use Think\Controller;
//访问  和view中的  同名
class PublicController extends Controller {
    // 前台采用公共的 控件
    //检查 是否登陆
    public function islogin(){
        if (!isset($_SESSION['username'])) {
            $this->error('对不起,您还没有登录!请先登录再进行浏览', U('User/login'), 2);
        }else{
            $session=$_SESSION['username'];
            $this->assign('username', $session);
        }
    }
}

