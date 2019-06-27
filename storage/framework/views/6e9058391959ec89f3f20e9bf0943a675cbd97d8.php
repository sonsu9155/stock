<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>
        用户
            <small>证书 > <a href="<?php echo url('/users'); ?>">用户</a> > 详情</small>
        </h2>
    </div>
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                    详情 用户
                    </h2>
                </div>
                <div class="body">
               
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="name">帐 号:</label>
                                <input type="text" class="form-control" id="name"  name="name" value="<?php echo e($user->username); ?>">
                            </div>
                        </div>  
                        <br/>
                        <br/>
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="username">真实姓名：</label>
                                <input type="text" class="form-control" id="username" name="realname" value="<?php echo e($user->name); ?>">
                            </div>
                        </div>  
                        
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="phone">身份证号码：</label>
                                <input type="text" class="form-control" id="id_card"  name="idcard" value="<?php echo e($user->idcard); ?>">
                            </div>
                        </div> 
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="phone">身份证正面照片：</label>
                                <img  style="width: 100%;" src="/images/upload/<?php echo e($user->username); ?><?php echo e($user->idcard); ?>/<?php echo e(json_decode($user->image_url)['0']); ?>">
                            </div>
                        </div>
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="phone">：</label>
                                <img  style="width: 100%;" src="/images/upload/<?php echo e($user->username); ?><?php echo e($user->idcard); ?>/<?php echo e(json_decode($user->image_url)['1']); ?>">
                            </div>
                        </div>
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="verrification">开户行：</label>
                                <input type="text" class="form-control" id="kh_bank"  name="kh_bank" value="<?php echo e($user->kh_bank); ?>">
                            </div>
                        </div>  
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="idcard">银行名称:</label>
                                <input type="text" class="form-control" id="bank_name"  name="bank_name" value="<?php echo e($user->bank_name); ?>">
                            </div>
                        </div>
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="idcard">银行卡号码:</label>
                                <input type="text" class="form-control" id="bank_card" name="bank_card" value="<?php echo e($user->bank_card); ?>">
                            </div>
                        </div>
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="phone">银行卡正面照片:</label>
                                <img  style="width: 100%;" src="/images/upload/<?php echo e($user->username); ?><?php echo e($user->idcard); ?>/<?php echo e(json_decode($user->image_url)['2']); ?>">
                            </div>
                        </div>
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="phone">银行卡图片背面：</label>
                                <img  style="width: 100%;" src="/images/upload/<?php echo e($user->username); ?><?php echo e($user->idcard); ?>/<?php echo e(json_decode($user->image_url)['3']); ?>">
                            </div>
                        </div>
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="idcard">手机:</label>
                                <input type="text" class="form-control" id="mobile"  name="mobile" value="<?php echo e($user->phone); ?>">
                            </div>
                        </div>   
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="idcard">资金密码:</label>
                                <input type="text" class="form-control" id="atmpwd"  name="atmpwd" value="<?php echo e($user->atmpwd); ?>">
                            </div>
                        </div>        
                        <br/>
                        <br/>
                        <a href="/users"><button type="button" class="btn btn-default">ok</button></a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.templates.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>