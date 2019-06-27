<?php $__env->startSection('css'); ?>
<link href="/css/thickbox.css" rel="stylesheet" type="text/css" />
<link href="/css/tip-violet.css" rel="stylesheet" type="text/css" />
<link href="/css/style2.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .mybox td{
			color: black;
    		background-color: #ffffff;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/js/js_admin.js"></script>
<script type="text/javascript" src="/js/thickbox.js"></script>
<script >
	function Isnum()
	{
		return ((event.keyCode >= 48) && (event.keyCode <= 57));
	}	
	// $('#payMode').change(function(){
	// 		var now =	$('#payMode').val();
	// 		if(now=='bank_pc'){
	// 			var select='<option value="01020000">工商银行</option><option value="01050000">建设银行</option><option value="01030000">农业银行</option>'+
	// 									'<option value="03080000">招商银行</option><option value="03010000">交通银行</option><option value="01040000">中国银行</option>'+
	// 									'<option value="03030000">光大银行</option><option value="03050000">民生银行</option>'+
	// 									'<option value="03090000">兴业银行</option><option value="03020000">中信银行</option>'+
	// 									'<option value="03060000">广发银行</option><option value="03100000">浦发银行</option>'+
	// 									'<option value="03070000">平安银行</option><option value="03040000">华夏银行</option>'+
	// 									'<option value="04083320">宁波银行</option><option value="03200000">东亚银行</option>'+
	// 									'<option value="04012900">上海银行</option><option value="01000000">中国邮储银行</option>'+
	// 									'<option value="04243010">南京银行</option><option value="65012900">上海农商行</option>'+
	// 									'<option value="03170000">渤海银行</option><option value="64296510">成都银行</option>'+
	// 									'<option value="04031000">北京银行</option><option value="64296511">徽商银行</option><option value="04341101">天津银行</option>'
	// 			$('#bankCode').html(select);
	// 			$('#html').html('入金银行');
	// 			$('#checks').show();
	// 		}
	// 		if(now=='qrcode'){
	// 			var select='<option value="0401">支付宝扫码</option>';
	// 			$('#bankCode').html(select);
	// 			$('#html').html('扫码方式');
	// 			$('#checks').show();
	// 		}
	// 		if(now=='quickpay'){
	// 			$('#bankCode').html('');
	// 			$('#checks').hide();
	// 		}
	// });
	function checkm()
	{
		var fm1 = document.getElementById('fm1');

		if (fm1.money.value< 1000)
		{
			alert('存入金额至少为1000元');
			return false
		}
		else
		{
		var now=	$('#payMode').val();
			//tb_show("在线入金","#TB_inline?width=480&height=200&inlineId=info",false);
			fm1.submit();
			return true;
		}
	}

	$(function(){
	//入金完成，返回入金历史页面
        $('#btnOKpay').click(function(){
            self.location.href='payment.php?type=log';
        });
        $('#btnFail').click(function(){
            self.location.href='payment.php?type=fail';
        });
        $('#back').click(function(){
            tb_remove();
            self.location.href='payment.php';
				});	
	})
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
		<form name=fm1 id=fm1  method=post action="/web/pay_page" >
		<?php echo e(csrf_field()); ?>

			<table width="99%"  border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC" class="mybox" style="border-collapse: collapse; border: 1px solid black;"> 
				<tr>
					<th colspan="4" class="text-center">银行转证券(入金)</th>
				</tr>
				<tr>
					<td height="26" align="center" class="fb12"  style="text-align: left; border: 1px solid black;" colspan="4">
						&nbsp;&nbsp;<strong>支持各大银行网银入金，入金即时到账!</strong><BR/>
						&nbsp;&nbsp;1.输入入金金额，按"在线入金"进入网银系统确认入金！<BR/>
						&nbsp;&nbsp;2.根据网银系统提示操作完成入金!<BR/>
					</td>
				</tr>                  
				<tr>
					<td width="100" height="26" align="right" style="border: 1px solid black;"><strong>交易账户<span class="textalign">：</span></strong></td>
					<td align="left" style="border: 1px solid black;"><span class="style5"><?php echo e($user->username); ?><a href="/web/payment_log">入金记录</a><input name="user_id" type="hidden" id="user_id" value=<?php echo e($user->id); ?> /></span> </td>　
				</tr>
				<tr>
					<td height="23" align="right" class="fb12" style="border: 1px solid black;"><strong>入金通道选择<span class="textalign">：</span></strong></td>
					<td align="left" style="border: 1px solid black;"><ul><li class='tdchange' data-id='5'>网银</li></ul></td>
				</tr>
				<tr>
					<td height="23" align="right" class="fb12" style="border: 1px solid black;"><strong>入金金额<span class="textalign">：</span></strong></td>
					<td align="left" style="border: 1px solid black;"><input name="money" type="text" class="input" id="money" size="10" value="">元</td>
				</tr>
				<tr>
					<td></td>
					<td colspan="4" bgcolor="#FFFFFF" align="left" style="border: 1px solid black;"><input  name="image"  type="button"  border="0"  value="在线入金" onclick="checkm()"  class="button3"/></td>
				</tr>
			</table>
    </form>
    <br><br>
    <div id="info" style="display:none;">
        <p><img src="/images/i.gif" border="0" align="absmiddle" />&nbsp;入金完成前请不要关闭此窗口。完成入金后请根据你的情况点击下面的按钮：</p>
        <p><b>请在新开页面完成入金后再选择。入金后银行在5-30分钟内返回支付信息,请耐心等待!<BR/></b></p>
        <p>&nbsp;</p>
        <p align="center"><input type="button" id="btnOKpay" name="btnOKpay" value="已完成入金">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" id="btnFail" name="btnFail" value="入金遇到问题" /></p>
        <p style="height:35px; line-height:35px;"><a href="javascript:void(0);" id="back" style="color:#0077FF;">
        返回重新输入入金金额</a></p>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>