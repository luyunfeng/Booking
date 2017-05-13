# 在线电影票订票系统
基于 thinkphp+mysql 开发

![image](/附件/模块说明.png)

* 在线选位置的功能

* 富文本编辑电影海报

## 项目目录说明
```
1.index.php 项目的入口文件
2.Back  后台模块
   2.1 Conf 后台模块的配置文件
   2.2 Controller 控制器模块( 例子:AdminController.class.php 负责控制管理员相关业务的)
   2.3 View 视图 写相关页面的
        2.3.1  Admin  管理员登陆相关页面
        2.3.2  Manage 电影管理,电影票管理页面
        2.3.3  Layout  后台视图的公共布局
   2.4 Public 视图层用到相关文件
3.Home 前台模块
   细节介绍同上
4.Common 项目总的配置文件
5.Plugin  项目中用到的第三方插件(项目中用了百度的富文本编辑器)
6.Runtime 项目运行的缓存文件
7.UploadImage 用户上传图片的保存地方
```

## 使用说明
* 数据库在 Common/Conf/config.php 中配置
* 在项目的同级目录放入thinkphp的目录(
如果项目放在 www 目录下, thinkphp 也直接放在那里就可以)
