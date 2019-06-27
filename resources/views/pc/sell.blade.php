
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>卖出股票</title>
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<link href="/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/jquery1.3.2.js"></script>
<script type="text/javascript" src="/js/me_function.js"></script>
<script type="text/javascript" src="/js/jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function(){  
    
	  var buy_type = 1;
    var bull_price = $('#spn_bull_price').val();     
    var code = $('#buy_code').text();
    
    $.get('/site/getstock?stockcode='+code, function(data, status){ 
              
          var stock =data.substring(12,data.length-3);
          var stock_arr= stock.split(',');
       $('#span_cur_price').text(stock_arr[1]);
       $('#cur_price').attr('value',stock_arr[1]);
        
        
    });    
	if(buy_type == 1)
	{
		 cur_price > bull_price ? $('#span_cur_price').css('color','red') : $('#span_cur_price').css('color','green');
	}
	else
	{
		cur_price < bull_price ? $('#span_cur_price').css('color','red') : $('#span_cur_price').css('color','green');
	}
	
	$("#sell_stock").validate({
		rules: {
			num: {required:true, digits:true, range:[1,1000]}
		},
		messages: {
			num: {required: "请输入要卖出的数量.",digits: "必须输入整数", range: "卖出数量必须大于0小于1手."}
		},
    submitHandler: function(form) {
      $('#btnsell').attr('value','提交中，请稍候…');
      $('#btnsell').attr('disabled','true');
      var now = new Date();
      var date=$('#created_at').text();
      var then = new Date(Date.parse(	date, "yyyy-MM-dd HH:mm:ss"));
      var minsDiff = Math.floor((now.getTime() - then.getTime()) / 1000 / 60);
          if( minsDiff < 15){
              var r = confirm("如果您在15分钟内出售股票，费用将增加!");
              if (r == true) {
                form.submit();
              } else {
                return location.href = '/pc/wclient';
              }
          }else{
            form.submit();
          }
           
      }
	});
});
</script>
<style>
.button {border:1px solid #cccccc; filter:none;}
</style>
</head>
<body>
  <table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC" class="mybox" style="margin-top:5px;">
  <form name="sell_stock" id="sell_stock" method="post" action="/pc/sell_act">
    <tr bgcolor="#FFFFFF">
      <td width="29%" align="right">股票名称：</td>
      <td width="71%">{{ $buyhistory->stockType->cn_name }}</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td align="right">股票代码：</td>
      <td><span id="buy_code">{{ $buyhistory->stockType->code }}</span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td align="right">持仓时间：</td>
      <td id="created_at">{{ $buyhistory->created_at }}</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td align="right">持仓数量：</td>
      <td>{{ $buyhistory->amount }}(手) 可卖:{{ $buyhistory->amount }}(手) </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td align="right">买入价格：</td>
      <td><span id="spn_bull_price">{{ $buyhistory->cost }}</span>　<font color=red>买升↑</font> </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td align="right">当前价格：</td>
      <td><span id="span_cur_price"></span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td align="right">卖出价格：</td>
      <td>
        <table  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>
              <input name="price_type" type="radio" value="1" checked="checked" style="vertical-align:middle;" onclick="$('#span_price').css('display','none');" />
              市价
            </td>  
          </tr>
        </table>
      </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td align="right">卖出数量：</td>
      <td><input type="text" name="num" id="num" value={{ $buyhistory->amount }} size="5"/>&nbsp;<button name="btnAll" class="button_small" onclick="$('#num').val({{ $buyhistory->amount }});" style="vertical-align:middle;">全部</button></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td align="right">&nbsp;</td>
      <td><button name="Submit" id="btnsell"  class="button_small">卖出</button> 
      <input name="id" type="hidden" id="id" value="{{ $buyhistory->id }}" />
      <input name="cur_price" id="cur_price" value="" />
      <div id="msg"></div></td>
      {{ csrf_field() }}
    </tr>
	</form>
  </table>

</body>
</html>