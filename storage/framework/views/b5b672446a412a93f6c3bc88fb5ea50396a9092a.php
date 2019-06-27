<?php $__env->startSection('content'); ?>
<div class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);"></a>
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" method="POST" >
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <?php echo $__env->make('bsb.partials.flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="msg">
                    请耐心等待并输入您用于注册的手机号码。 我们会向您发送一个窗口，其中包含您的用户名和密码的链接。
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                        手机号码:
                        </span>
                        <div class="form-line">
                            <input type="phone" class="form-control" name="phone" placeholder="手机号码" required autofocus>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">重置我的密码</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="/login">登入!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('additional_footer'); ?>
<script src="/bsb/js/pages/examples/forgot-password.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.templates.authentication', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>