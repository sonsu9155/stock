<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>管理员面板</title>
    <!-- Favicon-->
    <link rel="icon" href="/bsb/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="stylesheet" type="text/css" href="/bsb/css/font.css">
    <link rel="stylesheet" type="text/css" href="/bsb/css/themes/all-themes.min.css">
    <link rel="stylesheet" type="text/css" href="/bsb/plugins/sweetalert/sweetalert.css">
    <?php echo Assets::css(); ?>


    <?php echo $__env->yieldContent('additional_header'); ?>
    <style type="text/css">
        .dataTables_wrapper .dt-buttons a.dt-button {
            color: black;
        }
        .dataTables_wrapper .dt-buttons {
            position: relative;
        }
    </style>
    <script type="text/javascript" src="/bsb/plugins/jquery/jquery.min.js"></script>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="md-preloader pl-size-md">
                <svg viewbox="0 0 75 75">
                    <circle cx="37.5" cy="37.5" r="33.5" class="pl-red" stroke-width="4" />
                </svg>
            </div>
            <p>请耐心等待...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="/">管理员面板</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="/logout" data-toggle="tooltip" data-placement="bottom" title="Logout" data-original-title="Logout">输入</a>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <?php echo $__env->make('bsb.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </section>

    <section class="content">
        <?php echo $__env->make('bsb.partials.flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
    </section>

    <?php echo Assets::js(); ?>

    <?php echo $__env->yieldContent('additional_footer'); ?>
    <script type="text/javascript" src="/bsb/plugins/sweetalert/sweetalert.min.js"></script>
    <?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>

</html>
