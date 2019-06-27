<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,height=device-height,maximum-scale=1.0,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
    <script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>  
    <title>注册帐号</title>
    <meta name="Keywords" />
    <meta name="Description" />  
    
</head>
<body>
 <!-- 导航 E -->    
<form ReturnUrl="" action="/login/register" id="register" method="post" name="register">
    <link rel="stylesheet" type="text/css" href="/css/common.css">
    <link rel="stylesheet" type="text/css" href="/css/index.css">
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <script type="text/javascript">
        function isMobile() {
            var mobile = navigator.userAgent.match(/iphone|android|phone|mobile|wap|netfront|x11|java|operamobi|operamini|ucweb|windowsce|symbian|symbianos|series|webos|sony|blackberry|dopod|nokia|samsung|palmsource|xda|pieplus|meizu|midp|cldc|motorola|foma|docomo|up.browser|up.link|blazer|helio|hosin|huawei|novarra|coolpad|webos|techfaith|palmsource|alcatel|amoi|ktouch|nexian|ericsson|philips|sagem|wellcom|bunjalloo|maui|smartphone|iemobile|spice|bird|zte-|longcos|pantech|gionee|portalmmm|jig browser|hiptop|benq|haier|^lct|320x320|240x320|176x220/i) != null;
             if (mobile == true) { location.href = "/m/?url=" + location.href; };
        }
        isMobile();
    </script>
    <style>
        #regMsg{
            color: #e35353;
        }
    </style>
<!-- 注册 B -->
    <div class="zhuce">
        <div class="center c-zhuce">
            <div class="zhuce-box">
                <ul class="clearfix">
                    <li class="zc fl">新用户注册</li>
                    <li class="fx fr" style="font-size: 12px; color: #b2b2b2;line-height: 60px;margin-right: 20px;">市场有风险，投资需谨慎</li>
                </ul>
                <?php echo $__env->make('flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>               
                <div class="zc-name mleft" <?php echo e($errors->has('name') ? 'has-error' : ''); ?> >
                    <span>开户人姓名：</span>
                    <input class="tooltip" data-val="true" data-val-required="登录帐号 字段是必需的。" id="UserAcc" name="name" placeholder="登录帐号" title="请输入登录帐号，字母数字及下划线组成。" type="text" value="" />
                    
                </div>
                <?php if($errors->has('name')): ?>
                    <span class="text-danger" style="color: red;"><?php echo e($errors->first('name')); ?></span>
                <?php endif; ?>
                <div class="zc-name mleft" <?php echo e($errors->has('phonenum') ? 'has-error' : ''); ?>>
                    <span>手机号码：</span>
                    <input class="tooltip" data-val="true" data-val-required="手机号码 字段是必需的。" id="UserTel" name="phone" placeholder="手机号码" title="请输入手机号码。" type="text" value="" />
                </div>
                <?php if($errors->has('phonenum')): ?>
                <span class="text-danger" style="color: red;"><?php echo e($errors->first('phonenum')); ?></span>
                <?php endif; ?>
                <div class="zc-yzma mleft">
                    <span style="margin-left:-204px;">图形验证：</span>                    
                    <input name="captcha" class="yzm01" id="CaptchaCode" type="text" >
                    <?php echo Igoshev\Captcha\Facades\Captcha::getView() ?>
                </div>
                <?php if($errors->has('captcha')): ?>
                <span class="text-danger" style="color: red;"><?php echo e($errors->first('captcha')); ?></span>
                <?php endif; ?>
                <div class="zc-yzma mleft" hidden>
                    <span>验证号码：</span>
                    <input class="tooltip" data-val="true" data-val-required="验证码 字段是必需的。" id="VerificationCode" name="phonenum_verified_at" placeholder="获取到的验证码" title="请输入手机获取到的数字验证码。" type="text" value="<?php echo e(rand(1000,9999)); ?>" />
                    <span class="fasong-btn " >
                        <input style="padding-left: 0;background-color: #fd5b54;" id="getVerificationCode" type="button" value="发送验证码" >
                    </span>
                </div>
                <div class="zc-mima mleft">
                    <span>真实姓名：</span>
                     <input autocomplete="off" class="tooltip" data-val="true" data-val-required="联系人 字段是必需的。" id="UserName" name="realname" placeholder="请填写您的真实姓名！" title="请填写真实姓名，提盈将核对收款人姓名。" type="text" value="" />
                </div>
                <?php if($errors->has('realname')): ?>
                <span class="text-danger" style="color: red;"><?php echo e($errors->first('realname')); ?></span>
                <?php endif; ?>
                <div class="zc-mima mleft">
                    <span>身份证号码：</span>
                     <input autocomplete="off" class="tooltip" data-val="true" data-val-required="联系人 身份证号码是必需的。" id="IdCard" name="idcard" placeholder="请填写您的身份证号码！" title="  " type="text" value="" />
                </div>
                <?php if($errors->has('idcard')): ?>
                <span class="text-danger" style="color: red;"><?php echo e($errors->first('idcard')); ?></span>
                <?php endif; ?>
                <div class="zc-mima mleft">
                    <span>开户行账号：</span>
                     <input autocomplete="off" class="tooltip" data-val="true" data-val-required="" id="CardNum" name="cardnum" placeholder="" title="  " type="text" value="" />
                </div>
                <?php if($errors->has('cardnum')): ?>
                <span class="text-danger" style="color: red;"><?php echo e($errors->first('cardnum')); ?></span>
                <?php endif; ?>
                <div class="zc-mima mleft">
                    <span>开户行地址：</span>
                     <!-- <input autocomplete="off" class="tooltip" data-val="true" data-val-required="" id="CardBank" name="cardbank" placeholder="" title="  " type="text" value="" /> -->
                     <select name="cardbank" style=" width:63%; height:10%"  id="CardBank">
                                <option value="工商银行" selected>工商银行</option>
                                <option value="建设银行">建设银行</option>
                                <option value="农业银行">农业银行</option>
                                <option value="招商银行">招商银行</option>
                                <option value="中国银行">中国银行</option>
                                <option value="浦东银行">浦东银行</option>
                                <option value="广发银行">广发银行</option>
                                <option value="交通银行">交通银行</option>
                                <option value="光大银行">光大银行</option>
                                <option value="北京银行">北京银行</option>
                                <option value="兴业银行">兴业银行</option>
                                <option value="民生银行">民生银行</option>
                                <option value="中信银行">中信银行</option>                                
                    </select>
                </div>
                <?php if($errors->has('cardbank')): ?>
                <span class="text-danger" style="color: red;"><?php echo e($errors->first('cardbank')); ?></span>
                <?php endif; ?>
                <div class="zc-mima mleft">
                    <span>登录密码：</span>
                     <input autocomplete="off" class="tooltip" data-val="true" data-val-length="登录密码必须6个字符长度." data-val-length-max="100" data-val-length-min="6" data-val-required="登录密码 字段是必需的。" id="LoginPwd" name="password" placeholder="密码" title="登陆密码最少为6为字符。" type="password" />
                </div>
                <?php if($errors->has('password')): ?>
                <span class="text-danger" style="color: red;"><?php echo e($errors->first('password')); ?></span>
                <?php endif; ?>
                <div class="qr-mima mleft">
                    <span>确认密码：</span>
                    <input autocomplete="off" class="tooltip" data-val="true" data-val-equalto="二次输入的密码不一至." data-val-equalto-other="*.LoginPwd" id="ConfirmPassword" name="confirmpassword" placeholder="确认密码" title="请再次输入登录密码。" type="password" />
                </div>
                <?php if($errors->has('confirmpassword')): ?>
                <span class="text-danger" style="color: red;"><?php echo e($errors->first('confirmpassword')); ?></span>
                <?php endif; ?>
                <div class="tuijian mleft">
                    <span>推荐人：</span>
                    <input autocomplete="off" class="tooltip" id="OtherAcc" name="OtherAcc" placeholder="推荐人帐号（如无可不填写）" title="推荐人帐号" type="text" value="" />
                </div>
                <div class="xieyi">
                    <ul class="clearfix" style="border-bottom: none;">
                        <li class="xy-xieyi fl"><span><input type="checkbox" id="cbAgreement"  checked name="xieyi"></span><span><a id="serviceAgreement" href="/login/caution" id="serviceAgreement">同意《注册服务协议》</a></span></li>
                        <li class="xy-denglu fr"><a href="/login/index">已有账号<span style="color: #fb3d51">[立即登录]</span></a></li>
                        <li> <p id="regMsg"></p>  </li>
                    </ul>                   
                <div class="zc-btn">                    
                    <input type="submit" id="submit" value="同意协议并注册">
                </div>
                
            </div>
            <?php echo e(csrf_field()); ?>

        </div>
    </div>
</form>
    
<!-- 注册 E --> 
<script type="text/javascript">
    // 手机号验证
    function checkPhone(phone) {
        var res = !!phone.match(/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/);
        return res;
    }
    function checkAcc(acc) {
        var res = !!acc.match(/[0-9a-z_]{6,12}$/);
        return res;
    }
    $(document).ready(function () {
        // 是否发送验证码的标识
        var isPushCode = false;
        // 发送等待句柄
        var flag = null;        
        $("#LoginAcc").focus();                
        $("#serviceAgreement").click(function () {
            layer.open({
                type: 2,
                title: '钻石配资服务条款',
                shadeClose: true,
                shade: 0.8,
                area: ['580px', '90%'],
                content: '/server.html' //iframe的url
            });
            return false;
        });
        $("#cbAgreement").click(function () {
            if ($("#cbAgreement").is(':checked')) {
                $("#submit").removeClass("disabled");
            } else {
                $("#submit").addClass("disabled");
            }
        });
        // $("#UserTel").focusout(function(){
            
        //     var phonenum = $("#UserTel").val();
        //     $.post('/api/send-sms',{ contact_number : phonenum }, function(data){
        //         alert(data);
        //     });
        //  });
        // $("#getVerificationCode").click(function () {                
        //     var divtext = $("#getVerificationCode");
        //     var phonenum = $("#UserTel").val();
        //     var CheckCode = $("#VerificationCode").val();
        //     if (CheckCode == "") {
        //         alert("图形验证不能为空");
        //         return false;
        //     } else if (phonenum == "") {
        //         alert("手机号不能为空");
        //         return false;         
        //     } else {
        //         divtext.addClass("enabled"); 
        //             $.post("/api/verify-user", {code:CheckCode, contact_number:phonenum }, function (res) {
        //                    // alert(res.message);
        //                     if (res.message =="not verified"){
        //                         alert("发送失败，此手机号码已注册或验证码错!"); ///Failed to send, this mobile number has been registered or the verification code is wrong.
        //                         divtext.removeClass("disabled");
        //                         return false;
        //                     }
                           
        //                 });
        //    }         
        
        // });
        $("input").keypress(function (event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                $("#submit").trigger('click');
            }
        });
        // $("#submit").click(function (event) {
        //     var errorMsg = "";
        //     var n =0;
        //     if (!$("#UserAcc").val()) {
        //         n++;
        //         errorMsg += n+ "、登录帐号不能为空!<br>";
        //     } else if (!checkAcc($("#UserAcc").val())) {
        //         errorMsg += n + "、帐号必须字母、数字及下划线6-12位<br>";
        //         // return false;
        //     }
        //     if (!$("#UserTel").val()) {
        //         n++;
        //         errorMsg += n + "、手机号不能为空!<br>";
        //     } else if (!checkPhone($("#UserTel").val())) {
        //         //n++;
        //         //errorMsg += n + "、手机号不合要求!<br>";
        //     }
        //     if (!$("#VerificationCode").val()) {
        //         n++;
        //         errorMsg += n + "、验证码不能为空!<br>";
        //     }  else {
        //         $.post("/api/verify-user", {
        //                  code:     CheckCode,
        //                  contact_number:  phonenum
        //                 },  function (data) {


        //             });
        //     }        
        //     if (!$("#UserName").val()) {
        //         n++;
        //         errorMsg += n + "、联系人姓名不能为空!<br>";
        //     }
        //     if (!$("#LoginPwd").val()) {
        //         n++;
        //         errorMsg += n + "、登录密码不能为空!<br>";
        //     }
        //     else if ($("#LoginPwd").val() != $("#ConfirmPassword").val()) {
        //         n++;
        //         errorMsg += n + "、登录密码二次不一至!<br>";
        //     }                   
        //     if (errorMsg != "") {
        //         $("#regMsg").html(errorMsg);
        //         //alert(errorMsg);
        //         $("#regMsg").show();
        //         return false;
        //     }else {
        //         $("#regMsg").show();
        //         $("#regMsg").html("&nbsp;&nbsp;正在提交数据中...");
        //         //登录处理
        //         $('#register').submit();
        //         return true;
        //     }
        // });
    });
</script>   
</body>
</html>