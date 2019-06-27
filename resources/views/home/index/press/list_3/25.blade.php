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
        <h2>10月24日《每日投资观察》</h2>
      </div>
      <div class="content"> <ul id="articleContent">
	<li>
		<p>
			今日沪深两市小幅高开，整体呈现震荡格局。上证综指于2303.08点开盘，早盘一度摆脱前几日阴跌态势，盘中一度走强，但午后开始下行，延续了近期午后跳水的风格，最后报收于2302.28点，较昨日下跌了0.14点，跌幅为0.01%。深证成指开盘于7982.31，尾市报收于7921.13点，较昨日下跌了48.03点，跌幅为0.60%。两市共成交2384亿左右，较昨日大有减少。多头不再护盘，量能持续减小，使得近期的大盘一弱再弱，市场一片哀鸣。</p>
		<p>
			板块热点看，今日随着大盘的冲高回弱，板块个股均纷纷回弱。《西藏自治区主体功能区规划》将上报国务院使得西藏板块集体上扬，虽未能有涨停个股，但集体表现良好。近期较为热门的福建板块今日再度发力，受益于多项物流业支持政策有望落地利好，厦门国贸（600755）早盘直线拉涨停，福建水泥（600802）、厦门港务（000905）均有冲击涨停之势。而依法治国板块则在午后快速拉升，方正科技（600601）一度封涨停。文化传媒产业改革潮将至，中视传媒（600088）率先受益，直线封涨停，腾星股份也一度封涨停。</p>
		盘面上看，今日沪深两市早盘延续震荡，下午冲高之后快速下跌，最终翻绿。深成指下午跳水较为严重，快速下跌，向下寻找支撑。而创业板则在早盘大涨之后快速下跌。共同的特点是量能均持续萎缩。
		<p>
			技术面分析，昨日大盘已经走成下跌三部曲形态，而今日大盘一度顽强上涨，无奈没有足够的支持。量能的萎缩很好的说明了这一点，多头无意拉升。但今日收出十字星，在此位置亦有变盘的意思，而且今日缩量明显，亦让人相信下周一或迎来反弹。</p>
		<p>
			总体来看，今日大盘走势一度让人看到了希望，但午后的跳水亦让人失望。今日缩量收出的十字星其实并非是坏事，大盘马上就到2288左右的支撑位了，在此位置企稳反弹并非异想天开，周一或迎来开门红。</p>
		<div>
			顺势而为，我们让投资更有道理！股市有风险，入市需谨慎。</div>
	</li>
</ul>
 </div>
      <div class="his">
        <div class="fl">
          <p><span> < </span>上一篇：<a href='13'>10月29日《每日投资观察》</a> </p>
          <p><span> > </span>下一篇：没有了 </p>
        </div>
        <div class="fr"> <a href="index"><img src="../../skin/images/history.gif"></a></div>
      </div>
    </div>
  </div>
</div>
@endsection