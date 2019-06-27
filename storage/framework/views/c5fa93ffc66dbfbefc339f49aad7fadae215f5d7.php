<!DOCTYPE html>
<html>

<head>
    <title>403 | <?php echo Config::get('app.name'); ?></title>
    <?php echo $__env->make('bsb.partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>

<body class="four-zero-four">
    <div class="four-zero-four-container">
        <div class="error-code">403</div>
        <div class="error-message">You are not authorized</div>
        <div class="button-place">
            <a href="/" class="btn btn-default btn-lg waves-effect">GO TO HOMEPAGE</a>
        </div>
    </div>

    <?php echo Assets::add('default')->js(); ?>

</body>

</html>
