<?php $__env->startSection('javascript'); ?>
<script type="text/javascript" src="/js/cookie.js"></script>
<script type="text/javascript" src="/js/SuggestServer_3_0_16.js" charset="gb2312"></script>
<script type="text/javascript">
	$(document).ready(function(){
		mon = setInterval(sysMoney,1000);
	});
	var sysMoney = function(){
				clearInterval(mon);
				$.ajax({
					type: 'GET',
					url: './ajax.php?type=moneyall',
					cache: false,
					success:function(res){
						info_data = res.split('^');
						$('#a_money').html(info_data[0]);
						$('#a_zZymoney').html(info_data[1]);
						$('#a_kyMoney').html(info_data[2]);
						$('#a_baoCangXs').html(info_data[3]);
						$('#liveTime').html(info_data[4]);
						mon = setInterval(sysMoney,1000);
					}
				});
			}
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-sm-10">
	<div style="width:100%; height:288px; background-color:#FFFFFF;">
		<div style="width:100%; height:31px;background-image:url(/images/rtoubu.png);" ></div>
		<div style="width:100%;height:257px;background-image:url(/images/rzhongjian.png); padding:10px 0 0 0;" >
			<p style="margin:10px 0 0 10px;">股东代码：<span  >11139<?php echo e($moneywallet->id); ?></span></p>
				<p style="margin:10px 0 0 10px;">账户资金：<span id="a_money" class="l_zMoney"><?php echo e(number_format($moneywallet->after_amount + $moneywallet->before_amount ,2)); ?></span>元</p>
				<p style="margin:10px 0 0 10px;">占用资金：<span id="a_zZymoney" class="l_zZymoney"><?php echo e(number_format($moneywallet->before_amount,2)); ?></span>&nbsp;元</p>
				<p style="margin:10px 0 0 10px;">可用额度：<span class="l_kyMoney" id="a_kyMoney"><?php echo e(number_format($moneywallet->after_amount,2)); ?></span>元 </p>
		</div>
	</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pc_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>