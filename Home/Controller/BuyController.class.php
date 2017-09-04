<?php
namespace Home\Controller;

use Think\Controller;

//访问  和view中的  同名
class BuyController extends Controller
{

    //处理用户确认购买的信息 保存到数据库，回显用户 订单
    public function buylist(){
        //公共控制类  判断是否登陆
        $islogin=new PublicController();
        $islogin->islogin();
        //登陆到话  直接在session得到 用户的id和name
        $userid=session('userid');
        $username=session('username');
        //发来get请求中有 ticketid   表示需要删除这个订单
        if($_GET["ticketid"]){
            $ticket=D("ticket");
            foreach ($_GET as $v){
                if(!(strstr($v,"_"))){
                    $ticket->delete($_GET["ticketid"]);
                }
            }
        }else{
            /*
             * 1. 接收从 buy页面发来的get请求
             * 2.第一个参数为playid,后面参数为用户所选取的位置
             * 3. 遍历解析这些参数
             * 4.保存到数据库（生成电影票的环节）
             * */
            $flag=0;
            foreach ($_GET as $get){
                if($flag++==0){
                    //跳过第一个健值对 第二个健值对开始是 座位信息
                    continue;
                }
                if(!strstr($get,"_")){
                    break;
                }
                $ticket=D("ticket");
                $data=array(
                    "username"=>$username,
                    "playid"=>$_GET["playid"],
                     "userid"=>$userid,
                     "selltime"=>date('Y-m-d h:i:s',time()),
                     "seat"=>$get,
                );
                // 添加到数据库
                $ticket->add($data);

                /*$sql="INSERT INTO booking_ticket (playid, userid, selltime, seat)
                      VALUE (9,1,'2017-01-21 07:42:13','1_1');";*/
            }
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

    // 用来 处理 buy.htm页面
    public function buy()
    {
        //判断是否登陆
        $islogin=new PublicController();
        $islogin->islogin();
        /*
         * 1.从index 页面跳转来的时候，
         * 根据选择的电影去查电影的播放场次，等同于updateplay.html页面
         *
         * 2.用户选完场次之后去 buy页面选票 查 ticket 这张表
         * 把已选 座位传到前端页面
         *
         * 3.选完后将选择票修改数据库 ticket数据
         *  将ticket里面数据填写完整表示出售
         *
         * */

        if ($_GET["filmid"]) {
            $this->assign("filmId",$_GET["filmid"]);
            $film = D();
            $sql = "SELECT booking_film.filmname,
                         booking_film.filmid,
                         booking_playtime.time ,
                         booking_playtime.playid 
                  FROM booking_playtime,booking_film
                  WHERE booking_film.filmid=" . $_GET["filmid"] . " AND
                  booking_film.filmid=booking_playtime.filmid";
            $data = $film->query($sql);
            //dump($data);
            $this->assign('film', $data);
        }
        if ($_GET["playid"]) {
            $ticket_1 = D();
            $ticket_2 = D();
            $sql_1 = "SELECT seat FROM booking_ticket
               WHERE  booking_ticket.playid=" . $_GET["playid"];
            $sql_2 = "SELECT booking_playtime.playid ,
                             booking_playtime.time,
                             booking_playtime.price
                      FROM booking_playtime
                      WHERE booking_playtime.playid=" . $_GET["playid"];
            // 座位信息
            $seatdata = $ticket_1->query($sql_1);
            // 播放的一些信息
            $playdata = $ticket_2->query($sql_2);
            //dump($playdata);
            //将座位信息 传到前台
           // dump($seatdata);
            $this->assign('seatdata', $seatdata);
            // 将当前的 playid price time 播放时间传入前台
            $this->assign('playdata', $playdata);
        }

            $this->display();
    }
}

