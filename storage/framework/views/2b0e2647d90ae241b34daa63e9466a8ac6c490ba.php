<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>
        钱帐户
            <small>管理  > 钱帐户 </small>
        </h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                <a href="<?php echo url('/moneywallets/edit'); ?>" class="pull-right"><i class="material-icons">add_box</i></a>
                    <h2>
                         钱帐户
                    </h2>

                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover index-table dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>用户名</th>
                                <th>交易金额</th>
                                <th>可用金额</th>
                                <th>创造时间</th>
                                <th>更新时间</th>
                                <th>动作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($money_wallets): ?>
                            <?php $__currentLoopData = $money_wallets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $money_wallet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($money_wallet->user): ?>
                                <tr>
                                    <td><?php echo e($money_wallet->id); ?></td>                            
                                    <td><?php echo e($money_wallet->user->name); ?></td>             
                                    <td><?php echo e($money_wallet->before_amount); ?></td>
                                    <td><?php echo e($money_wallet->after_amount); ?></td>
                                    <td><?php echo e($money_wallet->created_at); ?></td>
                                    <td><?php echo e($money_wallet->updated_at); ?></td>
                                    <td ></td>
                                </tr>
                                <?php endif; ?>
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