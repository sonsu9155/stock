<?php $__env->startSection('content'); ?>
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);"></a>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_in" method="POST" url="<?php echo e(url('login')); ?>">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <div class="msg">登录以开始您的会话</div>
                <?php echo $__env->make('bsb.partials.flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="input-group">
                    <span class="input-group-addon">
                    </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="username" placeholder="用户名" required autofocus >
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                    </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="密码" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8 p-t-5">
                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                        <label for="rememberme">记住账号</label>
                    </div>
                    <div class="col-xs-4">
                        <button class="btn btn-block bg-pink waves-effect" type="submit">登入</button>
                    </div>
                </div>
                <div class="row m-t-15 m-b--20">
                    <div class="col-xs-6">

                    </div>
                    <div class="col-xs-6 align-right">
                        <a href="/forgot_password">忘记密码?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('additional_footer'); ?>
<script src="/bsb/js/pages/examples/sign-in.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.templates.authentication', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>