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
          <h2>新闻中心</h2>
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
            <h2>06</h2>
            <h3>Nov</h3>
            <h3>2018</h3>
          </div>
          <div class="txt fr">
            <p><a href="list_3/12" target="_blank">今日沪深两市出现分化走势，上证综指于2371.89点开盘，午后在银行、煤炭、有色等权重板块的快速拉升下，奋力上攻，创出年内新高，报收于2391.08点，较昨日上涨了18.05点，涨幅为0....</a>　　　</p>
          </div>
        </li><li>
          <div class="lf fl">
            <h2>23</h2>
            <h3>Aug</h3>
            <h3>2015</h3>
          </div>
          <div class="txt fr">
            <p><a href="list_3/25" target="_blank">今日沪深两市小幅高开，整体呈现震荡格局。上证综指于2303.08点开盘，早盘一度摆脱前几日阴跌态势，盘中一度走强，但午后开始下行，延续了近期午后跳水的风格，最后报收于2302....</a>　　　</p>
          </div>
        </li><li>
          <div class="lf fl">
            <h2>23</h2>
            <h3>Aug</h3>
            <h3>2015</h3>
          </div>
          <div class="txt fr">
            <p><a href="list_3/13" target="_blank">今日沪深两市延续了强势反弹走势，上证综指于2343.72点开盘，盘中最高冲击到2380点附近，,最后报收于2373.03点，较昨日上涨了35.16点，涨幅为1.50%，距离突破前期高点仅有一步之遥。深...</a>　　　</p>
          </div>
        </li><li>
          <div class="lf fl">
            <h2>23</h2>
            <h3>Aug</h3>
            <h3>2015</h3>
          </div>
          <div class="txt fr">
            <p><a href="list_3/11" target="_blank">今日沪深两市继续放量上攻，上证综指于2393.18点开盘，在银行、券商、保险、地产、煤炭、钢铁等几大权重集体大涨的推动下，一举突破了2400点关口，盘中最高冲击到2423点附近，最后...</a>　　　</p>
          </div>
        </li>
      </ul>
    </div>
    <div class="dede_pages">
      <ul class="pagelist">
        <li>首页</li>
<li class="thisclass">1</li>
<li><a href='press_11_2'>2</a></li>
<li><a href='press_11_3'>3</a></li>
<li><a href='press_11_2'>下一页</a></li>
<li><a href='press_11_3'>末页</a></li>

      </ul>
    </div>
  </div>
</div>
@endsection
