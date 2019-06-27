<!DOCTYPE html>
<html>
<head>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,Chrome=1">
	<title></title>
		<link href="/images/livevideo/SeEhMcOADFdgFdAeJBWtXpFGo.ico" rel="shortcut icon" type="image/x-icon">
		<meta name="Keywords" content="">
	<meta name="description" content="">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="http://gcdn.wufangsoft.com/js/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="http://gcdn.wufangsoft.com/js/bootstrap-dropdown/animations.css">
	<link rel="stylesheet" type="text/css" href="http://gcdn.wufangsoft.com/js/jquery.sina-emotion.2.0.1/sina-emotion.css">
	<link rel="stylesheet" type="text/css" href="http://gcdn.wufangsoft.com/js/artDialog/css/ui-dialog.css">
	<link rel="stylesheet" type="text/css" href="http://wolfcdn.wufangsoft.com/assets/css/pc/style.css?v=v8.1.4.7">
	<link rel="stylesheet" type="text/css" href="/css/livevideo.css">
</head>
<body>
<div class="danmu-warp">
	<div class="danmu-content"></div>
</div>
<div id="js-gift-pmd-warp" class="gift-pmd-warp"></div>
<div class="page-container theme-default layout-video-left theme-background-0" id="main" style="overflow-y:hidden">
		<div class="main-header alpha-bg-body">
		<div class="header-navbar" id="search">
			<img class="main-logo" src="/images/TciyoQdWYoNPjQkTdnxKYBYBM.png" alt="logo">
			<ul></ul>
		</div>
		<div class="header-right-menu">
			<ul>
				<li class="profile-menu listitem dropdown">
					<a class="dropdown-toggle" data-hover="dropdown">
							<img class="avatar" src="http://wolfcdn.wufangsoft.com/assets/img/avatar/t3/32/09.png" alt="gz0801">
							<span class="text-e">gz0801</span>
							<span class="caret"></span>
					</a>
					<div class="dropdown-menu profile-dropdown-menu">
					<div class="profile-block clearfix profile-block-base">
						<img class="img-circle img- profile-avatar pull-left" src="http://wolfcdn.wufangsoft.com/assets/img/avatar/t3/32/09.png" alt="10000">
						<div class="">
						<div class="profile-name">gz0801</div>
							<ul class="op list-inline">
								<li>
									<a><span id="setbtn"> 设置</span></a>
								</li>
								<li>|</li>
								<li>
									<a href="/auth/logout">退出</a>
								</li>
							</ul>
							</div>
							<div id="idBetInfo" style="padding-left: 90px;line-height: 18px;">
								<div class="bet-cur">当前积分：100</div>
							</div>
						</div>
						<div class="profile-block clearfix">
							<div class="title" style="margin-bottom: 5px;">
									我的推广
									<button id="copy-button2" class="btn btn-success zeroclipboard-is-hover" style="margin-left: 10px;" data-clipboard-text="http://zb.hnpklm.com/v/801ad?u=5c7fcf4dbf950">点击复制推广链接</button>
								</div>
								<div class="content">
									<p>
										已经推荐 0 人，其中注册会员  人
									</p>
								</div>
							</div>
						</div>
						<div id="myModal" class="modal">
							<!-- Modal content -->
							<?php echo $__env->make('home.index.userprofile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						</div>
				</li>
				<li class="integral-menu listitem">
					<a href="/livevideo/vipvideo">登录</a>
				</li>
				<li class="theme-menu navbar-right listitem" style="margin-right:0px">
					<a  class="dropdown-toggle" data-hover="dropdown"> <i class="icon"></i>
						<span class="text"></span>
					</a>
					<div  class="dropdown-menu theme-dropdown-menu">
						<h4>
							<span class="text">个性化</span>
						</h4>
						<div class="block theme">
							<div class="layout-wrap clearfix">
								<div class="theme-layout-video clearfix">
									<div class="theme-layout theme-layout-video-right" data-theme="layout-video-right"></div>
									<div class="theme-layout theme-layout-video-left" data-theme="layout-video-left"></div>
								</div>
							</div>
							<div class="background-wrap clearfix">
								<a class="theme-bg theme-background background-0" data-theme="theme-background-0"></a>
								<a class="theme-bg theme-background background-1" data-theme="theme-background-1"></a>
								<a class="theme-bg theme-background background-2" data-theme="theme-background-2"></a>
								<a class="theme-bg theme-background background-3" data-theme="theme-background-3"></a>
								<a class="theme-bg theme-background background-4" data-theme="theme-background-4"></a>
								<a class="theme-bg theme-background background-5" data-theme="theme-background-5"></a>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
			<div class="main-sider-menu">
<div class="sider-hot-rank sider-box">
	<div class="sider-title alpha-bg-title"><img  src="/images/livevideo/XquyUGNDSsTAedGzZveCMowTm.png"  style="width: 212px;"></div>
	<div class="hot-rank-body alpha-bg-body">
		<ul id="idHotRank" style="height: auto" class="nice-scroll-h">
		</ul>
	</div>
</div>

<div class="sider-top">
<div class="title alpha-bg-title"><img src="/images/livevideo/stockIco.png"><span style="margin-left: 5px;">行情动态</span></div>
<div class="body alpha-bg-body">
	<div class="guzhi-item " id="idStock0" >
		<span class="name">加载中</span>
		<div style="float: right;">
			<span class="num"></span>
			<span class="per-num"></span>
		</div>
	</div>
	<div class="guzhi-item " id="idStock1" >
		<span class="name">加载中</span>
		<div style="float: right;">
			<span class="num"></span>
			<span class="per-num"></span>
		</div>
	</div>
	<div class="guzhi-item " id="idStock2" >
		<span class="name">加载中</span>
		<div style="float: right;">
			<span class="num"></span>
			<span class="per-num"></span>
		</div>
	</div>
	<div class="guzhi-item  guzhi-hide " id="idStock3"  style="display: none;" >
		<span class="name">加载中</span>
		<div style="float: right;">
			<span class="num"></span>
			<span class="per-num"></span>
		</div>
	</div>
	<div class="guzhi-item  guzhi-hide " id="idStock4"  style="display: none;" >
		<span class="name">加载中</span>
		<div style="float: right;">
			<span class="num"></span>
			<span class="per-num"></span>
		</div>
	</div>
	<div class="guzhi-item  guzhi-hide " id="idStock5"  style="display: none;" >
		<span class="name">加载中</span>
		<div style="float: right;">
			<span class="num"></span>
			<span class="per-num"></span>
		</div>
	</div>
	<div class="guzhi-item  guzhi-hide " id="idStock6"  style="display: none;" >
		<span class="name">加载中</span>
		<div style="float: right;">
			<span class="num"></span>
			<span class="per-num"></span>
		</div>
	</div>
<div class="guzhi-showmore" style="height: 20px;"></div>
</div>
</div>

<div class="sider-userlist" >
	<div class="title alpha-bg-title "><img src="/images/livevideo/uselistico.png"><span class="dropdown-toggle"  data-hover="dropdown"><span style="margin-left: 5px;">在线用户</span>	</div>
	<div  class=" user-list nice-scroll alpha-bg-body"></div>
	<!------------     userlist        -->
</div>
<div id="listUserCard" class="dds-card">
	<span class="card-close">×</span>
	<div class="card-inner">
		<div class="card-info">
			<p class="tips">正在加载中...</p>
		</div>
	</div>
</div>
</div>
	<div class="main-content" >
		<div class="main-video">
		 	<div id="js-room-info" class="teacher-info-wrap alpha-bg-title">
			<ul class="video-left-ul">
				<li id="js-live-btn" class="active">
				直播
				</li>
				<li style="width: auto;" class="active">
				<span data-hover="dropdown" id="idTeacherName"  class="dropdown-toggle teacher-info-content-name"></span>
				</li>
			</ul>
			<div class="video-btn-warp">
				<a class="video-btn desktop" href="../siteurl/url-name=" target="e"></a>
			</div>
			<div class="video-btn-warp"  id="idLessonV2" >
			<span class="video-btn lesson dropdown-toggle"  data-hover="dropdown"></span>
			<div class="dropdown-menu animated" data-animation="fadeInDown" style="width: 528px;height: 450px;right: 0px;left: auto;padding: 0;margin: 0;">
			<iframe id="lessonFrame" src="../iframe/lesson/12135.html" width="528" height="450"></iframe>
			</div>
			</div>
			<div id="js-refash-video" class="video-btn-warp" style="">
			<span class="video-btn refash"></span>
			</div>
			</div>
			<div class="index-video-wrap" >
			<div class="main-video-player" >
				<div id="js-video-player-wrap"  class="video-player-wrap">
					<video width="698px"  height="392.63px" controls>
					<source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
					<source src="mov_bbb.ogg" type="video/ogg">
					Your browser does not support HTML5 video.
				</video>
				</div>
			<div id="js-vod-player-wrap" style="display: none;z-index: 100;background: none;"  class="video-player-wrap" ></div>
			<div class="main-notice alpha-bg-title">
			<div style="display: inline;"><img src="/images/livevideo/notice.png"></div>
			<div class="notice_wrap">
			<span id="js_notice_msg"></span>
			</div>
			</div>
			</div>
			<div class="main-room-info">
			<div class="line-menu tab-header">
				<ul  role="tablist">
					<li>
						<a href="801ad.html#custtabs-9403" aria-controls="boards" role="tab" data-toggle="tab">
							<span class="text">财富共盈</span>
							<span class="number"></span>
						</a>
					</li>
				</ul>
			</div>
			<div class="tab-content ">
					<div role="tabpanel" class="nice-scroll tab-pane alpha-bg-body" id="custtabs-9403">
			<div class="boards-content js-tab-select-img  js-banners ">
			<ul  class="dscontent">
					<li style="width: 100%; display: list-item;"><img style="height: auto; width: 100%;" src="/images/livevideo/AmFvEekhFuymyGpdhxABDsvpS.jpg"></li>
					<li style="width: 100%; display: list-item;"><img style="height: auto; width: 100%;" src="/images/livevideo/FQFLzqgpyroKTipslHYAjLgQz.jpg"></li>
			</ul>
			<div class="banner-num" >
				<ul  >
				<li  class="on"  >0</li>
				<li  >1</li>
				</ul>
			</div>
			</div>
			</div>
			</div>
			</div>			
		</div>
	</div><!--MAIN-VIDEO-->
	<div class="main-center">
		<div class="main-conent-panle" >
			<div class="chat-wrap-height alpha-bg-body" style="bottom: 199px;">
			<div class="ryPopGift ryPopGift_small first"></div>
			<div class="ryPopGift ryPopGift_small middele"></div>
			<div class="ryPopGift ryPopGift_small last"></div>
			<div class="ryPopGift ryPopGift_small ends"></div>
			<div id="js-screen-group" style="position: absolute;z-index: 11;right: 70px;top:3px;display: none;">
				<div id="chat-lock-screen-btn" title="屏幕锁定开关" class="chat-content-exFun-item unlock"></div>
				<div id="chat-clean-screen-btn" title="清理屏幕" class="chat-content-exFun-item clearchat"></div>
			</div>
			<div class="chat-wrap-content nice-scroll-h" ></div>
		</div>
		<div class="chat-float-model" >
			<div class="chat-float-model-item">
				<a  class="dropdown-toggle" data-hover="dropdown" data-logtype="30">
					<i class="icon  chat_icon_def icon_phone_ewm"></i>
				</a>
				<div>手机直播</div>
				<div class="dropdown-menu " style="left:-204px;top:15px;width:200px;height:200px;">
					<p  class="qr-code-img" style="margin-top: 4px;" id="qrcode"></p>
				</div>
			</div>				
		</div>

		<div class="chat-bottom" style="position: absolute;bottom: 0px;width:100%">
			<form class="chat-form" >
				<div class="chat-form-caitiao alpha-bg-title">
					<div class="citiao-warp">
						<img data-id="1407"  data-url='http://res.wufangsoft.com/wolf/upload/admin/IBqdZvtiqaidLWlvJswoidXib.gif' src="http://res.wufangsoft.com/wolf/upload/admin/EGUAYFxdugupGpXfPnmuTZcrD.png" ></img>
					</div>
					<div class="citiao-warp">
						<img data-id="1408"  data-url='http://res.wufangsoft.com/wolf/upload/admin/ibiyyaKhEGHunBFYDVcAnDlKG.gif' src="http://res.wufangsoft.com/wolf/upload/admin/PdissmyECecaMJrxwvIIEfUkm.png" ></img>
					</div>
					<div class="citiao-warp">
						<img data-id="1409"  data-url='http://res.wufangsoft.com/wolf/upload/admin/CFvveUEZEipLjyFbfGUbMCTER.gif' src="http://res.wufangsoft.com/wolf/upload/admin/eqFQLGYKpLsqLZkzrhQEZQFrz.png" ></img>
					</div>
					<div class="citiao-warp">
						<img data-id="1410"  data-url='http://res.wufangsoft.com/wolf/upload/admin/PSJmLKAyzJvtTpneDTHSOYdmz.gif' src="http://res.wufangsoft.com/wolf/upload/admin/jPFlffrlDcERSxZzPCtEJaGxp.png" ></img>
					</div>
					<div class="citiao-warp">
						<img data-id="1411"  data-url='http://res.wufangsoft.com/wolf/upload/admin/UhAJWDRQmgxDRhMRRdbMaowyF.gif' src="http://res.wufangsoft.com/wolf/upload/admin/OaWrEyFxazINnAGYyJyxqqiYw.png" ></img>
					</div>
				</div>	
				<div class="chat-send-box">
					<div class="chat-form-exFun">
						<li id="js-chat-faces-btn" >
							<i class="myicon-emo"></i>
						</li>
						<!-- <dir style="clear:both"></dir> -->
					</div>
					<div class="chat-form-input-wrap" style="margin-right:  62px;  ">
						<textarea class="chat-form-input nice-scroll" id="js-chat-form-input"></textarea>
					</div>
					<div class="chat-form-op" >
						<button type="button" style="float: left;" class="chat-form-btn send-btn" id="js-send-btn"></button>
						<div style="float: left;"></div>
					</div>
				</div>
			</form>
			<div id="chat_mzsm_msg"  class="chat-notify-msg-common chat-notify-bottom">分析师及管理员所发表言论均代表个人对市场所持观点。【投资有风险&bull;入市需谨慎】</div>
		</div>
	</div>
	</div>	
</div>
	<div class="shrink-fixed out"></div>
</div>

<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" x="0" y="0" width="0" height="0"  id="ROP_client">
    <param name="movie" value="http://gcdn.wufangsoft.com/js/ROPClient.swf" />
    <param name="quality" value="high" />
    <param name="bgcolor" value="#ffffff" />
    <param name="allowScriptAccess" value="always" />
    <param name="allowFullScreen" value="true" />
</object>
<div id="idMp3Warp" style="pointer-events: none; "></div>
<div class="treasure-box-panel" style="display: none;">
	<div class="close-btn right-top">×</div>
	<ul class="cb-list">
		<li data-time="5">
			<span class="wait-get"  ></span>
			<a href="javascript:;" data-scores="30"  data-historyid="0" data-index="0" class="next-btn">礼物专享</a>
		</li>
		<li data-time="10">
			<span class="wait-get"  ></span>
			<a href="javascript:;" data-scores="50"  data-historyid="0" data-index="1" class="next-btn">礼物专享</a>
		</li>
		<li data-time="15">
			<span class="wait-get"  ></span>
			<a href="javascript:;" data-scores="80"  data-historyid="0" data-index="2" class="next-btn">礼物专享</a>
		</li>
		<li data-time="30">
			<span class="wait-get"  ></span>
			<a href="javascript:;" data-scores="100"  data-historyid="0" data-index="3" class="next-btn">礼物专享</a>
		</li>
		<li data-time="30">
			<span  class="w-cq-get" ></span>
			<a href="javascript:;" data-scores="300"  data-historyid="0" data-index="4" class="next-btn"> 酬勤专享</a>
		</li>
		<li data-time="30">
			<span  class="w-cq-get" ></span>
			<a href="javascript:;" data-scores="600"  data-historyid="0" data-index="5" class="next-btn"> 酬勤专享</a>
		</li>
	</ul>
	<div class="c-txt get-state-ard">别着急，奖励正在准备中……</div>
</div>
<script type="text/javascript" src="http://gcdn.wufangsoft.com/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="http://gcdn.wufangsoft.com/js/jsrender-1.0.0/jsrender.min.js"></script>
<script type="text/javascript" src="http://gcdn.wufangsoft.com/js/bootstrap/js/bootstrap.min.js?v=23"></script>
<script type="text/javascript" src="http://gcdn.wufangsoft.com/js/artDialog/dialog-min.js"></script>
<script type="text/javascript" src="http://gcdn.wufangsoft.com/js/jquery.nicescroll-3.6.0/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="http://gcdn.wufangsoft.com/js/jquery.qrcode/jquery.qrcode.min.js"></script>
<script type="text/javascript" src="http://gcdn.wufangsoft.com/js/jquery.countdown/jquery.countdown.min.js"></script>
<script type="text/javascript" src="http://gcdn.wufangsoft.com/js/jquery.sina-emotion.2.0.1/sina-emotion.js?v=6"></script>

<!--<script type="text/javascript" src="http://gcdn.wufangsoft.com/js/jwplayer/7.4.3/jwplayer.js"></script>
<script type="text/javascript" src="http://cdn.aodianyun.com/lss/aodianplay/player.js"></script>-->
<script type="text/javascript" src="http://gcdn.wufangsoft.com/js/player/player.js?v=1.0.0"></script>
<script type="text/javascript" src="http://gcdn.wufangsoft.com/js/player/flv.js?v=1.0.0"></script>
<!--<script type="text/javascript" src="http://cdn.aodianyun.com/mps/v1/lssplayer.js"></script>-->
<script type="text/javascript" src="http://gcdn.wufangsoft.com/js/chat_conn.js?v=1.2.9"></script>
<script type="text/javascript" src='http://wolfcdn.wufangsoft.com/assets/js/chat.js?v=v8.1.4.7'></script>

<script type="text/javascript">
if(!window.console){
	window.console = {log:function(){}}
}
window.D = {
	chatLen:parseInt('100'),
	loginUiType:'0',
	chatSvr:'120.55.32.114',
	HOST:'http://zb.hnpklm.com',
	roomId:'12135',
	roomTitle:'',
	parentRoomId:'12090',
	dynamicMsg:'',
	showUserlist:0,
	deskIconUrl:"http://wolfcdn.wufangsoft.com/assets/js/img/send-ok.png",
	phoneUrl:'http://zb.hnpklm.com/v/801ad',
	theme:{"layout":"layout-video-left"},
	loginPopTs: "2147483647" * 1000|| 0,
	cdn:'http://wolfcdn.wufangsoft.com',
	showjc:0,
	teacher_pre:'当前讲师：',
	tgURL:'http://zb.hnpklm.com/v/801ad?u=5cb086e893c6e',
	defaultBgStyle:'theme-background-0',
	stockCode:"s_sh000001,s_sz399001,s_sz399006,s_sh000300,rt_hkHSI,gb_dji,hf_CHA50CFD",
	lookVideoImg:"",
	videoHW:'0.5625',
	hot_btn:'投票',
		videoBgImg:"http://res.wufangsoft.com/wolf/upload/admin/GHaGeLankIWAjdIGNPsemtNBz.jpg",
		popType:'0',
	chargeOpend:0,
	containFortune:0,
	jf_fortune_pop:0,
	hot_got_max:0,
	hot_got_ts:0,
	chatOption:{
		topic:'6e176d9a1f751b3054d14019e730c5dc_12135',
				guestTopic:'49ac2035357148cbed4760bb0c5f7e30_12135',
				siteTopic:'w_s_chat_307',
				
				clientId:'12135_12788659_web',
				bigRoom:0
	},
	USER:{
		uid:'12788659',
		name:'游客SIP4W0SE',
		type:'100',
		pic:'http://wolfcdn.wufangsoft.com/assets/img/avatar/t3/32/11.png',
		role:{"id":2886,"site_id":307,"role_id":100,"name":"\u6e38\u5ba2","imgurl":"http:\/\/res.wufangsoft.com\/wolf\/upload\/admin\/PMOFljcaROsuGPNhiPvTJdIjx.png","imgwidth":43,"desc":"\u6e38\u5ba2","auto_turn":1,"sort":5,"chat_ts":1,"json_power":"[]","f_kick":0,"f_ip":0,"f_boardcast":0,"f_gag":0,"f_danmu":0,"f_font_size":0,"f_chat":0,"f_look":0,"f_manual":0,"f_download":0,"f_cjrl":0,"f_userlist":0,"f_tochat":0,"f_privatechat":0,"f_audit":0,"f_deletechat":0,"f_notice":0,"f_robot_send":0,"f_teacher_set":0,"f_turn_msg":0,"f_chat_noaudit":1,"f_img":0,"f_base_user":0,"f_notify":0,"f_search":0,"f_ul_select":0,"f_audit_boardcast":0,"f_danmu_boardcast":0,"f_hj":0,"f_videobg":0,"f_realtime":0,"f_nofilter":0,"f_caitiao":1,"f_looktrun":0,"f_sendluck":0,"f_article":0,"created_at":"2019-03-05 04:46:50","updated_at":"2019-03-05 04:46:50"},
		chatIntervalCount:1,
		plat:'web',
		logined:0,
		isManager:0,
		isTeacher:0,
		lookvideo:1,
		vipLimitTs:0,
		showVipBuy:0,
	}
}
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '9zs46afqNt2RyLcKZsmlhHsrhlVuDchWCCnC8bxo'
    }
});
var __real_robot_num = 0;
var __base__ = 0;
var __base_num__ = 300;

$(function(){})
</script>
<script>
    function FuckInternetExplorer() {
        var browser = navigator.appName;
        var b_version = navigator.appVersion;
        var version = b_version.split(";");
  		if (version.length > 1) {
            var trim_Version = parseInt(version[1].replace(/[ ]/g, "").replace(/MSIE/g, ""));
            console.log(trim_Version);
            if (trim_Version < 9) {
               
                return false;
            }
        }
        return true;
    }
     FuckInternetExplorer()
</script>

<script>
// Get the modal
var modal = document.getElementById('myModal');
// Get the button that opens the modal
var btn = document.getElementById("setbtn");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  modal.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>
