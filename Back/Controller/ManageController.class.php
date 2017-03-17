<?php
namespace Back\Controller;

use Model\AddplayModel;
use Think\Controller;

//访问  和view中的  同名
class ManageController extends Controller
{
    // 后台管理员登陆
    public function islogin()
    {
        if (!isset($_SESSION['admin_name'])) {
            $this->error('对不起,您还没有登录!请先登录再进行浏览', U('Admin/login'), 2);
        } else {
            $session = $_SESSION['admin_name'];
            $this->assign('admin_name', $session);
        }
    }

    public function index()
    {    //判断 是否登陆
        $this->islogin();
        $this->display();
    }

    public function addfilm()
    {
        $this->islogin();
        $film = D("film");
        if (IS_POST) {
            $data = $film->create();
            //内容部分  先进行转码再 传入数据库
            $data["info"] = htmlspecialchars_decode($data["info"]);
            if ($film->add($data)) {
                $this->success("发布成功", U("addfilm"), 2);
            } else {
                $this->error("发布失败", U("addfilm"), 2);
            }
        } else {
            $this->display();
        }
    }

    public function updatefilm()
    {
        $this->islogin();
        $film = D('film');
        //删除指定的电影  通过URL参数传递
        if ($_GET["filmid"]) {
            $film->delete($_GET["filmid"]);
        }
        $data = $film->select();
        $this->assign('data', $data);
        $this->display();
    }

    //显示当前上映电影
    public function showfilm()
    {
        $this->islogin();
        //如果得到addplay页面传来的数据
        if (IS_POST) {
            //分别得到两张表
            //$ticket = D("ticket");
            $playtime = D("playtime");
            $data_playtime = array(
                "filmid" => $_GET["filmid"],
                "time" => $_POST["playdate"] . " " . $_POST["playhour"],
                "price" => $_POST["price"],
            );
            //现将 数据放入 playtime这张表中 并得到新增数据表的 主键
            // userid=null表示还没有卖出去
            /*$playid = $playtime->add($data_playtime);
            $data_ticket = array(
                "playid" => $playid,
            );
            $k = 0;
            while ($k < 39) {
                //创建40张票
                $ticket->add($data_ticket);
                $k++;
            }
            //  最后一张票的信息传入  表示成功
            if ($ticket->add($data_ticket)) {
                $this->success("成功添加", U("showfilm"), 2);
            } else {
                $this->error("添加失败", U("showfilm"), 2);
            }*/

            if ($playtime->add($data_playtime)) {
                $this->success("成功添加", U("showfilm"), 2);
            } else {
                $this->error("添加失败", U("showfilm"), 2);
            }
        } else {
            $film = D('film');
            $data = $film->select();
            $this->assign('data', $data);
            $this->display();
        }

    }

    public function addplay()
    {
        $this->islogin();
        $film = D('film');
        if ($_GET["filmid"]) {
            $data = $film->select($_GET["filmid"]);
            $this->assign('data', $data);
        }
        $this->display();
    }

    public function updateplay()
    {
        $this->islogin();
        $playtime = D('playtime');
        //删除指定的场次  通过URL参数传递
        if ($_GET["playid"]) {
            $playtime->delete($_GET["playid"]);
        }
        //  编号	电影名字	播放时间	已售票数	剩余票数	操作
        /* $sql = "SELECT  booking_playtime.playid, booking_film.filmname,booking_playtime.time,
                   count(booking_ticket.userid) AS 'sell',40-count(booking_ticket.userid) AS 'remain'
                 FROM booking_ticket,booking_playtime,booking_film
                 WHERE booking_film.filmid=booking_playtime.filmid AND
                        booking_playtime.playid=booking_ticket.playid
                 GROUP BY booking_playtime.playid";
         $showplay=D();
         $data = $showplay->query($sql);*/
        /****************************************/
        // sql_1  编号	电影名字	播放时间
        // sql_2  已售票数	剩余票数
        $showplay_1 = D();
        $sql_1 = "SELECT  booking_playtime.playid, 
                        booking_film.filmname,
                        booking_playtime.time
                FROM booking_playtime,booking_film
        WHERE booking_film.filmid=booking_playtime.filmid ";
        $data = $showplay_1->query($sql_1);
        $showplay_2 = D();
        $i = 0;
        foreach ($data as $v) {
            $sql_2 = "SELECT  COUNT(*)AS 'sell', 40-COUNT(*) AS 'remain'
                FROM booking_ticket
                WHERE booking_ticket.playid=" . $data[$i]["playid"];
            $temp = $showplay_2->query($sql_2);
            $data[$i]["sell"] = $temp[0]["sell"];
            $data[$i++]["remain"] = $temp[0]["remain"];
        }

        $this->assign('data', $data);
        $this->display();
    }

    public function usermanage()
    {
        $this->islogin();
        if ($_GET["userid"]) {
            $playtime = D('user');
            $playtime->delete($_GET["userid"]);
        }

        $showuser = D();
        $sql = "SELECT userid,username,phone FROM booking_user";
        $data = $showuser->query($sql);
        $this->assign('data', $data);
        $this->display();
    }


}

