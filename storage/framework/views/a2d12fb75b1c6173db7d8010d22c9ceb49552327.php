<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>仪表板 : </h2>
    </div>
    <!-- <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="info-box hover-zoom-effect">
                <div class="content">
                    <div class="text">Total Collection Form</div>
                   
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="info-box hover-zoom-effect">
                <div class="content">
                    <div class="text">Total Delivery Form</div>

                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="info-box hover-zoom-effect">
                <div class="content">
                    <div class="text">Un Approved Collection Form</div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="info-box hover-zoom-effect">
                <div class="content">
                    <div class="text">Un Approved Delivery Form</div>

                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="info-box hover-zoom-effect">
                <div class="content">
                    <div class="text">Approved Collection Form</div>

                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="info-box hover-zoom-effect">
                <div class="content">
                    <div class="text">Approved Delivery Form</div>

                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>条形图</h2>
                </div>
                <div class="body">
                    <canvas id="bar_chart" style="min-height: 300px !important;"></canvas>
                </div>
                <div id="js-legend" class="chart-legend"></div>
            </div>
        </div>
    </div>
</div> -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('additional_footer'); ?>
<script src="/bsb/plugins/chartjs/Chart.bundle.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.templates.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>