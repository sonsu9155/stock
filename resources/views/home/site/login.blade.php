<html><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
    <meta http-equiv="expires" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="股票交易系统">
    <meta name="author" content="">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="telephone=no" name="format-detection">
    <link href="lanren/css/global.css?ver=10508" rel="stylesheet" type="text/css">
    <link href="lanren/css/index.css?ver=10508" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/skin/ymPrompt.css">
    <script type="text/javascript" src="./js/jquery1.3.2.js"></script>
    <script type="text/javascript" src="./js/ymPrompt.js"></script>
    <style type="text/css">
        #username, #password {
            height: 40px;
            border: 1px solid #CCCCCC;
            border-radius: 5px;
            padding: 0px 0 0 40px;
            background-size: 25px 25px;
            background-position: 8px 7px;
            background-repeat: no-repeat;
        }
        #username {
            background-image: url(img/login_user.png);

        }
        #password {
            background-image: url(img/login_password.png);

        }
    </style>
</head>

<body style="padding:0; margin:0;background: #fff;">
    <div id="Div1" class="header">
        <a href="/wapindex2.php">
            <div class="left-arrow"></div>
        </a>
        <a>
            登录
        </a>
    </div>
    <div class="hg50"></div>
    <div style="width:100%; padding-top:100px;">
        <div style=" width:100%;text-align:center;"><img src="img/logozhong.png"></div>
        <form id="loginForm" name="loginForm" action="login_from.php?type=waplogin" method="post" data-ajax="false">
            <div style="width:100%; text-align:center; margin-top:60px; "><input type="text" name="username" id="username" placeholder="请输入账号"></div>
            <div style="width:100%;text-align:center; margin-top:30px;"><input type="password" name="password" id="password" placeholder="请输入密码"> </div>
            <div style="width:100%;text-align:center;margin-top:50px;"><input type="submit" value="登录" style="width: 220px;height: 40px;text-align: center;color: #FFFFFF;background-color: #de0000;border-radius: 5px;"> </div>
        </form>
    </div>
    <script type="text/javascript">
        $(".include").each(function() {
            if (!!$(this).attr("file")) {
                var $includeObj = $(this);
                $(this).load($(this).attr("file"), function(html) {
                    $includeObj.after(html).remove(); //加载的文件内容写入到当前标签后面并移除当前标签
                })
            }
        });
    </script>


<div>
<div id="maskLevel" style="position:absolute;top:0;left:0;display:none;text-align:center;z-index:10000;"></div>
<div id="ym-window" style="position:absolute;z-index:10001;display:none">
<div class="ym-tl" id="ym-tl">
<div class="ym-tr">
<div class="ym-tc" style="cursor:move;">
<div class="ym-header-text"></div>
<div class="ym-header-tools">
<div class="ymPrompt_min" title="最小化"><strong>0</strong></div>
<div class="ymPrompt_max" title="最大化"><strong>1</strong></div>
<div class="ymPrompt_close" title="关闭"><strong>r</strong></div>
</div></div></div></div><div class="ym-ml" id="ym-ml"><div class="ym-mr"><div class="ym-mc"><div class="ym-body" style="position:relative"></div></div></div></div><div class="ym-ml" id="ym-btnl"><div class="ym-mr"><div class="ym-btn"></div></div></div><div class="ym-bl" id="ym-bl"><div class="ym-br"><div class="ym-bc"></div></div></div></div></div></body></html>