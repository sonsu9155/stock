<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>财智通</title>
 <meta name="description" content="" />
 <meta name="keywords" content="" />

 <script src="skin/js/jquery-1.8.0.min.js"></script>
 <script type="text/javascript" src="skin/js/jquery.superslide.2.1.1.js"></script><!--**********滚动效果*************-->
 <link rel="stylesheet" href="skin/css/head.css"/>
 <link rel="stylesheet" href="skin/css/index.css">
 <script type="text/javascript">
	 $(document).ready(function(){
			 $(".duyier a:last").css("background-image","none");
     });

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
<!--头部-->
<div class="head">
   <div class="top">
    <div class="top_1">
       <div class="fl_j1">欢迎您访问财智通股票交易平台官方网站</div>
       <div class="fr_jl">
        <ul>
           <li style="background:{{ asset('skin/images/home.gif')}} no-repeat left 15px;"><a href="index">设为首页</a></li>
           <li style="background:{{ asset('skin/images/shoucang.gif')}} no-repeat left 15px;"><a href="javascript:window.external.AddFavorite('http://test.com','财智通')">加入收藏</a></li>
           <li style="background:{{ asset('skin/images/women.gif')}} no-repeat left 15px;"><a href="lx/index">联系我们</a></li>
           <li style="background:{{ asset('skin/images/ditu.gif')}} no-repeat left 15px;"><a href="map/index">网站地图</a></li>
         </ul>
      </div>
     </div>
  </div>
   <div class="con">
    <div class="top_2">
       <div style="float:left; margin-top:25px;"><img src="skin/images/logo.png" /></div>
       <div style="float:right;"><img src="skin/images/tel.gif.png" /></div>
     </div>
  </div>
   <div class="nav">
    <div class="top_3">
       <ul>
        <li><a href="/">网站首页</a></li>
        
        <li><a href="press/index">平台简介</a></li>
        
        <li><a href="dow/index">软件下载</a></li>
        
        <li><a href="new/index">新闻中心</a></li>
        
        <li><a href="pro/index">产品资讯</a></li>
        
        <li><a href="zp/index">招聘管理</a></li>
        
        <li><a href="zs/index">招商中心</a></li>
        
        <li><a href="lx/index">联系我们</a></li>
        
      </ul>
     </div>
  </div>
 </div>
