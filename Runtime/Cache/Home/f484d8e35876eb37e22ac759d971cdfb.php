<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width  initial-scale=1.0">
    <title>电影选票</title>
    <link rel="stylesheet" type="text/css" href="<?php echo (C("CSS_URL")); ?>main.css"/>
    <link href="<?php echo (C("BACK_CSS_URL")); ?>styles.css" type="text/css" rel="stylesheet" media="all">
    <script type="text/javascript" src="<?php echo (C("JS_URL")); ?>jquery.min.js"></script>
    <script type="text/javascript">
        //下拉框
        $(document).ready(function () {
            $('#ddmenu li').hover(function () {
                clearTimeout($.data(this, 'timer'));
                $('ul', this).stop(true, true).slideDown(200);
            }, function () {
                $.data(this, 'timer', setTimeout($.proxy(function () {
                    $('ul', this).stop(true, true).slideUp(200);
                }, this), 100));
            });

        });
    </script>
</head>

<body>
<div id="header">
    <div style=' width:294px; height:200px;' id="w">
        <nav>
            <ul id="ddmenu">
                <li><a href="<?php echo U('Index/afterindex');?>">回到主页</a></li>
                <li><a href="#">这是您的购买信息</a></li>
            </ul>
        </nav>
    </div>
</div>
<div style="font-size: 13px;margin: 10px 5px">
    <table class="table_a" border="1" width="100%">
        <tbody>
        <tr style="font-weight: bold;">
            <td>票号</td>
            <td>电影名字</td>
            <td>播放时间</td>
            <td>购买时间</td>
            <td>座位</td>
            <td align="center">操作</td>
        </tr>
        <?php if(is_array($buydata)): foreach($buydata as $key=>$v): ?><tr id="product1">
                <td><?php echo ($v["ticketid"]); ?></td>
                <td><a href="#"><?php echo ($v["filmname"]); ?></a></td>
                <td><?php echo ($v["time"]); ?></td>
                <td><?php echo ($v["selltime"]); ?></td>
                <td><?php echo ($v["seat"]); ?></td>
                <td> <a href="/Booking/index.php/Home/Buy/buylist.html?playid=12&seat_arr0=1_8&ticketid=478&ticketid=<?php echo ($v["ticketid"]); ?>">退订</a></td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
</div>



</body>
</html>