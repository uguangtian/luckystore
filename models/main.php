<?php

function func_db_connect() {
	require '../config.php';

	$conn = mysqli_connect($config['host'], $config['user'], $config['password'], $config['db_name']); //打开MySQL服务器连接
	if (!$conn) {
		throw new Exception('未能连接到数据库');
	} else {
		return $conn;
	}

}
function func_db_page_count() {
	$conn = func_db_connect();
	$sql = 'select * from luckyinfo';
	$result = mysqli_query($conn, $sql);
	return $result;
}

//return all row
require_once '../config.php';
function func_db_showall($Page_size) {
	$conn = func_db_connect();
	if (empty($_GET['page']) || $_GET['page'] < 0) {
		$page = 1;
	} else {
		$page = $_GET['page'];
	}
	$offset = $Page_size * ($page - 1);
	mysqli_query($conn, "set names utf8"); //解决中文乱码问题

	$sql = "select * from luckyinfo ORDER BY id DESC  limit $offset,$Page_size ";
	$result = mysqli_query($conn, $sql); //执行sql语句，返回结果

	return $result;

}

function func_db_showlost($Page_size) {
	$conn = func_db_connect();
	if (empty($_GET['page']) || $_GET['page'] < 0) {
		$page = 1;
	} else {
		$page = $_GET['page'];
	}
	$offset = $Page_size * ($page - 1);
	mysqli_query($conn, "set names utf8"); //解决中文乱码问题

	$sql = "select * from luckyinfo where fabu = 'yishi' ORDER BY id DESC limit $offset,$Page_size";
	$result = mysqli_query($conn, $sql);

	return $result;
}

function func_db_show_got($Page_size) {
	$conn = func_db_connect();
	if (empty($_GET['page']) || $_GET['page'] < 0) {
		$page = 1;
	} else {
		$page = $_GET['page'];
	}
	$offset = $Page_size * ($page - 1);
	mysqli_query($conn, "set names utf8"); //解决中文乱码问题

	$sql = "select * from luckyinfo where fabu = 'zhaoling' ORDER BY id DESC limit $offset,$Page_size";
	$result = mysqli_query($conn, $sql); //执行sql语句，返回结果
	return $result;
}

// $conn = mysql_connect($host, $user, $password);
// mysql_select_db($db);
// mysql_query("set names utf8");
// $exec = "select password from users where admin_name='$admin_name'";
// $result = mysql_query($exec);
// $num = mysql_num_rows($result);

function func_db_check_account($admin_name) {
	$conn = func_db_connect();
	mysqli_query($conn, "set names utf8"); //解决中文乱码问题

	$sql = "select password from users where admin_name=\"" . $admin_name . "\"";
	$result = mysqli_query($conn, $sql);

	return $result;
}
