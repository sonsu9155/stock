@extends('layouts.site_template')

@section('title', $head['title'])

@section('keywords', $head['keywords'])

@section('description', $head['description'])

@section('content')

<div class="banner_n" style="background:url('../skin/images/xinwen.gif') repeat center center;"> </div>
<div class="main_n">
  <div class="left fl">
    <div class="box">
      <div class="column">
        <div class="title">
          <h2></h2>
          <p >  </p>
        </div>
        <ul>
          <li><a href='list_1/index'>每日荐股</a></li>
          
          <li><a href='list_2/index'>投资策略解密</a></li>
          
          <li><a href='list_3/index'>投资观察</a></li>
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
      <div class="fl"> <span class="title">新闻中心</span><span id="yingwe">/ </span> </div>
      <div class="dh duyier">您当前所在位置：<a href='../'>主页</a> > <a href='index'>新闻中心</a> > </div>
    </div>
    <div class="news">
      <ul>
        <li>
          <div class="lf fl">
            <h2>23</h2>
            <h3>Aug</h3>
            <h3>2015</h3>
          </div>
          <div class="txt fr">
            <p><a href="list_2/10" target="_blank">金融街昨日晚间公告，截至12月17日，和谐健康保险股份有限公司通过和谐健康保险股份有限公司-万能产品账户在二级市场购买公司股份累计达到375444386股，占公司总股本的12.56116395%；...</a>　　　</p>
          </div>
        </li><li>
          <div class="lf fl">
            <h2>23</h2>
            <h3>Aug</h3>
            <h3>2015</h3>
          </div>
          <div class="txt fr">
            <p><a href="list_2/9" target="_blank">上周五上证指数成功突破3100点大关，创出近四年的新高，但多数投资者依然是满仓踏空，从盘面看，虽然大盘指数涨了50点，但主要涨的是银行、工程建设、钢铁，尤其是中字头股和钢...</a>　　　</p>
          </div>
        </li><li>
          <div class="lf fl">
            <h2>23</h2>
            <h3>Aug</h3>
            <h3>2015</h3>
          </div>
          <div class="txt fr">
            <p><a href="list_2/8" target="_blank">新闻联播近几年首次播报证监会对涉18只股票的涉案机构进行调查的新闻，说明市场风向已变，熊了几年的大盘股雄起，我本以为小股票中只有这18只被调查的个股会跌停，万万没想到跌...</a>　　　</p>
          </div>
        </li><li>
          <div class="lf fl">
            <h2>23</h2>
            <h3>Aug</h3>
            <h3>2015</h3>
          </div>
          <div class="txt fr">
            <p><a href="list_1/7" target="_blank">今日个股推荐：600415 小商品城 推荐理由：互联网金融、金融改革概念股；高位缩量，主力高度控盘且筹码集中程度高。...</a>　　　</p>
          </div>
        </li>
      </ul>
    </div>
    <div class="dede_pages">
      <ul class="pagelist">
        <li><a href='press_11_1'>首页</a></li>
<li><a href='press_11_1'>上一页</a></li>
<li><a href='press_11_1'>1</a></li>
<li class="thisclass">2</li>
<li><a href='press_11_3'>3</a></li>
<li><a href='press_11_3'>下一页</a></li>
<li><a href='press_11_3'>末页</a></li>

      </ul>
    </div>
  </div>
</div>
@endsection