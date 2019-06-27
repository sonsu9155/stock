<?php $__env->startSection('css'); ?>
<link href="/css/style2.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript" src="/js/noright.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<table width="99%"  border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC" class="mybox">
  <tr> 
    <th colspan="8" class="text-center" style="border: 1px solid black;">入金记录</th> 
  </tr> 
  <tr align="center" bgcolor="#3f4042"> 
    <td width="15%" style="text-align: center;border: 1px solid black;">日期</td> 
    <td width="15%" style="text-align: center;border: 1px solid black;">订单号</td> 
    <td width="8%" style="text-align: center;border: 1px solid black;">类型</td> 
    <td width="15%" style="text-align: center;border: 1px solid black;">流水号</td> 
    <td width="15%" style="text-align: center;border: 1px solid black;">通道</td> 
    <td width="10%" style="text-align: center;border: 1px solid black;">金额</td> 
    <td width="10%" align="center" style="text-align: center;border: 1px solid black;">状态</td> 
    <td style="text-align:center; border: 1px solid black;">备注</td>
  </tr> 
  <?php if($deposite_histories): ?>
    <?php $__currentLoopData = $deposite_histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $deposite_history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr align="center" bgcolor="#3f4042" onMouseOver="this.style.background='#3f4042';" onMouseOut="this.style.background='#3f4042';"> 
        <td style="text-align: center;border: 1px solid black;"><?php echo e($deposite_history->created_at); ?></td> 
        <td style="text-align: center;border: 1px solid black;"><?php echo e($deposite_history->id); ?></td> 
        <td style="text-align: center;border: 1px solid black;">入金</td> 
        <td style="text-align: center;border: 1px solid black;">-</td> 
        <td style="text-align: center;border: 1px solid black;">-</td> 
        <td style="text-align: center;border: 1px solid black;">￥<?php echo e($deposite_history->amount); ?>&nbsp;</td> 
        <td align="center" style="text-align: center;border: 1px solid black;"><font color="gray"><?php echo e($deposite_history->status); ?></font></td> 
        <td style="text-align: center;border: 1px solid black;">-</td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>