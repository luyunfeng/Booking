<?php if (!defined('THINK_PATH')) exit();?><!doctype html public "-//w3c//dtd xhtml 1.0 frameset//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-frameset.dtd">
<html>
<head>
    <title>管理中心</title>
    <link href="<?php echo (C("BACK_CSS_URL")); ?>admin.css" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo (C("BACK_CSS_URL")); ?>styles.css">
    <script type="text/javascript" src="<?php echo (C("BACK_JS_URL")); ?>jquery.min.js"></script>
</head>
<body>
<!--头部-->
<table cellspacing=0 cellpadding=0 width="100%"
       background="<?php echo (C("BACK_IMG_URL")); ?>header_bg.jpg" border=0>
    <tr height=56>
        <td width=260><img height=56 src="<?php echo (C("BACK_IMG_URL")); ?>header_left.jpg"
                           width=260></td>
        <td style="font-weight: bold; color: #fff; padding-top: 20px" align=middle>当前用户：admin &nbsp;
            &nbsp; <a style="color: #fff" href="" target=main>修改口令</a> &nbsp;&nbsp;
            <a style="color: #fff" onclick="if (confirm('确定要退出吗？')) return true; else return false;" href=""
               target=_top>退出系统</a>
        </td>
        <td align=right width=268>
            <img height=56 src="<?php echo (C("BACK_IMG_URL")); ?>header_right.jpg" width=268>
        </td>
    </tr>
</table>
<div id="w">
    <nav>
        <ul id="ddmenu">
            <li><a class="no" href="#">管理中心</a></li>
            <li><a class="no" href="#">电影管理</a>
                <ul>
                    <li><a href="<?php echo U('Ticket/add');?>">添加电影</a></li>
                    <li><a href="<?php echo U('Ticket/update');?>">修改电影</a></li>

                </ul>
            </li>
            <li><a class="no" href="#">电影票管理</a>
                <ul>
                    <li><a href="#">添加电影票</a></li>
                    <li><a href="#">修改电影票</a></li>
                </ul>
            </li>
            <li><a class="no" href="#">用户管理</a>
                <ul>
                    <li><a href="#">拉黑</a></li>

                </ul>
            </li>

        </ul>
    </nav>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#no').on('click', function(e){
            e.preventDefault();
        });

        $('#ddmenu li').hover(function () {
            clearTimeout($.data(this,'timer'));
            $('ul',this).stop(true,true).slideDown(200);
        }, function () {
            $.data(this,'timer', setTimeout($.proxy(function() {
                $('ul',this).stop(true,true).slideUp(200);
            }, this), 100));
        });

    });
</script>


<!--table height="100%" cellspacing=0 cellpadding=0 width="50%" background=<?php echo (C("BACK_IMG_URL")); ?>menu_bg.jpg
       border=0>
    <tr>
        <td valign=top align=middle>
            <table cellspacing=0 cellpadding=0 width="100%" border=0>
                <tr>
                    <td height=10></td>
                </tr>
            </table>
            <table cellspacing=0 cellpadding=0 width=150 border=0>
                <tr height=22>
                    <td style="padding-left: 30px" background=<?php echo (C("BACK_IMG_URL")); ?>menu_bt.jpg>电影管理中心</td>

                </tr>

                <tr height=10>
                    <td></td>
                </tr>
            </table>
            <a class=menuchild background=<?php echo (C("BACK_IMG_URL")); ?>menu_bt.jpg
               href="<?php echo U('Ticket/add');?>"
               target=main>添加电影</a>
            <a class=menuchild
               href="<?php echo U('Ticket/update');?>"
               target=main>修改电影</a>
            <a class=menuchild
               href="<?php echo U('Ticket/showlist');?>"
               target=main>添加电影票</a>
            <a class=menuchild
               href="#"
               target=main>修改电影票</a>

</table-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>修改商品</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="<?php echo (C("BACK_CSS_URL")); ?>mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：商品管理-》修改商品信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="./admin.php?c=goods&a=showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="./admin.php?c=goods&a=add" method="post" enctype="multipart/form-data">
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>商品名称</td>
                    <td><input type="text" name="f_goods_name" value="KD877" /></td>
                </tr>
                <tr>
                    <td>商品分类</td>
                    <td>
                        <select name="f_goods_category_id">
                            <option>请选择</option>
                            <option>家用电器</option>
                            <option>手机数码</option>
                            <option>电脑办公</option>
                            <option>服饰鞋帽</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>商品品牌</td>
                    <td>
                        <select name="f_goods_brand_id">
                            <option>请选择</option>
                            <option>苹果</option>
                            <option>诺基亚</option>
                            <option>HTC</option>
                            <option>摩托罗拉</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>商品价格</td>
                    <td><input type="text" name="f_goods_price" value="1239.99" /></td>
                </tr>
                <tr>
                    <td>商品图片</td>
                    <td><input type="file" name="f_goods_image" value="<?php echo (C("BACK_IMG_URL")); ?>2013-12-33.jpg" /></td>
                </tr>
                <tr>
                    <td>商品详细描述</td>
                    <td>
                        <textarea name="f_goods_introduce">卓越的纤薄设计，却依然为更大的显示屏和更快的芯片预留了空间。超快无线网络连接也不会牺牲电池使用时间。全新耳机带来绝佳音效和非凡贴合的舒适度。如此众多的精彩功能融入这款 iPhone，如此，你才可以享受它的精彩更多。</textarea>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="修改">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html>
</body>
</html>