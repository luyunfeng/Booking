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
    <script type="text/javascript" src="<?php echo (C("JS_URL")); ?>jquery.seat-charts.min.js"></script>

    <script type="text/javascript">
        //jq座位采用的是一套开源项目完成
        //jQuery-Seat-Charts
        var price = <?php echo ($playdata[0]["price"]); ?>; //票价

        // 初始化 座位
        $(document).ready(function () {
            var $cart = $('#selected-seats'), //座位区
                $counter = $('#counter'), //票数
                $total = $('#total'); //总计金额


            var sc = $('#seat-map').seatCharts({
                map: [  //座位图
                    'aaaaaaaaaa',
                    'aaaaaaaaaa',
                    'aaaaaaaaaa',
                    'aaaaaaaaaa',
                ],
                naming: {
                    top: false,
                    getLabel: function (character, row, column) {
                        return column;
                    }
                },
                legend: { //定义图例
                    node: $('#legend'),
                    items: [
                        ['a', 'available', '可选座'],
                        ['a', 'unavailable', '已售出'],
                        ['a', 'selected', '所选票']
                    ]
                },
                click: function () { //点击事件
                    if (this.status() == 'available') { //可选座
                        //点击后在右边添加选票信息
                        $('<li class="seat">' + (this.settings.row + 1) + '排' + this.settings.label + '座</li>')
                            .attr('id', 'cart-item-' + this.settings.id)
                            .data('seatId', this.settings.id)
                            .appendTo($cart);
                       // alert(this.settings.id);
                        //跟新 票数和总价
                        $counter.text(sc.find('selected').length + 1);
                        $total.text(recalculateTotal(sc) + price);
                        //标记为已选中
                        return 'selected';
                    } else if (this.status() == 'selected') { //已选中
                        //更新数量
                        $counter.text(sc.find('selected').length - 1);
                        //更新总计
                        $total.text(recalculateTotal(sc) - price);
                        //删除已预订座位
                        $('#cart-item-' + this.settings.id).remove();
                        //可选座
                        return 'available';
                    } else if (this.status() == 'unavailable') { //已售出
                        return 'unavailable';
                    } else {
                        return this.style();
                    }
                }
            });

            //已售出的座位
            <?php if(is_array($seatdata)): foreach($seatdata as $key=>$v): ?>sc.get(['<?php echo ($v["seat"]); ?>']).status('unavailable');<?php endforeach; endif; ?>
             // 确定购买
            $("#buy").click(function () {
                //alert($(".seat")[0].val());
                var li=$(".seat");
                var seat_arr=[];
                var url="<?php echo U('Buy/buylist');?>?playid=<?php echo ($playdata[0]['playid']); ?>&";
                for(var i=0;i<li.length;i++){
                       seat_arr[i]=li[i].innerHTML.replace("排","_").replace("座","");
                       url+="seat_arr"+i+"="+seat_arr[i];
                       if(i!=li.length-1){
                           url+="&";
                       }
                }
                //alert(url);
                $("#buy").attr("href",url);
            });
        });

        //计算总金额
        function recalculateTotal(sc) {
            var total = 0;
            sc.find('selected').each(function () {
                total += price;
            });
            return total;
        }
    </script>
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
    <div style=' width:255px; height:200px;' id="w">
        <nav>
            <ul id="ddmenu">
                <li><a href="<?php echo U('Index/afterindex');?>">回到主页</a></li>
                <li><a class="no" href="">选择播放时间</a>
                    <ul>
                        <?php if(is_array($film)): foreach($film as $key=>$v): ?><li><a href="<?php echo U('Buy/buy');?>?filmid=<?php echo ($v["filmid"]); ?>&playid=<?php echo ($v["playid"]); ?>"><?php echo ($v["time"]); ?></a></li><?php endforeach; endif; ?>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>

<div id="main">
    <h2 class="top_title"></h2>
    <div class="demo">
        <div id="seat-map">
            <div class="front">屏幕</div>
        </div>
        <!--form action="<?php echo U('Buy/buy');?>" method="post"-->
            <div class="booking-details">
                <p>影片：<span><?php echo ($film[0]["filmname"]); ?></span></p>
                <p>时间：<span><?php echo ($playdata[0]["time"]); ?></span></p>
                <p>座位：</p>
                <ul id="selected-seats"></ul>
                <p>票价：¥<?php echo ($playdata[0]["price"]); ?></p>
                <p>票数：<span id="counter">0</span></p>
                <p>总计：<b>￥<span id="total">0</span></b></p>
                <!--input class="checkout-button" id="buy" type="submit" value="确定购买"-->
                <a id="buy" href="">确认购买</a>
                <!--button class="checkout-button" id="checkout-button"> 确定购买</button-->
                <div id="legend"></div>
            </div>

        <div style="clear:both"></div>
    </div>

    <br/>
</div>
</body>
</html>