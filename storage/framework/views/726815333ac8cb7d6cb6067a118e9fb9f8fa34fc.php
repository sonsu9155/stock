<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>
                演讲           
        </h2>
    </div>
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                <a href="<?php echo url('/lecture/create'); ?>" class="pull-right"><i class="material-icons">add_box</i></a>
                    <h2>
                        演讲
                    </h2>

                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover index-table dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>讲座名称</th>
                                <th>开始日期</th>
                                <th>起始时间</th>
                                <th>老师的名字</th>
                                <th>描述</th>                               
                                <th>地点</th>
                                <th>行动</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $lectures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $lecture): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($lecture->lecture_name); ?></td>
                                <td><?php echo e($lecture->playing_date); ?></td>
                                <td><?php echo e($lecture->playing_time); ?></td>
                                <td><?php echo e($lecture->teacher_name); ?></td>
                                <td><?php echo e($lecture->description); ?></td>
                                <td><?php echo e($lecture->location); ?></td>
                                <td>              
                                    <a class="col-teal" href="<?php echo url('/lecture/edit/'.$lecture->id); ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" data-original-title="Edit">
                                        <i class="material-icons">edit</i>
                                    </a>                     
                                    <a href="javascript:del(<?php echo e($lecture->id); ?>)" class="col-pink" data-toggle="tooltip" data-placement="bottom" title="Delete" data-original-title="Delete" onclick="return confirm('are you sure?')">
                                        <i class="material-icons">delete_forever</i>
                                    </a>
                                    <?php echo Form::open(array('url' => '/lecture/delete/'.$lecture->id, 'method' => 'POST', 'id' => 'delete'.$lecture->id)); ?>

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