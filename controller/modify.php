<?php
session_start();
?>

 <?php
header("content-type:text/html;charset=utf-8");
require_once '../view/output_fns.php';
require_once '../config.php';
require_once '../models/main.php';

meta_form();
?>

</head>
<body>
<div id=main>
<div class="head"><p>信息修改</p></div>

 <?php
if ($_SESSION['admin'] == "OK") {
	$conn = mysql_connect($config['host'], $config['user'], $config['password']);
	mysql_select_db($config['db_name']);
	mysql_query("set names utf8");
	$exec = "select * from luckyinfo where id=" . $_GET['id'];
	$result = mysql_query($exec);
	$rs = mysql_fetch_object($result);
	$name = $rs->name;
	$qq = $rs->qq;
	$tel = $rs->tel;
	$ip = $rs->ip;
	$title = $rs->title;
	$info = $rs->info;
	$id = $rs->id;
	?>
  <form action="../controller/updata1.php" method="post" name="name1" id="name1">
    <div class=main1>
      <ul>
        <li class="left1"> <b>标  题：
            <?=$title?></b>
        </li>
      </ul>
    </div>
    <div class=main1>
      <ul>
        <li class="left1"> <b>ID:</b>
          <?=$id?>
          <input type=hidden name=id value=<?=$id?>
          >  |
          <b>用户名</b>
          ：
          <?=$name?>
          |
          <b>IP</b>
          ：
          <?=$ip?></li>
      </ul>
    </div>
    <div class=main1>
      <ul>
        <li class="left1">
          <b>联系QQ</b>
          ：
          <a href='tencent://message/?uin=<?=$qq?>
            &Site=www.smwbbs.cn&Menu=yes' target='_blank'>
            <?=$qq?></a>
          |
          <b>联系电话：</b>
          <?=$tel?></li>
      </ul>
    </div>
  </br>
  <div class=main1>
    <ul>
      <li class="left">
        <b>内容：</b>
      </li>
      <li class="right">
        <textarea name="post_info" cols="60" rows="10">
          <?=$info?></textarea>
      </li>
    </ul>
  </div>
  <div class=main1>
    <ul>
      <li class="add">
        <input name="submit" type="submit" value="修改" />
      </li>
      <li class="replay">
        <input name="B2" type="reset" value="重置" />
      </li>
    </ul>
    <div class=result>
      <a href=controller/admin_index.php>回后台</a>
      -|-
      <a href=index.php>回首页</a>
      -|-
      <a href=controller/delete.php?id=<?=$id?>>删除信息</a>
    </div>
  </div>
  </form>
 <?php
}
mysql_close();
?>

</div>
</body>
</html>
