<?php
function getip() {
	$IP = getenv('REMOTE_ADDR');
	$IP_ = getenv('HTTP_X_FORWARDED_FOR');
	if (($IP_ != "") && ($IP_ != "unknown")) {
		$IP = $IP_;
	}

	return $IP;
}
require '../config.php';
date_default_timezone_set("Asia/Shanghai");
$name = $_POST['user_name'];
$qq = $_POST['user_qq'];
$tel = $_POST['user_tel'];
$fabu = $_POST['post_fabu'];
$ip = getip();
$info = $_POST['post_info'];
$title = $_POST['post_title'];
$time = date("Y-m-d H:i:s");
$conn = mysql_connect($config['host'], $config['user'], $config['password']);
mysql_query("set names utf8"); //解决中文乱码问题
mysql_select_db($config['db_name']);
$exec = "insert into luckyinfo (name,qq,tel,fabu,ip,title,info,time) values ('$name','$qq','$tel','$fabu','$ip','$title','$info','$time')";
$result = mysql_query($exec);
mysql_close();
header("location:index.php");
?>
