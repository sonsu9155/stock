<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>
                购买历史
            <small>买/卖 > 购买历史</small>
        </h2>
    </div>
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        购买历史列表
                    </h2>

                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover index-table dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>名称</th>
                                <th>码</th>
                                <th>量</th>
                                <th>成本</th>
                                <th>总价</th>
                                <th>平衡之前</th>
                                <th>平衡之后</th>
                                <th>费用</th>
                                <th>行动</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $buyhistories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $buyhistory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($buyhistory->user->name); ?></td>
                                <td><?php echo e($buyhistory->stockType->cn_name); ?></td>
                                <td><?php echo e($buyhistory->amount); ?></td>
                                <td><?php echo e($buyhistory->cost); ?></td>
                                <td><?php echo e($buyhistory->amount * $buyhistory->cost); ?></td>
                                <td><?php echo e($buyhistory->before_amount); ?></td>
                                <td><?php echo e($buyhistory->before_amount + $buyhistory->amount * $buyhistory->cost); ?></td>
                                <td><?php echo e($buyhistory->fee); ?></td>
                                <td>
                                    
                                    <a href="javascript:del(<?php echo e($buyhistory->id); ?>)" class="col-pink" data-toggle="tooltip" data-placement="bottom" title="Delete" data-original-title="Delete" onclick="return confirm('are you sure?')">
                                    删除
                                    </a>
                                    <?php echo Form::open(array('url' => 'buyhistory/delete/'.$buyhistory->id, 'method' => 'POST', 'id' => 'delete'.$buyhistory->id)); ?>

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