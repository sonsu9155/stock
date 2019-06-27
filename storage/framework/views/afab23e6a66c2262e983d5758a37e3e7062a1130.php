<?php $__env->startSection('title', $head['title']); ?>

<?php $__env->startSection('keywords', $head['keywords']); ?>

<?php $__env->startSection('description', $head['description']); ?>

<?php $__env->startSection('content'); ?>


<div class="banner_n" style="background:url('../skin/images/xinwen.gif') repeat center center;"> </div>
<!--------主体--------->
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
          
          <!-- <li class="renli"><a href="http://test.com/a/zhaopinguanli/">人才招聘</a></li> -->
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
            <p><a href="list_1/6" target="_blank">今日个股推荐：601618 中国中冶 推荐理由：前期涨势良好，呈多头排列走势，短线调整在即，建议低吸为主，等待拉升。...</a>　　　</p>
          </div>
        </li><li>
          <div class="lf fl">
            <h2>23</h2>
            <h3>Aug</h3>
            <h3>2015</h3>
          </div>
          <div class="txt fr">
            <p><a href="list_1/5" target="_blank">央广网财经8月23日消息泛亚贵金属交易所今天在其官方网站发布公开信，回应公司总裁单九良被上海投资者堵截并送往公安局事件。泛亚称，单九良是重组工作的中枢，恳请各交易商会...</a>　　　</p>
          </div>
        </li>
      </ul>
    </div>
    <div class="dede_pages">
      <ul class="pagelist">
        <li><a href='press_11_1'>首页</a></li>
<li><a href='press_11_2'>上一页</a></li>
<li><a href='press_11_1'>1</a></li>
<li><a href='press_11_2'>2</a></li>
<li class="thisclass">3</li>
<li>末页</li>

      </ul>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.site_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>