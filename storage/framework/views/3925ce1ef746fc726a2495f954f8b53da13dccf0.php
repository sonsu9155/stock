<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <META HTTP-EQUIV="pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate">
    <META HTTP-EQUIV="expires" CONTENT="0">
    <meta name="viewport" content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="keywords" content="" />
    <meta name="description" content="股票交易系统">
    <meta name="author" content="" />
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="telephone=no" name="format-detection">
    <link href="/css/global-ver.css" rel="stylesheet" type="text/css" />
    <link href="/css/index.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/css/ymPrompt.css" />
    <script type="text/javascript" src="/js/jquery1.3.2.js"></script>
    <script type="text/javascript" src="/js/ymPrompt.js"></script>
    <style type="text/css">#name, #password {
            height: 40px;
            border: 1px solid #CCCCCC;
            border-radius: 5px;
            padding: 0px 0 0 40px;
            background-size: 25px 25px;
            background-position: 8px 7px;
            background-repeat: no-repeat;
        }
        #name {
            background-image: url("/images/site/login_user.png");

        }
        #password {
            background-image: url("/images/site/login_password.png");

        }
    </style>
</head>

<body style="padding:0; margin:0;background: #fff;">
    <div id="Div1" class="header">
        <a href="wapindex2">
            <div class="left-arrow"></div>
        </a>
        <a>
            登录
        </a>
    </div>
    <div class="hg50"></div>
    
    <div style="width:100%; padding-top:100px;">
        <div style=" width:100%;text-align:center;"><img src="/images/site/logozhong.png" /></div>
        <div style=" text-align: -webkit-center;color: red;">
         <?php echo $__env->make('flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <form id="loginForm" name="loginForm" action="/login/index" method="post" data-ajax="false">   
            <?php echo e(csrf_field()); ?>

            <div style="width:100%;text-align:center; margin-top:30px;"><input type="text" name="name" id="name" placeholder="请输入账号" /></div>          
            <div style="width:100%;text-align:center; margin-top:30px;"><input type="password" name="password" id="password" placeholder="请输入密码" /> </div>
            <div style="width:100%;text-align:center;margin-top:50px;"><input type="submit" value="登录" style="width: 220px;height: 40px;text-align: center;color: #FFFFFF;background-color: #de0000;border-radius: 5px;" /> </div>
           
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
</body>

</html>