<?php
require_once '../config.php';
require_once '../models/main.php';
require_once '../view/output_fns.php';
session_start();
$admin_name = $_POST['admin_name'];
$admin_password = $_POST['password'];

meta_form();
$result = func_db_check_account($admin_name);

if (!$rs = mysqli_fetch_assoc($result)) {
	echo '<center>用户不存在,请<a href="../controller/login.php">返回重新登录</a></center></center>';
} else {

	if ($rs['password'] == $admin_password) {
		$_SESSION['admin'] = "OK";
		header("location:../controller/admin_index.php");
	} else {
		echo
			'<center>密码不正确,请<a href="../controller/login.php">返回重新登录</a></center>';}}

?>