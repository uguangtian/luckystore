<?
 session_start();
 echo "session not ok.";
  
 if($_SESSION['admin']=="OK")
 {
  require('config.php');
  $conn=mysql_connect($host,$user,$password);
  mysql_select_db($db);
  mysql_query("set names utf8");
  $exec="delete from luckyinfo where id=".$_GET['id'];
  mysql_query($exec);
  mysql_close();
  header("location:index.php");
 }
?>
