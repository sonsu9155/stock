@extends('layouts.pc_template')
@section('javascript')	
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
		submitHandler: function(form) {
			document.pwdform.submit();
		}
	});
});
</script>
	<title>密码修改</title>
@endsection	
	
@section('content')
	<div class="col-sm-10">
		<div style="width:100%; height:288px; background-color:#FFFFFF; ">
				<div style="width:100%; height:31px;background-image:url(/images/rtoubu.png);" ></div>
						<div style="width:100%;height:257px;background-image:url(/images/rzhongjian.png); padding:10px 0 0 0;" >
							<form id="pwdform" name="pwdform" action="w2pwd.php?type=save" method="post">
									<table width="100%"  border="1" align="center" cellpadding="0" cellspacing="0" style="color:#000000; border-color:#eeeeee; background-color:#FFFFFF; text-align:center;">
										<tr  style="height:28px;">
											<td align="right">会员帐号：</td>
											<td align="left">{{ $user->name }}</td>
										</tr>
										<tr style="height:28px;">
											<td  align="right" >旧密码：</td>
											<td  align="left"><input name="oldpwd" type="password" id="oldpwd" size="20"></td>
										</tr>
										<tr  style="height:28px;">
											<td  align="right" >新密码：</td>
											<td align="left"> <input name="password" type="password" id="password" size="20">
											<span class="gray">(需6~20码，英数组合)</span> </td>
										</tr>
										<tr style="height:28px;">
											<td  align="right" >确认密码：</td>
											<td align="left"><input name="password_confirm" type="password" id="password_confirm" size="20"></td>
										</tr>
										<tr  style="height:28px;">
											<td  align="right" >&nbsp;</td>
											<td align="left"><input type="submit" name="Submit" value="修改密码" class="button3"></td>
										</tr>
									</table>
							</form>
						</div>
				</div>
		</div>
	</div>
</div>
@endsection