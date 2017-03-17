<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
//访问  和view中的  同名
class UserController extends Controller
{
    //登录系统
    public function login()
    {
        //两个逻辑：展示、收集
        /*
         * 1.首先判断是否是post请求
         * 如果是 开始验证
         * 反之  只是展示出页面登陆页面
         *
         * */
        if (!empty($_POST)) {
            //校验验证码
            $vry = new Verify();
            //先验证 验证吗是否正确
            if ($vry->check($_POST['checkcode'])) {
                //表单收集  过来到 username 和password 封装在一个数组里面
                $userpwd = array(
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                );
                // 去数据库查 这一个组合
                $info = D('user')->where($userpwd)->find();
                //如果有 保存session 跳转到首页
                if ($info) {
                    //session持久化用户信息(名字)，页面跳转
                    session('username', $info['username']);
                    session('userid',$info['userid']);
                    //dump(session('userid'));
                    $this->redirect('Index/afterindex');
                } else {
                    $error="用户名或密码错误";
                    $this->assign('error', $error);
                    //echo "用户名或密码错误";
                }
            } else {
                $error="验证码输入有误";
                $this->assign('error', $error);
               // echo "验证码错误";
            }
        }
        $this->display();
    }

    public function regist()
    {

        if (!empty($_POST)) {
            //校验验证码
            $vry = new Verify();
            if ($vry->check($_POST['checkcode'])) {
                //将 注册信息封装到数组中
                 //然后 数据库中查询 是否 用户名已经存在
                 //注册成功   就跳到登陆页面开始登陆
                $userpwd = array(
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'phone' => $_POST['phone']
                );
               // dump($userpwd);
                $info = D('user');
                if ($info->add($userpwd)) {
                    $this->success("注册成功，马上跳转到登陆页面", U("login"), 1);
                } else {
                    $this->error("该用户名已被注册", U("regist"), 2);
                }
            } else {
                $error="验证码输入有误";
                $this->assign('error', $error);
            }
        }
            $this->display();
    }
    //退出系统
    /*public function layout()
    {
        //清除session、跳转到Manager/login
        session(null);
        $this->redirect('Index/index');

    }*/
    //生成验证码
    public function verifyImg()
    {
        //根据 文档生成验证吗
        $cfg = array(
            'imageH' => 40,               // 验证码图片高度
            'imageW' => 100,               // 验证码图片宽度
            'fontSize' => 15,              // 验证码字体大小(px)
            'length' => 4,               // 验证码位数
            'fontttf' => '4.ttf',              // 验证码字体，不设置随机获取
        );
        //实例化Verify类对象
        $very = new \Think\Verify($cfg);
        $very->entry();
    }


    //用户中心（类似于 buylist页面）
    public function usercenter(){
        //公共控制类  判断是否登陆
        $islogin=new PublicController();
        $islogin->islogin();
        //登陆到话  直接在session得到 用户的id
        $userid=session('userid');

        //发来get请求中有 ticketid   表示需要删除这个订单
        if($_GET["ticketid"]){
            $ticket=D("ticket");
             $ticket->delete($_GET["ticketid"]);
        }
        //查询用户 所有到订单 显示出来
        $sql="SELECT  booking_ticket.ticketid ,
                              booking_film.filmname ,
                              booking_playtime.time,
                              booking_ticket.selltime,
                              booking_ticket.seat
                      FROM booking_ticket,booking_playtime,booking_film
                      WHERE booking_film.filmid=booking_playtime.filmid AND
                            booking_playtime.playid=booking_ticket.playid AND
                            booking_ticket.userid=".$userid;
        $data=D();
        $buydata=$data->query($sql);
        $this->assign('buydata', $buydata);
        $this->display();
    }
}

