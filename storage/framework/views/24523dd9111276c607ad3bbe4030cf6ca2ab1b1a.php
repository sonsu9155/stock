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
                        销售历史列表
                    </h2>

                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover index-table dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>名称</th>
                                <th>证券代码</th>
                                <th>证券名称</th>
                                <th>升/跌</th>
                                <th>买入成本价</th>
                                <th>买入手续费</th>
                                <th>买入下单时间</th>
                                <th>买出成本价</th>
                                <th>买出手续费</th>
                                <th>买出下单时间</th>
                                <th>手数</th>
                                <th>留仓费</th>
                                <th>印花税</th>
                                <th>盈亏</th>
                                <th>行动</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $sellHistories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $sellhistory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($sellhistory->user->name); ?></td>
                                <td><?php echo e($sellhistory->stockType->code); ?></td>                               
                                <td><?php echo e($sellhistory->stockType->cn_name); ?></td>
                                <td><?php echo e($sellhistory->method); ?></td>
                                <td><?php echo e($sellhistory->buy_cost); ?></td>
                                <td><?php echo e($sellhistory->buy_fee); ?></td>
                                <td><?php echo e($sellhistory->buy_time); ?></td>
                                <td><?php echo e($sellhistory->sell_cost); ?></td>
                                <td><?php echo e($sellhistory->sell_fee); ?></td>
                                <td><?php echo e($sellhistory->created_at); ?></td>
                                <td><?php echo e($sellhistory->amount); ?></td>
                                <td><?php echo e($sellhistory->save_fee  * $sellhistory->amount * $sellhistory->sell_cost); ?></td>
                                <td><?php echo e($sellhistory->state_fee * $sellhistory->amount * $sellhistory->sell_cost); ?></td>
                                <td><?php echo e($sellhistory->fee); ?></td>
                                <td>                                   
                                    <a href="javascript:del(<?php echo e($sellhistory->id); ?>)" class="col-pink" data-toggle="tooltip" data-placement="bottom" title="Delete" data-original-title="Delete" onclick="return confirm('are you sure?')">
                                    删除
                                    </a>
                                    <?php echo Form::open(array('url' => 'sellhistory/delete/'.$sellhistory->id, 'method' => 'POST', 'id' => 'delete'.$sellhistory->id)); ?>

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