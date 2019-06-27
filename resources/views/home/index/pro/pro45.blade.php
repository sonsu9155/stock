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
        <h2>如何巧用T+0操作降低持股成本</h2>
      </div>
      <div class="content"> <div>
	对于被套牢的投资者来说，如何解套首先要搞清楚市场走势。目前大盘在2100点附近上下波动，这个区域不能说明股市已经到了底部，只能说是正在筑底，间或有弱小反弹机会。</div>
<div>
	&nbsp;</div>
<div>
	有了正在筑底的判断之后，就要具体分析手中的仓位。如果是满仓或者高度重仓，可以采取T+0方式高抛低吸。我们目前实行的是T+1，当天买的股票次日方能卖出，但当天卖出的资金可以购买股票。我们可以利用交易规则和股价每天的盘中波动来做差价降低成本。</div>
<div>
	&nbsp;</div>
<div>
	一种方式是在持仓股股价下跌后低位买入同样的股票，等到盘中股价上涨时卖出原有的持仓股；或者在股价上涨后卖出手中的股票，等到股价下跌后再买回来，尾盘还持有该股。这样的操作需根据股价的波动灵活掌握。</div>
<div>
	&nbsp;</div>
<div>
	这种方法最大的优点就是可以在不改变持仓股的情况下快速降低成本，不但适合解套也适合各种操作，尤其是对于那些盘中波动较大的股票非常适合。但这需要有较好的短线功底，一旦把握不好就很容易做错，最后的结果反倒成了补仓。</div>
<div>
	&nbsp;</div>
<div>
	重仓者，还可以采取向上差价法。股票被套后，预计短线见底的情况下在低点买入持仓股，等反弹到一定高度，估计见短线高点时卖出。通过这样来回多次操作，降低股票成本，弥补亏损，完成解套。前提是要较为准确地判断股票的短线支撑位。</div>
<div>
	&nbsp;</div>
<div>
	如果是轻仓，手中现金比较多，可以适当再补点前期超跌股票，例如地产、金融，短期可能会有所反弹；对于前期涨幅较少的新兴产业类股票，也可以适当买入。</div>
 </div>
      <div class="his">
        <div class="fl">
          <p><span> < </span>上一篇：<a href='44'>投资者如何把握股票的“T+0”操作</a> </p>
          <p><span> > </span>下一篇：没有了 </p>
        </div>
        <div class="fr"> <a href="index"><img src="../skin/images/history.gif"></a></div>
      </div>
    </div>
  </div>
</div>
@endsection