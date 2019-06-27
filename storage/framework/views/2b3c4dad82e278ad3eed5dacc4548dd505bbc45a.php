<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php echo Igoshev\Captcha\Facades\Captcha::getView() ?>
    <form action="/p_test" method="POST">
        <?php echo e(csrf_field()); ?>

        
        <input type="text" id="captcha" name="captcha">
        <input type="submit">
    </form>
</body>
</html>