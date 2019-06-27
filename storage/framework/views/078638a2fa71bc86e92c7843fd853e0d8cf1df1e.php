<?php $__env->startSection('javascript'); ?>
	<title>在线入金</title>
    <script src="js/jQuery.js" type="text/javascript" charset="utf-8"></script>
    <script language="javascript">
      function checks(){
      if(reform.money.value==""){
          alert("请输入充值金额!");
          reform.money.focus();
          return false;
        }else if(parseFloat(reform.money.value)< 100){
          alert("充值金额不能小于100元!");
          reform.money.focus();
          return false;
        }else if(reform.payvia.value==""){
          alert("请选择支付方式!");
          reform.payvia.focus();
          return false;
        }else
        {
        reform.fsubmit.value=" 正在提交您的支付信息.. ";
        reform.fsubmit.disabled=true;
        return true;
    
        }
      }
    function Isnum(){
      return ((event.keyCode >= 48) && (event.keyCode <= 57));
    }
    function checkm(){
      var fm1 = document.getElementById('fm1');
      if(isNaN(fm1.money.value)){
        alert("请正确输入金额！");
        return false	
        }
      if (fm1.money.value< 100){
          alert('存入金额至少为100元');
          return false
      } else {
          fm1.submit();
          return true;
      }
    }
 </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-sm-10">
  <div style="width:100%; height:288px; background-color:#FFFFFF; ">
      <div style="width:100%; height:31px;background-image:url(/images/rtoubu.png);" ></div>
      <div style="width:100%;height:257px;background-image:url(/images/rzhongjian.png); padding:10px 0 0 0;" >				
        <form name="fm1" id="fm1"  method="post" action="" >
          <table width="100%"  border="1" align="center" cellpadding="0" cellspacing="0"  style="color:#000000; border-color:#eeeeee;">
            <tr class="even">
              <td height="23" align="right" class="fb12"><strong>转账金额<span class="textalign">：</span></strong></td>
              <td align="left"><input name="money" type="text" class="input" id="money" onKeyPress="Isnum();" size="18">元 (不能小于<font color="#FF0000">100</font>元)</td>
            </tr>
            <tr class="even">
              <td height="23" align="right" class="fb12"><strong>选择银行<span class="textalign">：</span></strong></td>
              <td align="left">
                <select name="bank" size="1" id="bank" style="width:140px;">
                      <option value="工商银行" >工商银行</option>
                      <option value="建设银行">建设银行</option>
                      <option value="农业银行">农业银行</option>
                      <option value="招商银行">招商银行</option>
                      <option value="中国银行">中国银行</option>
                      <option value="浦东银行">浦东银行</option>
                      <option value="广发银行">广发银行</option>
                      <option value="交通银行">交通银行</option>
                      <option value="光大银行">光大银行</option>
                      <option value="北京银行">北京银行</option>
                      <option value="兴业银行">兴业银行</option>
                      <option value="民生银行">民生银行</option>
                      <option value="中信银行">中信银行</option>
                      <option value="邮政储蓄">邮政储蓄</option>
                      <option value="支付宝">支付宝</option>
                      <option value="微信">微信</option>
                </select>
              </td>
          </tr>
          <tr class="even">
            <td height="23" align="right" class="fb12"> </td>
            <td align="left"><input  type="button" onclick="checkm()" value="转账" size="18"></td>
          </tr>								
          </table>
        </form>
      </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pc_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>