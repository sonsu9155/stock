<!DOCTYPE html>
<html>
<head>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,Chrome=1">
	<title></title>
		<link href="/images/livevideo/SeEhMcOADFdgFdAeJBWtXpFGo.ico" rel="shortcut icon" type="image/x-icon">
		<meta name="Keywords" content="">
	<meta name="description" content="">
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/css/livevideo/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/livevideo/animations.css">
	<link rel="stylesheet" type="text/css" href="/css/livevideo/sina-emotion.css">
	<link rel="stylesheet" type="text/css" href="/css/livevideo/ui-dialog.css">
	<link rel="stylesheet" type="text/css" href="/css/livevideo/style.css">
	<link rel="stylesheet" type="text/css" href="/css/livevideo.css">

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
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
							<img class="avatar" src="/images/livevideo/09.png" alt="gz0801">
							<span class="text-e"><?php echo e($user->name); ?></span>
							<span class="caret"></span>
					</a>
					<div class="dropdown-menu profile-dropdown-menu">
					<div class="profile-block clearfix profile-block-base">
						<img class="img-circle img- profile-avatar pull-left" src="/images/livevideo/09.png" alt="10000">
						<div class="">
						<div class="profile-name"><?php echo e($user->name); ?></div>
							<ul class="op list-inline">
								<li>
									<a><span id="setbtn"> 设置</span></a>
								</li>
								<li>|</li>
								<li>
									<a href="/logout">退出</a>
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
									<button id="copy-button2" class="btn btn-success zeroclipboard-is-hover" style="margin-left: 10px;" data-clipboard-text="">点击复制推广链接</button>
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
							<?php echo $__env->make('home.livevideo.userprofile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
	<div  class=" user-list nice-scroll alpha-bg-body">
	<!------------     userlist        -->
	<ul id="idUserList" style="margin-bottom: 0px;">
		<!-- <?php $__currentLoopData = $online_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $online_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li class="user-item    select-role-mgr  " id="user_11569479_web" data-type="500" data-id="11569479" data-name="gz0801" style="display: block;">
				<a>
					<img src="http://wolfcdn.wufangsoft.com/assets/img/avatar/t3/32/09.png" alt="user">
					<span class="text"><?php echo e($online_user->user->name); ?></span>
				</a>
				<div style="position:absolute;right:0px;top:0px;">
						<span class="rolebtn say rolebtn-tochat js-chat-select-name" data-usertype="500" data-uid="" data-name="" >  </span>
						<span class="rolebtn look rolebtn-look " data-uid=<?php echo e($online_user->user->id); ?>  data-name=<?php echo e($online_user->user->name); ?>> </span>
						<span class="icon icon-500"></span>
				</div>
			</li>
			<li class="user-item select-role-robot" id="robot_user_1003657953" data-type="1" data-name="一粒">
			<a>
				<img src="https://wolfcdn.wufangsoft.com/assets/img/avatar/t3/32/07.png" alt="user">
				<span style="color:#fe5244;" class="text">一粒</span>
			</a>
			<div style="position:absolute;right:0px;top:0px;">
						<span class="rolebtn say js-chat-select-name" data-usertype="1" data-uid="1003657953" data-name="一粒"> </span>
								<span class="rolebtn look rolebtn-look" data-uid="1003657953" data-name="一粒"> </span>
						<span class="icon icon-1"></span>
			</div>

		</li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
	</ul>
	</div>
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
			<iframe id="lessonFrame" src="/images/livevideo/12135.html" width="528" height="450"></iframe>
			</div>
			</div>
			<div id="js-refash-video" class="video-btn-warp" style="">
			<span class="video-btn refash"></span>
			</div>
			<!-- <div class="dropdown">
				<button class="dropbtn">观看演讲</button>
				<div class="dropdown-content" id="dropDownId">
					<a href="#"><span id="real_time_video" >实时讲座</span></a>
					<span id="real_time_video_name" hidden><?php echo e($lectures->first()->location); ?></span>
					<span id="real_time_video_description" hidden><?php echo e($lectures->first()->description); ?></span>
					<select id="myselection" value="prev" style="background-color: #ddd;">
					<?php $__currentLoopData = $lectures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index =>$lecture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($index); ?>"><?php echo e($lecture->location); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				
					
					<script>
						var newmp4_file ="/uploads/" +  $('#real_time_video_name').text();
							$('#real_time_video').click(function(event){
								var desc = $('#real_time_video_description').text();
								if(desc == "1"){
									$('#myvideo').get(0).pause();
									$('#newmp4').attr('src',newmp4_file);
									$('#myvideo').get(0).load();
									$('#myvideo').get(0).play();
								}else{									
									alert(desc);
								}							
							});	
							
							$('#myselection').change(function(){
								var newmp4_file_prev = "/uploads/" +  $("#myselection option:selected").text();
									//alert(newmpa_file_prev);
									$('#myvideo').get(0).pause();
									$('#newmp4').attr('src',newmp4_file_prev);
									$('#myvideo').get(0).load();
									$('#myvideo').get(0).play();
							});									
					</script>
				</div>
			</div>
			 -->
			</div>
			<script>
					//  var socket = io('http://localhost:3000');
					// 	ss(socket).on('update', (stream, data) => {
					// 			//var filename = path.basename(data.name);
					// 			//stream.pipe(fs.createWriteStream(filename));
					// 			//console.log(filename);
					// 		//	alert('received');
					// 			console.log("data--------", data);
					// 			//$('#newmp4').attr('src',filename);
					// 	});					
			</script>
			<div class="index-video-wrap" >
			<div class="main-video-player" >
			<button onclick="javascript:screenshare();" disabled id="shareBtn" hidden>Share your screen</button>
			<div id="camera-publisher" hidden></div>
			<div id="screen-publisher" hidden></div>
			<div id="camera-subscriber" hidden></div>
			<div id="screen-subscriber" width="100%"  height="auto"></div>
				<!-- <div id="js-video-player-wrap"  class="video-player-wrap"> -->
						<!-- <video id="screen-subscriber" width="100%"  height="auto" controls autoplay="autoplay">
																<source id="newmp4" src="" type="video/mp4">											
						</video> -->
				<!-- </div> -->
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
			<div class="chat-wrap-content nice-scroll-h" >
				<?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="chat-message-new   chat-message-type-1 clearfix" data-time="09:31" data-msgid="132136983" id="js-chat-messages-132136983">
						<div class="chat-header">
						<span class="chat-name-bg">
						<span class="chat-role-4"></span>
						<span data-uid="11642897" data-name=<?php echo e($message->user->name); ?> data-usertype="4" class="chat-name js-chat-select-name"><?php echo e($message->user->name); ?> </span>
						<span class="chat-time"><?php echo e($message->created_at); ?></span>
						</span>
						<div class="chat-op">
						<!--可以看自己房间的用户信息-->
						<a class="chat-message-look-btn rolebtn look" data-uid="11642897"></a>
						<a class=" rolebtn del chat-message-delete-btn" data-id="132136983"></a>
						</div>
						</div>
						<div class="dot-top"></div>
						<div class="chat-body ">
						<span class="chat-content" style="  ">
						<?php if($message->type =='1'): ?>
						<?php echo e($message->message); ?>

						<?php else: ?>
						<img class="chat-pic" title="点击查看原图" src=<?php echo e($message->message); ?> style="max-mwidth: 100%; max-height: 320px;" onerror="this.src='/assets/img/error-img.png'">
						<?php endif; ?>
						</span>
						<span class="chat-plat">来自:<?php echo e($message->platform); ?></span>
						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
		<div class="chat-float-model" >
			<div class="chat-float-model-item">
				<a  class="dropdown-toggle" data-hover="dropdown" data-logtype="30">
					<i class="icon  chat_icon_def icon_phone_ewm"></i>
				</a>
				<div>手机直播</div>
				<div class="dropdown-menu " style="left:-204px;top:15px;width:200px;height:200px;">
					<img width="180px" height="180px"  src="/images/livevideo/qrcode.png"/>
				</div>
			</div>				
		</div>

		<div class="chat-bottom" style="position:absolute; bottom:0px; width:100%">
			<form class="chat-form" >
				<div class="chat-form-caitiao alpha-bg-title">
					<div class="citiao-warp">
						<img data-id="1407"  data-url='/images/livevideo/IBqdZvtiqaidLWlvJswoidXib.gif' src="/images/livevideo/EGUAYFxdugupGpXfPnmuTZcrD.png" ></img>
					</div>
					<div class="citiao-warp">
						<img data-id="1408"  data-url='/images/livevideo/ibiyyaKhEGHunBFYDVcAnDlKG.gif' src="/images/livevideo/PdissmyECecaMJrxwvIIEfUkm.png" ></img>
					</div>
					<div class="citiao-warp">
						<img data-id="1409"  data-url='/images/livevideo/CFvveUEZEipLjyFbfGUbMCTER.gif' src="/images/livevideo/eqFQLGYKpLsqLZkzrhQEZQFrz.png" ></img>
					</div>
					<div class="citiao-warp">
						<img data-id="1410"  data-url='/images/livevideo/PSJmLKAyzJvtTpneDTHSOYdmz.gif' src="/images/livevideo/jPFlffrlDcERSxZzPCtEJaGxp.png" ></img>
					</div>
					<div class="citiao-warp">
						<img data-id="1411"  data-url='/images/livevideo/UhAJWDRQmgxDRhMRRdbMaowyF.gif' src="/images/livevideo/OaWrEyFxazINnAGYyJyxqqiYw.png" ></img>
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
    <param name="movie" value="" />
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
<script type="text/javascript" src="/js/livevideo/jquery.min.js"></script>
<script type="text/javascript" src="/js/livevideo/jsrender.min.js"></script>
<script type="text/javascript" src="/js/livevideo/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/livevideo/dialog-min.js"></script>
<script type="text/javascript" src="/js/livevideo/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="/js/livevideo/jquery.qrcode.min.js"></script>
<script type="text/javascript" src="/js/livevideo/jquery.countdown.min.js"></script>
<script type="text/javascript" src="/js/livevideo/sina-emotion.js?v=6"></script>

<!--<script type="text/javascript" src="http://gcdn.wufangsoft.com/js/jwplayer/7.4.3/jwplayer.js"></script>
<script type="text/javascript" src="http://cdn.aodianyun.com/lss/aodianplay/player.js"></script>-->
<script type="text/javascript" src="/js/livevideo/player.js"></script>
<script type="text/javascript" src="/js/livevideo/flv.js"></script>
<!--<script type="text/javascript" src="http://cdn.aodianyun.com/mps/v1/lssplayer.js"></script>-->
<script type="text/javascript" src="/js/chat_conn.js"></script>



<script type="text/javascript" src='/images/livevideo/chat.js'></script>



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
	$(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
						});
	});
</script>
<script src="https://static.opentok.com/v2/js/opentok.js"></script>
  <script type="text/javascript">

    // Go to https://dashboard.tokbox.com/ to get your OpenTok API Key and to generate
    // a test session ID and token:
    var apiKey = '46319772';
    var sessionId = '1_MX40NjMxOTc3Mn5-MTU1NjY0ODgxODQ5Mn5KaUp6clp6eFVkWEM4NWhSR3k3SGhEOFp-fg';
    var token = 'T1==cGFydG5lcl9pZD00NjMxOTc3MiZzaWc9Y2Q0ZTAyYTQyMGY4MDZkMTI1YjQ4YTIxMWE2NTMxZTZkN2M1ZTcxNTpzZXNzaW9uX2lkPTFfTVg0ME5qTXhPVGMzTW41LU1UVTFOalkwT0RneE9EUTVNbjVLYVVwNmNscDZlRlZrV0VNNE5XaFNSM2szU0doRU9GcC1mZyZjcmVhdGVfdGltZT0xNTU2NjQ4ODMwJm5vbmNlPTAuMzA5Mzk0NTIzNzE0MTAxNiZyb2xlPXB1Ymxpc2hlciZleHBpcmVfdGltZT0xNTU5MjQwODI0JmluaXRpYWxfbGF5b3V0X2NsYXNzX2xpc3Q9';
    // Replace this with the ID for your Chrome screen-sharing extension, which you can
    // get at chrome://extensions/:

    var extensionId = 'ajhifddimkapgcifgcodmmfdlknahffk';

    // If you register your domain with the the Firefox screen-sharing whitelist, instead of using
    // a Firefox screen-sharing extension, set this to the Firefox version number, such as 36, in which
    // your domain was added to the whitelist:

    var ffWhitelistVersion; // = '36';

    var session = OT.initSession(apiKey, sessionId);

    session.connect(token, function(error) {
      if (error) {
        alert('Error connecting to session: ' + error.message);
        return;
      }
      // publish a stream using the camera and microphone:
      var publisher = OT.initPublisher('camera-publisher');
      session.publish(publisher);
      document.getElementById('shareBtn').disabled = false;
    });

    session.on('streamCreated', function(event) {
      if (event.stream.videoType === 'screen') {
        // This is a screen-sharing stream published by another client
        var subOptions = {
          width: event.stream.videoDimensions.width / 2,
          height: event.stream.videoDimensions.height / 2
        };
        session.subscribe(event.stream, 'screen-subscriber', subOptions);
      } else {
        // This is a stream published by another client using the camera and microphone
        session.subscribe(event.stream, 'camera-subscriber');
      }
    });

    // For Google Chrome only, register your extension by ID,
    // You can find it at chrome://extensions once the extension is installed
    OT.registerScreenSharingExtension('chrome', extensionId, 2);

    function screenshare() {
      OT.checkScreenSharingCapability(function(response) {
        console.info(response);
        if (!response.supported || response.extensionRegistered === false) {
          alert('This browser does not support screen sharing.');
        } else if (response.extensionInstalled === false
            && (response.extensionRequired || !ffWhitelistVersion)) {
          alert('Please install the screen-sharing extension and load this page over HTTPS.');
        } else if (ffWhitelistVersion && navigator.userAgent.match(/Firefox/)
          && navigator.userAgent.match(/Firefox\/(\d+)/)[1] < ffWhitelistVersion) {
            alert('For screen sharing, please update your version of Firefox to '
              + ffWhitelistVersion + '.');
        } else {
          // Screen sharing is available. Publish the screen.
          // Create an element, but do not display it in the HTML DOM:
          var screenSharingPublisher = OT.initPublisher(
            'screen-publisher',
            { videoSource : 'screen' },
            function(error) {
              if (error) {
                alert('Something went wrong: ' + error.message);
              } else {
                session.publish(
                  screenSharingPublisher,
                  function(error) {
                    if (error) {
                      alert('Something went wrong: ' + error.message);
                    }
                  });
              }
            });
          }
        });
    }
  </script>
</body>
</html>
