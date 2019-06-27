@extends('layouts.pc_template')

@section('script')
<script type="text/javascript" src="/js/SuggestServer_3_0_16.js" charset="gb2312"></script>
  <script type="text/javascript">
  var IsOpen = 1;
  $(document).ready(function() {
    
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    var suggestServer = new SuggestServer();
    suggestServer.bind({
      "input": "buy_code",
      "value": "@2@",
      "type": "",
      "max": 10,
      "width": 250,
      "head": ["选项", "代码", "中文名称"],
      "body": [-1, 2, 4],
        "fix": { "ie6" : [0, -1], "ie7" : [0, -1], "firefox" : [0, 1]},
      "callback": null
    });
    var initStockCode='000001';
    showgain();
    $('#buy_code').blur(function() {
                getstockname();
    });
    if(IsOpen==0) 
    {
      $('#buybox').attr('disabled','true');
      $(':input').attr('disabled','true');
      $('#ordertitle').html("休市中，不能买入股票");
    }    
    else if(initStockCode!='0') 
    {
      $('#buy_code').val(initStockCode);
      getstockname();
    }
    $("#btnOk").click(function() {
                $('#btnOk').attr('disabled', 'true');
                var bull_code = $('#buy_code').val();
                var bull_name = $('#buy_name').text();
                var price_type = $("input[name='price_type']:checked").val();
                var buy_type = $(":radio[name='buy_type']:checked").val();
                var bull_price = $('#cur_price').text();
                var user_money = $('#spn_cancash').val();
                var bull_num = $('#bull_num').val();
                if (user_money == '0'){
                    alert('填写资金');
                    return false;
                }
                if (bull_code == '') {
                    alert('请输入股票代码');
                    $('#btnOk').button("enable");
                    return false;
                }
                if (typeof(buy_type) == 'undefined') {
                    alert('请选择买升或者买跌');
                    $('#btnOk').button("enable");
                    return false;
                }
                if (bull_num < 1) {
                    alert('请输入股票数量');
                    $('#btnOk').button("enable");
                    return false;
                }
                if (bull_num > 0 && bull_code && buy_type) {
                    $("#orderfrom").submit();
                }
                return false;
            });
   
  });
  
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

  
  function GetCanNum()
  {
    var price = parseFloat($('#buys_price').val());
    var cancash = parseFloat($('#spn_cancash').html());
    var cannum = Math.floor(cancash / (100*price));
    $('#bull_num').val(cannum);
    GetTotalHandqty();
  }

  function Cancel()
  {
    self.location.href=self.location.href + '?' + Math.random();
  }

  function getstockname()
  {
    code=$('#buy_code').val();
    if(code.length==6)
    {
      $.ajax({
        type:'GET',
        url:'/site/getstock?stockcode=' + code,
        success:function(res){
          if(res.indexOf(',')!=-1)
          {
            stock = res.split(',');
            $('#buy_name').attr('value', stock[0]);
            $('#buy_dc').html(stock[9]+' ‰');
            if(stock[3]=='1' || stock[4]=='1') 
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
              
              GetQuote(code);
            }
          }
        }
      });
    }
  }

  function GetQuote(c)
  {
    $.ajax({
      type: 'GET',
      url: "/site/getstock?stockcode=" + c,
      success:function(res)
      {
         if(res.indexOf(',')!=-1)
         {
          
          quote = res.split(',');
        
          if(quote.length!=33)
          {
          }
          zt_rate = quote[1].toLowerCase().indexOf('st')!=-1 ? 1.05 : 1.1;
          dt_rate = quote[1].toLowerCase().indexOf('st')!=-1 ? 0.95 : 0.9;
          var cancash = parseFloat($('#spn_cancash').val());
          console.log(cancash);
          var cannum = Math.floor(cancash / (100*parseFloat(quote[3])));
          
          $('#canbuy').val(cannum);
          $('#buys_price').val(parseFloat(quote[3]).toFixed(2));
          $('#buy_price').html(parseFloat(quote[3]).toFixed(2));
        
          $('#buys_price').val(quote[3]);
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
          
          $('#sell_5_price').html('<font color="' + (parseFloat(quote[29])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + quote[29] + '</font>');
          $('#sell_5_num').html(Math.floor(quote[28]/100));
          $('#sell_4_price').html('<font color="' + (parseFloat(quote[27])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + quote[27] + '</font>');
          $('#sell_4_num').html(Math.floor(quote[26]/100));
          $('#sell_3_price').html('<font color="' + (parseFloat(quote[25])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + quote[25] + '</font>');
          $('#sell_3_num').html(Math.floor(quote[24]/100));
          $('#sell_2_price').html('<font color="' + (parseFloat(quote[23])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + quote[23] + '</font>');
          $('#sell_2_num').html(Math.floor(quote[22]/100));
          $('#sell_1_price').html('<font color="' + (parseFloat(quote[21])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + quote[21] + '</font>');
          $('#sell_1_num').html(Math.floor(quote[20]/100));
          
          $('#buy_1_num').html(Math.floor(quote[10]/100));
          $('#buy_1_price').html('<font color="' + (parseFloat(quote[11])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + quote[11] + '</font>');
          $('#buy_2_num').html(Math.floor(quote[12]/100));
          $('#buy_2_price').html('<font color="' + (parseFloat(quote[13])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + quote[13] + '</font>');
          $('#buy_3_num').html(Math.floor(quote[14]/100));
          $('#buy_3_price').html('<font color="' + (parseFloat(quote[15])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + quote[15] + '</font>');
          $('#buy_4_num').html(Math.floor(quote[16]/100));
          $('#buy_4_price').html('<font color="' + (parseFloat(quote[17])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + quote[17] + '</font>');
          $('#buy_5_num').html(Math.floor(quote[18]/100));
          $('#buy_5_price').html('<font color="' + (parseFloat(quote[19])>parseFloat(quote[3]) ? '#ff0000' : '#287938') + '">' + quote[19] + '</font>');
        }
       }
    });
  }
  </script>
@endsection
@section('css')
  <style>
     #TB_window {min-height:100px;}
  </style>
@endsection
@section('content')
<div class="col-sm-10">
<meta http-equiv="refresh" content="60">
	<div style="width:100%; height:288px;">
		<div style="width:100%; height:31px;background-image:url(/images/rtoubu.png);" ></div>
		<div style="width:33%; height:357px; float:left;background-image:url(/images/rzhong.png);" >
			<div style="width:60%; height:357px; float:left;">
				<form  id="orderfrom" method="POST" action="/pc/buystock">
            {{ csrf_field() }}
            <div style="width:100%; height:40px;margin-top:10px; margin-left:10px;"><span>证券代码：</span><span> <input type="text" id="buy_code" name="buy_code" style="width:25%;margin-left:5px;"/></span><input id="buy_name" name="buy_name" style="width:20%; text-align:center;margin-left:10px;" readonly="readonly" /></div>
            <div style="width:100%; height:40px;margin-left:10px;">
              <span>买入标准：</span>
              <span style="width:33%; text-align:center;margin-left:1px;"><input type="radio"  id="can_bull_up" name="buy_type" value="1" /><font color="#ff0000">买上涨</font></span>
              <span style="width:33%; text-align:center;margin-left:6px;"><input type="radio" id="can_bull_down" name="buy_type" value="2" /><font color="#006600">买下跌</font></span>
            </div>
            <div style="width:100%; height:40px;margin-left:10px;">证券价格： <input id="buys_price" name="buys_price" type="text" style="width:100px;" readonly="readonly"/></div>
            <div style="width:100%; height:40px;margin-left:10px;">可用金额：
              @if(($money_wallet->after_amount + $money_wallet->before_amount)>($stock_wallet->after_amount+$stock_wallet->before_amount))
                <input type="text" id="spn_cancash" style="width:100px;" readonly="readonly" value="  {{  $money_wallet->after_amount - $fund_amount }}"  />
              @else                
                <input type="text" id="spn_cancash" style="width:100px;" readonly="readonly" value=" {{  $money_wallet->after_amount - 10*$fund_amount }}"  />
              @endif               
            </div>
            <div style="width:100%; height:40px;margin-left:10px;">最大可买： <input type="text" id="canbuy" name="canbuy" style="width:100px;" readonly="readonly"/></div>
            <div style="width:100%; height:40px;margin-left:10px;">买入数量： <input id="bull_num" name="bull_num" type="text" style="width:100px;"/></div>
            <input id="price_type1" type="hidden" name="price_type" value="1" checked />
            <div style="width:100%; height:40px;margin-left:10px; text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="btnOk" type="button" style=" width:104px;" value="买入"/></div>
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
				<div style=" width:100%; height:23px;"><font color="#666666"></font>--------------------</div>
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
				<div style=" width:100%; height:23px;"><font color="#666666"></font>-----------------</div>
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
		@include('flash-message')
		<div style="width:66%; height:357px; float:left; background-color:#FFFFFF; text-align:center;background-image:url(/images/rzhong.png);" >
			<div style="width:100%; text-align:left; height:19px;"> <img src="/images/chicangtou.png"/></div>
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
          @if($buyhistories)
          @foreach($buyhistories as $index => $buyhistory)
          <tr border="0" >
            <td height="33px" align="center" id="inf_{{ $index + 1 }}" style="display:none;" value="{{ $buyhistory->cost }},{{ $buyhistory->method }},{{ $buyhistory->amount }},{{  $buyhistory->fee * $buyhistory->amount *100 * $buyhistory->cost }},{{ $setting->cost_sell_max }},{{ $setting->cost_save_max }}, {{$buyhistory->cost * 0 }}">00006420</td>
            <td height="33px" align="center">{{ $buyhistory->id }} </a></td>
            <td align="center">{{ $buyhistory->stockType->cn_name }}</a></td>
            <td align="center"><font color="#FF0000">{{ $buyhistory->method }}</font></td>
            <td align="center">{{ $buyhistory->cost }}</td>
            <td align="center">{{ $buyhistory->amount }}</td>
            <td align="center">{{ $buyhistory->cost * $buyhistory->amount *100 }}</td>
            <td align="center">{{ $buyhistory->fee * $buyhistory->cost * $buyhistory->amount *100 }}</td>
            <td align="center" id="cur_price_{{ $index + 1 }}"></td>
            <td align="center" id="gain_{{ $index + 1 }}"></td>
            <td align="center">{{ $buyhistory->created_at }}</td>
            <td align="center"><a href="/pc/sale_buy?id={{ $buyhistory->id}}" ><input type="button" name="Submit" value="平仓" class="button3"  ensabled /></a></td>
          </tr>
          @endforeach
          @endif
          <tr align="center" border="0" >
            <td height="30" colspan="8" align="right">留仓总金额：<span id="span_lcmoney" class="money1"></span></td>
            <td height="30" colspan="2" align="right">留仓盈亏合计：</td>
            <td height="30" colspan="2" align="left"><span id="span_lcgain" class="money1"></span></td>
          </tr>
        </table>
      </div>
    </div>
</div>
</div>
@endsection