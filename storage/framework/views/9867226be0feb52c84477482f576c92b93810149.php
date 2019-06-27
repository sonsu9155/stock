<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>
            用户
            <small>管理  >  用户</small>
        </h2>
    </div>
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                <a href="<?php echo url('/users/create'); ?>" class="pull-right">额外</a>
                    <h2>
                        用户列表
                    </h2>

                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover index-table dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>帐 号</th>
                                <th>真实姓名</th>
                                <th>身份证号码</th>
                                <th>开户行</th>
                                <th>银行名称</th>
                                <th>银行卡号码</th>
                                <th>手机</th>
                                <th>资金密码</th>
                                <th>钱钱包ID</th>
                                <th>股票钱包ID</th>
                                <th>动作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($users): ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->id); ?></td>
                                <td><?php echo e($user->username); ?></td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->idcard); ?></td>
                                <td><?php echo e($user->kh_bank); ?></td>
                                <td><?php echo e($user->bank_name); ?></td>
                                <td><?php echo e($user->bank_card); ?></td>
                                <td><?php echo e($user->phone); ?> </td>
                                <td><?php echo e($user->atmpwd); ?> </td>
                                <td><?php echo e($user->money_wallet_id); ?></td>
                                <td><?php echo e($user->stock_wallet_id); ?></td>
                                <td >
                                    <a class="col-teal" href="<?php echo url('users/detail/'.$user->id); ?>" data-toggle="tooltip" data-placement="bottom" title="Detail" data-original-title="Detail">
                                    详情
                                    </a>
                                    <a class="col-teal" href="<?php echo url('users/edit/'.$user->id); ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" data-original-title="Edit">
                                    汇编
                                    </a>
                                    <a href="javascript:del(<?php echo e($user->id); ?>)" class="col-pink" data-toggle="tooltip" data-placement="bottom" title="Delete" data-original-title="Delete" onclick="return confirm('are you sure?')">
                                    删除
                                    </a>
                                    <?php echo Form::open(array('url' => 'users/delete/'.$user->id, 'method' => 'POST', 'id' => 'delete'.$user->id)); ?>

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