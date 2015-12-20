 <?php
header("content-type:text/html;charset=utf-8");
require_once '../view/output_fns.php';

meta_form();
?>




<div class="container">
  <div class="container"><div class="page-head">物品遗失</div></div>
   <?php
require_once '../models/main.php';

require_once '../config.php';

//return result of search for lost;
$result = func_db_showlost($config['page_size']);
while ($rs = mysqli_fetch_assoc($result)) {
	$qq = $rs['qq'];
	echo '<div class="container article-single article"><div class="col-md-10 col-md-offset-1 panel panel-default lost">

                    <div class=result><ul class="info"><li>物品:' . $rs['title'] . '</li><li>状态:<font color=red>遗失</font></li>';

	echo "<li>简述:" . $rs['info'] . "</li>";
	echo "<li>遗失人 :" . $rs['name'] . "<br>联系方式 QQ:<a href='tencent://message/?uin=$qq&Site=www.smwbbs.cn&Menu=yes' target='_blank'>" . $rs['qq'] . "</a>    电话:
      " . $rs['tel'] . '<p>发布时间:' . $rs['time'] . "</li></ul></div></div></div></div>\n";

}
show_paging($config['page_size']);
footer_form();
?>
    </div>
    </body>
    </html>
 <?php
