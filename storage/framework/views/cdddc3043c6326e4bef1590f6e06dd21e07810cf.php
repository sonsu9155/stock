<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <meta name="viewport" content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="keywords" content="" />
    <meta name="description" content="股票交易系统">
    <meta name="author" content="" />
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="telephone=no" name="format-detection"> 
    <link rel="stylesheet" href="/css/jquery.mobile-1.3.2.min.css">
    <link href="/css/global-ver.css" rel="stylesheet" type="text/css" />
    <link href="/css/index.css" rel="stylesheet" type="text/css" />
    <link type="text/css" rel="stylesheet" href="/css/wap_zfhy6.css" />
    <script src="/js/jquery-1.8.2.min.js"></script>
    <script src="/js/jquery.mobile-1.3.2.min.js"></script>
    <style>
        .ui-block-a,
        .ui-block-b {
            border: 1px;
            text-align: center;
        }
    </style>
  
</head>

<body>
    <div data-role="page" id="pagetwo">
        <div class="include" file="/header.blade.php"></div>
        <div data-role="content">
            <div style="width:100%; border:1px;">
                <ul style="width:100%;">
                    <li style="width:100%; height:40px;"></li>
                    <li style="width:100%; height:40px;">姓名：<?php echo e($user->name); ?> </li>
                    <li style="width:100%; height:40px;"> 保证金：
                         <?php echo e(number_format($stock_wallet->before_amount - $fund_amount, 2)); ?>元
                         
                    </li>
                    <li style="width:100%; height:40px;">可用额度:
                        <?php if(($money_wallet->after_amount + $money_wallet->before_amount)>=($stock_wallet->after_amount+$stock_wallet->before_amount)): ?>          
							<?php echo e(number_format( $money_wallet->after_amount - $fund_amount, 2)); ?>元
						<?php else: ?>
							<?php echo e(number_format( $money_wallet->after_amount - 10*$fund_amount, 2)); ?>元
						<?php endif; ?>                
                    </li>
                    <li style="width:100%; height:40px;">买入手续费：<?php echo e($setting->cost_bull_max *100); ?>‰</li>
                    <li style="width:100%; height:40px;">卖出手续费：<?php echo e($setting->cost_sell_max *100); ?>‰</li>
                    <li style="width:100%; height:40px;">留仓手续费：<?php echo e($setting->cost_save_max *100); ?>‰</li>
                    <li style="width:100%; height:40px;"> 最大留仓日期：<?php echo e($setting->cost_save_day); ?>天</li>
                    <li style="width:100%; height:40px;"> 手机号：<?php echo e($user->phone); ?></li>
                    <li style="width:100%; height:40px;">日期：<?php echo e($money_wallet -> updated_at); ?></li>
                </ul>
            </div>
        </div>
           <div class="include" file="/footer.blade.php"></div>
    <script type="text/javascript">
        $(".include").each(function() {
            if (!!$(this).attr("file")) {
                var $includeObj = $(this);
                $(this).load($(this).attr("file"), function(html) {
                    $includeObj.after(html).remove(); 
                })
            }
        });
    </script>
</body>

</html>