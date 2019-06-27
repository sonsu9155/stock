<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <META HTTP-EQUIV="pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate">
    <META HTTP-EQUIV="expires" CONTENT="0">
    <meta name="viewport" content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="keywords" content="" />
    <meta name="description" content="股票交易系统">
    <meta name="author" content="" />
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="telephone=no" name="format-detection">
  
    <title>持股/卖出</title>
    
    <!-- <link rel="stylesheet" href="/css/jquery.mobile-1.3.2.min.css"> -->
    <link href="/css/global-ver.css" rel="stylesheet" type="text/css" />
    <link href="/css/index.css" rel="stylesheet" type="text/css" />
    <link href="/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/css/ymPrompt.css" rel="stylesheet" type="text/css" />
    <link href="/css/tip-violet.css" rel="stylesheet" type="text/css" />

    <script src="/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/js/me_function.js"></script>
    <script type="text/javascript" src="/js/cookie.js"></script>
    <script type="text/javascript" src="/js/ymPrompt.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            showgain();
        });
    </script>
    <style>
        .ui-block-a, 
        .ui-block-b, 
        .ui-block-c,
        .ui-block-d,
        .ui-block-e  
        {
            border: 1px;
            border-bottom-color:#000000;
            height: 40px;
        }
    
        .mybox {
        }
        .mybox td {
          padding:3px; 
          line-height:18px;
          color: #FFF;
          text-align: left;
        }
        .mybox .gray {
          color: #FFF;
        }
        .mybox .money1 {
        color: #ff0000;
        font-size: 14px;
        font-weight: normal;
        font-family: Arial, Helvetica, sans-serif;
        }
        .deal_table {
          border-bottom: 1px solid #3a3855;
        }
        .deal_table>li {
          width: 33.33333%;
          display: block;
          float: left;
          padding: 8px;
          box-sizing: border-box;
          color: #FFF;
        }
        .button3 {
            background: #3fbcef;
            border: 0;
            border-radius: 3px;
            color: #FFF;
            padding: 0px 30px;
        }
        .top_table {
            padding-left: 8px;
        }
        .top_table>li {
            float: left;
            display: block;
            box-sizing: border-box;
            color: #FFF;
            line-height: 30px;
        }
        .top_table .row1 {
            width: 40%;
        } 
        .top_table .row2 {
            width: 35%;
        } 
        .top_table .row3 {
            width: 25%;
        }
        .top_table .row4 {
            width: 50%;
        }
        .top_table .row5 {
            width: 50%;
        }
        .clearfix:after {
            content: "";
            display: block;
            clear: both;
        }

</style>
</head>
<body style="background: #1c1b29;">
    <meta http-equiv="refresh" content="60">   
    <div>
        <div id="Div1" class="header">
            <a href="/site/waporder.php">
                财智通
            </a>
        </div>
        <div class="hg50"></div>
        <div class="mairu">
            <div class="mairu-li"><a href="/site/waporder" data-ajax="false" style="color:#FFFFFF;">买入</a></div>
            <div class="mairu-li"><a href="/site/waptrade" data-ajax="false" style="color:#FFFFFF;">持仓</a></div>
            <div class="mairu-li"><a href="/site/wapmingxi" data-ajax="false" style="color:#FFFFFF;">明细</a></div>
        </div>
        <div style="width:100%; padding:0;background: #1c1b29;">
        <div class="mybox" style="background: #3a3855;width: 100%;">
        <ul class="top_table clearfix">
            <li class="row1">买入手续费：<span class="gray">{{ $setting->cost_bull_max * 100 }}%</span></li>
            <li class="row2">卖出手续费：<span class="gray">{{ $setting->cost_sell_max * 100 }}%</span></li>
            <li class="row3">留仓费：<span class="gray">{{ $setting->cost_save_max * 100 }}‰ </span></li>
            <li class="row4">留仓总金额：<span id="span_lcmoney" class="money1">0.00</span></li>
            <li class="row5">留仓盈亏合计：<span id="span_lcgain" class="money1">0.00</span></li>
        </ul>
        @include('flash-message') 
    </div>
 
    <div class="mybox" style="margin-top:5px;width: 100%;padding-left: 0;">

    @if($buyhistories)
        @foreach($buyhistories as $index => $buyhistory)
            <ul class="deal_table clearfix">
                <input style="display:none;" id="inf_{{ $index + 1 }}" value="{{ $buyhistory->cost }},{{ $buyhistory->method }},{{ $buyhistory->amount }},{{  $buyhistory->fee * $buyhistory->amount *100 * $buyhistory->cost }},{{ $setting->cost_sell_max }},{{ $setting->cost_save_max }}, {{$buyhistory->cost * 0 }}">
                <li>名字：{{ $buyhistory->stockType->cn_name }}</li>
                <li>类型：
                    @if($buyhistory->method == '1')
                    <font color="red">融资</font>
                    @else
                    <font color="#009900">融券</font>
                    @endif
                </li>
                <li>金额：{{ $buyhistory->amount * $buyhistory->cost }}</li>
                <li id="cur_price_{{ $index + 1 }}"></li>
                <li id="gain_{{ $index + 1 }}"></li>
                <li><a href="/site/sale_buy?id={{ $buyhistory->id}}" ><input type="button" name="Submit" value="平仓"  class="button3"  enabled /></a></li>
            </ul>
        @endforeach
     @endif
    </div>
        @include('layouts.footer')
</body>

</html>