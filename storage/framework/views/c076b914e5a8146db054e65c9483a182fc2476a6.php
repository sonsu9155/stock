<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>
            用户
            <small>管理 > 股票类型</small>
        </h2>
    </div>
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                    编辑 股票类型
                    </h2>
                </div>
                <div class="body">
                <form class="form-inline" action="/stocktype/update/<?php echo e($stocktype->id); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="name">形式:</label>
                                <input type="text" class="form-control" id="option" placeholder="输入 名称" name="option" value="<?php echo e($stocktype->option); ?>">
                            </div>
                        </div>  
                        <br/>
                        <br/>
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="password">代  码:</label>
                                <input type="text" class="form-control" id="code" placeholder="输入  代  码" name="code" value="<?php echo e($stocktype->code); ?>">
                            </div>
                        </div> 
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="repassword">名  称:</label>
                                <input type="text" class="form-control" id="cn_name" placeholder="输入 名  称" name="cn_name" value="<?php echo e($stocktype->cn_name); ?>">
                            </div>
                        </div> 
                        <button type="submit" class="btn btn-default">提交</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.templates.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>