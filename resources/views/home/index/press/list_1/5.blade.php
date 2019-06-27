@extends('layouts.site_template')

@section('title', $head['title'])

@section('keywords', $head['keywords'])

@section('description', $head['description'])

@section('content')

<div class="banner_n" style="background:url('/images/shiye1.jpg') repeat center center;"> </div>
<div class="main_n">
  <div class="left fl">
    <div class="box">
      <div class="column">
        <div class="title">
          <h2>新闻中心</h2>
          <p >  </p>
        </div>
        <ul>
          <li class='hover'><a href='index'>每日荐股</a></li>
          <li><a href='../list_2/index'>投资策略解密</a></li>
          
          <li><a href='../list_3/index'>投资观察</a></li>
          
        </ul>
      </div>
      <div class="link">
        <ul>
          <li class="cp"><a href="/dow/index">产品推荐</a></li>
          <li class="wd"><a href="/lx/index">联系我们</a></li>
        </ul>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="right fr">
    <div class="r_top">
      <div class="fl"> <span class="title">每日荐股</span><span id="yingwe">/ </span> </div>
      <div class="dh duyier">您当前所在位置：<a href='/'>主页</a> > <a href='../index'>新闻中心</a> > <a href='index'>每日荐股</a> > </div>
    </div>
    <script type="text/javascript">
	$(document).ready(function(){
		$('#yingwe').text('/ Industry dynamic');
	});
</script>
    <div class="news_ar">
      <div class="article_title">
        <h2>黄金走势</h2>
      </div>
      <div class="content"> <p>
	央广网财经8月23日消息泛亚贵金属交易所今天在其官方网站发布公开信，回应公司总裁单九良被上海投资者堵截并送往公安局事件。泛亚称，单九良是重组工作的中枢，恳请各交易商会员冷静维权。</p>
<p>
	泛亚在这封名为《泛亚董事长被上海投资者堵截并送往浦东警方》的公开信中称，部分暴徒借维权之名，针对我交易所董事长、总裁单九良先生使用暴力手段进行侵害。</p>
<p>
	以下是公开信全文：</p>
<p>
	今天早晨在上海，部分暴徒借维权之名，针对我交易所董事长、总裁单九良先生使用暴力手段进行侵害。针对此次恶性暴力事件，我交易所表示强烈谴责并要求公安机关依法对此事件进行调查，对涉嫌违法的肇事者追究法律责任，并对背后不断散播泛亚事件谣言，发布攻击国家、政府的信息，教唆投资人暴力维权的人员予以严惩。同时交易所对部分无良媒体枉顾公义、法律的不实报道和恶意中伤，也将保留追究法律责任的权利。</p>
<p>
	无论是对单总及员工的暴力侵害，还是对办公秩序的扰乱，都是对当前克服危机工作的破坏，这只会让幕后势力从中渔利，反而极大损害了全体会员的利益。</p>
<p>
	&nbsp;</p>
<div>
	&nbsp;</div>
<p>
	尽管发生今日暴力事件，但在单九良先生带领下，交易所全体员工依然将夜以继日、全力推进交易所重整盘活工作。从公司的高管到普通员工，没有放弃每一个机会，没有抛弃每一个投资人，更加不会置中国稀有金属产业于不顾。</p>
<p>
	我们同时也呼吁，重整盘活工作纷繁复杂，进程依赖于恢复稳定的泛亚，依赖于单总及泛亚全体员工。单九良总裁是重组工作的中枢，泛亚员工是落实应对措施的齿轮，办公秩序是服务客户的基础。恳请各交易商会员冷静维权，理解泛亚在危机发生以来，在有限的条件下所做的努力，给泛亚重组工作留出必要的时间和条件，我们也会在政府支持下努力工作盘活重整，尽全力维护广大投资人权益。</p>
 </div>
      <div class="his">
        <div class="fl">
          <p><span> < </span>上一篇：没有了 </p>
          <p><span> > </span>下一篇：<a href='6'>12月22日荐股</a> </p>
        </div>
        <div class="fr"> <a href="index"><img src="../../skin/images/history.gif"></a></div>
      </div>
    </div>
  </div>
</div>
@endsection