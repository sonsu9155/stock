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
        <h2>10月30日《每日投资观察》</h2>
      </div>
      <div class="content"> <ul id="articleContent" style="margin: 0px; padding-right: 0px; padding-left: 0px; font-size: 14px; list-style: none outside none; color: rgb(74, 74, 74); font-family: 'Microsoft YaHei', Verdana, Geneva, sans-serif; line-height: 24px; text-indent: 24px;">
	<li style="margin: 0px; padding: 0px; list-style-type: none;">
		<p style="margin: 0px 0px 10px; padding: 0px;">
			&nbsp;今日沪深两市出现分化走势，上证综指于2371.89点开盘，午后在银行、煤炭、有色等权重板块的快速拉升下，奋力上攻，创出年内新高，报收于2391.08点，较昨日上涨了18.05点，涨幅为0.76%。而深成指和创业板指则表现的非常弱势，深证成指开盘于8088.98，尾市报收于8090.55点，较昨日下跌了0.13点。两市共成交4372亿左右，较昨日有所减少。创业板今日再收十字星，每次即将到达历史新高则会出现调整，本次能否突破魔咒强势突破，让我们拭目以待。</p>
		<p style="margin: 0px 0px 10px; padding: 0px;">
			盘面上看，今日沪指低开高走，但在临近午盘收盘时则出现跳水行情，但成交量并未减弱，午后在权重板块的带动下快速拉升创出新高，但迟迟未能突破2400点整数关口。</p>
		&nbsp; &nbsp; &nbsp;板块热点看，今日题材股表现的较为活跃，昨日表现抢眼的航运股今日继续强势，早盘连云港（601008）、日照港（600017）强势封死涨停，带动了整个板块上涨。受铁路货运改革加快影响，铁道交通概念股亦有较好表现，广深铁路（601333）直线封死涨停板。丝绸之路建设渐拉开帷幕促使板块全线上涨，西部建设（002302）更是一马当先封板。午后电力板块快速拉升，中电投和国家核电或下月迎重大资产整合的利好刺激了国电电力（600795）、华银电力（600744）快速拉升封涨停，其他概念股也纷纷上涨。而带动大盘发力的银行、煤炭、有色板块亦有不错表现。
		<p style="margin: 0px 0px 10px; padding: 0px;">
			消息面，中国证监会副主席姚刚在&ldquo;2014金融街论坛&rdquo;上表示，沪港通试点准备工作已经到了最后的阶段。他同时表示，要稳妥推进股票发行注册制改革。一度称要无限期延期的沪港通又被推上了日程，这亦是最近几日大盘快速拉升的一大关键要点，沪港通仍是现在的关键因素，大盘未来走向如何，皆要看它。</p>
		<p style="margin: 0px 0px 10px; padding: 0px;">
			技术面看，今日大盘继续收阳，但在2400整数关口还是遇到了很大的压力，迟迟未能突破，故近日还是要关注2400点位的得失。</p>
		<p style="margin: 0px 0px 10px; padding: 0px;">
			总体来看，近日沪指收出三连阳，但今日碰到关键点位未能突破，上方压力较大。而两市走势分化，中小盘股迟迟不能走强，热点板块亦交替加快，行情出现不稳定性，密切关注点位得失，切勿盲目追高。</p>
		<p style="margin: 0px 0px 10px; padding: 0px; text-align: center;">
			顺势而为，我们让投资更有道理！<span style="margin: 0px; padding: 0px; text-align: right;">股市有风险，入市需谨慎。</span></p>
	</li>
</ul>
 </div>
      <div class="his">
        <div class="fl">
          <p><span> < </span>上一篇：<a href='11'>10月31日《每日投资观察》</a> </p>
          <p><span> > </span>下一篇：<a href='13'>10月29日《每日投资观察》</a> </p>
        </div>
        <div class="fr"> <a href="index"><img src="../../skin/images/history.gif"></a></div>
      </div>
    </div>
  </div>
</div>
@endsection