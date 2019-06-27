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
    <script src="/js/jquery-1.8.2.min.js"></script>
    <script language="javascript">
 
        $(document).ready(function() {
            // Function to change form action.
                $('#submit').click(function() {
                var fm1 = document.getElementById('fm1');

                if (isNaN(fm1.p3_Amt.value)) {
                    alert("请正确输入金额！");
                    return false
                }

                if (fm1.p3_Amt.value < 100) {
                    alert('存入金额至少为100元');
                    return false
                } else {

                    fm1.submit();
                    return true;
                }
            });
            $("#zhifu1").change(function() { 
                $("#fm1").attr('action', '/payment/alipayapi');
                alert("Form Action is Changed to 'alipay'n Press Submit to Confirm");
            });
            $("#zhifu2").change(function() { 
                $("#fm1").attr('action', '/payment/unionpayapi');
                alert("Form Action is Changed to 'unionpay'n Press Submit to Confirm");
            });           
          
        });
    </script>
    <style>
        .ui-block-a,
        .ui-block-b {
            border: 1px;
            text-align: center;
        }
    </style>   
</head>

<body style="font-size:14px;">
    <div class="include" file="/header.blade.php"></div>
    <div style="padding:0; margin:0;">
       
       <div style="width:100%;">
        <div style="padding:0; margin:0;">
            <form  method="POST" name="fm1" id="fm1">
            <?php echo e(csrf_field()); ?>

                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" bordercolor="#CCCCCC" style="border-spacing:inherit; ">
                    <tr style=" height:44px;">
                        <td height="34" align="left" colspan="4" style="margin-top:6px; font-size:13px;">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;余额:&nbsp;&nbsp;<font color="#FF0000"> <?php echo e($moneywallet->before_amount + $moneywallet->after_amount); ?></font> 元 </td>
                    </tr>
                    <tr style=" height:44px;">
                        <td height="34" align="right" style=" border-bottom:1px solid #CCCCCC; width:140px;">
                            请输入充值金额：</td>
                        <td align="left" style=" border-bottom:1px solid #CCCCCC; " colspan="2">
                            <input name="p3_Amt" type="text" class="input" id="p3_Amt" size="10" style="border:0;width:180px;">
                        </td>
                        <td align="right" style=" border-bottom:1px solid #CCCCCC; " colspan="1">
                            元
                        </td>
                    </tr>
                    <tr style=" height:80px; text-align:center;">
                        <td colspan="4" style="padding-left:10px;">
                            <div style="width:100%;">
                                <div style="width:25%; float:left; height:35px; margin-top:5px; ">
                                    <input type="botton" name="radiosize" value="1000" style=" width:80px;border:1px solid #eeeeee; text-align:center;">
                                </div>
                                <div style="width:25%; float:left;height:35px; margin-top:5px;">
                                    <input type="botton" name="radiosize" value="2000" style="width:80px;border:1px solid #eeeeee;text-align:center;">
                                </div>
                                <div style="width:25%; float:left;height:35px; margin-top:5px;">
                                    <input type="botton" name="radiosize" value="3000" style="width:80px;border:1px solid #eeeeee;text-align:center;">
                                </div>
                                <div style="width:25%; float:left;height:35px; margin-top:5px;">
                                    <input type="botton" name="radiosize" value="5000" style="width:80px;border:1px solid #eeeeee;text-align:center;">
                                </div>
                            </div>
                            <div style="width:100%;">
                                <div style="width:25%; float:left; height:35px;margin-top:5px; ">
                                    <input type="botton" name="radiosize" value="10000" style="width:80px;border:1px solid #eeeeee;text-align:center;">
                                </div>
                                <div style="width:25%; float:left;height:35px;margin-top:5px;">
                                    <input type="botton" name="radiosize" value="15000" style="width:80px;border:1px solid #eeeeee;text-align:center;">
                                </div>
                                <div style="width:25%; float:left;height:35px;margin-top:5px;">
                                    <input type="botton" name="radiosize" value="20000" style="width:80px;border:1px solid #eeeeee;text-align:center;">
                                </div>
                                <div style="width:25%; float:left;height:35px;margin-top:5px;">
                                    <input type="botton" name="radiosize" value="30000" style="width:80px;border:1px solid #eeeeee;text-align:center;">
                                </div>
                            </div>
                            <script>
                                $(function(){
                                    $('input[name="radiosize"]').click(function() { 					
                                            $('#p3_Amt').val($(this).val());
                                        });
                                })	
                                    
	                    	</script>
                        </td>
                    </tr>
                    <tr height="140px">
                        <td colspan="4" height="140px" style="padding-left:10px;">
                        </td>
                    </tr>
                    <tr style=" height:44px;">
                        <td height="34" align="right" style=" border-bottom:1px solid #CCCCCC;" colspan="1">请选择充值方式：</td>
                        <td height="34" align="right" style=" border-bottom:1px solid #CCCCCC;" colspan="3"></td>
                    </tr>
                    <tr style=" height:44px;">
                        <td height="44" align="left" style=" border-bottom:1px solid #CCCCCC; text-align:center; " colspan="4">
                            <input type="radio" id ="zhifu1" name="zhifu" value="1"> <img src="/images/home/zhifubaozhifu.png" width="85" height="32">
                            <!-- <input type="radio" name="zhifu" value="2"> <img src="/images/home/weixinzhifu.png" width="85" height="32"> -->
                            <input type="radio" id ="zhifu2" name="zhifu" value="2"> <img src="/images/home/qqzhifu.png" width="85" height="32">
                        </td>
                    </tr>
                    <tr style=" height:44px;">
                        <td colspan="4" align="center" style="padding-top:4px;"><input type="submit"  id = "submit" value="下一步" style="width:90%; height:40px; color:#FFFFFF; background-color:#dd3434;">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
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