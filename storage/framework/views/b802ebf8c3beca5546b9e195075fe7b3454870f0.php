<?php $__env->startSection('title', $head['title']); ?>

<?php $__env->startSection('keywords', $head['keywords']); ?>

<?php $__env->startSection('description', $head['description']); ?>

<?php $__env->startSection('content'); ?>

<div class="banner_n" style="background:url('../../skin/images/shiye1.jpg') repeat center center;"> </div>
<!--------主体--------->
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
          <li class="cp"><a href="http://test.com/a/chanpintuijian/">产品推荐</a></li>
          <!-- <li class="renli"><a href="http://test.com/a/zhaopinguanli/">人才招聘</a></li> -->
          <li class="wd"><a href="#">联系我们: QQ  714279755</a></li>
        </ul>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="right fr">
    <div class="r_top">
      <div class="fl"> <span class="title">每日荐股</span><span id="yingwe">/ </span> </div>
      <div class="dh duyier">您当前所在位置：<a href='../../'>主页</a> > <a href='../index'>新闻中心</a> > <a href='index'>每日荐股</a> > </div>
    </div>
    <script type="text/javascript">
	$(document).ready(function(){
		$('#yingwe').text('/ Industry dynamic');
	});
</script>
    <div class="news_ar">
      <div class="article_title">
        <h2>12月19日荐股</h2>
      </div>
      <div class="content"> <p style="margin: 0px 0px 10px; padding: 0px; line-height: 25px; color: rgb(74, 74, 74); text-indent: 24px; clear: both; font-family: sans-serif; font-size: 16px;">
	<span style="margin: 0px; padding: 0px; font-size: 14px;">今日个股推荐：600415 &nbsp;小商品城</span></p>
<p style="margin: 0px 0px 10px; padding: 0px; line-height: 25px; color: rgb(74, 74, 74); text-indent: 24px; clear: both; font-family: sans-serif; font-size: 16px;">
	<span style="margin: 0px; padding: 0px; font-size: 14px;">推荐理由：互联网金融、金融改革概念股；高位缩量，主力高度控盘且筹码集中程度高。</span><br style="margin: 0px; padding: 0px;" />
	<br style="margin: 0px; padding: 0px;" />
	<img alt="" src="../../uploads/allimg/150823/1-150R312452H16.jpg" style="margin: 0px; padding: 0px; border: none; width: 553px; height: 493px;" /></p>
 </div>
      <div class="his">
        <div class="fl">
          <p><span> < </span>上一篇：<a href='6'>12月22日荐股</a> </p>
          <p><span> > </span>下一篇：没有了 </p>
        </div>
        <div class="fr"> <a href="index"><img src="../../skin/images/history.gif"></a></div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.site_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>