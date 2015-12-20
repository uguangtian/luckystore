 <?php
require_once '../config.php';
require_once '../view/output_fns.php';

header("content-type:text/html;charset=utf-8");
meta_form();
?>
 <div class="container">
 	<div class="container"><div class="page-head">物品招领</div></div>



<?php
require_once '../models/main.php';

$result = func_db_page_count();

//判断当前页码
if (empty($_GET['page']) || $_GET['page'] < 0) {
	$page = 1;
} else {
	$page = $_GET['page'];
}

$result = func_db_show_got($config['page_size']);

while ($rs = mysqli_fetch_assoc($result)) {
	$qq = $rs['qq'];

	echo '<div class="container article-single article"><div class="col-md-10 col-md-offset-1 panel panel-default">
  <div class=result><ul class="info"><li>物品:' . $rs['title'] . '</li><li>状态: <font color=blue>招领</font></li>';

	echo "<li>简述:" . $rs['info'] . "</li>";
	echo "<li>拾到人:" . $rs['name'] . "<br>联系方式 QQ:<a href='tencent://message/?uin=$qq&Site=www.smwbbs.cn&Menu=yes' target='_blank'>" . $rs['qq'] . "</a>-电话:
	" . $rs['tel'] . '<br><p>发布时间:' . $rs['time'] . "</p></li></ul></div></div></div></div>\n";
}

show_paging($config['page_size']);
footer_form();
?>

 </div>

