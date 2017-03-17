<?php if (!defined('THINK_PATH')) exit();?><!--不采用默认的布局-->

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>在线电影票</title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?php echo (C("CSS_URL")); ?>bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (C("CSS_URL")); ?>font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (C("CSS_URL")); ?>monokai_sublime.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (C("CSS_URL")); ?>screen.css?v=7dddbe75bf"/>
    <link rel="stylesheet" type="text/css" href="<?php echo (C("CSS_URL")); ?>magnific-popup.min.css">
    <script src="<?php echo (C("JS_URL")); ?>jquery.min.js"></script>
    <script src="<?php echo (C("JS_URL")); ?>bootstrap.min.js"></script>
    <script src="<?php echo (C("JS_URL")); ?>jquery.fitvids.min.js"></script>
    <script src="<?php echo (C("JS_URL")); ?>highlight.min.js"></script>
    <script src="<?php echo (C("JS_URL")); ?>jquery.magnific-popup.min.js"></script>
    <script src="<?php echo (C("JS_URL")); ?>main.js?v=7dddbe75bf"></script>

</head>
<body class="home-template">

<!-- start header -->
<header class="main-header"
        style="background-image: url('<?php echo (C("IMG_URL")); ?>header.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <!-- start logo -->
                <a class="branding" href="/Booking" title="在线电影票">
                    <img src="<?php echo (C("IMG_URL")); ?>logo.jpg" alt="在线电影票"></a>
                <!-- end logo -->
                <h2 class="text-hide">欢迎登陆在线电影票</h2>

                <img src="<?php echo (C("IMG_URL")); ?>header.jpg" alt="在线电影票"
                     class="hide">
            </div>
        </div>
    </div>
</header>
<!-- end header -->

<!-- start navigation -->
<nav class="main-navigation">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="navbar-header">
                        <span class="nav-toggle-button collapsed" data-toggle="collapse" data-target="#main-menu">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-bars"></i>
                        </span>
                </div>
                <div class="collapse navbar-collapse" id="main-menu">
                    <ul class="menu">
                        <li class="nav-current" role="presentation"><a href="/">首页</a></li>
                        <li role="presentation"><a href="<?php echo U('User/login');?>">登陆</a></li>
                        <li role="presentation"><a href="<?php echo U('User/regist');?>">注册</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- end navigation -->
<!-- start site's main content area -->
<section class="content-wrap">
    <div class="container">
        <div class="row">

            <main class="col-md-8 main-content">
                <?php if(is_array($film)): foreach($film as $key=>$v): ?><article id=98 class="post">
                        <div class="post-head">
                            <h1 class="post-title"><a href=""><?php echo ($v["filmname"]); ?></a>
                            </h1>
                            <div class="post-meta">
                                &bull;<span class="author">主演：<a href=""><?php echo ($v["zhuyan"]); ?></a></span>
                            </div>
                        </div>
                        <div class="post-content">
                            <p><?php echo ($v["info"]); ?>
                            </p>
                        </div>
                        <div class="post-permalink">
                            <a href="<?php echo U('Buy/buy');?>?filmid=<?php echo ($v["filmid"]); ?>" class="btn btn-default">订票</a>
                        </div>
                    </article><?php endforeach; endif; ?>
                <!--nav class="pagination" role="navigation">
                    <span class="page-number">第 1 页 &frasl; 共 8 页</span>
                    <a class="older-posts" href="/page/2/"><i class="fa fa-angle-right"></i></a>
                </nav-->
            </main>
            <aside class="col-md-4 sidebar">
                <!-- start tag cloud widget -->
                <div class="widget">
                    <h4 class="title">影院火热</h4>
                    <div class="content tag-cloud">
                        <a href="">我不是潘金莲</a>
                        <a href="">...</a>
                    </div>
                </div>
                <!-- end tag cloud widget -->
            </aside>
        </div>
    </div>
</section>
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <span>Copyright &copy; <a href="">在线电影票</a></span> |
                <span><a href="http://www.miibeian.gov.cn/" target="_blank">京ICP备11111111号</a></span> |
                <span>京公网安备1111111111111111</span>
            </div>
        </div>
    </div>
</div>

<a href="#" id="back-to-top"><i class="fa fa-angle-up"></i></a>
</body>
</html>