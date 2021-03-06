<?php $__env->startSection('css'); ?>
<link href="/css/tip-violet.css" rel="stylesheet" type="text/css" />
<link href="/css/style2.css" rel="stylesheet" type="text/css" />
  <style>
    .mybox th {font-size:12px; font-weight:normal; color:#fff;}
    .mybox td {padding:3px; line-height:18px;}
  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/js/me_function.js"></script>
<script type="text/javascript" src="/js/jquery.poshytip.js"></script>
<script type="text/javascript" src="/js/jquery.date_input.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#tips_gain,#tips_gain1,#tips_cost').poshytip({
		className: 'tip-violet',
		bgImageFrameSize: 9
	});
	$("#txt_date").date_input();
	showgain();
	var pc_gain=0; 
	var save_gain=0; 
	var total_cost_save_money=-0;
	var total_gain = 0;
	if(pc_gain==0)
	{
		$('#span_pc_gain').css('color','#000000');
	}
	else if(pc_gain<0)
	{
		$('#span_pc_gain').css('color','green');
	}
	if(save_gain==0)
	{
		$('#span_save_gain').css('color','#000000');
	}
	else if(save_gain<0)
	{
		$('#span_save_gain').css('color','green');
	}
	if(total_gain==0)
	{
		$('#span_total_gain').css('color','#000000');
	}
	else if(total_gain<0)
	{
		$('#span_total_gain').css('color','green');
	}
	
});
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#3f4042" class="mybox" style="border:1px solid #cccccc;">
  <tr align="center" bgcolor="#3f4042">
    <td height="30" colspan="5" bgcolor="#3f4042">
      <table border="0" width="98%" cellspacing="1" cellpadding="3" align="center" bgcolor="#CCCCCC">
        <tr>
          <td align="center" ><a href="#"><b><?php echo e(date('Y-m-d')); ?></b></a></td>
          <td align="center" ><a href="#"><?php echo e(date('Y-m-d',strtotime("-1 days"))); ?></a></td>
          <td align="center" ><a href="#"><?php echo e(date('Y-m-d',strtotime("-2 days"))); ?></a></td>
          <td align="center" ><a href="#"><?php echo e(date('Y-m-d',strtotime("-3 days"))); ?></a></td>
          <td align="center" ><a href="#"><?php echo e(date('Y-m-d',strtotime("-4 days"))); ?></a></td>
        </tr>
      </table>
    </td>
    <td colspan="3">
      <form name="form1" method="get" action="">
        <input name="type" type="hidden" id="type" value="date">
        <input name="date" id="txt_date" type="text" value="" class="datepicker"/>
        <input type="submit" name="Submit" value="查询" class="button3">
      </form>
    </td>
  </tr>
  <tr align="center" bgcolor="#3f4042">
    <td width="13%" height="25" bgcolor="#3f4042" style="border: 1px solid black;">交易账户：<span class="gray"><?php echo e($user->username); ?></span></td>
    <td width="13%" style="border: 1px solid black;">姓名：<span class="gray"><?php echo e($user->name); ?></span></td>
    <td width="13%" style="border: 1px solid black;">买入手续费：<span class="gray"><?php echo e($setting->cost_bull_max * 100); ?>‰</span></td>
    <td width="13%" style="border: 1px solid black;">卖出手续费：<span class="gray"><?php echo e($setting->cost_sell_max * 100); ?>‰</span></td>
    <td width="13%" style="border: 1px solid black;">利息 ：<span class="gray"><?php echo e($setting->cost_daily_max * 100); ?>‰</span></td>
    <td width="13%" style="border: 1px solid black;">留仓费率：<span class="gray"><?php echo e($setting->cost_save_max * 100); ?>‰ /天 </span></td>
    <td width="13%" style="border: 1px solid black;">日期：<span class="gray"><?php echo e(date("Y-m-d")); ?></span></td>
    <td style="border: 1px solid black;"><span style="float:left; display:inline; margin-left:20px;">可用额度：</span><span class="money" style="display:inline;">￥<?php echo e(number_format($money_wallet->after_amount, 2)); ?></span></td>
  </tr>
</table>

<table width="99%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#cccccc" class="mybox" style="margin-top:10px;">
  <tr>
    <th colspan="14" class="text-center" style="border: 1px solid black;">平仓单</th>
  </tr>
  <tr bgcolor="#3f4042">
    <td rowspan="2" align="center" bgcolor="#3f4042" style="border: 1px solid black;">订单号</td>
    <td rowspan="2" align="center" bgcolor="#3f4042" style="border: 1px solid black;">代码/名称</td>
    <td colspan="3" align="center" style="border: 1px solid black;">买</td>
    <td colspan="3" align="center" style="border: 1px solid black;">卖</td>
    <td rowspan="2" align="center" style="border: 1px solid black;">升/跌</td>
    <td rowspan="2" align="center" style="border: 1px solid black;">数量(手)</td>
    <td rowspan="2" align="center" style="border: 1px solid black;">手续费</td>
    <td rowspan="2" align="center" style="border: 1px solid black;">留仓费</td>
    <td rowspan="2" align="center" style="border: 1px solid black;">印花税</td>
    <td rowspan="2" align="center" style="border: 1px solid black;">盈亏</td>
  </tr>
  <tr bgcolor="#3f4042">
    <td align="center" bgcolor="#3f4042" style="border: 1px solid black;">委托号</td>
    <td align="center" bgcolor="#3f4042" style="border: 1px solid black;"> 下单时间 </td>
    <td align="center" bgcolor="#3f4042" style="border: 1px solid black;">成交价</td>
    <td align="center" bgcolor="#3f4042" style="border: 1px solid black;">委托号</td>
    <td align="center" bgcolor="#3f4042" style="border: 1px solid black;">下单时间 </td>
    <td align="center" bgcolor="#3f4042" style="border: 1px solid black;">成交价</td>
  </tr> 
<?php if($sell_histories): ?>
<?php $__currentLoopData = $sell_histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $sell_history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr align="center" bgcolor="#3f4042" onMouseOver="this.style.background='#3f4042';" onMouseOut="this.style.background='#3f4042';">
    <td style="border: 1px solid black;"><?php echo e($sell_history->id); ?></td>
    <td style="border: 1px solid black;"><?php echo e($sell_history->stockType->code); ?> / <?php echo e($sell_history->stockType->cn_name); ?></td>
    <td style="border: 1px solid black;"><?php echo e($sell_history->id); ?></td>
    <td style="border: 1px solid black;"><?php echo e($sell_history->buy_time); ?></td>
    <td style="border: 1px solid black;"><?php echo e($sell_history->buy_cost); ?></td>
    <td style="border: 1px solid black;"><?php echo e($sell_history->id); ?></td>
    <td style="border: 1px solid black;"><?php echo e($sell_history->created_at); ?></td>
    <td style="border: 1px solid black;"><?php echo e($sell_history->sell_cost); ?></td>
    <?php if($sell_history->method =="1"): ?>
    <td style="border: 1px solid black;"><font color="red" >升</font></td>
    <?php else: ?>
    <td style="border: 1px solid black;"><font color="red" >跌</font></td>
    <?php endif; ?>
    <td style="border: 1px solid black;"><?php echo e($sell_history->amount); ?></td>
    <td style="border: 1px solid black;"><?php echo e($sell_history->buy_fee *  $sell_history->amount * 100 * $sell_history->sell_cost); ?></td>
    <td style="border: 1px solid black;"><?php echo e($sell_history->save_fee *  $sell_history->amount * 100 * $sell_history->sell_cost); ?></td>
    <td style="border: 1px solid black;"><?php echo e($sell_history->state_fee * $sell_history->amount * 100 * $sell_history->sell_cost); ?></td>
    <td style="border: 1px solid black;"><?php echo e(number_format($sell_history->fee, 2)); ?></td>
  </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
  <tr align="right" bgcolor="#3f4042">
    <td height="30" colspan="14" class="text-center" style="border: 1px solid black;">平仓盈亏小计：<span class="money1" id="span_pc_gain">￥0.00</span></td>
  </tr>
</table>

<table width="99%"  border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC" class="mybox" style="margin-top:10px;">
  <tr>
    <th colspan="12" class="text-center" style="border: 1px solid black;">留仓单</th>
  </tr>
  <tr align="center" bgcolor="#3f4042">
    <td width="60" height="20" style="border: 1px solid black;">订单号</td>
    <td width="120" style="border: 1px solid black;">下单时间</td>
    <td style="border: 1px solid black;">代码/名称</td>
    <td width="45" style="border: 1px solid black;">升/跌</td>
    <td width="60" style="border: 1px solid black;">成交价格</td>
    <td width="55" style="border: 1px solid black;">数量(手)</td>
    <td width="7%" style="border: 1px solid black;">手续费</td>
    <td width="8%" style="border: 1px solid black;">留仓价格</td>
    <td width="8%" style="border: 1px solid black;">留仓天数</td>
    <td width="8%" style="border: 1px solid black;">留仓费</td>
    <td width="60" style="border: 1px solid black;">现价</td>
    <td width="7%" style="border: 1px solid black;">盈亏</td>
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
    <td style="border: 1px solid black;"><?php echo e($buy_history->fee * $buy_history->cost * $buy_history->amount *100); ?></td>
    <td style="border: 1px solid black;"> <?php echo e($buy_history->cost  *  $buy_history->amount *100); ?> </td>
    <td style="border: 1px solid black;" ><?php echo e($setting->cost_save_day); ?> </td>
    <td style="border: 1px solid black;" ><?php echo e($setting->cost_save_max); ?></td>
    <td style="border: 1px solid black;" id="cur_price_<?php echo e($index + 1); ?>"></td>
    <td style="border: 1px solid black;"id="gain_<?php echo e($index + 1); ?>"></td>
  </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
  <tr align="center" bgcolor="#3f4042">
    <td height="30" colspan="8" align="right" style="border: 1px solid black;" >留仓总金额：<span  id="span_lcmoney" class="money1">￥0.00</span></td>
    <td height="30" colspan="2" align="right" style="border: 1px solid black;">留仓盈亏小计：<br />盈亏合计：</td>
    <td height="30" colspan="2" align="left" bgcolor="#3f4042" style="border: 1px solid black;"><span class="money1" id="span_save_gain">￥0.00</span><br/><span id="span_lcgain" class="money1">￥0.00</span></td>
  </tr>
</table>

<table width="99%"  border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC" class="mybox" style="margin-top:10px;">
  <tr>
    <th colspan="8" class="text-center" style="border: 1px solid black;">汇总信息</th>
  </tr>
  <tr align="center" bgcolor="#3f4042">
    <td width="12%" height="20" style="border: 1px solid black;">本日损益</td>
    <td width="12%" style="border: 1px solid black;">留仓费</td>
    <td width="12%" style="border: 1px solid black;">本日净利</td>
    <td width="12%" style="border: 1px solid black;">本日余额</td>
    <td width="12%" style="border: 1px solid black;">本日交易量</td>
    <td width="12%" style="border: 1px solid black;">保证金</td>
    <td width="12%" style="border: 1px solid black;">可用额度</td>
  </tr>
  <tr align="center" bgcolor="#3f4042" onMouseOver="this.style.background='#3f4042';" onMouseOut="this.style.background='#3f4042';">
    <td style="border: 1px solid black;"><span id="span_lcgain" class="money1">￥0.00</span></td>
    <td style="border: 1px solid black;"><?php echo e($setting->cost_save_max); ?></td>
    <td style="border: 1px solid black;"></td>
    <td style="border: 1px solid black;"><?php echo e(number_format($sell_histories->sum('fee'), 2)); ?></td>
    <td style="border: 1px solid black;"><?php echo e($sell_histories->sum('amount')); ?></td>
    <td style="border: 1px solid black;">￥<?php echo e(number_format($money_wallet->after_amount + $money_wallet->before_amount -$stock_wallet->after_amount , 2)); ?></td>
    <td style="border: 1px solid black;">￥<?php echo e(number_format($money_wallet->after_amount + $money_wallet->before_amount -$stock_wallet->after_amount  - $money_wallet->after_amount*0.1, 2)); ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>