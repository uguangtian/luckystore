<?php
require_once '../config.php';
require_once '../view/output_fns.php';
session_start();
meta_form();
?><div class="container">
  <div class="page-head">信息管理后台</div>
  <body>


    <?php
if ($_SESSION['admin'] != "OK") {

	echo "Please login";
} else {

	$conn = mysql_connect($config['host'], $config['user'], $config['password']);
	mysql_select_db($config['db_name']);
	mysql_query("set names UTF8");
	$exec = "select * from  luckyinfo ORDER BY id DESC ";
	$result = mysql_query($exec);

	?>

	<table class="table"><th>信息管理后台</th>
	<tr>
	<td>物品</td>
	<td>状态</td>
	<td>遗失人</td>
	<td>QQ</td>
	<td>电话</td>
	<td>发布时间</td>
	<td>IP</td>
	<td>修改</td>
	<td>删除</td>
	</tr>
<?php
while ($rs = mysql_fetch_object($result)) {
		echo '<tr><td>' . $rs->title . "</td><td>" . "</td><td>" . $rs->name . "</td><td>" . $rs->qq . "</td><td>" . $rs->tel . "</td><td>" . $rs->time . "</td><td>" . $rs->ip . "</td>";
		echo '<td><a href="../controller/modify.php?id=' . $rs->id . '">修改</a></td><td><a href="../controller/delete.php?id=' . $rs->id . '" >删除</a></td></tr>';
	}

}
mysql_close();
?>
</table>
<?php
footer_form();
?>

