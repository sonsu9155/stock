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
    <script type="/js/javascript" src="js/ymPrompt.js"></script>
    <script>      
    </script>
    <style>
        a {
            text-decoration: none;
            color: #fff;
        }
    </style>
</head>

<body style=" font-size:12px;">
    <div>
        <div id="Div1" class="header">
            <a href="/site/waporder.php">
                财智通
            </a>
        </div>
        
        <div style="margin-top:47px;  solid #eeeeee; width:100%; height:24px; text-align:center; color:#FFFFFF;">
            <table cellspacing="0" cellpadding="0" border="1" bordercolor="#eeeeee" style="width:100%; border:1 solid #eeeeee; font-size:13px;">
                <tr>
                    <th align="center" style=" height:30px;display:none;">编号</th>
                    <th align="center" style="width:20%; height:30px; border:1 solid #eeeeee;">发送用户</th>
                    <th style="width:30%;height:30px; border:1 solid #eeeeee;">标题</th>
                    <th style="width:40%;height:30px; border:1 solid #eeeeee;">内容</th>
                    <th align="center" style="height:30px; border:1 solid #eeeeee;display:none;">时间</th>
                    <th align="center" style="width:10%;height:30px; border:1 solid #eeeeee;">标识</th>
                </tr>
                @if($threads)
                    @foreach( $threads as $thread)
                    <tr class="even">
                        <td align="center" style=" display:none;height:30px;"></td>
                        <td align="center">管理员发送</td>
                        <td >{{ $thread->subject }}</td>
                        <td >{{ $thread->messages[0]->body }}</td>
                        <td align="center" style="display:none;">{{ $thread->created_at }}</td>
                        <td align="center">已读</td>
                    </tr>
                    @endforeach
                @endif
            </table>
        </div>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        @include('layouts.footer')   
    
    </div>
</body>

</html>
