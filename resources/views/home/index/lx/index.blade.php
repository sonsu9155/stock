@extends('layouts.site_template')

@section('title', $head['title'])

@section('keywords', $head['keywords'])

@section('description', $head['description'])

@section('content')

<div class="banner_n" style="background:url('../skin/images/lianx.jpg') repeat center center;"> </div>
<div class="main_n">
  <div class="left fl">
    <div class="box">
      <div class="column">
        <div class="title">
          <h2>联系我们</h2>
          <p > Contact us </p>
        </div>
        <ul>
          
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
      <div class="fl"> <span class="title">联系我们</span><span id="yingwe">/ Contact us</span> </div>
      <div class="dh duyier">您当前所在位置：<a href='../'>主页</a> > <a href='index'>联系我们</a></div>
    </div>
    <div class="news_ar">
      <div class="about_us">
				 <style type="text/css">
					html,body{margin:0;padding:0;}
					.iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
					.iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
					</style>
					<div class="right_t">
						<h2>财智通投资管理有限公司</h2>
						<p>Caizhitong Inverstment Management Co.,Ltd</p>
						<ul></ul>
						<div class="qiatan">
							<p>您可以通过以下方式在线洽谈</p>
							<img src="../skin/images/qiatan.gif" /></div>
							<p> QQ咨询号码: 714279755 </p>	
						
					</div>
			</div>
		</div>
</div>
@endsection