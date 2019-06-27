@extends('layouts.site_template')

@section('title', $head['title'])

@section('keywords', $head['keywords'])

@section('description', $head['description'])

@section('content')

<div class="banner_n" style="background:url('../../skin/images/shiye1.jpg') repeat center center;"> </div>
<div class="main_n">
  <div class="left fl">
    <div class="box">
      <div class="column">
        <div class="title">
          <h2>新闻中心</h2>
          <p >  </p>
        </div>
        <ul>
          
          <li><a href='../list_1/index'>每日荐股</a></li>
          
          <li><a href='../list_2/index'>投资策略解密</a></li>
          <li class='hover'><a href='index'>投资观察</a></li>
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
      <div class="fl"> <span class="title">投资观察</span><span id="yingwe">/ </span> </div>
      <div class="dh duyier">您当前所在位置：<a href='../../'>主页</a> > <a href='../index'>新闻中心</a> > <a href='index'>投资观察</a> > </div>
    </div>
    <script type="text/javascript">
	$(document).ready(function(){
		$('#yingwe').text('/ Industry dynamic');
	});
</script>
    <div class="news_ar">
      <div class="article_title">
        <h2>10月31日《每日投资观察》</h2>
      </div>
      <div class="content"> <ul id="articleContent" style="margin: 0px; padding-right: 0px; padding-left: 0px; font-size: 14px; list-style: none outside none; color: rgb(74, 74, 74); font-family: 'Microsoft YaHei', Verdana, Geneva, sans-serif; line-height: 24px; text-indent: 24px;">
	<li style="margin: 0px; padding: 0px; list-style-type: none;">
		<p style="margin: 0px 0px 10px; padding: 0px;">
			今日沪深两市继续放量上攻，上证综指于2393.18点开盘，在银行、券商、保险、地产、煤炭、钢铁等几大权重集体大涨的推动下，一举突破了2400点关口，盘中最高冲击到2423点附近，最后报收于2420.18点，较昨日上涨了29.10点，涨幅为1.22%。深证成指开盘于8109.55，尾市报收于8225.61点，较昨日上涨了135.06点，涨幅为1.67&nbsp;%。两市共成交4587亿左右，较昨日有所增加。在大盘持续上涨的背景下，今日市场二八分化的迹象也更为明显，受小盘题材股低迷拖累，创业板指数今日逆市回落。</p>
		<p style="margin: 0px 0px 10px; padding: 0px;">
			从盘面来看，今日沪市创出了历史天量，成交金额也高达2499亿，做多资金呈现疯狂抢筹状态。可以看到，&ldquo;大象起舞&rdquo;是主导本轮强势上攻行情的主力军，权重个股受到做多资金的持续热捧，南京银行（601009）、华泰证券（601688）、宁波银行（002142）、武钢股份（600005）、山煤国际（600546）等纷纷冲击涨停板。而小盘题材股表现则相对落后，两市涨停个股和涨幅超过5%的个股并不多，赚了指数不赚个股的情况再度出现。</p>
		从资金面来看，今日主力大单资金疯狂抢筹金融股，银行板块大单资金持续流入超过40亿元，券商板块主力大单资金流入也达到了22亿元，地产、保险、煤炭等几大板块主力大单资金流入均超过2亿元。机械、电子元器件、建筑、通信、电力等几大板块今日呈现大单资金持续流出，短线获利资金开始出现大幅回吐的迹象。&nbsp;
		<p style="margin: 0px 0px 10px; padding: 0px;">
			从技术面来看，沪深两市股指连拉4连阳之后，多头目前已完全占据主导优势，但做多动能的迅速释放恐将透支后市行情，短线股指继续大幅上涨的空间或已不大，后市大盘在2400点关口附近也有震荡整理的需求。&nbsp;</p>
		<p style="margin: 0px 0px 10px; padding: 0px;">
			总体来看，10月A股今日完美收官，A股逐步走牛的迹象愈发凸显。而短线市场明显的二八分化一方面是由于市场风格的转换，可以看到近期大盘屡屡对2400点关口发起冲击，但多次冲击均无功而返，而今天能够成功突破2400点关口进一步打开上行空间，主要依靠的就是权重股的集体上攻。另一方面小盘题材股持续热炒过后基本都在高位，也有震荡整理的需要。在权重板块大涨过后，小盘题材股今日尾盘也已开始出现企稳回升的迹象，二八分化后将出现轮动和共振。</p>
		<div style="margin: 0px; padding: 0px; text-align: center;">
			顺势而为，我们让投资更有道理！<span style="margin: 0px; padding: 0px; text-align: right;">股市有风险，入市需谨慎。</span></div>
	</li>
</ul>
 </div>
      <div class="his">
        <div class="fl">
          <p><span> < </span>上一篇：没有了 </p>
          <p><span> > </span>下一篇：<a href='12'>10月30日《每日投资观察》</a> </p>
        </div>
        <div class="fr"> <a href="index"><img src="../../skin/images/history.gif"></a></div>
      </div>
    </div>
  </div>
</div>
@endsection
