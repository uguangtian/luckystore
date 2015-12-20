<?
 session_start();
 echo "this php wordk";
 if($_SESSION['admin']=="OK")
 {
  require('config.php');
  $conn=mysql_connect($host,$user,$password);
  mysql_select_db($db);
  mysql_query("set names utf8");
  $exec="select * from luckyinfo where id=".$_GET['id'];
  $exec="update luckyinfo set info='".$_POST['post_info']."' where id=".$_POST['id'];
  $result=mysql_query($exec);

 }
 mysql_close();
 header("location:controller/admin_index.php");
?>

