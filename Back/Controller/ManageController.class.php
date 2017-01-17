<?php
namespace Back\Controller;

use Model\AddplayModel;
use Think\Controller;

//访问  和view中的  同名
class ManageController extends Controller
{
    public function index()
    {
        $this->display();
    }

    public function addfilm()
    {

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

        //如果得到addplay页面传来的数据
        if (IS_POST) {
            //分别得到两张表
            $ticket = D("ticket");
            $playtime = D("playtime");
            $data_playtime = array(
                "filmid" => $_GET["filmid"],
                "time" => $_POST["playdate"] . " " . $_POST["playhour"]
            );
            //现将 数据放入 playtime这张表中 并得到新增数据表的 主键
            // userid=null表示还没有卖出去
            $playid = $playtime->add($data_playtime);

            $data_ticket = array(
                "price" => $_POST["price"],
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
        $film = D('film');
        if ($_GET["filmid"]) {
            $data = $film->select($_GET["filmid"]);
            $this->assign('data', $data);
        }
        $this->display();
    }

    public function updateplay()
    {

        $playtime = D('playtime');
        //删除指定的场次  通过URL参数传递
        if ($_GET["playid"]) {
            $playtime->delete($_GET["playid"]);
        }
        //  编号	电影名字	播放时间	已售票数	剩余票数	操作
        $sql = "SELECT  booking_playtime.playid, booking_film.filmname,booking_playtime.time,
                  count(booking_ticket.userid) AS 'sell',40-count(booking_ticket.userid) AS 'remain'
                FROM booking_ticket,booking_playtime,booking_film
                WHERE booking_film.filmid=booking_playtime.filmid AND
                       booking_playtime.playid=booking_ticket.playid
                GROUP BY booking_playtime.playid";
        $showplay=D();
        $data = $showplay->query($sql);
        //根据playid查询 买票情况 做统计

        $this->assign('data', $data);
        $this->display();
    }

}

