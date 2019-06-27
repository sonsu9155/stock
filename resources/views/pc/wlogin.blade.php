<!DOCTYPE html >
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>股票交易系统</title>
    <link rel="stylesheet" type="text/css" href="css/service.css" />
    <STYLE type=text/css> </STYLE> <script type="text/javascript">
        function changeImg(){ 
    var a=document.getElementById("validateImg");
    a.src='validate.php?'+Math.random();
  }

  function loginSub()
  {
    var username = document.loginForm.username.value;
    var password = document.loginForm.password.value;
    var validate = document.loginForm.validate.value;
  if(username == null || username == '' || username.length ==0){
    alert("用户名不能为空");
    document.loginForm.username.select();
    return false;
  }
  else if(password == null || password == '' || password.length ==0){
    alert("密码不能为空");
    document.loginForm.password.select();
    return false;
  }

  else if(validate == null || validate == '' || validate.length ==0){
    alert("请输入验证码");
    document.loginForm.validate.select();
    return false;
  }
  document.loginForm.submit();
  }
</script>
</head>
<body class="bg" style="margin:0;background: url(log_img/wlogin_bg.jpg) no-repeat;background-size: cover;">
<center>
<form id="loginForm" name="loginForm" action="login_from.php?type=wlogin" method="post">
<div>
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTEzMTM1NzYyOWQYAQUeX19Db250cm9sc1JlcXVpcmVQb3N0QmFja0tleV9fFgEFEmxvZ2luJEltYWdlQnV0dG9uMy0NjYnqE1OQ0s3BRaepPTI38NBN" />
</div>

<div>

  <input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEWBAKw5sjAAQK+xbefDAK5moqnBwLE2NmXBQmznIc2kAYJW1PuDS53/X8WKSd6" />
</div>
<OBJECT id=cssweb height=0 width=0 
classid=CLSID:1BC4E1F9-758D-4BDA-A7DE-A9E1DA7D1E41></OBJECT>
<TABLE cellSpacing=0 cellPadding=0 width=1004 border=0>
  <TBODY>
  <TR>

    <TD class=centent_login_bg>
      <DIV id=inf_1>
      
    
    
 <TABLE class=login_tab_warp cellSpacing=0 cellPadding=0 width="100%" 
      border=0>
        <TBODY>
    
      
        <TR>
          <TD class=left width=62><SPAN id=accountName>会员帐号</SPAN>：</TD>
          <TD class=left width=198><input   type="text" id="username" name="username"  class="login_input2" style="WIDTH: 148px" /></TD></TR>
        <TR id=servicePwdId>
          <TD class=left>用户密码：</TD>
          <TD class=left width=198><input  type="password" id="password" name="password"  class="login_input" style="WIDTH: 148px" /></TD></TR>
                <TR id=searchPwdId style="DISPLAY: none">
          <TD class=left>查询密码：</TD>
          <TD class=left><INPUT class=login_input 
            onkeypress="keypress1('vcode',event.keyCode);" id=trdpwd 
            style="WIDTH: 148px" type=password name=trdpwd></TD></TR>
        <TR>
          <TD class=left>验 证 码：</TD>
          <TD class=left><INPUT class=login_input3 
            type="text" id="validate" name="validate"  onkeydown="if(event.keyCode==13){loginSub();}"
            style="WIDTH: 72px" maxLength=4 >&nbsp; <IMG 
             id="validateImg" name="validateImg" src="validate.php" 
            style="MARGIN-LEFT: 5px; CURSOR: pointer"  onclick="changeImg();"
            src="validate.php" align=absMiddle> </TD></TR>
        <TR class=left>
          <TD class="pd_t10 pd_b20" colSpan=2>
            <DIV>
            <DIV class=float_left><A 
            href="#">
      <input type="image"  onclick="loginSub();"   id="submitbutton" name="submitbutton" src="log_img/login_bot.png" style="border-width:0px;" /><A 
            href="#">
      </DIV>
            </DIV></TD></TR>
        </TBODY></TABLE>
    
    </DIV>
    
     
      
      <DIV class=white_content id=light3>
      <DIV 
      style="MARGIN-TOP: 240px; Z-INDEX: 1; WIDTH: 100%; POSITION: absolute; HEIGHT: 297px">
      <DIV style="WIDTH: 638px" align=right></DIV></DIV></DIV>
</TABLE>
</form>
</center>

</body>
</html>