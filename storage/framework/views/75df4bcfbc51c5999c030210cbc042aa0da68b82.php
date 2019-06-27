<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link  rel="stylesheet"  type="text/css" href="/css/layout.css">
    <title>左侧记录</title>

<script type="text/javascript" src="/js/jquery1.3.2.js"></script>
<script type="text/javascript" src="/js/ymPrompt.js"></script>
<script type="text/javascript" src="/js/me_function.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){
		m = setInterval(sysMessage,5000);
		b = setInterval(sysBC,5000);
		mon = setInterval(sysMoney,1000);
	
	});
	var sysMoney = function(){
				clearInterval(mon);
				$.ajax({
					type: 'GET',
					url: './ajax.php?type=moneyall',
					cache: false,
					success:function(res){
						info_data = res.split('^');
						$('#a_money').html(info_data[0]);
						$('#a_zZymoney').html(info_data[1]);
						$('#a_kyMoney').html(info_data[2]);
						$('#a_baoCangXs').html(info_data[3]);
						$('#liveTime').html(info_data[4]);
						mon = setInterval(sysMoney,1000);
					}
				});
			}

var sysMessage = function(){
	clearInterval(m);
	//res = ajaxUrl('./ajax.php?type=message');
	$.ajax({
		type: 'GET',
		url: './ajax.php?type=message',
		cache: false,
		success:function(res){
			if(parseInt(res)>0)
			{
				$('#sound_msg').html('<EMBED src="./wav/3.wav" hidden="true" volume="0" type="audio/x-ms-wma" />');
				$('#a_msg').css('color','#ff0000');
			}
			else
			{
				$('#a_msg').css('color','#C7CBCF');
			}
			$('#a_msg').html('短信[' + res + ']');
			m = setInterval(sysMessage,5000);
		}
	});
}	

var sysBC = function(){
	clearInterval(b);
	//res = ajaxUrl('./ajax.php?type=baocang');
	$.ajax({
		type: 'GET',
		url: './ajax.php?type=baocang',
		cache: false,
		success:function(res){
			if(parseInt(res)>0)
			{
				$('#sound_bc').html('<EMBED src="./wav/1.wav" hidden="true" volume="0" type="audio/x-ms-wma" />');
				$('#a_bc').css('color','#ff0000');
			}
			else
			{
				$('#a_bc').css('color','#C7CBCF');
			}
			$('#a_bc').html('爆仓[' + res + ']');
			b = setInterval(sysBC,10000);
		}
	});
}
</script>
<style>
a{
    text-decoration:none;
    color: #000000;
}
</style>
<base target="stockMain" />
</head>
<body  style="background-image:url(/images/rzhong.png);">
	<div style=" width:187px; height:350px; color:#000000;">
		
		
		<div style=" width:187px; height:390px; background-image:url(/images/rzhong.png); border-top:1px solid #eeeeee">
			
			<div style="width:4%; float: left; margin-top:10px; text-align:right;">
				
			</div>
			<div style="width:96%; float:left;margin-top:6px; text-align:left;">
				<div style="width:100%; height:30px;">
					<a href="w2user.php">
					<div style="float:left;"><img src="/images/mai1.png" /></div>
					<div style="float:left;">账户信息</div>
					</a>
				</div>
				<div style="width:100%;height:30px;">
					<a href="wmain.php">
					<div style="float:left;"><img src="/images/mai2.png" /></div>
					<div style="float:left;">买入</div>
					</a>
				</div>
				<div style="width:100%;height:30px;">
					<a href="w2fav.php">
					<div style="float:left;"><img src="/images/mai3.png" /></div>
					<div style="float:left;">自选股</div>
					</a>
				</div>
				<div style="width:100%;height:30px;">
					<a href="w2trade.php">
					<div style="float:left;"><img src="/images/mai4.png" /></div>
					<div style="float:left;">历史成交</div>
					</a>
				</div>
				<div style="width:100%;height:30px;">
					<a href="w2pay.php">
					<div style="float:left;"><img src="/images/mai6.png" /></div>
					<div style="float:left;">银证转账</div>
					</a>
				</div>
				<div style="width:80%;height:30px; margin-left:23px; ">
					<a href="w2pay.php?type=log">
					<div style="float:left;"><img src="/images/mai7.png" /></div>
					<div style="float:left;">转账流水</div>
					</a>
				</div>
				<div style="width:80%;height:30px;margin-left:23px;">
					<a href="w2atm.php">
					<div style="float:left;"><img src="/images/mai7.png" /></div>
					<div style="float:left;">资金转出</div>
					</a>
				</div>
				<div style="width:80%;height:30px;margin-left:23px;">
					<a href="w2atm.php?type=log">
					<div style="float:left;"><img src="/images/mai7.png" /></div>
					<div style="float:left;">提款流水</div>
					</a>
				</div>
				<div style="width:80%;height:30px;margin-left:23px;">
					<a href="w2pwd.php">
					<div style="float:left;"><img src="/images/mai7.png" /></div>
					<div style="float:left;">修改密码</div>
					</a>
				</div>
				<div style="width:80%;height:30px;margin-left:23px;">
					<a href="w2messga.php">
					<div style="float:left;"><img src="/images/mai7.png" /></div>
					<div style="float:left;">系统公告</div>
					</a>
				</div>
				
			</div>
			
		</div>
	
	</div>
   
</body>
</html>
