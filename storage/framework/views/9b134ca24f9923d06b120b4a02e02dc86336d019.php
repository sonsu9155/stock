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
    <link href="/css/global-ver.css" rel="stylesheet" type="text/css" />
    <link href="/css/index.css" rel="stylesheet" type="text/css" />
    <link href="/css/tip-violet.css" rel="stylesheet" type="text/css" />
    <script src="/js/jquery-1.8.2.min.js"></script>
    <script src="/js/jquery.mobile-1.3.2.min.js"></script>
    <script type="text/javascript" src="/js/me_function.js"></script>
    <script type="text/javascript" src="/js/cookie.js"></script>
    <script type="text/javascript" src="/js/ymPrompt.js"></script>
    <script type="text/javascript" src="/js/jquery.poshytip.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            showgain();
            $('#tips_gain,#tips_gain1,#tips_cost,#tips_cc').poshytip({
                className: 'tip-violet',
                bgImageFrameSize: 9
            });
        });
    </script>
    <style>
        .ui-block-a,
        .ui-block-b,
        .ui-block-c,
        .ui-block-d,
        .ui-block-e {
            border: 1px;
            border-bottom-color: #000000;
            height: 40px;


        }
        .button3 {
            height: 30px;
        }
        .mybox {
            margin: 0;
            width: 100%;
        }
        .mybox td {
            padding:3px 0; 
            line-height:18px;
            color: #FFF;
            text-align: left;
            font-size: 12px;
            box-sizing: border-box;
        }
        .mybox .gray {
            color: #FFF;
        }
        .mybox .money1 {
            color: #ff0000;
            font-size: 14px;
            font-weight: normal;
            font-family: Arial, Helvetica, sans-serif;
        }

        .deal_table {
           border-bottom: 1px solid #3a3855;
        }
        .deal_table>td {
            width: 33.33333%;
            display: inline-block;
            padding: 8px;
            box-sizing: border-box;
        }
        .deal_table>.row1 {
          width: 30%;
        }
        .deal_table>.row2 {
          width: 45%;
        }
        .deal_table>.row3 {
          width: 25%;
        }
                .deal_table>.row4 {
          width: 30%;
        }
                .deal_table>.row5 {
          width: 30%;
        }
                .deal_table>.row6 {
          width: 40%;
        }
        .top_table>td {
            float: left;
            box-sizing: border-box;
        }
        .top_table .row1 {
            width: 40%;
        } 
        .top_table .row2 {
            width: 35%;
        } 
        .top_table .row3 {
            width: 25%;
        }
        .top_table .row4 {
            width: 40%;
        }
        .top_table .row5 {
            width: 60%;
        }

    </style>
</head>

<body>
    <div data-role="page" style="height:5%">
        <div id="Div1" class="header">
            <a href="/site/waporder.php">
                财智通
            </a>
        </div>
        <div class="mairu" style="margin-top: 47px;">
            <div class="mairu-li"><a href="/site/waporder" data-ajax="false" style="color:#FFFFFF;">买入</a></div>
            <div class="mairu-li"><a href="/site/waptrade" data-ajax="false" style="color:#FFFFFF;">持仓</a></div>
            <div class="mairu-li"><a href="/site/wapmingxi" data-ajax="false" style="color:#FFFFFF;">明细</a></div>
        </div>
        <div style="width:100%; padding:0;background:#1c1b29;">
            <table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#3a3855" class="mybox" style="   padding-left: 8px;border-top: 5px solid #1c1b29;">
                <tr class="top_table" align="center">
                    <td class="row1" >买入手续费：<span class="gray"><?php echo e($setting->cost_bull_max * 100); ?>‰</span></td>
                    <td class="row2" >卖出手续费：<span class="gray"><?php echo e($setting->cost_sell_max * 100); ?>‰</span></td>
                    <td class="row3" >留仓费：<span class="gray"><?php echo e($setting->cost_save_max * 100); ?>‰ </span></td>
                </tr>
                <tr class="top_table" align="center">
                    <td class="row4">可用：<span class="money">
                            <font style="color: #ff0000;">
                                <?php if(($money_wallet->after_amount + $money_wallet->before_amount)>($stock_wallet->after_amount+$stock_wallet->before_amount)): ?>          
                                    <?php echo e(number_format( $money_wallet->after_amount - $fund_amount, 2)); ?>元
                                <?php else: ?>
                                    <?php echo e(number_format( $money_wallet->after_amount - 10*$fund_amount, 2)); ?>元
                                <?php endif; ?> 
                            </font>
                        </span></td>
                    <td class="row5">平台总盈亏：<span id="pcgain" style="display:none;">0</span><span class="money1" ><?php echo e($total_gain); ?>元</span></td>
                </tr>
            </table>
            <table width="99%" align="center" cellpadding="0" cellspacing="0" class="mybox" style="margin-top:10px; font-size:12px;border-collapse: collapse;">
                <tr align="center">
                    <td height="30" colspan="14" class="gray">&nbsp;&nbsp;暂无符合条件的记录.</td>
                </tr>
            </table>
            <?php if($sellhistories): ?>
            <?php $__currentLoopData = $sellhistories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $sellhistory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <table width="99%" align="center" cellpadding="0" cellspacing="0" class="mybox" style="margin-top:10px; font-size:12px;border-collapse: collapse;">
                    <tr class="deal_table">
                        <td align="center" style="display:none;"><?php echo e($sellhistory->id); ?></td>
                        <td class="row1" align="center"><?php echo e($sellhistory->stockType->cn_name); ?></td>
                        <td class="row2" class="row1"align="center">时间：<?php echo e($sellhistory->created_at); ?></td>
                        <?php if( $sellhistory->method ==1 ): ?>
                             <td class="row3" align="center">类型： <font color="#00B700">买跌</font></td>                            
                        <?php else: ?>
                             <td class="row3" align="center">类型： <font color="#FF0909">买升</font></td>    
                        <?php endif; ?>      
                        <td class="row4" align="right">成交价：<?php echo e($sellhistory->sell_cost); ?></td>
                        <td class="row5" align="right">数量(手)：<?php echo e($sellhistory->amount); ?></td>
                        <td class="row6" align="right">盈亏：<?php echo e(number_format($sellhistory->fee, 2)); ?></td>
                    </tr>
                </table>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
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
    </div>
</body>

</html>