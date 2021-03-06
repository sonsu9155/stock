<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link  rel="stylesheet"  type="text/css" href="css/layout.css">	
	<script type="text/javascript" src="./tips/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="./tips/jquery.poshytip.js"></script>
<script type="text/javascript" src="./js/jquery.validate.js"></script>
<script type="text/javascript" src="./js/noright.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#pwdform").validate({
		rules: {
			oldpwd: { required:true },
			password_confirm: {
				required: true,
				rangelength: [6, 20],
				equalTo: "#password"
			},
			atmpwd: {
				required: true,
				rangelength: [4, 5],
				equalTo: "#atmpwd"
			}
		},
		messages: {
			oldpwd: { required: "[<b>旧密码</b>]:不能为空."},
			password_confirm: {
				required: "[<b>确认密码</b>]:不能为空.",
				rangelength: jQuery.format("[<b>确认密码</b>]:请输入 {0} 至 {1} 位的字符."),
				equalTo: "[<b>新密码</b>] 与 [<b>确认密码</b>] 不一致,请重新输入."
			},
			atmpwd: { required: "[<b>提款密码</b>]:不能为空."}
		},
		//所有符合后运行以下功能
		submitHandler: function(form) {
			document.pwdform.submit();
		}
	});
});
</script>
	<title>密码修改</title>
  
</head>
<body>


<div id="main_content" class="full">
		<div class="breadcrumbs">
			<span class="breadcrumbs_left breadcrumbs_radius"></span>
			<span class="breadcrumbs_right breadcrumbs_radius"></span>
			<div class="title user public_bg"></div>
			<div class="currbread">
				<span class="breadico public_bg"></span>
				<a href="javascript:;">您当前的位置：</a>&gt;
				<a href="user.php">我的帐户</a>&gt;
				<a href="javascript:;">密码修改</a>
			</div> 
		</div>
		<div class="page_content">
			<div class="page_top">
				<div class="page_menu">
				<ul>
					<li><a href="user.php">基本信息</a>|</li>
					<li><a href="pwd.php" class="public_bg">修改密码</a>|</li>
					<li><a href="payment.php">在线入金</a>|</li>
                    <li><a href="payment.php?type=log" >存款记录</a>|</li>
                    <li><a href="atm.php">申请提款</a>|</li>
                    <li><a href="atm.php?type=log">提款记录</a>|</li>
                    <li><a href="message.php" >收件箱</a></li>
                    
				</ul>
			</div>			<div class="page_search">

			</div>
			<div class="clear"></div>
			</div>
			<div class="page_table relative page_height page_table_padding page_users">
	
                <form id="pwdform" name="pwdform" action="pwd.php?type=save" method="post">
                  <table width="99%"  border="0" align="center" cellpadding="3" cellspacing="1" class="table table-type1 table_padding table_nborder table_tleft tcolor">
          
                    <tr  class="even">
                      <td width="20%" height="20" align="right" bgcolor="#EDF8FF">会员帐号：</td>
                      <td bgcolor="#EDF8FF" class="gray">111222</td>
                    </tr>
                    <tr>
                      <td height="20" align="right" bgcolor="#EDF8FF">旧密码：</td>
                      <td bgcolor="#EDF8FF" class="gray"><input name="oldpwd" type="password" id="oldpwd" size="20"></td>
                    </tr>
                    <tr  class="even">
                      <td height="20" align="right" bgcolor="#EDF8FF">新密码：</td>
                      <td bgcolor="#EDF8FF" class="gray"> <input name="password" type="password" id="password" size="20">
                      <span class="gray">(需6~20码，英数组合)</span> </td>
                    </tr>
                    <tr>
                      <td height="20" align="right" bgcolor="#EDF8FF">确认密码：</td>
                      <td bgcolor="#EDF8FF" class="gray"><input name="password_confirm" type="password" id="password_confirm" size="20"></td>
                    </tr>
					
				  <tr>
                      <td height="20" align="right" bgcolor="#EDF8FF">提现密码：</td>
                      <td bgcolor="#EDF8FF" class="gray"><input name="atmpwd" type="password" id="atmpwd" size="20"></td>
                    </tr>
					
					
                    <tr  class="even">
                      <td height="20" align="right" bgcolor="#EDF8FF">&nbsp;</td>
                      <td bgcolor="#EDF8FF" class="gray"><input type="submit" name="Submit" value="修改登陆密码" class="button3"></td>
                    </tr>
                  </table>
                </form>
    
				 
    
    
    
				<div class="verify_content verify_padding">
					
 					<!--<ul>
 						<li>
 							<span></span>
 							<p class="mtm">联系电话：<br/>18888888</p>
 						</li>
 						<li class="plp">
 							<span class="bg2"></span>
 							<p class="mtm">QQ在线客服：</p>
 							<p> <a target="_blank" href=""><img src="images/zxqq.png"/></a></p>
 						</li>
						
 						
 					</ul>-->
 					<div class="clear"></div>
				</div><div class="page_info">
	
		
		<div class="clear"></div>
	</div>
</div>				
			</div> <!--page_table end-->

		</div> <!--page_content end-->
	</div>


</body>
</html>