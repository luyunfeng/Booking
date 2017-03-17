<?php if (!defined('THINK_PATH')) exit();?><!-- 这个是默认的上下布局文件-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>在线电影票</title>
    <link rel="stylesheet" href="<?php echo (C("CSS_URL")); ?>base.css" type="text/css">
    <link rel="stylesheet" href="<?php echo (C("CSS_URL")); ?>global.css" type="text/css">
    <link rel="stylesheet" href="<?php echo (C("CSS_URL")); ?>header.css" type="text/css">
    <link rel="stylesheet" href="<?php echo (C("CSS_URL")); ?>login.css" type="text/css">
    <link rel="stylesheet" href="<?php echo (C("CSS_URL")); ?>footer.css" type="text/css">
</head>
<body>
<div style="clear:both;"></div>
<!-- 页面头部 start -->
<div class="header w990 bc mt15">
    <div class="logo w990">
        <h2 class="fl"><a href="<?php echo U('Index/index');?>"><img src="<?php echo (C("IMG_URL")); ?>logo.jpg" alt="在线电影票"></a></h2>
    </div>
</div>
<!-- 页面头部 end -->
<!--头部开始采用默认的布局文件-->
	<!-- 登录主体部分start -->
	<div class="login w990 bc mt10">
		<div class="login_hd">
			<h2>用户登录</h2>
			<b></b>
		</div>
		<div class="login_bd">
			<div class="login_form fl">
				<form action="" method="post">
					<ul>
						<li>
							<label for="">用户名：</label>
							<input type="text" class="txt" name="username" />
						</li>
						<li>
							<label for="">密码：</label>
							<input type="password" class="txt" name="password" />
							<a href="">忘记密码?</a>
						</li>

						<li class="checkcode">
							<label for="">验证码：</label>
							<input type="text"  name="checkcode" />
							<img src="<?php echo U('User/verifyImg');?>" onclick="this.src='<?php echo U('User/verifyImg');?>'" />

						</li>

						<li>
							<input type="submit" value="登陆" class="reg_btn" />

						</li>
					</ul>
				</form>
				<div style="color:#F00 ;font-size:20px;"><?php echo ($error); ?></div>
				<div class="coagent mt15">
					<dl>
						<dt>使用合作网站登录商城：</dt>
						<dd class="qq"><a href=""><span></span>QQ</a></dd>
						<dd class="weibo"><a href=""><span></span>新浪微博</a></dd>
						<dd class="yi"><a href=""><span></span>网易</a></dd>
						<dd class="renren"><a href=""><span></span>人人</a></dd>
						<dd class="qihu"><a href=""><span></span>奇虎360</a></dd>
						<dd class="douban"><a href=""><span></span>豆瓣</a></dd>
					</dl>
				</div>
			</div>
			
			<div class="guide fl">
				<h3>还不是用户</h3>
				<p>现在免费注册成为电影院用户，便能立刻享受便宜又放心的订票，心动不如行动，赶紧加入吧!</p>
				<a href="regist.html" class="reg_btn">免费注册 >></a>
			</div>

		</div>
	</div>
	<!-- 登录主体部分end -->


</body>
</html>