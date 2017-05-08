<?php
return array(
    //前台
    'CSS_URL' => '/Booking/Home/Public/css/',
    'JS_URL' => '/Booking/Home/Public/js/',
    'IMG_URL' => '/Booking/Home/Public/img/',
    //后台
    'BACK_CSS_URL' => '/Booking/Back/Public/css/',
    'BACK_JS_URL' => '/Booking/Back/Public/js/',
    'BACK_IMG_URL' => '/Booking/Back/Public/img/',

    //配置路径，方便第三方功能包文件的访问
    'PLUGIN_URL' => '/Booking/plugin/',

    /* 数据库设置 */
    'DB_TYPE' => 'mysql',     // 数据库类型
    'DB_HOST' => 'localhost', // 服务器地址
    'DB_NAME' => 'booking',          // 数据库名
    'DB_USER' => 'root',      // 用户名
    'DB_PWD' => '123',          // 密码
    'DB_PORT' => '3306',        // 端口
    'DB_PREFIX' => 'booking_',    // 数据库表前缀
    'DB_PARAMS' => array(), // 数据库连接参数
    'DB_DEBUG' => TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE' => true,        // 启用字段缓存
    'DB_CHARSET' => 'utf8',      // 数据库编码默认采用utf8
);