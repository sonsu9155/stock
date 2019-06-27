<?php $__env->startSection('css'); ?>
<link href="/css/style2.css" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript" src="/js/noright.js"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <table width="99%"  border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC" class="mybox"> 
    <tr> 
      <th colspan="7" class="text-center">公告大厅</th> 
    </tr> 
    <tr bgcolor="#3f4042">
      <td width="10%" align="center" style="border: 1px solid black;">公告编号</td>
      <td width="16%" align="center" style="border: 1px solid black;">公告日期</td>
      <td width="74%" align="center" style="border: 1px solid black;">公告内容</td>
    </tr>
    <?php if($news): ?>
    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr bgcolor="#3f4042">
      <td align="center"><?php echo e($new->subject); ?></td>
      <td align="center"><?php echo e($new->created_at); ?></td>
      <td align="center"><?php echo e($new->contents); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
  </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>