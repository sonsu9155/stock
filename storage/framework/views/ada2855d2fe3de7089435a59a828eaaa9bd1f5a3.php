<!DOCTYPE html>
<html>

<head>
    <title>股票交易交易平台</title>
    <meta http-equiv="Content-Type " content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport" />
    <meta name="MobileOptimized" content="240" />
    <meta http-equiv="Expires" content="0" />
    <meta http-equiv="Cache-Control" content="no-cache" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <meta content="email=no" name="format-detection" />
    <meta name="wap-font-scale" content="no">
    <link href="/css/global-ver.css" rel="stylesheet" type="text/css" />
    <script src="/js/jquery.js" type="text/javascript"></script>
    <style>
        a:hover, a:visited, a:link, a:active {
            color: #000000;
            text-decoration: none;
            }
            .warp-mask{
            height:100%;
            width:100%;
            background: rgba(0,0,0,0.3);
        }
    </style>
</head>

<body style="padding:0; margin:0;">
    <div class="include" file="/header.blade.php"></div>
    <div class="wo-intro">
        <div class="warp-mask">
            <div class="box1 clearfix">
                <div class="img"><img src="/images/site/wo-img.png"></div>
                <div class="text">
                    <p><?php echo e($user->username); ?></p>
                    <p>可用资金：
                        <?php if(($money_wallet->after_amount + $money_wallet->before_amount)>($stock_wallet->after_amount+$stock_wallet->before_amount)): ?>          
							<?php echo e(number_format( $money_wallet->after_amount - $fund_amount, 2)); ?>元
						<?php else: ?>
							<?php echo e(number_format( $money_wallet->after_amount - 10*$fund_amount, 2)); ?>元
						<?php endif; ?> 
                    </p>
                </div>
            </div>
            <div class="box2 clearfix">
            </div>
        </div>
    </div>
    <div class="wo-list">
        <ul>
            <li><a href="/site/wapmingxi"><img src="/images/site/wob1.png">今日交易<span>></span></a></li>
            <li><a href="/site/wapxiaoxi"><img src="/images/site/wob2.png">我的消息<span>></span></a></li>
            <li><a href="/site/wapinfo"><img src="/images/site/wob3.png">用户信息<span>></span></a></li>
            <li><a href="/messages/create"><img src="/images/site/wob4.png">在线客服<span>></span></a></li>
        </ul>
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