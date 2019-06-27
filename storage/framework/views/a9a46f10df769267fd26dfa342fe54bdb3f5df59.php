<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>仪表板 : </h2>
    </div>    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('additional_footer'); ?>
<script src="/bsb/plugins/chartjs/Chart.bundle.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.templates.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>