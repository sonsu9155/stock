<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>下单</title>
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<link href="./style/style.css" rel="stylesheet" type="text/css" />
<link href="./css/skin/ymPrompt.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./js/jquery1.3.2.js"></script>
<script type="text/javascript" src="./js/cookie.js"></script>
<script type="text/javascript" src="./js/me_function.js"></script>
<script type="text/javascript" src="./js/ymPrompt.js"></script>
<script type="text/javascript" src="./js/SuggestServer_3_0_16.js" charset="gb2312"></script>
<script type="text/javascript">
var IsOpen = 0;
$(document).ready(function() {
	
	//股票查询事件
	var suggestServer = new SuggestServer();
	suggestServer.bind({
		"input": "buy_code",
		"value": "@2@",
		"type": "",
		"max": 10,
		"width": 250,
		"head": ["选项", "代码", "中文名称"],
		"body": [-1, 2, 4],
	    "fix": { "ie6" : [0, 1], "ie4" : [0, 1], "firefox" : [0, 1]},
		"callback": getstockname
	});
	var initStockCode='600111';
	if(IsOpen==0) //休市
	{
		$('#buybox').attr('disabled','true');
		$(':input').attr('disabled','true');
		$('#ordertitle').html("休市中，不能买入股票");
	}
	else if(initStockCode!='0') //下单
	{
		$('#buy_code').val(initStockCode);
		getstockname();
		
	}
	$("#orderfrm").submit(function(){
		$('#btnOk').attr('disabled','true');
		$('#btnCancel').attr('disabled','true');
		var bull_code=$('#buy_code').val();
		var bull_name=$('#buy_name').text();
		var price_type=$("input[name='price_type']:checked").val();  
		var buy_type=$(":radio[name='buy_type']:checked").val();
		var bull_price=$('#buys_price').val();
		var bull_num=$('#bull_num').val();
		if(bull_code=='' || bull_code=='代码/名称/拼音')
		{
			ymPrompt.errorInfo({title:'下单',message:"请输入要买入的股票代码.",handler:function(){$('#buy_code').focus();}});
			$('#btnOk').attr('disabled','');
			$('#btnCancel').attr('disabled','');
			return false;
		}
		if(typeof(buy_type)=='undefined')
		{
			ymPrompt.errorInfo({title:'下单',message:"请选择要买升(多)或买跌(空)."});
			$('#btnOk').attr('disabled','');
			$('#btnCancel').attr('disabled','');
			return false;
		}
		if(bull_num<1)
		{
			ymPrompt.errorInfo({title:'下单',message:"请输入买入数量.",handler:function(){$('#bull_num').focus();}});
			$('#btnOk').attr('disabled','');
			$('#btnCancel').attr('disabled','');
			return false;
		}
		if(bull_num>0 && bull_code){
			$.post("buy.php", {type:"bull", code:''+bull_code+'', buy_type: ''+buy_type+'',price_type:''+price_type+'',buy_type:''+buy_type+'',buy_num:''+bull_num+'',buys_price:''+bull_price+'' },
			function(data){
				res = data.split('|');
				if(res[0]=='true')
				{
					if(res[1].indexOf('当日委托查询')!=-1)
					{
						ymPrompt.succeedInfo({title:'下单成功',message:res[1],handler:function(){self.location.href='entrust_search.php?status=1';$('#btnOk').attr('disabled','');$('#btnCancel').attr('disabled','');}});
					}
					else
					{
						ymPrompt.succeedInfo({title:'下单成功',message:res[1],handler:Cancel});
					}
				}
				else
				{
					ymPrompt.errorInfo({title:'下单失败',message:res[1],handler:function(){$('#btnOk').attr('disabled','');$('#btnCancel').attr('disabled','');}});
				}
				//$('#Msg').html(data);
			});
		}
		return false;
	});

	showgain();

});



//计算总股数
function GetTotalHandqty() {
	var hands = Trim($("#bull_num").val());
	if(hands!='')
	{
		var handqty = "100";
		$("#tdtotalnum").html(hands * parseInt(handqty, 10) + "股");
	}
	else
	{
		$("#tdtotalnum").html('');
	}
}

//计算可买手数
function GetCanNum()
{
	//当前价
	var price = parseFloat($('#buys_price').val());
	//可用金额
	var cancash = parseFloat($('#spn_cancash').html());
	//最多可以买多少手
	var cannum = Math.floor(cancash / (100*price));
	$('#bull_num').val(cannum);
	GetTotalHandqty();
}

function Cancel()
{
	//刷新本页面
	self.location.href=self.location.href + '?' + Math.random();
}

function getstockname()
{
	code=$('#buy_code').val();
	if(code.length==6)
	{
		$.ajax({
			type:'GET',
			url:'ajax.php?type=getstockname&stockcode=' + code,
			success:function(res){
				if(res.indexOf(',')!=-1)
				{
				//alert(res);
					stock = res.split(',');
					$('#buy_name').html(stock[2]);
					$('#buy_dc').html(stock[9]+' ‰');
					if(stock[3]=='1' || stock[4]=='1') //停牌或关盘
					{
						
						$('#can_bull_up').attr('disabled','true');
						$('#can_bull_down').attr('disabled','true');
						$('#price_type1').attr('disabled','true');
						$('#price_type2').attr('disabled','true');
						$('#bull_num').attr('disabled','true');
						$('#btnOk').attr('disabled','true');
						
					}
					if(stock[7]=='0')
					{
						$('#can_bull_up').attr('disabled','true');
					}
					if(stock[8]=='0')
					{
						$('#can_bull_down').attr('disabled','true');
					}
					
					if(stock[3]!='1')
					{
						
						//获取行情数据
						GetQuote(stock[0],stock[1]);
					}
				}
			}
		});
	}
}


function GetQuote(t,c)
{
	$.ajax({
		type: 'GET',
		url: "ajax.php?type=quote&stocktype=" + t + "&stockcode=" + c,
		success:function(res)
		{
			if(res.indexOf(',')!=-1)
			{
				quote = res.split(',');
				if(quote.length!=33)
				{
				//	parent.ymPrompt.alert({title:'系统提示',message:quote[0]+'股票可能退市了！'});
				//	return false;
				}
				zt_rate = quote[1].toLowerCase().indexOf('st')!=-1 ? 1.05 : 1.1;
				dt_rate = quote[1].toLowerCase().indexOf('st')!=-1 ? 0.95 : 0.9;
				//当前可用额度
				var cancash = parseFloat($('#spn_cancash').val());
					//最多可以买多少手
				var cannum = Math.floor(cancash / (100*parseFloat(quote[4])));
				
				$('#canbuy').val(cannum);
				//当前价
				$('#buys_price').val(parseFloat(quote[4]).toFixed(2));
				$('#buy_price').html(parseFloat(quote[4]).toFixed(2));
			
				
				//最新价
				$('#buys_price').val(quote[4]);
				$('#cur_price').html('<font color="' + (parseFloat(quote[4])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + parseFloat(quote[4]).toFixed(2) + '</font>');
				$('#kp_price').html('<font color="' + (parseFloat(quote[2])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + parseFloat(quote[2]).toFixed(2) + '</font>');
				$('#hight_price').html('<font color="' + (parseFloat(quote[5])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + parseFloat(quote[5]).toFixed(2) + '</font>');
				$('#lower_price').html('<font color="' + (parseFloat(quote[6])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + parseFloat(quote[6]).toFixed(2) + '</font>');
				$('#yes_price').html(parseFloat(quote[3]).toFixed(2));
				cur_zd = parseFloat(quote[4]-quote[3]);
				cur_zdf = parseFloat(cur_zd*100 / quote[3]);
				cur_zd = '<font color="' + (cur_zd>0 ? '#ff0000' : '#287938') + '">' + cur_zd + '</font>';
				cur_zdf = '' + cur_zdf + '';
				$('#zd').html(cur_zd);
				$('#zdf').html(cur_zdf);
				$('#zcj_num').html(Math.floor(quote[9]/100));
				$('#zcj_price').html(parseFloat(quote[10]/10000));
				$('#zt_price').html('<font color="#ff0000">' + parseFloat(quote[3]*zt_rate).toFixed(2) + '</font>');
				$('#dt_price').html('<font color="#287938">' + parseFloat(quote[3]*dt_rate).toFixed(2) + '</font>');
				
				$('#sell_5_price').html('<font color="' + (parseFloat(quote[28])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + quote[30] + '</font>');
				$('#sell_5_num').html(Math.floor(quote[29]/100));
				$('#sell_4_price').html('<font color="' + (parseFloat(quote[26])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + quote[28] + '</font>');
				$('#sell_4_num').html(Math.floor(quote[27]/100));
				$('#sell_3_price').html('<font color="' + (parseFloat(quote[24])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + quote[26] + '</font>');
				$('#sell_3_num').html(Math.floor(quote[25]/100));
				$('#sell_2_price').html('<font color="' + (parseFloat(quote[22])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + quote[24] + '</font>');
				$('#sell_2_num').html(Math.floor(quote[23]/100));
				$('#sell_1_price').html('<font color="' + (parseFloat(quote[20])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + quote[22] + '</font>');
				$('#sell_1_num').html(Math.floor(quote[21]/100));
				
				$('#buy_1_num').html(Math.floor(quote[11]/100));
				$('#buy_1_price').html('<font color="' + (parseFloat(quote[12])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + quote[12] + '</font>');
				$('#buy_2_num').html(Math.floor(quote[13]/100));
				$('#buy_2_price').html('<font color="' + (parseFloat(quote[14])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + quote[14] + '</font>');
				$('#buy_3_num').html(Math.floor(quote[15]/100));
				$('#buy_3_price').html('<font color="' + (parseFloat(quote[16])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + quote[16] + '</font>');
				$('#buy_4_num').html(Math.floor(quote[17]/100));
				$('#buy_4_price').html('<font color="' + (parseFloat(quote[18])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + quote[18] + '</font>');
				$('#buy_5_num').html(Math.floor(quote[19]/100));
				$('#buy_5_price').html('<font color="' + (parseFloat(quote[20])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + quote[18] + '</font>');
				
			}
		}
	});
}




</script>
<style>
#TB_window {min-height:100px;}
</style>
</head>
<body  style="background-image:url(/images/rzhong.png);"> 
<meta http-equiv="refresh" content="60">
	<div style="width:100%; height:288px;">
		<div style="width:100%; height:31px;background-image:url(/images/rtoubu.png);" >
		
		</div>
		
		<div style="width:33%; height:357px; float:left;background-image:url(/images/rzhong.png);" >
			<div style="width:60%; height:357px; float:left;">
				<form name="orderfrm" id="orderfrm" action="" method="post">
				<div style="width:100%; height:40px;margin-top:10px; margin-left:10px;"><span>证券代码：</span><span> <input type="text" id="buy_code" name="buy_code" style="width:25%;margin-left:5px;"/></span><span id="buy_name" style="width:20%; text-align:center;margin-left:10px;"></span></div>
				<div style="width:100%; height:40px;margin-left:10px;"><span>买入标准：</span><span style="width:33%; text-align:center;margin-left:1px;"> <input name="buy_type" type="radio" id="can_bull_up" value="1" checked />
          			<font color="#ff0000">买上涨</font></span><span style="width:33%; text-align:center;margin-left:6px;"><input type="radio" id="can_bull_down" name="buy_type" value="2" /><font color="#006600">买下跌</font></span>  </div>
				<div style="width:100%; height:40px;margin-left:10px;">证券价格： <input id="buys_price" name="buys_price" type="text" style="width:100px;" readonly="readonly"/></div>
				<div style="width:100%; height:40px;margin-left:10px;">可用金额： <input type="text" id="spn_cancash" style="width:100px;" readonly="readonly" value="150908.8"/></div>
				<div style="width:100%; height:40px;margin-left:10px;">最大可买： <input type="text" id="canbuy" name="canbuy" style="width:100px;" readonly="readonly"/></div>
				<div style="width:100%; height:40px;margin-left:10px;">买入数量： <input id="bull_num" name="bull_num" type="text" style="width:100px;"/></div>
				<input id="price_type1" type="hidden" name="price_type" value="1" checked />
				
				<div style="width:100%; height:40px;margin-left:10px; text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="btnOk" type="submit" style=" width:104px;" value="买入"/></div>
				</form>
				
			</div>
			<div style="width:40%; height:357px; float:left; padding-bottom:10px;">
				<div style=" width:100%; height:20px;">
					<div style=" width:33%; height:20px; float:left;">卖五</div>
					<div id="sell_5_price" style=" width:33%; height:20px; float:left;">---</div>
					<div id="sell_5_num" style=" width:33%; height:20px; float:left;">---</div>
				</div>
				<div style=" width:100%; height:20px;">
					<div style=" width:33%; height:20px; float:left;">卖四</div>
					<div id="sell_4_price" style=" width:33%; height:20px; float:left;">---</div>
					<div id="sell_4_num" style=" width:33%; height:20px; float:left;">---</div>
				</div>
				<div style=" width:100%; height:20px;">
					<div style=" width:33%; height:20px; float:left;">卖三</div>
					<div id="sell_3_price" style=" width:33%; height:20px; float:left;">---</div>
					<div id="sell_3_num" style=" width:33%; height:20px; float:left;">---</div>
				</div>
				<div style=" width:100%; height:20px;">
					<div style=" width:33%; height:20px; float:left;">卖二</div>
					<div id="sell_2_price" style=" width:33%; height:20px; float:left;">---</div>
					<div id="sell_2_num" style=" width:33%; height:20px; float:left;">---</div>
				</div>
				<div style=" width:100%; height:20px;">
					<div style=" width:33%; height:20px; float:left;">卖一</div>
					<div id="sell_1_price" style=" width:33%; height:20px; float:left;">---</div>
					<div id="sell_1_num" style=" width:33%; height:20px; float:left;">---</div>
				</div>
				
				<div style=" width:100%; height:23px;"><font color="#666666">---------------------------------</font></div>
				
				<div style=" width:100%; height:20px; margin:10px 0 0 0; ">
					<div style=" width:33%; height:20px; float:left;">买一</div>
					<div id="buy_1_price" style=" width:33%; height:20px; float:left;">---</div>
					<div id="buy_1_num" style=" width:33%; height:20px; float:left;">---</div>
				</div>
				<div style=" width:100%; height:20px;">
					<div style=" width:33%; height:20px; float:left;">买二</div>
					<div id="buy_2_price" style=" width:33%; height:20px; float:left;">---</div>
					<div id="buy_2_num" style=" width:33%; height:20px; float:left;">---</div>
				</div>
				<div style=" width:100%; height:20px;">
					<div style=" width:33%; height:20px; float:left;">买三</div>
					<div id="buy_3_price" style=" width:33%; height:20px; float:left;">---</div>
					<div id="buy_3_num" style=" width:33%; height:20px; float:left;">---</div>
				</div>
				<div style=" width:100%; height:20px;">
					<div style=" width:33%; height:20px; float:left;">买四</div>
					<div id="buy_4_price" style=" width:33%; height:20px; float:left;">---</div>
					<div id="buy_4_num" style=" width:33%; height:20px; float:left;">---</div>
				</div>
				<div style=" width:100%; height:20px;">
					<div style=" width:33%; height:20px; float:left;">买五</div>
					<div id="buy_5_price" style=" width:33%; height:20px; float:left;">---</div>
					<div id="buy_5_num" style=" width:33%; height:20px; float:left;">---</div>
				</div>
				
				<div style=" width:100%; height:23px;"><font color="#666666">---------------------------------</font></div>
				
				<div style=" width:98%; height:20px;">
					<div style=" width:20%; height:20px; float:left;">现价</div>
					<div id="buy_price" style=" width:30%; height:20px; float:left;">---</div>
					<div style=" width:20%; height:20px; float:left;">最高</div>
					<div id="hight_price" style=" width:30%; height:20px; float:left;">---</div>
				</div>
				<div style=" width:98%; height:20px;">
					<div style=" width:20%; height:20px; float:left;">昨收</div>
					<div id="yes_price" style=" width:30%; height:20px; float:left;">---</div>
					<div style=" width:20%; height:20px; float:left;">跌停</div>
					<div id="lower_price" style=" width:30%; height:20px; float:left;">---</div>
				</div>
			
			</div>
		
		</div>
		
		<div style="width:66%; height:357px; float:left; background-color:#FFFFFF; text-align:center;background-image:url(/images/rzhong.png);" >
		
			<div style="width:100%; text-align:left; height:19px;"> <img src="images/chicangtou.png"/></div>
			
			
			<table width="100%"  border="0" cellspacing="0" cellpadding="0" align="center"  bordercolor="#CCCCCC">
  
  <tr align="center" border="1"  height="22" bordercolor="#CCCCCC" style="border:1px solid #aaaaaa;">
    <td height="33px" width="1%" border="0"   style="display:none;">订单号</td>
	 <td height="33px" width="8%" style="border:1px solid #aaaaaa;">证券代码</td>
	  <td width="10%" style="border:1px solid #aaaaaa;">证券名称</td>

   
    <td width="8%" style="border:1px solid #aaaaaa;">升/跌</td>
    <td width="8%" style="border:1px solid #aaaaaa;">成本价</td>
    <td width="8%" style="border:1px solid #aaaaaa;">买入手数</td>
    <td width="10%" style="border:1px solid #aaaaaa;">成交金额</td>
    <td width="8%" style="border:1px solid #aaaaaa;">手续费</td>
  

  
    <td width="8%" style="border:1px solid #aaaaaa;">现价</td>
    <td width="10%" style="border:1px solid #aaaaaa;">盈亏</a></td>
	
	<td width="12%" style="border:1px solid #aaaaaa;">下单时间</td>
    	<td width="8%" style="border:1px solid #aaaaaa;">操作</td>
  </tr>
  <tr border="0" >
    <td height="33px" align="center" id="inf_1" style="display:none;" value="6.57,1,100,98.55,0.0015,0.00,32.85">00006420</td>
	 <td height="33px" align="center">002479 </a></td>
	  <td align="center">富春环保</a></td>
   
   
    <td align="center"><font color="#FF0000">买升</font></td>
    <td align="center">6.57</td>
    <td align="center">100</td>
    <td align="center">65700.00</td>
    <td align="center"><span id="buy1cost_[bl.#]">-98.55</span></td>
  
 

    <td align="center" id="cur_price_1">--</td>
    <td align="center" id="gain_1">--</td>
	 <td align="center">04/19 14:37:00</td>
    <td align="center"><input type="button" name="Submit" value="平仓" onClick="sale_buy('002479','富春环保','100','00006420','15','0.008');" class="button3"  disabled /></td>
  </tr>
  <tr align="center" border="0" >
    <td height="30" colspan="8" align="right">留仓总金额：<span id="span_lcmoney" class="money1">￥0.00</span></td>
  <td height="30" colspan="2" align="right">留仓盈亏合计：</td>
  <td height="30" colspan="2" align="left"><span id="span_lcgain" class="money1">￥0.00</span></td>
  </tr>
</table>
			
			
		</div>
	
	</div>



</body>
</html>