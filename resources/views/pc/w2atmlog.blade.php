@extends('layouts.pc_template')
@section('javascript')
  <script type="text/javascript" src="./js/function.js"></script>
	<title>存款记录</title>
@endsection
@section('css')
  <style>
      body{
        padding:0;
        margin:0;
      }
  </style>
@endsection
@section('content')
  <div class="col-sm-10">
    <div style="width:100%; height:288px; background-color:#FFFFFF; ">
        <div style="width:100%; height:31px;background-image:url(/images/rtoubu.png);" >
        </div>
        <div style="width:100%;height:257px;background-image:url(/images/rzhongjian.png); padding:10px 0 0 0;" >
            <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0"  style="color:#000000; border-color:#CCCCCC; background-color:#FFFFFF; text-align:center;font-size:12px;"> 
                      <tr height="28"> 
                        <th colspan="8" class="text-center">提款历史记录</th> 
                      </tr> 
                      <tr height="28"> 
                        <td>提交日期</td> 
                        <td >金额</td> 
                        <td>银行</td> 
                        <td>开户行</td> 
                        <td>帐号/姓名</td> 
                        <td>状态</td> 
                      <td>处理时间</td>
                      </tr> 
                      @if($withdraw_histories)
                        @foreach($withdraw_histories as $index => $withdraw_history)
                          <tr  style="height:28px;"> 
                            <td>{{ $withdraw_history->created_at }}</td> 
                            <td>￥{{ $withdraw_history->amount}}</td> 
                            <td>{{ $withdraw_history->bank }}</td> 
                            <td>{{ $withdraw_history->bank_name }}</td> 
                            <td>{{ $withdraw_history->user_id }}</td> 
                            <td ><font color="gray">{{ $withdraw_history->status }}</font></td> 
                            <td>{{ $withdraw_history->updated_at }}</td>
                          </tr>
                        @endforeach
                      @endif                                       
             </table> 
        </div>
    </div>
  </div>
</div>
@endsection