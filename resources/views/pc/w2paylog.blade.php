@extends('layouts.pc_template')
@section('javascript')
	<script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<title>存款记录</title>
@endsection
@section('content')
<div class="col-sm-10 ">
  <div style="width:99%; height:288px; background-color:#FFFFFF; ">
      <div style="width:100%; height:31px;background-image:url(/images/rtoubu.png);" ></div>
        <div style="width:100%;height:257px;background-image:url(/images/rzhongjian.png); padding:10px 0 0 0;" >
          <table width="100%"  border="1"   cellpadding="0" cellspacing="0" style="color:#000000; border-color:#eeeeee; background-color:#FFFFFF; text-align:center; font-size:12px;">
                  <tr  style="height:28px;"> 
                    <td width="21%">日期</td> 
                    <td width="15%">订单号</td> 
                    <td width="8%">类型</td> 
                    <td width="10%">金额</td> 
                    <td width="10%" >状态</td> 
                    <td>备注</td>
                  </tr> 
                  @if($deposit_histories)
                        @foreach($deposit_histories as $index => $deposit_history)
                        <tr height="28"> 
                          <td>{{ $deposit_history->created_at }}</td> 
                          <td >{{ $deposit_history->id }}</td> 
                          <td>{{ $deposit_history->type }}</td> 
                          <td>￥{{ $deposit_history->amount }}</td>                           
                          <td>{{ $deposit_history->status}}</td> 
                          <td> - </td>
                        </tr>
                        @endforeach
                      @endif 
          </table>
        </div>
      </div>
  </div>
</div>
</div>
@endsection