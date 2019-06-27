<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>
        系统设置
            <small>管理>股票类型</small>
        </h2>
    </div>
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <a href="<?php echo url('/stocktype/create'); ?>" class="pull-right"><i class="material-icons">add_box</i></a>
                    <h2>
                    库存类型清单
                    </h2>

                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover index-table dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>选项</th>
                                <th>码</th>
                                <th>中文名</th>
                                <th>提交</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $stockTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $stockType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($stockType->option); ?></td>
                                <td><?php echo e($stockType->code); ?></td>
                                <td><?php echo e($stockType->cn_name); ?></td>
                                <td >
                                    <a class="col-teal" href="<?php echo url('stocktype/edit/'.$stockType->id); ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" data-original-title="Edit">
                                    汇编
                                    </a>
                                    <a href="javascript:del(<?php echo e($stockType->id); ?>)" class="col-pink" data-toggle="tooltip" data-placement="bottom" title="Delete" data-original-title="Delete" onclick="return confirm('are you sure?')">
                                    删除
                                    </a>
                                    <?php echo Form::open(array('url' => 'stocktype/delete/'.$stockType->id, 'method' => 'POST', 'id' => 'delete'.$stockType->id)); ?>

                                    <?php echo Form::close(); ?>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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