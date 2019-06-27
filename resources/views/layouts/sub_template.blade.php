<!DOCTYPE html >
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>@yield('title')</title>
 <meta name="description" content="" />
 <meta name="keywords" content="" />

 <link rel="stylesheet" href=" {{ asset('skin/css/head.css') }}"/> 
 <link rel="stylesheet" href="{{ asset('skin/css/style.css') }}">
 <script src="{{ asset('skin/js/jquery-1.8.0.min.js') }}"></script>
 <script type="text/javascript" src="{{ asset('skin/js/jquery.jslides.js') }}"></script>
 <script type="text/javascript" src="{{ asset('skin/js/newsscroll.js') }}"></script>
 
 <script>
$(function(){
        
        $(function () {
            $(window).scroll(function(){
                if ($(window).scrollTop()>100){
                    $("#back-to-top").fadeIn(1500);
                }
                else
                {
                    $("#back-to-top").fadeOut(1500);
                }
            });

            

            $("#back-to-top").click(function(){
                $('body,html').animate({scrollTop:0},1000);
                return false;
            });
        });
    });
 </script>
 </head>

 <body>

<div class="head">
   <div class="top">
    <div class="top_1">
       <div class="fl_j1"> 欢迎您访问财智通融资融劵交易平台官方网站 </div>
       <div class="fr_jl">
       <ul>
           <li style="background:{{ asset('skin/images/home.gif')}} no-repeat left 15px;"><a href="index">设为首页</a></li>
           <li style="background:{{ asset('skin/images/shoucang.gif')}} no-repeat left 15px;"><a href="javascript:window.external.AddFavorite('http://test.com','财智通')">加入收藏</a></li>
           <li style="background:{{ asset('skin/images/women.gif')}} no-repeat left 15px;"><a href="/login/register">开户</a></li> 
           <li style="background:{{ asset('skin/images/women.gif')}} no-repeat left 15px;"><a href="/web/index">登录</a></li>           
         </ul>
      </div>
     </div>
  </div>
   <div class="con">
    <div class="top_2">
       <div style="float:left; margin-top:25px;"><img src= "{{ asset('skin/images/logo.png') }}" alt=""/></div>
       <div style="float:right;"><img src="{{ asset('skin/images/tel.gif.png') }}" /></div>
     </div>
  </div>
   <div class="nav">
    <div class="top_3">
       <ul>
        <li><a href="/">网站首页</a></li>
        
        <li><a href="{{ url('press/index') }}">平台简介</a></li>
        
        <li><a href="{{ url('dow/index') }}">软件下载</a></li>
        
     
        
        <li><a href="{{ url('pro/index') }}">产品资讯</a></li>
        
        <li><a href="{{ url('zp/index') }}">招聘管理</a></li>
        
        <li><a href="{{ url('zs/index') }}">招商中心</a></li>
        
        <li><a href="{{ url('lx/index') }}">联系我们</a></li>
        
      </ul>
     </div>
  </div>
 </div>

<div class="banner_n" style="background:url('../../skin/images/xinwen.gif') repeat center center;"> </div>

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
          <li><a href='/press/list_2/index'>投资策略解密</a></li>
          
          <li><a href='/press/list_3/index'>投资观察</a></li>
          
        </ul>
      </div>
      <div class="link">
        <ul>
          <li class="cp"><a href="http://test.com/a/chanpintuijian/">产品推荐</a></li>
          <li class="renli"><a href="http://test.com/a/zhaopinguanli/">人才招聘</a></li>
          <li class="wd"><a href="#">联系我们: QQ  714279755</a></li>
        </ul>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="right fr">
    <div class="r_top">
      <div class="fl"> <span class="title">每日荐股</span><span id="yingwe">/ </span> </div>
      <div class="dh duyier">您当前所在位置：<a href='/index'>主页</a> > <a href='../index.html'>新闻中心</a> > <a href='index.html'>每日荐股</a> > </div>
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
            <p><a href="7.html" target="_blank">今日个股推荐：600415 小商品城 推荐理由：互联网金融、金融改革概念股；高位缩量，主力高度控盘且筹码集中程度高。...</a>　　　</p>
          </div>
        </li><li>
          <div class="lf fl">
            <h2>23</h2>
            <h3>Aug</h3>
            <h3>2015</h3>
          </div>
          <div class="txt fr">
            <p><a href="6.html" target="_blank">今日个股推荐：601618 中国中冶 推荐理由：前期涨势良好，呈多头排列走势，短线调整在即，建议低吸为主，等待拉升。...</a>　　　</p>
          </div>
        </li><li>
          <div class="lf fl">
            <h2>23</h2>
            <h3>Aug</h3>
            <h3>2015</h3>
          </div>
          <div class="txt fr">
            <p><a href="5.html" target="_blank">央广网财经8月23日消息泛亚贵金属交易所今天在其官方网站发布公开信，回应公司总裁单九良被上海投资者堵截并送往公安局事件。泛亚称，单九良是重组工作的中枢，恳请各交易商会...</a>　　　</p>
          </div>
        </li>
      </ul>
    </div>
    <div class="dede_pages">
      <ul class="pagelist">
        <li><span class="pageinfo">共 <strong>1</strong>页<strong>3</strong>条记录</span></li>

      </ul>
    </div>
  </div>
</div>
<div class="clear"></div>
<div class="footer">
  <div class="ft">
    <div class="ft_a">
    <div class="footerWords">
          证券价格可能有时会波动性很大。证券价格或涨或跌，甚至会变成毫无价值。买卖证券未必一定会赚取利润，可能会招致损失。证券价格或收益以及所产生的任何收入都可能因为很多因素发生改变。例如：市场风险、公司、部门和国家风险、货币汇率风险、经济以及政治风险，都会影响证券及证券发行。您的投资资本价值可能会大幅下滑，而没有投资收入。
    </div> 
  </div>
  <div class="fb">
    <div class="fb_a">
    <div class="zhu">  &copy; 2019 财智通版权所有   </div> 
    </div>
  </div>
</div>

</body>
</html>

