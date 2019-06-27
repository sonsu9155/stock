<!DOCTYPE html>
<html>

<head>
    <title>股票交易平台</title>
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
    <script src="/js/jquery.js" type="text/javascript"></script>
    <script type="text/javascript" src="/js/global-ver=10508.js"></script>
    <link href="/css/global-ver.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/js/index-ver=10508.js" charset="utf-8"></script>
    <script type="text/javascript" src="/js/jquery.lazyload.min.js"></script>
    <link href="/css/index.css" rel="stylesheet" type="text/css" />    
    <link rel="stylesheet" href="/css/idangerous.swiper.css" />
    <script src="/js/idangerous.swiper.min.js" type="text/javascript"></script>
    <style type="text/css">
        .off {
            color: #000000;
            border: 1 solid #FF0000;
            background-color: #FFFFFF;
        }
        .on {
            color: #FFFFFF;
            border: 1 solid #FF0000;
            background-color: #FF0000;
        }
        .hide {
            display: none;
        }
        .show {
            display: block;
        }
    </style>
    <script type="text/javascript">
        window.onload = function() {
            var index = 0;
            $(".hide").eq(index).show();
            $(".off").eq(index).css({
                "color": "white",
                "background-color": "#FF0000"
            });
            var timer = setInterval(function() {
                index = (index == 2) ? 0 : index + 1;
                $(".hide").hide().eq(index).show();
                $(".off").css({
                    "color": "#000000",
                    "background-color": "#FFFFFF"
                }).eq(index).css({
                    "color": "white",
                    "background-color": "#FF0000"
                });

            }, 3000);
        }
    </script>
    <style>
        a:hover, a:visited, a:link, a:active {
            color: #fff;
            text-decoration: none;
        }
    </style>
    <script type="text/javascript" src="http://hq.sinajs.cn/list=s_sh000001,s_sz399001,s_sz399006"></script>
</head>

<body>
    <div class="include" file="/header.blade.php"></div>
    <div id="EntPage">
    </div>
    <div style="width:100%; padding:0; margin:1;">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="/images/site/banner01.png" /></div>
            </div>
            <div class="pagination"></div>
        </div>
        <div style="text-align:center; padding:10px 0 0 0; width:100%; height:80px; background-color:#2b2a3a;">
            <div style=" width:25%; height:70px;font-size: 12px; float:left;">
                <div> <a href="waporder"><img src="/images/site/11n.png" /></a></div>
                <div> <a href="waporder" style="line-height: 30px;color: #FFF;">交易</a></div>
            </div>
            <div style="width:25%; height:70px;font-size: 12px;float:left;">
                <div><a href="waptrade"><img src="/images/site/12n.png" /></a></div>
                <div><a href="waptrade" style="line-height: 30px;color: #FFF;">持仓</a></div>
            </div>
            <div style="width:25%; height:70px;font-size: 12px;float:left;">
                <div> <a href="wapnew"><img src="/images/site/14n.png" /></a></div>
                <div> <a href="wapnew" style="line-height: 30px;color: #FFF;">资讯</a></div>
            </div>
            <div style="width:25%; height:70px;font-size: 12px;float:left;">
                <div><a href="wapindex"><img src="/images/site/13n.png" /></a></div>
                <div><a href="wapindex" style="line-height: 30px;color: #FFF;">我的</a></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="home_zhis" id="stock-data" v-cloak>
            <div class="box">
                <div class="title"><?php echo e($sh[0]); ?></div>
                <div class="stock-number " :class="sh[2] > 0 ? 'number-red' : 'number-green'">
                    <?php echo e($sh[1]); ?>

                </div>
                <div class="meta">
                    <span class="point" :class="sh[2] > 0 ? 'number-red' : 'number-green'"><?php echo e($sh[2]); ?></span>
                    <span class="percent-red" :class="sh[2] > 0 ? 'number-red' : 'number-green'"><?php echo e($sh[3]); ?>%</span>
                </div>
            </div>
            <div class="box">
                <div class="title"><?php echo e($sz[0]); ?></div>
                <div class="stock-number number-xxl" :class="sz[2] > 0 ? 'number-red' : 'number-green'">
                    <?php echo e($sz[1]); ?>

                </div>
                <div class="meta">
                    <span class="point" :class="sz[2] > 0 ? 'number-red' : 'number-green'"><?php echo e($sz[2]); ?></span>
                    <span class="percent" :class="sz[2] > 0 ? 'number-red' : 'number-green'"><?php echo e($sz[3]); ?>%</span>
                </div>
            </div>
            <div class="box">
                <div class="title"><?php echo e($cy[0]); ?></div>
                <div class="stock-number " :class="cy[2] > 0 ? 'number-red' : 'number-green'">
                    <?php echo e($cy[1]); ?>

                </div>
                <div class="meta">
                    <span class="point" :class="cy[2] > 0 ? 'number-red' : 'number-green'"><?php echo e($cy[2]); ?></span>
                    <span class="percent-red" :class="cy[2] > 0 ? 'number-red' : 'number-green'"><?php echo e($cy[3]); ?>%</span>
                </div>
            </div>
        </div>
        <div class="home-news">
            <h3><span class="icon_laba"></span>资讯<a href="wapnew">更多></a></h3>
            <ul>
                <?php if($news): ?>
                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="#"><?php echo e($new_one->contents); ?></a>
                        <p><?php echo e($new_one->updated_at); ?></p>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
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