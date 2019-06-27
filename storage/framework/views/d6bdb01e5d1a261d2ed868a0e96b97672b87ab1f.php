<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>
            股票型
            <small>管理 > <a href="<?php echo url('stocktype'); ?>">股票型</a> > 创建</small>
        </h2>
    </div>
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        创建新库存类型
                    </h2>
                </div>
                <div class="body">
                    <form class="form-inline" action="<?php echo url('stocktype/create'); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="option">选项:</label>
                                <input type="text" class="form-control" id="option" placeholder="输入选项" name="option">
                            </div>
                        </div>  
                        <br/>
                        <br/>
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="code">码:</label>
                                <input type="text" class="form-control" id="code" placeholder="输入代码" name="code">
                            </div>
                        </div>  
                        <br/>
                        <br/>
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="cn_name">中文名:</label>
                                <input type="text" class="form-control" id="cn_name" placeholder="输入中文名称" name="cnName">
                            </div>
                        </div>                        
                        <br/>
                        <br/>
                        <button type="submit" class="btn btn-default">提交</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.templates.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>