<!DOCTYPE html>
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
 @yield('css')
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
     </div>
  </div>
   <div class="nav">
    <div class="top_3">
       <ul>
        <li><a href="/">网站首页</a></li>
        
        <li><a href="{{ url('press/index') }}">平台简介</a></li>
        
        <li><a href="{{ url('dow/index') }}">软件下载</a></li>
        
        
        <li><a href="{{ url('pro/index') }}">产品资讯</a></li>
        
        <li><a href="{{ url('zp/index') }}">交易规则</a></li>
        
        <li><a href="{{ url('lx/index') }}">联系我们</a></li>
        
      </ul>
     </div>
  </div>
 </div>
 
@yield('content')
<div class="clear"></div>
<div class="footer">
  <div class="ft">
    <div class="ft_a">
    <div class="footerWords">
          证券价格可能有时会波动性很大。证券价格或涨或跌，甚至会变成毫无价值。买卖证券未必一定会赚取利润，可能会招致损失。证券价格或收益以及所产生的任何收入都可能因为很多因素发生改变。例如：市场风险、公司、部门和国家风险、货币汇率风险、经济以及政治风险，都会影响证券及证券发行。您的投资资本价值可能会大幅下滑，而没有投资收入。
    </div> 
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
