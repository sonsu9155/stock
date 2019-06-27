<?php $__env->startSection('css'); ?>
<link href="/css/style2.css" rel="stylesheet" type="text/css" />
<style>
  .mybox th {font-size:12px; font-weight:normal; color:#fff;}
  .mybox td {padding:3px; line-height:18px;}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript" src="/js/jquery.date_input.js"></script>
<script type="text/javascript">
$(document).ready(function(){

});
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<table width="98%" align="center" cellpadding="3" cellspacing="1" bgcolor="#3f4042" style="margin-top:5px;border:1px solid #CCCCCC;" class="mybox">
  <tr>
    <td width="50%" height="30" bgcolor="#3f4042">&nbsp;&nbsp;&nbsp;交易账户：<?php echo e($user->username); ?>　截至 <font color=red><b><?php echo e(date("Y-m-d H-m-s")); ?></b></font> 保证金：<span class="money1">￥<?php echo e(number_format($money_wallet->after_amount + $money_wallet->before_amount -$stock_wallet->after_amount, 2)); ?></span>&nbsp;&nbsp;可用保证金：<span class="money1">￥<?php echo e(number_format($money_wallet->after_amount + $money_wallet->before_amount -$stock_wallet->after_amount  - $money_wallet->after_amount*0.1 , 2)); ?></span> 明细如下！
    <input type="button" name="Submit" value="刷新" onClick="self.location.href=self.location.href +'?' + Math.random();" class="button3"></td>
  </tr>
</table>
<table width='98%' border='0' align="center" cellpadding='3' cellspacing='1' bgcolor="#CCCCCC" class="mybox">
  <tr align='center'>
    <th width="13%" class="text-center">保证金(A)</th>
    <th width="13%" class="text-center">持仓总金额(B)</th>
    <th width="13%" class="text-center">持仓保证金(C)</th>
    <th width="13%" class="text-center">委托总金额(D)</th>
    <th width="13%" class="text-center">委托保证金(E)</th>
    <th width="13%" class="text-center">可用保证金(F)</th>
  </tr>
  <tr align='center' bgcolor="#3f4042" onMouseOver="this.style.background='#3f4042';" onMouseOut="this.style.background='#3f4042';">
    <td>￥<?php echo e(number_format($money_wallet->after_amount + $money_wallet->before_amount -$stock_wallet->after_amount, 2)); ?></td>
    <td>￥<?php echo e($money_wallet->before_amount); ?></td>
    <td>￥<?php echo e($money_wallet->before_amount*0.9); ?> </td>
    <td>￥<?php echo e($stock_wallet->after_amount); ?></td>
    <td>￥<?php echo e($stock_wallet->after_amount/9); ?></td>
    <td>￥<?php echo e(number_format($money_wallet->after_amount + $money_wallet->before_amount -$stock_wallet->after_amount  - $money_wallet->after_amount*0.1 , 2)); ?></td>
  </tr>
  <tr bgcolor="#3f4042" onMouseOver="this.style.background='#3f4042';" onMouseOut="this.style.background='#3f4042';">
    <td colspan="6">计算公式：可用保证金(F) = 保证金(A) - 持仓总金额(B)*10% - 委托总金额(D)*10%<br>
      <font color=red>持仓金额以买入价为准</font></td>
  </tr>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>