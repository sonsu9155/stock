<?php if(Session::has('error')): ?>
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <?php echo e(Session::get('error')); ?>

</div>
<?php endif; ?>

<?php if(Session::has('success')): ?>
<div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <?php echo e(Session::get('success')); ?>

</div>
<?php endif; ?>
