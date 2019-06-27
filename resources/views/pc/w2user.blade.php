@extends('layouts.pc_template')

@section('javascript')
<script type="text/javascript" src="/js/cookie.js"></script>
<script type="text/javascript" src="/js/SuggestServer_3_0_16.js" charset="gb2312"></script>
<script type="text/javascript">
	$(document).ready(function(){
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
</script>
@endsection
@section('content')
<div class="col-sm-10">
	<div style="width:100%; height:288px; background-color:#FFFFFF;">
		<div style="width:100%; height:31px;background-image:url(/images/rtoubu.png);" ></div>
		<div style="width:100%;height:257px;background-image:url(/images/rzhongjian.png); padding:10px 0 0 0;" >
			<p style="margin:10px 0 0 10px;">股东代码：<span  >11139{{ $money_wallet->id }}</span></p>
				<p style="margin:10px 0 0 10px;">账户资金：
					<span id="a_money" class="l_zMoney">						
						@if(($money_wallet->after_amount + $money_wallet->before_amount)>($stock_wallet->after_amount+$stock_wallet->before_amount))          
							{{ number_format( $money_wallet->after_amount + $money_wallet->before_amount - $fund_amount, 2) }}
						@else
							{{ number_format( $money_wallet->after_amount + $money_wallet->before_amount - 10*$fund_amount, 2) }}
						@endif
					</span>元
				</p>
				<p style="margin:10px 0 0 10px;">占用资金：
					<span id="a_zZymoney" class="l_zZymoney">
						{{ number_format($money_wallet->before_amount,2) }}
					</span>&nbsp;元
				</p>
				<p style="margin:10px 0 0 10px;">可用额度：
					<span class="l_kyMoney" id="a_kyMoney">
						@if(($money_wallet->after_amount + $money_wallet->before_amount)>($stock_wallet->after_amount+$stock_wallet->before_amount))          
							{{ number_format( $money_wallet->after_amount - $fund_amount, 2) }}
						@else
							{{ number_format( $money_wallet->after_amount - 10*$fund_amount, 2) }}
						@endif
					</span>元 
				</p>
		</div>
	</div>
</div>
</div>
@endsection