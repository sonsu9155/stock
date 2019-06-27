<?php $__env->startSection('javascript'); ?>
  <script type="text/javascript" src="./js/function.js"></script>
	<title>存款记录</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
  <style>
      body{
        padding:0;
        margin:0;
      }
  </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <div class="col-sm-10">
    <div style="width:100%; height:288px; background-color:#FFFFFF; ">
        <div style="width:100%; height:31px;background-image:url(/images/rtoubu.png);" >
        </div>
        <div style="width:100%;height:257px;background-image:url(/images/rzhongjian.png); padding:10px 0 0 0;" >
            <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0"  style="color:#000000; border-color:#CCCCCC; background-color:#FFFFFF; text-align:center;font-size:12px;"> 
                      <tr height="28"> 
                        <th colspan="8">提款历史记录</th> 
                      </tr> 
                      <tr height="28"> 
                        <td>提交日期</td> 
                        <td style="text-align:right">金额</td> 
                        <td>银行</td> 
                        <td>开户行</td> 
                        <td>帐号/姓名</td> 
                        <td>状态</td> 
                      <td>处理时间</td>
                      </tr> 
                      <?php if($deposit_histories): ?>
                        <?php $__currentLoopData = $deposit_histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $deposit_history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr height="28"> 
                          <td><?php echo e($deposit_history->created_at); ?></td> 
                          <td style="text-align:right" >￥<?php echo e($deposit_history->amount); ?></td> 
                          <td><?php echo e($deposit_history->bank); ?></td> 
                          <td><?php echo e($deposit_history->bank_name); ?></td> 
                          <td>&nbsp;11139<?php echo e($deposit_history->user_id); ?></td> 
                          <td><?php echo e($deposit_history->status); ?></td> 
                          <td> <?php echo e($deposit_history->updated_at); ?> </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>                     
                    </table> 
        </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pc_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>