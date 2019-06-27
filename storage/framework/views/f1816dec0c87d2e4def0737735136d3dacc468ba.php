<?php $__env->startSection('content'); ?>
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);"></a>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_in" method="POST" url="<?php echo e(url('/password/reset')); ?>">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <div class="msg">重置你的密码</div>
                <?php echo $__env->make('bsb.partials.flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="密码" required>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="确认密码" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 p-t-5">

                    </div>
                    <div class="col-xs-6">
                        <button class="btn btn-block bg-pink waves-effect" type="submit">重设密码</button>
                    </div>
                </div>
                <div class="row m-t-15 m-b--20">
                    <div class="col-xs-6">
                        <a href="/login">登录</a>
                    </div>
                    <div class="col-xs-6 align-right">

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('additional_footer'); ?>
<script src="/bsb/js/customs/reset_password.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.templates.authentication', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>