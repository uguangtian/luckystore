<?php
$config['host'] = "localhost"; //MYSQL数据库地址，通常为IP地址或者网址，请问一下你的空间提供商
$config['db_name'] = "luckystore"; //所使用MYSQL数据库名称
$config['user'] = "root"; //MYSQL数据库登陆账号
$config['password'] = "mysql"; //MYSQL数据库登陆密码
$config['page_size'] = "3";

$config['db_user_table_name'] = "user";
$config['db_main_table_name'] = "luckyinfo";

// $config['time_zone']=date_default_timezone_get();
date_default_timezone_set("Asia/Shanghai");

?>
