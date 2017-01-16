<?php if (!defined('THINK_PATH')) exit();?><!doctype html public "-//w3c//dtd xhtml 1.0 frameset//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-frameset.dtd">
<html>
<head>
    <title>管理中心</title>
    <link href="<?php echo (C("BACK_CSS_URL")); ?>admin.css" type="text/css" rel="stylesheet"/>
    <link href="<?php echo (C("BACK_CSS_URL")); ?>styles.css" type="text/css" rel="stylesheet"  media="all" >
    <script type="text/javascript" src="<?php echo (C("BACK_JS_URL")); ?>jquery.min.js"></script>
    <link href="<?php echo (C("BACK_CSS_URL")); ?>mine.css" type="text/css" rel="stylesheet">

    <script type="text/javascript" charset="utf-8" src="<?php echo (C("PLUGIN_URL")); ?>ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo (C("PLUGIN_URL")); ?>ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo (C("PLUGIN_URL")); ?>ueditor/lang/zh-cn/zh-cn.js"></script>
    <script type='text/javascript'>
        UEDITOR_CONFIG.toolbars = [[
            'fullscreen', 'source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
            'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
            'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
            'directionalityltr', 'directionalityrtl', 'indent', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
            'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|'
        ]];

    </script>
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
                    <li><a href="<?php echo U('Manage/add');?>">添加电影</a></li>
                    <li><a href="<?php echo U('Manage/update');?>">修改电影</a></li>

                </ul>
            </li>
            <li><a class="no" href="#">电影票管理</a>
                <ul>
                    <li><a href="<?php echo U('Manage/update');?>">添加电影票</a></li>
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
    //关闭a标签的默认功能
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
<div class="div_head">
            <span>
                <span style="float:left">当前位置是：电影管理-》添加电影</span>

            </span>
</div>

<div style="font-size: 13px;margin: 10px 5px">
    <form action="./admin.php?c=goods&a=add" method="post" enctype="multipart/form-data">
        <table border="1" width="100%" class="table_a">
            <tr>
                <td>电影名称</td>
                <td><input type="text" name="f_goods_name"/></td>
            </tr>
            <tr>
                <td>电影主演</td>
                <td>
                    <input type="text" name="f_goods_name"/>
                </td>
            </tr>
            <tr>
                <td>票价</td>
                <td>
                    <input type="text" name="f_goods_name"/>
                </td>
            </tr>
            <tr>
                <td>电影海报</td>
                <td><input type="file" name="f_goods_image" id="f_goods_image"/></td>
            </tr>
            <tr>
                <td>电影简介</td>
                <td>
                    <textarea id="film_info" style="width: 100% ;height: 280px"></textarea>
                </td>
                <script type="text/javascript">
                    var ue = UE.getEditor('film_info');
               </script>
                    </tr>

            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="添加">
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>