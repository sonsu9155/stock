    <div class="mybox" style="background: #3a3855;width: 100%;">
        <ul class="top_table clearfix">
            <li class="row1">买入手续费：<span class="gray">1.5%</span></li>
            <li class="row2">卖出手续费：<span class="gray">1.5%</span></li>
            <li class="row3">留仓费：<span class="gray">1‰ </span></li>
            <li class="row4">留仓总金额：<span id="span_lcmoney" class="money1">0.00</span></li>
            <li class="row5">留仓盈亏合计：<span id="span_lcgain" class="money1">0.00</span></li>
        </ul>
    </div>
    
    <div class="mybox" style="margin-top:5px;width: 100%;padding-left: 0;">
    <?php $__currentLoopData = $buyhistories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $buyhistory): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <ul class="deal_table clearfix">
            <li style="display:none;" id="inf_<?php echo e($index + 1); ?>" value="<?php echo e($buyhistory->cost); ?>,<?php echo e($buyhistory->method); ?>,<?php echo e($buyhistory->amount); ?>,<?php echo e($buyhistory->fee * $buyhistory->amount * $buyhistory->cost *0.01); ?>,<?php echo e($buyhistory->fee * 0.0001); ?>,0, <?php echo e($buyhistory->cost * 0.05); ?>">00006291</li>
            <li>名字：<?php echo e($buyhistory->stockType->cn_name); ?></li>
            <li>类型：<font color="#009900">融券</font></li>
            <li>金额：<?php echo e($buyhistory->amount * $buyhistory->cost); ?></li>
            <li id="cur_price_<?php echo e($index + 1); ?>"></li>
            <li id="gain_<?php echo e($index + 1); ?>"></li>
            <li><a href="/site/sale_buy?id=<?php echo e($buyhistory->id); ?>" ><input type="button" name="Submit" value="平仓"  class="button3"  enabled /></a></li>
        </ul>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </div>
