<?php $__env->startSection('title', $head['title']); ?>

<?php $__env->startSection('keywords', $head['keywords']); ?>

<?php $__env->startSection('description', $head['description']); ?>

<?php $__env->startSection('content'); ?>
<!--************************-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">
      $(document).ready(function(){
         $(".prev,.next").hover(function(){
            $(this).stop(true,false).fadeTo("show",0.9);
         },function(){
            $(this).stop(true,false).fadeTo("show",0.4);
         });
         var slideIndex = 0;
         carousel();

         function carousel() {
         var i;
         var x = document.getElementsByClassName("mySlides");
         for (i = 0; i < x.length; i++) {
            x[i].style.display = "none"; 
         }
         slideIndex++;
         if (slideIndex > x.length) {slideIndex = 1} 
         x[slideIndex-1].style.display = "block"; 
         setTimeout(carousel, 8000); // Change image every 2 seconds
         }
         
      });
</script> 
<style>
  #baba-top{
            animation-iteration-count: 1000;
        }
</style>
<div class="banner-box">
   <div class="bd">
      <ul >
         <li><img class="mySlides" style="width:100%;height:505px" src="/uploads/181106/6be0affa2fe846330dee564a8e753b18.jpg" /></li>
         <li><img class="mySlides" style="width:100%;height:505px" src="/uploads/181106/e854b032c932a755c5ec63f83e2e9775.jpg" /></li>
      </ul>
      <div class="banner-btn"> <a class="prev" href="javascript:void(0);"><img src="skin/images/prev.png"></a> <a class="next" href="javascript:void(0);"><img src="skin/images/next.png"></a>
         <div class="hd">
            <ul>
            </ul>
         </div>
      </div>
   </div>
   <div class="sousuo" style="width:263px;">
      <form  name="formsearch" action="/plus/search.php">
      <input type="hidden" name="kwtype" value="0" />
      <button class="tj" value="">
      </button>
   </form>
   </div>
</div>

<div class="main"> 
   <!--**********index广告位***********-->
   <div class="chanpin">
    <div class="zhanshi">
       <div class="bt">
        <p class="bt1">OUR ADVANTAGES</p>
        <p class="bt2">我们的优势</p>
        <p class="bt3">What are our six major strengths</p>
      </div>
       <div class="Products"> <img style="margin-left:118px; margin-top:21px;" src="skin/images/touzi.gif" />
        <p style="margin-top:19px;" class="touzi"><a >产品优势</a></p>
        <p class="neirong">可买上涨买下跌双向交易，投资灵活,高杠杆,盈利放大；安全快捷</p>
      </div>
       <div class="Products" style="margin-left:28px;"> <img style="margin-left:133px; margin-top:18px;" src="skin/images/shimu.gif" />
        <p style="margin-top:19px;" class="touzi"><a >操作优势</a></p>
        <p class="neirong">可以当天买当天卖，甚至一天可做多次交易，个股涨跌均可双向获利</p>
      </div>
       <div class="Products" style="margin-left:28px;"> <img style="margin-left:136px; margin-top:17px;" src="skin/images/jiedai.gif" />
        <p style="margin-top:19px;" class="touzi"><a >成本优势</a></p>
        <p class="neirong">沪深A股免保证金，1~10倍高杠杆，小资金大起步，在市场中以小博大</p>
      </div>
     </div>
   </div>
   <!-- video start -->
   <div class="clearfix"></div>
   <div class="heightLowBox" style="background-color:#ffffff;">
      <div class="heightLow">
         <div class="heightLowLeft">
               <img src="/images/home/1-4.png" tppabs="/images/home/1-4.png"  alt="">
               <p class="h1">高杠杆.低费用</p>
               <hr>
               <ul style="line-height: 60px">
                  <li>缺少资金.无须担忧</li>
                  <li>财智通资产证券为您提供最高</li>
                  <li><span class="h1">10</span> 倍杠杆，手续费最低 <span class="h1">0.7%</span></li>
               </ul>
         </div>
         <div class="heightLowRight">
            <video id="my-video" class="video-js" controls preload="none" width="840" height="450"  poster="/images/home/FM-1.png" data-setup="{}">
               <source src="/video/rzrq1.mp4" tppabs="/video/rzrq1.mp4" type="video/mp4">
               <p class="vjs-no-js">
               To view this video please enable JavaScript, and consider upgrading to a web browser that
               <a href="http://videojs.com/html5-video-support/" tppabs="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
               </p>
            </video>
            <script src="/js/video.min.js" tppabs="/js/video.min.js"></script>   
         
         </div>
      </div>
   </div> 
<!-- video end -->

<!--阿里 star-->
   <div class="clearfix"></div>
   <div class="alibaba">
      <div class="alibaba_top">假设中国平安（601318）股价100元，交易5手（500股）为例</div>
      <div class="alibaba_con">
            <img src="/images/home/1-7.png?version=1.0.1" tppabs="/images/home/static/picture/1-7.png"  id="baba-top" alt="" class="animated rubberBand">
      </div>
      <div class="alibaba-left animated fadeInLeft">
            <div class="alibaba-left-h1">
               无融资买入中国平安需要 <br> <span class="h2">100</span>元*<span class="h2">500</span>股 <br> =<span class="h2">50,000</span>元
            </div>
            <div class="alibaba-left-h2">
               <img src="/images/home/1-8.png" tppabs="/images/home/1-8.png"  style="vertical-align: middle;margin-right: 10px" alt=""><span class="h1">5万人民币</span>
            </div>
      </div>
      <div class="alibaba-right animated fadeInRight">
         <div class="alibaba-right-h1">
               通过财智通资产证券买入中国平安只需 <br> <span class="h2">50000</span>元/<span class="h2">10</span>倍杠杆+ <span class="h2">50000</span>元*手续费 <span class="h2">0.7%</span> <br> =<span class="h2">5350</span>元
         </div>
         <div class="alibaba-right-h2">
               <img src="/images/home/1-9.png" tppabs="/images/home/1-9.png"  style="vertical-align: middle;margin-right: 10px" alt=""><span class="h1">约5350.0人民币</span>
         </div>
      </div>
   </div>
   <!--阿里 end-->
   <div class="huoban">
      <div class="hezuo">
         <p>合作伙伴</p>
      </div>
      <ul>
         <li><img src="skin/images/zhonghang.gif" /></li>
         <li><img src="skin/images/gongshang.gif" /></li>
         <li><img src="skin/images/guangda.gif" /></li>
         <li><img src="skin/images/xinlang.gif" /></li>
         <li><img src="skin/images/fenghuang.gif" /></li>
         <li><img src="skin/images/21CN.gif" /></li>
         <li><img src="skin/images/jingying.gif" /></li>
         <li><img src="skin/images/jianhang.gif" /></li>
         <li><img src="skin/images/zhaoshang.gif" /></li>
         <li><img src="skin/images/nonghang.gif" /></li>
      </ul>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>