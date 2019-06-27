<!DOCTYPE html>
<html>
<body class="login-page">
    <?php echo Assets::add('default')->css(); ?>

    <style type="text/css">
        .login-page {
            max-width: 600px;
        }
    </style>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo Assets::add('default')->js(); ?>

</body>

</html>
