@extends('layouts.pc_template')
<title>交易明细</title>

@section('javascript')
<script type="text/javascript" src="./js/jquery.date_input.js"></script>
@endsection
@section('css')
<link href="./css/skin/ymPrompt.css" rel="stylesheet" type="text/css" />
<style>
.mybox th {font-size:12px; font-weight:normal; color:#fff;}
.mybox td {padding:3px; line-height:18px;}
</style>
@endsection
@section('content')
<div class="col-sm-10">
  <div style="width:100%; height:388px;">
      <div style="width:100%; height:31px;background-image:url(/images/rtoubu.png);" ></div>
        <div style="width:100%;height:257px;background-image:url(/images/rzhongjian.png); padding:10px 0 0 0;" >
          @include('flash-message')
          <table width='100%' border='1' align="center" cellpadding='0' cellspacing='0'  style=" border-color:#eeeeee;">
            <tr align='center' style="font-size:12px;color:#000000;">
              <th width="10%">订单号</th>
              <th width="15%">下单时间</th>
              <th width="10%">股票代码</th>
              <th>股票名称</th>
              <th width="6%">买/卖</th>
              <th width="6%">升跌</th>
              <th width="10%">挂单价格</th>
              <th width="10%">股数</th>
              <th width="10%" align="right">金额</th>
              <th width="10%">状态</th>
            </tr>
            @if($buyhistories)
            @foreach( $buyhistories as $index => $buyhistory)
            <tr align='center' style="color:#000000;">
              <td>{{ $buyhistory->id }}</td>
              <td>{{ $buyhistory->created_at }}</td>
              <td>{{ $buyhistory->stockType->code }}</td>
              <td>{{ $buyhistory->stockType->cn_name }}</td>
              <td>买入</td>
              @if ( $buyhistory->method == '1')
              <td><font color="#FF0000">买升(多)</font></td>
              @else
              <td><font color="#009900">买跌(空)</font></td>    
              @endif
              <td>{{ $buyhistory->cost }}</td>
              <td>{{ $buyhistory->amount }}手</td>
              <td align="right">￥{{ $buyhistory->cost * $buyhistory->amount *100 }}</td>
              <td><font color=red>已成交</font></td>
            </tr>
            @endforeach
            @endif

            @if($sellhistories)
            @foreach ( $sellhistories as $index => $sellhistory)
            <tr align='center' style="color:#000000;" >
              <td>{{ $sellhistory->id }}</td>
              <td>{{ $sellhistory->created_at }}</td>
              <td>{{ $sellhistory->stockType->code }}</td>
              <td>{{ $sellhistory->stockType->cn_name}}</td>
              <td>卖出</td>
              @if ( $sellhistory->method == '1')
              <td><font color="#FF0000">买升(多)</font></td>
              @else
              <td><font color="#009900">买跌(空)</font></td>
              @endif
              <td>{{ $sellhistory->sell_cost }}</td>
              <td>{{ $sellhistory->amount }}手</td>
              <td align="right">￥{{ $sellhistory->sell_cost * $sellhistory->amount *100 }}</td>
              <td><font color=red>已成交</font></td>
            </tr>
            @endforeach 
            @endif
          </table>
     </div>
  </div>
</div>
</div>
@endsection