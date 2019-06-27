<!DOCTYPE html >
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>股票交易系统</title>
    <link rel="stylesheet" type="text/css" href="/css/service.css" />
    <script  type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript"> 
        $(document).ready(function(){
            $('#loginbtn').click(function (){
                name = $('#name').val();
                password = $('#password').val();
                $.post("/api/login",  { name: name, password: password },
                function(res){
                    console.log(res);
                    data = JSON.parse(res);
                    if(data.status=="success"){ 
                        alert(data.content);        
                        return location.href='/pc/wclient';
                    } 
                    else{
                        alert(data.content);
                    }                                              
                });            
            });
        });    
      
    </script>
</head>
<body class="bg" style="margin:0;background: url(/images/wlogin_bg.jpg) no-repeat;background-size: cover;">
<center>

<TABLE cellSpacing=0 cellPadding=0 width=1004 border=0>
    <TBODY>
        <TR>
            <TD class=centent_login_bg>
                <DIV id=inf_1>
                    <TABLE class=login_tab_warp cellSpacing=0 cellPadding=0 width="100%" border=0>
                        <TBODY>
                            <TR>
                                <TD class=left width=62><SPAN id=accountName>会员帐号</SPAN>：</TD>
                                <TD class=left width=198>
                                     <input   type="text" id="name" name="name"  class="login_input2" style="WIDTH: 148px" />
                                </TD>
                            </TR>
                            <TR id=servicePwdId>
                                <TD class=left>用户密码：</TD>
                                <TD class=left width=198>
                                    <input  type="password" id="password" name="password"  class="login_input" style="WIDTH: 148px" />
                                </TD>
                            </TR>                
                            <TR class=left>
                                <TD class="pd_t10 pd_b20" colSpan=2>
                                    <DIV>
                                        <DIV class=float_left>
                                            <input type="image"  id="loginbtn" src="/images/login_bot.png" style="border-width:0px;" />
                                        </DIV>
                                    </DIV>
                                </TD>
                            </TR>
                        </TBODY>
                    </TABLE>    
                </DIV>
            </TD>
        </TR>
    </TBODY>
</TABLE>

</center>
</body>
</html>