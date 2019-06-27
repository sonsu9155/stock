<?php $__env->startSection('javascript'); ?>
	<script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<title>存款记录</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-sm-10 ">
  <div style="width:99%; height:288px; background-color:#FFFFFF; ">
      <div style="width:100%; height:31px;background-image:url(/images/rtoubu.png);" ></div>
        <div style="width:100%;height:257px;background-image:url(/images/rzhongjian.png); padding:10px 0 0 0;" >
          <table width="100%"  border="1"   cellpadding="0" cellspacing="0" style="color:#000000; border-color:#eeeeee; background-color:#FFFFFF; text-align:center; font-size:12px;">
                  <tr  style="height:28px;"> 
                    <td width="21%">日期</td> 
                    <td width="15%">订单号</td> 
                    <td width="8%">类型</td> 
                    <td width="10%">金额</td> 
                    <td width="10%" >状态</td> 
                    <td>备注</td>
                  </tr> 
                  <?php if($withdraw_histories): ?>
                    <?php $__currentLoopData = $withdraw_histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $withdraw_history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr  style="height:28px;"> 
                        <td><?php echo e($withdraw_history->created_at); ?></td> 
                        <td> <?php echo e($withdraw_history->id); ?></td> 
                        <td><?php echo e($withdraw_history->type); ?></td> 
                        <td>￥<?php echo e($withdraw_history->amount); ?>&nbsp;</td> 
                        <td ><font color="gray"><?php echo e($withdraw_history->status); ?></font></td> 
                        <td>-</td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
          </table>
        </div>
      </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pc_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>