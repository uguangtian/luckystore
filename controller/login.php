
 <?php
header("content-type:text/html;charset=utf-8");
require_once '../view/output_fns.php';
meta_form();
?>
 <div class="container">

 	<script type="text/javascript">
function check_message(){
		if(window.document.adminlogin.admin_name.value==""){
			alert("请输入用户名");
			document.adminlogin.admin_name.focus();
			return false;}
			if(document.adminlogin.password.value==""){
			alert("请输入密码");
			document.adminlogin.password.focus();
			return false;}
}
			return true;
		}
</script>
 </head>
 <body>
 <div class="form-group container">
 	<form action="../controller/check.php" method="post" name="form-group" >
 		<ul>
 		 		<li><h3>后台管理登陆</h3></li>
 			<li>
 				用户名
 				<input class="form-control" name="admin_name" type="text" maxlength="20" />
 			</li>
 		</ul>
 		<ul>

 			<li>
 				密码
 				<input class="form-control" name="password" type="password" maxlength="20" />
 			</li>
 		</ul>


 		<ul>
 			<li class="add">
 				<input name="submit" type="submit" value="提交" onclick="return check_message()"></li>
 		</ul>
 	</div>
 </form>
 </div>
<?php
footer_form();
?></body>