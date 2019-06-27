@extends('layouts.site_template')

@section('title', $head['title'])

@section('keywords', $head['keywords'])

@section('description', $head['description'])

@section('content')
<div class="ftw" style="overflow:hidden; min-height:500px;">
  <div class="ft_a"> <div>
      <ul>
        <dt style="font-weight:600"><a href="../new/index" >平台简介</a></dt>
        
      </ul>
      <br />
    </div><div>
      <ul>
        <dt style="font-weight:600"><a href="../dow/index" >软件下载</a></dt>
        
      </ul>
      <br />
    </div><div>
      <ul>
        <dt style="font-weight:600"><a href="../press/index" >新闻中心</a></dt>
        
        <li><a href='../press/list_1/index' >每日荐股</a> </li>
        
        <li><a href='../press/list_2/index' >投资策略解密</a> </li>
        
        <li><a href='../press/list_3/index' >投资观察</a> </li>
        
      </ul>
      <br />
    </div><div>
      <ul>
        <dt style="font-weight:600"><a href="../pro/index" >产品资讯</a></dt>
        
      </ul>
      <br />
    </div><div>
      <ul>
        <dt style="font-weight:600"><a href="../zp/index" >招聘管理</a></dt>
        
      </ul>
      <br />
    </div><div>
      <ul>
        <dt style="font-weight:600"><a href="../zs/index" >招商中心</a></dt>
        
      </ul>
      <br />
    </div><div>
      <ul>
        <dt style="font-weight:600"><a href="../lx/index" >联系我们</a></dt>
        
      </ul>
      <br />
    </div> </div>
</div>

<!--<div class="footer">
	<div class="ft">
    	<div class="ft_a">
        <div class="ft1">
            	<ul>
                <dt sid="0002,0001" class="ft_bt"><a href="../new/index" >平台简介</a></dt>
                    
                </ul>
            </div><div class="ft1">
            	<ul>
                <dt sid="0002,0007" class="ft_bt"><a href="../dow/index" >软件下载</a></dt>
                    
                </ul>
            </div>--> 
<!--footer:start--> 
@endsection