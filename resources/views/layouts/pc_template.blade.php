<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>交易系统</title>
<link href="/css/style.css" rel="stylesheet" type="text/css">
<link href="/css/ymPrompt.css" rel="stylesheet" type="text/css">
<link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/js/jquery1.3.2.js"></script>
<script type="text/javascript" src="/js/ymPrompt.js"></script>
<script type="text/javascript" src="/js/me_function.js"></script>
@yield('script')
<style>
    a{
        text-decoration:none;
        color: #000000;
    }
</style>
@yield('css')
</head>
<body  style="background-image:url(/images/rzhong.png);">
<div class="row">
	<div class="col-sm-2">
	<div style=" width:187px; height:350px; color:#000000;">
		<div style=" width:187px; height:390px; background-image:url(/images/rzhong.png); border-top:1px solid #eeeeee">
			<div style="width:4%; float: left; margin-top:10px; text-align:right;">
			</div>
			<div style="width:96%; float:left;margin-top:6px; text-align:left;">
				<div style="width:100%; height:30px;">
					<a href="/pc/w2user">
					<div style="float:left;"><img src="/images/mai1.png" /></div>
					<div style="float:left;">账户信息</div>
					</a>
				</div>
				<div style="width:100%;height:30px;">
					<a href="/pc/wmain">
					<div style="float:left;"><img src="/images/mai2.png" /></div>
					<div style="float:left;">买入</div>
					</a>
				</div>
			
				<div style="width:100%;height:30px;">
					<a href="/pc/w2trade">
					<div style="float:left;"><img src="/images/mai4.png" /></div>
					<div style="float:left;">历史成交</div>
					</a>
				</div>
				
				<div style="width:80%;height:30px; margin-left:23px; ">
					<a href="/pc/w2paylog">
					<div style="float:left;"><img src="/images/mai7.png" /></div>
					<div style="float:left;">转账流水</div>
					</a>
				</div>
				
				<div style="width:80%;height:30px;margin-left:23px;">
					<a href="/pc/w2atmlog">
					<div style="float:left;"><img src="/images/mai7.png" /></div>
					<div style="float:left;">提款流水</div>
					</a>
				</div>
				
			</div>
		</div>
	</div>
	</div>

    @yield('content')
</body>
</html>
