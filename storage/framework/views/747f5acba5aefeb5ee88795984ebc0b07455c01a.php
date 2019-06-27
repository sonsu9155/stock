<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>
        用户
            <small>证书 > <a href="<?php echo url('admin/users'); ?>">用户</a> > 编辑</small>
        </h2>
    </div>
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                    编辑 用户
                    </h2>
                </div>
                <div class="body">
                <form class="form-inline" action="/lecture/update/<?php echo e($lecture->id); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="name">演讲名称:</label>
                                <input type="text" class="form-control" id="lecture_name" placeholder="输入 演讲名称" name="lecture_name" value="<?php echo e($lecture->lecture_name); ?>">
                            </div>
                        </div>  
                        <br/>
                        <br/>
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="username">开始日期:</label>
                                <input type="text" class="form-control" id="playing_date" placeholder="输入 开始日期" name="playing_date" value="<?php echo e($lecture->playing_date); ?>">
                            </div>
                        </div>  
                        <br/>
                        <br/>
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="phone">起始时间:</label>
                                <input type="text" class="form-control" id="playing_time" placeholder="输入  起始时间" name="playing_time" value="<?php echo e($lecture->playing_time); ?>">
                            </div>
                        </div>      
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="verrification">老师的名字:</label>
                                <input type="text" class="form-control" id="teacher_name" placeholder="输入  老师的名字" name="teacher_name" value="<?php echo e($lecture->teacher_name); ?>">
                            </div>
                        </div>  
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="idcard">描述:</label>
                                <input type="text" class="form-control" id="description" placeholder="输入  描述" name="description" value="<?php echo e($lecture->description); ?>">
                            </div>
                        </div>
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="password">地点:</label>
                                <input name="MAX_FILE_SIZE" value="100000000000000"  type="hidden"/>
                                <input type="file" id="myFile" name="uploadvideo">
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