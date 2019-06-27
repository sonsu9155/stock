<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>
        新闻
            <small>管理  >  新闻</small>
        </h2>
    </div>
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                <a href="<?php echo url('/news/create'); ?>" class="pull-right">额外</a>
                    <h2>
                    新闻
                    </h2>

                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover index-table dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>形式</th>
                                <th>主题</th>
                                <th>内容</th>
                                <th>创建时间</th>
                                <th>复兴时间</th>                                
                                <th>动作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($news): ?>
                            <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($new->id); ?></td>
                                <td><?php echo e($new->type); ?></td>
                                <td><?php echo e($new->subject); ?></td>
                                <td><?php echo e($new->contents); ?></td>
                                <td><?php echo e($new->created_at); ?></td>
                                <td><?php echo e($new->updated_at); ?></td>
                                <td >                                    
                                    <a class="col-teal" href="<?php echo url('news/edit/'.$new->id); ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" data-original-title="Edit">
                                    汇编
                                    </a>
                                    <a href="javascript:del(<?php echo e($new->id); ?>)" class="col-pink" data-toggle="tooltip" data-placement="bottom" title="Delete" data-original-title="Delete" onclick="return confirm('are you sure?')">
                                    删除
                                    </a>
                                    <?php echo Form::open(array('url' => 'news/delete/'.$new->id, 'method' => 'POST', 'id' => 'delete'.$new->id)); ?>

                                    <?php echo Form::close(); ?>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('additional_footer'); ?>
<?php Assets::add('datatable'); ?>
<script type="text/javascript">
    $(function () {
        $('.index-table').DataTable({
            'scrollX': true
        });
    });

    function del(id) {
        $('#delete' + id).submit();
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.templates.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>