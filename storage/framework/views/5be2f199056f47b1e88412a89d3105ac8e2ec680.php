
<!DOCTYPE html >
<html>
<head>
  <title>开户注册</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="/css/style.css" />
  <link rel="stylesheet" type="text/css" href="/css/ymPrompt.css" />
  <script type="text/javascript" src="/js/jquery1.3.2.js"></script>
  <script type="text/javascript" src="/js/ymPrompt.js"></script>
  <script type="text/javascript">
function killErrors() {
  return true;
}
window.onerror = killErrors;
</script>
<script type="text/javascript">
    var stype = "1"; 
    var bfchar = "h"; 

    function SubChk() {
      var username = $("#reg_username").val();
      var  id_card=$('#id_card').val();
      var  bank_card=$('#bank_card').val();
      var  bank_name=$('#bank_name').val();
      console.log(bank_card);
      if ( username == '') {
        ymPrompt.alert({title:'开户注册', message: "请输入帐号！", handler: function () {
            $("#reg_username").focus();
          }
        });
        return false;
      }
      if (username.length > 20 || username.length < 4) {
        ymPrompt.alert({title:'开户注册', message: "帐号：请输入4-10个字符, 仅可输入英文字母以及数字的组合!", handler: function () {
            $("#reg_username").focus();
          }
        });
        return false;
      }


      if (id_card.length!=18 ) {
        ymPrompt.alert({title:'开户注册', message: "身份证号码输入错误!", handler: function () {
            $("#id_card").focus();
          }
        });
        return false;
      }
      if (bank_card.length !=19 && bank_card.length !=16) {
        ymPrompt.alert({title:'开户注册', message: "银行卡号码输入错误!", handler: function () {
            $("#bank_card").focus();
          }
        });
        return false;
      }
      if (bank_name.length<2 ) {
        ymPrompt.alert({title:'开户注册', message: "银行名称输入错误!", handler: function () {
            $("#bank_name").focus();
          }
        });
        return false;
      }
      var password = $("#reg_password").val();
      if (password == '' || password.length<6 ||  password.length>12) {
        ymPrompt.alert({title:'开户注册', message: "密码长度必须在6-12个字符之间!!", handler: function () {
            $("#reg_password").focus();
          }
        });
        return false;
      }
      else if ($("#reg_password1").val() == '') {
        ymPrompt.alert({title:'开户注册', message: "确认新密码!!", handler: function () {
            $("#reg_password1").focus();
          }
        });
        return false;
      } 
      else if ($("#reg_password").val() != $("#reg_password1").val()) {
        ymPrompt.alert({title:'开户注册', message: "确认密码错误！,请重新输入!!", handler: function () {
            $("#reg_password1").focus();
          }
        });
        return false;
      }
      else if ($("#reg_validate").val() == '请点击' || $("#reg_validate").val() == '') {
        ymPrompt.alert({title:'开户注册', message: "验证码请务必输入!!", handler: function () {
            $("#reg_validate").focus();
          }
        });
        return false;
      }
      if ($("#realname").val() == '') {
        ymPrompt.alert({title:'开户注册', message: "请输入真实姓名!!", handler: function () {
            $("#realname").focus();
          }
        });
        return false;
      }
      else if ($("#mobile").val() == '') {
        ymPrompt.alert({title:'开户注册', message: "手机与资金密码为取款金额时的凭证,请会员务必填写详细资料。!!", handler: function () {
            $("#mobile").focus();
          }
        });
        return false;
      }
      else if ($("#idcard_up").val() == '') {
        ymPrompt.alert({title:'开户注册', message: "输入您的身份证正面照。", handler: function () {
            $("#idcard_up").focus();
          }
        });
        return false;
      }
      else if ($("#idcard_down").val() == '') {
        ymPrompt.alert({title:'开户注册', message: "输入您的身份证反面照。", handler: function () {
            $("#idcard_down").focus();
          }
        });
        return false;
      }
      else if ($("#bankcard_up").val() == '') {
        ymPrompt.alert({title:'开户注册', message: "输入您的银行卡正面照。", handler: function () {
            $("#bankcard_up").focus();
          }
        });
        return false;
      }
      else if ($("#bankcard_down").val() == '') {
        ymPrompt.alert({title:'开户注册', message: "输入您的银行卡反面照。", handler: function () {
            $("#bankcard_down").focus();
          }
        });
        return false;
      }
      else if ($("#mobile").val().replace(/[\uFF00-\uFFFF]/g, '**').length != 11) {
        ymPrompt.alert({title:'开户注册', message: '手机栏位错误，请检查！', handler: function () {
            $("#mobile").focus();
          }
        });
        return false;
      }else{
        var atmpwd = '';
        atmpwd = $("#ddlgpwd1").val() + $("#ddlgpwd2").val() + $("#ddlgpwd3").val() + $("#ddlgpwd4").val();      
        $('#atmpwd').val(atmpwd);		
        $('#myForm').submit();
      
      }
    }
    
  </script>
</head>
<body> 
  <form id="myForm" name="regfrm" method="post" action="/login/register" enctype="multipart/form-data"> 
  <?php echo e(csrf_field()); ?>

  <?php echo $__env->make('flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#cccccc" class="mybox">
        <tr>
            <th colspan="2"><strong>注册帐号</strong></th>
        </tr>
        <tr bgcolor="#FFFFFF">
            <td align="right" style="height: 26px;">帐号类型：</td>
            <td>
                <input type="radio" name="demo" value="0"  checked checked="checked" />
            <font color="red">正式帐号 </font>
            </td>
        </tr>
        <tr bgcolor="#FFFFFF">
            <td width="140" align="right" style="height: 26px;"> *帐 号： </td>
            <td>
                <input type="text" name="name" id="reg_username" value="" size="10"  onblur="return check_length(this,this.value,20);" />
                &nbsp;
            </td>
        </tr>
        <tr bgcolor="#FFFFFF">
            <td width="140">&nbsp; </td>
            <td> 帐号：请输入4-20个字符, 仅可输入英文字母以及数字的组合!! </td>
        </tr>
        <tr bgcolor="#FFFFFF">
            <td width="140" align="right" style="height: 26px;"> *密 码： </td>
            <td>
                <input type="password" id="reg_password" name="password" value="" size="25" maxlength="12" />
            </td>
        </tr>
        <tr bgcolor="#FFFFFF">
            <td width="140">&nbsp; </td>
            <td> *密码规则：须为<b>6~12码英文或数字</b>且符合0~9或a~z字符 </td>
        </tr>
        <tr bgcolor="#FFFFFF">
            <td width="140" align="right" style="height: 26px;"> *确认新密码： </td>
            <td>
                <input type="password" id="reg_password1" name="confirmpassword" value="" size="25" maxlength="12" />
            </td>
        </tr>          
    <tr>
         <th colspan="2">会员资料</th>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td width="140" align="right" style="height: 26px;"> *真实姓名： </td>
        <td> <input name="realname" type="text" id="realname" value="" size="20"  />  <font color="red">注册后不可修改</font> </td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td width="140" align="right" style="height: 26px;"> *身份证号码： </td>
        <td> <input name="idcard" type="text" id="id_card" value="" size="20" maxlength="18" /><font color="red">证券转银行必须</font> </td>
        
    </tr>
    <tr bgcolor="#FFFFFF">
        <td width="140" align="right" style="height: 26px;"> *身份证正面照片： </td>
        <td> <input name="filename[]" type="file"  id="idcard_up"/></td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td width="140" align="right" style="height: 26px;"> *身份证反面照片: </td>
        <td> <input name="filename[]" type="file"  id="idcard_down"/></td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td width="140" align="right" style="height: 26px;"> *开户行： </td>
        <td>  <input name="kh_bank" type="text" id="kh_bank" value="" size="20" maxlength="30" /><font color="red">证券转银行必须</font>  </td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td width="140" align="right" style="height: 26px;"> *银行名称： </td>
        <td>  <input name="bank_name" type="text" id="bank_name" value="" size="20" maxlength="30" /> <font color="red">证券转银行必须</font> </td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td width="140" align="right" style="height: 26px;"> *银行卡号码： </td>
        <td><input name="bank_card" type="text" id="bank_card" value="" size="20" maxlength="30" />  <font color="red">证券转银行必须</font>  </td>
    </tr> 
    <tr bgcolor="#FFFFFF">
        <td width="140" align="right" style="height: 26px;"> *银行卡正面照片: </td>
        <td><input name="filename[]" type="file" id="bankcard_up"/></td>
    </tr> 
    <tr bgcolor="#FFFFFF">
        <td width="140" align="right" style="height: 26px;"> *银行卡反面照片: </td>
        <td><input name="filename[]" type="file" id="bankcard_down"/></td>
    </tr> 
    <tr bgcolor="#FFFFFF">
        <td width="140" style="height: 26px;">&nbsp; </td>
        <td> 必须与您的银行帐户名称相同，否则不能出款! </td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td width="140" align="right" style="height: 26px;"> *手机： </td>
        <td><input type="text" id="mobile" name="mobile" value="" size="20" maxlength="11"  style="ime-mode: disabled" /> </td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td width="140">&nbsp; </td>
        <td> 此为您取回登入密码的唯一途径, 请注意安全, 务必真实! </td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td width="140">&nbsp; </td>
        <td> 提款认证必须，请务必记住! </td>
    </tr>
    <tr bgcolor="#FFFFFF">
    <td width="140" align="right" style="height: 26px;"> 资金密码： </td>
    <td>
        <select name="select" id="ddlgpwd1">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        </select>
        <select name="select" id="ddlgpwd2">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        </select>
        <select name="select" id="ddlgpwd3">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        </select>
        <select name="select" id="ddlgpwd4">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        </select>
        <input name="atmpwd" type="hidden" id="atmpwd" />
    </td>
    </tr>

    <tr bgcolor="#FFFFFF">
        <td align="right" style="height: 26px;">&nbsp;</td>
        <td>
            <input name="button" type="button" id="btnOK" onclick="SubChk()" value="确定注册" class="button3" />
            &nbsp; &nbsp;
            <input type="reset" name="CANCEL2" value="清除" class="button3" />
            <input name="agent" type="hidden" id="agent" value="1" />
         </td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td align="right" valign="top" style="height: 26px;">备注：</td>
        <td>
            <div>1.标记有&nbsp;<span>*</span>&nbsp;者为必填项目。</div>
            <div> 2.手机与资金密码为取款金额时的凭证,请会员务必填写详细资料。</div>
        </td>
    </tr>
    </table>
    <p>&nbsp;</p>
</form> 
      <script type="text/javascript">
        if (bfchar == "") {
          ymPrompt.errorInfo("未设定前缀字符，请联系客服");
          $("#reg_username").attr('disabled','true);
        }
      </script> 

