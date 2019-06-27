<title>交易明细</title>

<?php $__env->startSection('javascript'); ?>
<script type="text/javascript" src="./js/jquery.date_input.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="./css/skin/ymPrompt.css" rel="stylesheet" type="text/css" />
<style>
.mybox th {font-size:12px; font-weight:normal; color:#fff;}
.mybox td {padding:3px; line-height:18px;}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-sm-10">
  <div style="width:100%; height:388px;">
      <div style="width:100%; height:31px;background-image:url(/images/rtoubu.png);" ></div>
        <div style="width:100%;height:257px;background-image:url(/images/rzhongjian.png); padding:10px 0 0 0;" >
          <?php echo $__env->make('flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <table width='100%' border='1' align="center" cellpadding='0' cellspacing='0'  style=" border-color:#eeeeee;">
            <tr align='center' style="font-size:12px;color:#000000;">
              <th width="10%">订单号</th>
              <th width="15%">下单时间</th>
              <th width="10%">股票代码</th>
              <th>股票名称</th>
              <th width="6%">买/卖</th>
              <th width="6%">升跌</th>
              <th width="10%">挂单价格</th>
              <th width="10%">股数</th>
              <th width="10%" align="right">金额</th>
              <th width="10%">状态</th>
            </tr>
            <?php if($buyhistories): ?>
            <?php $__currentLoopData = $buyhistories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $buyhistory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr align='center' style="color:#000000;">
              <td><?php echo e($buyhistory->id); ?></td>
              <td><?php echo e($buyhistory->created_at); ?></td>
              <td><?php echo e($buyhistory->stockType->code); ?></td>
              <td><?php echo e($buyhistory->stockType->cn_name); ?></td>
              <td>买入</td>
              <?php if( $buyhistory->method == '1'): ?>
              <td><font color="#FF0000">买升(多)</font></td>
              <?php else: ?>
              <td><font color="#009900">买跌(空)</font></td>    
              <?php endif; ?>
              <td><?php echo e($buyhistory->cost); ?></td>
              <td><?php echo e($buyhistory->amount); ?>手</td>
              <td align="right">￥<?php echo e($buyhistory->cost * $buyhistory->amount *100); ?></td>
              <td><font color=red>已成交</font></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php if($sellhistories): ?>
            <?php $__currentLoopData = $sellhistories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $sellhistory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr align='center' style="color:#000000;" >
              <td><?php echo e($sellhistory->id); ?></td>
              <td><?php echo e($sellhistory->created_at); ?></td>
              <td><?php echo e($sellhistory->stockType->code); ?></td>
              <td><?php echo e($sellhistory->stockType->cn_name); ?></td>
              <td>卖出</td>
              <?php if( $sellhistory->method == '1'): ?>
              <td><font color="#FF0000">买升(多)</font></td>
              <?php else: ?>
              <td><font color="#009900">买跌(空)</font></td>
              <?php endif; ?>
              <td><?php echo e($sellhistory->sell_cost); ?></td>
              <td><?php echo e($sellhistory->amount); ?>手</td>
              <td align="right">￥<?php echo e($sellhistory->sell_cost * $sellhistory->amount *100); ?></td>
              <td><font color=red>已成交</font></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            <?php endif; ?>
          </table>
     </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pc_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>