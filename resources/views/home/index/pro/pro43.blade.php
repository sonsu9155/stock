@extends('layouts.site_template')

@section('title', $head['title'])

@section('keywords', $head['keywords'])

@section('description', $head['description'])

@section('content')


<div class="banner_n" style="background:url('../skin/images/tuijian.jpg') repeat center center;"> </div>
<div class="main_n">
  <div class="left fl">
    <div class="box">
      <div class="column">
        <div class="title">
          <h2>产品资讯</h2>
          <p >  </p>
        </div>
        <ul>
          
        </ul>
      </div>
      <div class="link">
        <ul>
          <li class="wd"><a href="#">联系我们: QQ  714279755</a></li>
        </ul>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="right fr">
    <div class="r_top">
      <div class="fl"> <span class="title">产品资讯</span><span id="yingwe">/ </span> </div>
      <div class="dh duyier">您当前所在位置：<a href='../'>主页</a> > <a href='index'>产品资讯</a> > </div>
    </div>
    <script type="text/javascript">
	$(document).ready(function(){
		$('#yingwe').text('/ Industry dynamic');
	});
</script>
    <div class="news_ar">
      <div class="article_title">
        <h2>股票“T+0”主要有哪两种模式</h2>
      </div>
      <div class="content"> <div>
	股票&ldquo;T＋0&rdquo;主要有哪两种模式</div>
<div>
	&nbsp;</div>
<div>
	就具体操作而言，T＋0一般有先卖后买和先买后卖的两种操作方式，需要根据具体的个股走势特点而定。</div>
<div>
	&nbsp;</div>
<div>
	先卖后买的操作适用于被个股没有完全止跌，并且投资者手中的资金有限。此时，投资者就可以在开跌之后先卖出持有的股票，在大跌之后逢低再买回来，降低持有股票的成本，而后在反弹中再择机逢高出局，以减少损失甚至可以获得微利。这种操作的条件必须有两个：一是短期内该股还要大跌；二是短期大跌之后后市还有上涨的动力，否则卖出之后就不应再买入，即股价的走势应是开盘后大幅下跌然后再大幅反弹，或第二个交易日会有强劲反弹。</div>
<div>
	&nbsp;</div>
<div>
	但大多数T＋0操作都是先买后卖，即由于持有的个股被，之后出现了短期的底部，并且有望触底反弹，当天的震荡幅度较大，可以在一天当中的低位介入，而后在高位中将之前持有的股份卖出。这样，持有的股份不变，但持有的成本却降低了。这种情况适用的个股走势是股价先是处于低位，之后强劲反弹，要求盘中有较大的振幅。因为如果振幅较小，在扣除交易费之后实际获利的空间将会非常有限。</div>
<div>
	&nbsp;</div>
<div>
	需要指出的是，进行T＋0操作的前提是看好个股的长期发展前景，不愿卖出手中持有的个股品种，通过这种操作来降低持股的成本。如果持有的个股基本面不被看好，长期的趋势还是向下的，则应及早卖出。同时，T＋0操作在当天完成，要求对个股的走势有较为准确的判断，因此，对于多数投资者可能并不适用。对于一般投资者来说，如果是下降趋势中的个股，最好是择机出局止损，不要轻易选择T＋0操作。</div>
 </div>
      <div class="his">
        <div class="fl">
          <p><span> < </span>上一篇：<a href='42'>T+0交易制度对A股发展的重要意义</a> </p>
          <p><span> > </span>下一篇：<a href='44'>投资者如何把握股票的“T+0”操作</a> </p>
        </div>
        <div class="fr"> <a href="index"><img src="../skin/images/history.gif"></a></div>
      </div>
    </div>
  </div>
</div>
@endsection