	<?php
function meta_form() {
	?>

<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=utf-8"/>
	<meta name="MobileOptimized" content="320">
	<meta name="HandheldFriendly" content="true">

	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="../static/css/custom.css">
	<link rel="stylesheet" href="../static/css/by_hwl.css">
	<link rel="stylesheet" href="../static/css/style.css">
	<link rel="stylesheet" href="../static/css/docs.min.css">
	<link rel="stylesheet" href="../static/css/bootstrap.css">

    <script src="../static/js/jquery-1.11.1.min.js"></script>

	<title>桂林理工大学博文管理学院 - 易班APP</title>
	<script src="../static/js/jquery-1.11.1.min.js"></script>
	<style type="text/css">

  	li{
  		list-style-type:none  ;


}

	</style>
</head>

<body id="home">
<div class="container">

<div class="navbar navbar-default navbar-fixed-top">
		<div class="navbar-header">
			<a class="navbar-brand" href="/yiban/luckystore">
				<img src="../static/img/logo-nav.png">失物招领墙</a>
			<!-- 需要在href填入当前URL的所有参数-->
		</div>
	</div>
</div>

<div style="background-position: 0px 0px;padding-top:4em;" Class="splash nav-header">
<div class="div.nav-header">
		<ul class="nav nav-pills">
			<li  class="active" role="presentation">
				<a  href="/yiban/luckystore?is_home=true">主页</a>
			</li>
			<li  class="active" role="presentation">
				<a  href="found.php">招领</a>
			</li>

			<li  class="active" role="presentation">
				<a href="lost.php">遗失</a>
			</li>
			<li class="green-path" role="presentation">
				<a  class="green-path"href="post.php">发布信息</a>
			</li>

		</ul>
	</div>
	</div>
		<?php

}

function footer_form() {
	?>

<div class="footer" id="footer">

		<div class="container">
			<center><p class="text-muted">Copyright ©2015 桂林理工大学博文管理学院</p></center>
		</div>
	</div>

	</body>
	</html>
	<script src = "../static/js/bootstrap.min.js" ></script>
	<script src = "../static/js/custom.js" ></script>

<?php
}
require_once '../config.php';
require_once '../models/main.php';
function show_paging($Page_size) {
	$result = func_db_page_count();

	$count = mysqli_num_rows($result);
	$page_count = ceil($count / $Page_size);

	$init = 1;
	$page_len = 3;
	$max_p = $page_count;
	$pages = $page_count;

//判断当前页码
	if (empty($_GET['page']) || $_GET['page'] < 0) {
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$page_len = ($page_len % 2) ? $page_len : $page_len + 1; //页码个数
	$pageoffset = ($page_len - 1) / 2; //页码个数左右偏移量

	$key = '<nav class="paging"><ul class="pagination">';
	// $key .= "<span>$page/$pages</span> "; //第几页,共几页
	if ($page != 1) {
		$key .= "<li><a href=\"" . $_SERVER['PHP_SELF'] . "?page=1\">第一页</a></li> "; //第一页
		// $key .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?page=" . ($page - 1) . "\">上一页</a>"; //上一页
	} else {
		// $key .= "第一页 "; //第一页
		// $key .= "上一页"; //上一页
	}
	if ($pages > $page_len) {
//如果当前页小于等于左偏移
		if ($page <= $pageoffset) {
			$init = 1;
			$max_p = $page_len;
		} else {
//如果当前页大于左偏移
			//如果当前页码右偏移超出最大分页数
			if ($page + $pageoffset >= $pages + 1) {
				$init = $pages - $page_len + 1;
			} else {
//左右偏移都存在时的计算
				$init = $page - $pageoffset;
				$max_p = $page + $pageoffset;
			}
		}
	}
	for ($i = $init; $i <= $max_p; $i++) {
		if ($i == $page) {
			$key .= ' <li class="active"><span>' . $i . '</span></li>';
		} else {
			$key .= " <li><a href=\"" . $_SERVER['PHP_SELF'] . "?page=" . $i . "\">" . $i . "</a></li>";
		}
	}
	if ($page != $pages) {
		// $key .= " <a href=\"" . $_SERVER['PHP_SELF'] . "?page=" . ($page + 1) . "\">下一页</a> "; //下一页
		$key .= "<li><a href=\"" . $_SERVER['PHP_SELF'] . "?page={$pages}\">最后一页</a></li></ul>"; //最后一页
	} else {
		// $key .= "下一页 "; //下一页
		// $key .= "最后一页"; //最后一页
	}
	$key .= '</nav>';
	?>
<tr>
<td colspan="2" bgcolor="#E0EEE0"><div align="center"><?php echo $key ?></div></td>
</tr>
<?php
}
