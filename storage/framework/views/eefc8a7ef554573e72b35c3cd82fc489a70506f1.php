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
  $("#txt_date").date_input();
  showgain();
});
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<table width="98%" align="center" cellpadding="3" cellspacing="1" bgcolor="#3f4042" style="margin-top:5px;border:1px solid #CCCCCC;">
  <tr>
    <td width="50%" height="30" align="center" bgcolor="#3f4042">
      <table border="0" width="98%" cellspacing="1" cellpadding="3" align="center" bgcolor="#CCCCCC">
        <tr>
          <td align="center" width="20%" height="20" bgcolor="#FAFAFA">
            <a href="?type=date&date=2019-05-12"><b><?php echo e(date('Y-m-d')); ?></b></a></td>
            <td align="center" width="20%" height="20" bgcolor="#FAFAFA"><a href="#"><?php echo e(date('Y-m-d')); ?></a></td>
            <td align="center" width="20%" height="20" bgcolor="#FAFAFA"><a href="#"><?php echo e(date('Y-m-d')); ?></a></td>
            <td align="center" width="20%" height="20" bgcolor="#FAFAFA"><a href="#"><?php echo e(date('Y-m-d')); ?></a></td>
            <td align="center" width="20%" height="20" bgcolor="#FAFAFA"><a href="#"><?php echo e(date('Y-m-d')); ?></a></td>
          </tr>
        </table>
      </td>
    <td width="25%" align="center" bgcolor="#3f4042">
      <form name="form1" method="get" action="">
        <input name="type" type="hidden" id="type" value="date">
        <input name="date" id="txt_date" type="text" value="" class="datepicker"/>
        <input type="submit" name="Submit" value="查询" class="button3">
      </form>
    </td>
    <td width="25%" align="center" bgcolor="#3f4042">
      <form name="form1" method="get" action="">
        <input name="type" type="hidden" id="type" value="id">
        订单编号：<input name="id" id="txt_id" type="text" value="" style="width:80px;" />
        <input type="submit" name="Submit2" value="查询" class="button3">
      </form>
    </td>
  </tr>
</table>
<table width='98%' border='0' align="center" cellpadding='2' cellspacing='1' class="mybox">
  <tr align='center'>
    <th width="10%" class="text-center">订单号</th>
    <th width="15%" class="text-center">下单时间</th>
    <th width="10%" class="text-center">股票代码</th>
    <th class="text-center">股票名称</th>
    <th width="6%" class="text-center">买/卖</th>
    <th width="6%" class="text-center">升跌</th>
    <th width="10%" class="text-center">挂单价格</th>
    <th width="10%" class="text-center">股数</th>
    <th width="10%" class="text-center">金额</th>
    <th width="10%" class="text-center">现价</th>
    <th width="10%" class="text-center">盈亏</th>
  </tr>
  <?php if($buy_histories): ?>
  <?php $__currentLoopData = $buy_histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $buy_history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr align="center" bgcolor="#3f4042" onMouseOver="this.style.background='#3f4042';" onMouseOut="this.style.background='#3f4042';">
    <td height="33px" align="center" id="inf_<?php echo e($index + 1); ?>" style="display:none;" value="<?php echo e($buy_history->cost); ?>,<?php echo e($buy_history->method); ?>,<?php echo e($buy_history->amount); ?>,<?php echo e($buy_history->fee * $buy_history->amount * $buy_history->cost *0.01); ?>,<?php echo e($buy_history->fee * 0.0001); ?>,0, <?php echo e($buy_history->cost * 0.05); ?>">00006420</td>
    <td style="border: 1px solid black;"><?php echo e($buy_history->id); ?></td>
    <td style="border: 1px solid black;"><?php echo e($buy_history->created_at); ?></td>
    <td style="border: 1px solid black;"><?php echo e($buy_history->stockType->code); ?> / <?php echo e($buy_history->stockType->cn_name); ?></td>
    <?php if($buy_history->method =="1"): ?>
    <td style="border: 1px solid black;"><font color="red" >升</font></td>
    <?php else: ?>
    <td style="border: 1px solid black;"><font color="red" >跌</font></td>
    <?php endif; ?>
    <td style="border: 1px solid black;"><?php echo e($buy_history->cost); ?></td>
    <td style="border: 1px solid black;"><?php echo e($buy_history->amount); ?></td>
    <td style="border: 1px solid black;"><?php echo e($buy_history->fee); ?></td>
    <td style="border: 1px solid black;" ><?php echo e($setting->cost_save_max); ?></td>
    <td style="border: 1px solid black;"> <?php echo e($buy_history->cost * $buy_history->amount * 100); ?> </td>   
    <td style="border: 1px solid black;" id="cur_price_<?php echo e($index + 1); ?>"></td>
    <td style="border: 1px solid black;"id="gain_<?php echo e($index + 1); ?>"></td>
  </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>