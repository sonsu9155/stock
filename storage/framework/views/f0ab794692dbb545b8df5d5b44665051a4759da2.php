<!DOCTYPE html>
<html>

<head>
    <title></title>
    <?php echo $__env->make('bsb.partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('additional_header'); ?>
    <?php echo $__env->yieldPushContent('additional_header_stack'); ?>
</head>

<body class="login-page" style="background-color: #e9e9e9;">
    <?php echo $__env->yieldContent('content'); ?>

    <?php echo Assets::js(); ?>

    <script type="text/javascript" src="/bsb/plugins/jquery-validation/jquery.validate.js"></script>
    <?php echo $__env->yieldContent('additional_footer'); ?>
    <?php echo $__env->yieldPushContent('additional_footer_stack'); ?>
</body>

</html>
