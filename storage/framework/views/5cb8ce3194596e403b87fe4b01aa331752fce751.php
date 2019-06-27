<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>
             信息            
        </h2>
    </div>
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        信息
                    </h2>

                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover index-table dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>用户身份</th>
                                <th>类型</th>
                                <th>审核用户</th>
                                <th>内容</th>
                                <th>平台</th>
                                <th>进入时间</th>
                                <th>离开时间</th>
                                <th>动作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idnex => $message): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($idnex + 1); ?></td>
                                <td><?php echo e($message->user_id); ?></td>
                                <td><?php echo e($message->type); ?></td>
                                <td><?php echo e($message->toUid); ?></td>
                                <td><?php echo e($message->message); ?></td>
                                <td><?php echo e($message->platform); ?></td>
                                <td> <?php echo e($message->created_at); ?></td>
                                <td><?php echo e($message->updated_at); ?></td>
                                <td >
                                    <a href="javascript:del(<?php echo e($message->id); ?>)" class="col-pink" data-toggle="tooltip" data-placement="bottom" title="Delete" data-original-title="Delete" onclick="return confirm('are you sure?')">
                                        <i class="material-icons">delete_forever</i>
                                    </a>
                                    <?php echo Form::open(array('url' => 'message/delete/'.$message->id, 'method' => 'POST', 'id' => 'delete'.$message->id)); ?>

                                    <?php echo Form::close(); ?>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
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