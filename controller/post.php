

 <?php
header("content-type:text/html;charset=utf-8");
require_once '../view/output_fns.php';
meta_form();
?>

 <script type="text/javascript">
function check_message(){
    if(window.document.leavemsg.user_name.value==""){
      alert("请填写用户名");
      document.leavemsg.user_name.focus();
      return false;}


// check QQ number
      var qq=document.leavemsg.user_qq.value;
          if(qq!=''){
          var regQQ=/^\d*$/.test(qq);
          if (!regQQ&&qq>4&&qq<12) {  //danymic check
              alert("请输入正确的QQ号码");
              document.leavemsg.post_title.focus();

          return false;

           }

  }


// check telephone number
      if(document.leavemsg.user_tel.value!=''){
      var value =document.leavemsg.user_tel.value;
      var regTel1 = /^(([0\+]\d{2,3}-)?(0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$/.test(value);//带区号的固定电话
      var regTel2 = /^(\d{7,8})(-(\d{3,}))?$/.test(value);//不带区号的固定电话

      var regTel3=/^(?:13\d|15\d|18[123456789])-?\d{5}(\d{3}|\*{3})$/.test(value);

      if (!regTel1 && !regTel2&&!regTel3) {
          alert("请输入正确的电话号码");
            document.leavemsg.post_info.focus();
          return false;
        }

   }

      if(document.leavemsg.post_title.value==""){
      alert("请填写留言标题.");
      document.leavemsg.post_title.focus();
      return false;}



      if(document.leavemsg.post_info.value==""){
      alert("请填写留言内容.");
      document.leavemsg.post_info.focus();
      return false;}

      return true;

    }



</script>

</head>

   <div class="form-group container">
     <form class="form-group" action="updata.php" method="post" name="leavemsg" id="leavemsg">

         <br>
          <b>分类：</b>

           <label>
             <input name="post_fabu" type="radio" id="yishi" value="yishi" checked="checked" />
             遗失
           </label>
           <label>
             <input type="radio" name="post_fabu" value="found" id="zhaoling" />
             招领
           </label>

           <br><br>
           <label>* 用 户 名：</label>
           <input name="user_name" type="text" maxlength="20" class="form-control"  max-width:50px/>
         </br>
         <label>联 系 QQ：</label>
         <input name="user_qq" type="text" maxlength="11" class="form-control" />
       </br>
       <label>联系电话：</label>
       <input name="user_tel" type="text" maxlength="11" class="form-control"  />
       <br>
       <label>* 标题：</label>
       <input name="post_title" type="text" size="50" maxlength="50" class="form-control" />
       <br>
       <label>* 内容：</label>
       <textarea name="post_info" cols="60" rows="10" class="form-control" ></textarea>
       <input name="submit" type="submit" value="提交" onclick="return check_message()"  />
       <input name="B2" type="reset" value="重置"  />
      </form>
   </div>
 <?php
footer_form();
?>