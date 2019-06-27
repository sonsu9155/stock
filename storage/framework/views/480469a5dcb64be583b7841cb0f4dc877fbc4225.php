<?php $__env->startSection('css'); ?>
<link href="/css/style2.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript" src="/js/noright.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div style="color: #010000;">
  <table width="99%"  border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC" class="mybox" > 
    <tr> 
      <th colspan="8" class="text-center" style="border: 1px solid black;">出金记录</th> 
    </tr> 
    <tr align="center" bgcolor="#C5E2FB" style="border: 1px solid black;"> 
      <td style="border: 1px solid black;">提交日期</td> 
      <td style="border: 1px solid black;">金额</td> 
      <td style="border: 1px solid black;">银行</td> 
      <td style="border: 1px solid black;">开户行</td>
      <td style="border: 1px solid black;">帐号/姓名</td> 
      <td style="border: 1px solid black;">状态</td> 
      <td style="border: 1px solid black;">处理时间</td>
    </tr> 
    <?php if($withdraw_histories): ?>
    <?php $__currentLoopData = $withdraw_histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $withdraw_history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr align="center" bgcolor="#ffffff" onMouseOver="this.style.background='#FDF0D7';" onMouseOut="this.style.background='#FFFFFF';"> 
        <td style="border: 1px solid black;"><?php echo e($withdraw_history->created_at); ?></td> 
        <td style="border: 1px solid black;">￥<?php echo e($withdraw_history->amount); ?></td> 
        <td style="border: 1px solid black;"><?php echo e($withdraw_history->bank); ?></td> 
        <td style="border: 1px solid black;"><?php echo e($withdraw_history->bank_name); ?></td> 
        <td style="border: 1px solid black;"><?php echo e($withdraw_history->user->bank_card); ?>&nbsp;<?php echo e($withdraw_history->user->name); ?></td> 
        <td style="border: 1px solid black;"><font color=red><?php echo e($withdraw_history->status); ?></font></td> 
        <td style="border: 1px solid black;"><?php echo e($withdraw_history->updated_at); ?></td>
      </tr> 
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
  </table> 
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>