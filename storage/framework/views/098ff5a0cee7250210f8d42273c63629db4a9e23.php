<?php if($message = Session::get('success')): ?>
<div class="alert alert-success alert-block" style="color: red; text-align: center;">
	<!-- <button type="button" class="close" data-dismiss="alert">×</button>	 -->
        <strong><?php echo e($message); ?></strong>
</div>
<?php endif; ?>


<?php if($message = Session::get('error')): ?>
<div class="alert alert-danger alert-block" style="color: red;  text-align: center;">
	<!-- <button type="button" class="close" data-dismiss="alert">×</button>	 -->
        <strong><?php echo e($message); ?></strong>
</div>
<?php endif; ?>


<?php if($message = Session::get('warning')): ?>
<div class="alert alert-warning alert-block" style="color: red;    text-align: center;">
	<!-- <button type="button" class="close" data-dismiss="alert">×</button>	 -->
	<strong><?php echo e($message); ?></strong>
</div>
<?php endif; ?>


<?php if($message = Session::get('info')): ?>
<div class="alert alert-info alert-block" style="color: red;    text-align: center;">
	<!-- <button type="button" class="close" data-dismiss="alert">×</button>	 -->
	<strong><?php echo e($message); ?></strong>
</div>
<?php endif; ?>


<?php if($errors->any()): ?>
<div class="alert alert-danger" style="color: red;    text-align: center;">
	<!-- <button type="button" class="close" data-dismiss="alert">×</button>	 -->
	请查看下面的表格以了解错误。
</div>
<?php endif; ?>