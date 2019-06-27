<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>
            提取历史
            <small>提款/存款 > 提取历史</small>
        </h2>
    </div>
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        提取历史列表
                    </h2>

                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover index-table dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>名称</th>
                                <th>量</th>
                                <th>银行</th>
                                <th>开户行</th>
                                <th>状态</th>
                                <th>行动</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($withdrawHistories): ?>
                            <?php $__currentLoopData = $withdrawHistories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $withdrawHistory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($withdrawHistory->user->name); ?></td>
                                <td><?php echo e($withdrawHistory->amount); ?></td>
                                <td><?php echo e($withdrawHistory->bank); ?></td>
                                <td><?php echo e($withdrawHistory->bank_name); ?></td>
                                <td><?php echo e($withdrawHistory->status); ?></td>
                                <td>
                                    <!-- <a class="col-teal" href="<?php echo url('withdrawhistory/edit'.$withdrawHistory->id); ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" data-original-title="Edit">
                                        <i class="material-icons">edit</i>
                                    </a> -->
                                    <a href="javascript:del(<?php echo e($withdrawHistory->id); ?>)" class="col-pink" data-toggle="tooltip" data-placement="bottom" title="Delete" data-original-title="Delete" onclick="return confirm('are you sure?')">
                                    删除
                                    </a>
                                    <?php echo Form::open(array('url' => 'withdrawhistory/delete/'.$withdrawHistory->id, 'method' => 'POST', 'id' => 'delete'.$withdrawHistory->id)); ?>

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