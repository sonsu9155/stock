
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
    <!-- CSS -->
    <link href="/css/global-ver.css" rel="stylesheet" type="text/css" />
    <link href="/css/index.css" rel="stylesheet" type="text/css" />
    <script src="/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/js/jquery.validate.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var isdemo = 0;
            if (isdemo == 1) {
                //tb_show("系统提示","#TB_inline?width=400&height=120&inlineId=prohibit",false);
                parent.ymPrompt.alert({
                    title: '申请提款',
                    message: '试玩帐户不能进行“申请提款”操作！请您注册我们的正式帐号！'
                });
                $('#btnAtm').attr('value', '试玩帐号不能提款操作');
                $('#btnAtm').attr('disabled', 'true');
                $('#money').attr('disabled', 'true');
                $('#bank').attr('disabled', 'true');
                $('#bankname').attr('disabled', 'true');
                $('#bankno').attr('disabled', 'true');
                $('#bankrealnam').attr('disabled', 'true');
                $('#atmpwd').attr('disabled', 'true');
            }


            $("#AtmForm").validate({
                rules: {
                    money: {
                        required: true,
                        number: true
                    },
                    bankname: {
                        required: true
                    },
                    bankrealname: {
                        required: true
                    },
                    bankno: {
                        required: true,
                        digits: true
                    },
                    atmpwd: {
                        required: true,
                        number: true,
                        remote: "wapatm.php?type=check_atmpwd"
                    }
                },

                //errorLabelContainer: $("#errorTo"),
                //wrapper: 'li',
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
</head>

<body style="background: #FFF;color: #000;">
    <div id="pagetwo">
        <div id="Div1" class="header" style="border-bottom: 1px solid #eee;">
            <a href="wapatm.php?type=log">
                提现记录
            </a>
        </div>
        <div class="hg50"></div>
        <div style="padding:0; margin:0;">
            <form id="AtmForm" method="post" action="/payment/alirefundapi">
                <div style="width:100%; height:40px;">
                    <div style=" border-bottom:1px solid #eeeeee; width:30%; float:left; margin-top:10px; text-align:center;height:30px;">余额：</div>
                    <div style=" border-bottom:1px solid #eeeeee;width:70%; float:left;margin-top:10px; text-align: left;height:30px;"> <span class="money" style="color:#FF0000;">35263.54</span>元</div>
                </div>
                <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
                    <tr height="40px">
                        <td align="right" style=" border-bottom:1px solid #eeeeee;"><img src="/images/qiantu.png" /></td>
                        <td style=" border-bottom:1px solid #eeeeee; color:#aaaaaa;"><input name="money" type="text" id="money" value="0" style=" width:70%;">提款金额</td>
                    </tr>
                    <tr height="40px">
                        <td width="15%" align="right" style=" border-bottom:1px solid #eeeeee;"><img src="/images/katu.png" /></td>
                        <td style=" border-bottom:1px solid #eeeeee;color:#aaaaaa;">
                        <select name="bank" style=" width:70%;" id="bank">
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
                                <option value="邮政储蓄">邮政储蓄</option>
                                <option value="支付宝">支付宝</option>
                                <option value="微信">微信</option>
                            </select>收款银行</td>
                    </tr>
                    <tr height="40px">
                        <td align="right" style=" border-bottom:1px solid #eeeeee;"><img src="/images/katu.png" /></td>
                        <td style=" border-bottom:1px solid #eeeeee;color:#aaaaaa;"><input name="bankname" type="text" id="bankname" style=" width:70%;">开户支行</td>
                    </tr>
                    <tr height="40px">
                        <td align="right" style=" border-bottom:1px solid #eeeeee;"><img src="/images/katu.png" /></td>
                        <td style=" border-bottom:1px solid #eeeeee;color:#aaaaaa;"><input name="bankrealname" type="text" id="bankrealname" style=" width:70%;" value="张三" readonly>帐户名字 </td>
                    </tr>
                    <tr height="40px">
                        <td align="right" style=" border-bottom:1px solid #eeeeee;"><img src="/images/katu.png" /></td>
                        <td style=" border-bottom:1px solid #eeeeee;color:#aaaaaa;"><input name="bankno" type="text" id="bankno" style=" width:70%;">提现帐号</td>
                    </tr>
                    <tr height="40px">
                        <td align="right" style=" border-bottom:1px solid #eeeeee;"><img src="/images/katu.png" /></td>
                        <td style=" border-bottom:1px solid #eeeeee;color:#aaaaaa;"><input name="atmpwd" type="password" id="atmpwd" style=" width:70%;" maxlength="4">提款密码</td>
                    </tr>
                    <tr height="40px">
                        <td style=" border-bottom:1px solid #eeeeee; text-align:center; " colspan="2"><input type="submit" value="确认提款" style="width:90%; height:40px; background-color: #FFCC00; color:#FFFFFF; font-size:15px;" /></td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="include" file="/footer.blade.php"></div>
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