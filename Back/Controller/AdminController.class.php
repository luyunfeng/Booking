<?php
namespace Back\Controller;
use Think\Controller;
use Think\Verify;
//访问  和view中的  同名
class AdminController extends Controller {
    //登录系统
    public function login(){
        //两个逻辑：展示、收集
        if(!empty($_POST)){
            //校验验证码
            $vry = new Verify();
            //if($_POST['captcha']==$_SESSION[名称]){
            if( $vry -> check($_POST['captcha']) ){
                //校验用户名和密码
                //dump($_POST);//admin_user/admin_psd
                $userpwd = array(
                    'user'=>$_POST['admin_user'],
                    'password'=>$_POST['admin_psd'],
                );
                //以下数据操作是对用户名和密码进行校验
                //成功：把用户名和密码所在的记录信息都返回给$info
                //失败：接收到null信息
                $info = D('admin')->where($userpwd)->find();
                //SELECT * FROM `sw_manager` WHERE `mg_name` = 'aobama' AND `mg_pwd` = '1234' LIMIT 1
                if($info){
                    //session持久化用户信息(名字)，页面跳转
                    session('admin_name',$info['user']);
                    $this -> redirect('Manage/index');
                }else{
                    $error="输入的用户名或密码有误";
                    $this->assign('error', $error);
                }
            }else{
                $error="验证码输入有误";
                $this->assign('error', $error);
            }
        }
        $this -> display();
    }

    //退出系统
    public function layout(){
        //清除session、跳转到Manager/login
        session(null);
        $this -> redirect('Admin/login');
    }

    //生成验证码
    public function verifyImg(){
        $cfg = array(
            'imageH'    =>  40,               // 验证码图片高度
            'imageW'    =>  100,               // 验证码图片宽度
            'fontSize'  =>  15,              // 验证码字体大小(px)
            'length'    =>  4,               // 验证码位数
            'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
        );
        //实例化Verify类对象
        $very = new \Think\Verify($cfg);
        $very -> entry();
    }

}

