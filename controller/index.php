 <?php
header("content-type:text/html;charset=utf-8");

require_once '../config.php';
require_once '../view/output_fns.php';

meta_form();
?>



 <!-- block fiew -->
  <div class="container">


<?php
require_once '../models/main.php';
$result = func_db_page_count();

//判断当前页码
if (empty($_GET['page']) || $_GET['page'] < 0) {
	$page = 1;
} else {
	$page = $_GET['page'];
}

$result = func_db_showall($config['page_size']);
while ($rs = mysqli_fetch_assoc($result)) {
	$qq = $rs['qq'];
	if (($rs['fabu']) == "yishi") {
		echo '<div class="container article-single article">
                       <div class="col-md-10 col-md-offset-1 panel panel-default lost">

                    <ul class="info"><li>物品:' . $rs['title'] . '</li><li> 状态: <font color=red>遗失</font></li>';

		echo "<li>简述:" . $rs['info'] . "</li>";
		echo "<li>遗失人:" . $rs['name'] . "<br>联系 QQ:<a href='tencent://message/?uin=$qq&Site=www.smwbbs.cn&Menu=yes' target='_blank'>" . $rs['qq'] . "</a> 电话:
  " . $rs['tel'] . " <br>发布时间:" . $rs['time'] . "</li></ul></div></div></div></div></div>\n";

	} else {
		echo '<div class="container article-single article"><div class="col-md-10 col-md-offset-1 panel panel-default">
<ul class="info"><li>物品:' . $rs['title'] . '<li>状态: <font color=blue>招领</font></li>';
		echo "<li>简述:" . $rs['info'] . "</li>";
		echo "<li>拾到者:" . $rs['name'] . "<br>联系 QQ:<a href='tencent://message/?uin=$qq&Site=www.smwbbs.cn&Menu=yes' target='_blank'>" . $rs['qq'] . "</a> 电话:
	" . $rs['tel'] . '<br><p class="text-muted">发布时间:' . $rs['time'] . "</p></li></ul></div></div></div></div></div>\n";

	}
}

show_paging($config['page_size']);
footer_form();
?>
