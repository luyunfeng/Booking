<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
//访问  和view中的  同名
class IndexController extends Controller {
    public function index()
    {   //在session里面查看是否登陆
        if (!isset($_SESSION['username'])) {
            //D方法为Model层，TP框架封装了这个D方法，
            //写入数据路名字就能 连接到改数据库
            //读取数据库到film表
            $film = D('film');
            $data = $film->select();
            //将 data数组  发送到前端页面
            $this->assign('film', $data);
            $this->display();
        }else{
            //如果登陆  就转发到登陆后到 index页面
            $this -> redirect('Index/afterindex');
        }
    }
    public function afterindex(){
        //将用户信息发送到 页面
        $session=$_SESSION['username'];
        $this->assign('username', $session);
        //展示 所有电影列表
        $film = D('film');
        $data = $film->select();
        $this->assign('film', $data);
        $this->display();
    }
    //退出系统
    public function layout(){
        //清除session、跳转到到首页
        session(null);
        $this -> redirect('Index/index');
    }
}

