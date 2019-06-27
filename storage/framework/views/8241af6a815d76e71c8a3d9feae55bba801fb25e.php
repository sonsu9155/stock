<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>
             网站在线历史            
        </h2>
    </div>
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        网站在线历史
                    </h2>

                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover index-table dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>用户身份</th>
                                <th>平台</th>
                                <th>IP</th>
                                <th>进入时间</th>
                                <th>更新时间</th>                               
                                <!-- <th>平衡之前</th>
                                <th>平衡之后</th>
                                <th>费用</th>-->
                                <th>行动</th> 
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($onlinehistories): ?>
                            <?php $__currentLoopData = $onlinehistories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $onlinehistory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($onlinehistory->user_id); ?></td>
                                <td><?php echo e($onlinehistory->platform); ?></td>
                                <td><?php echo e($onlinehistory->ipaddress); ?></td>
                                <td><?php echo e($onlinehistory->created_at); ?></td>
                                <td><?php echo e($onlinehistory->updated_at); ?></td>
                                <td>                                   
                                    <a href="javascript:del(<?php echo e($onlinehistory->id); ?>)" class="col-pink" data-toggle="tooltip" data-placement="bottom" title="Delete" data-original-title="Delete" onclick="return confirm('are you sure?')">
                                    删除
                                    </a>
                                    <?php echo Form::open(array('url' => 'onlineuser/delete/'.$onlinehistory->id, 'method' => 'POST', 'id' => 'delete'.$onlinehistory->id)); ?>

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