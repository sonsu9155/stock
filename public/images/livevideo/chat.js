$(function() {
    $.fn.sinaEmotion.options = {
        rows: 63, // 每页显示的表情数
        language: 'cnname', // 简体（cnname）、繁体（twname）
        appKey: '1362404091' // 新浪微博开放平台的应用ID
    };
    initBase();
    initShrink();
    initChat();
    initTheme();
    initDialog();
    initQrCode();
    initBanner();
    initUlCheck();
    initPast();
    initStock();
    initHot();
    initTeam();
    initVideo();
    initArena();
    initQuestion();
    initLuckMoney();
})
function initShrink(){
    $('.shrink-fixed').click(function(){
        if($('.page-container').hasClass("shrink-in")){
            $('.page-container').removeClass("shrink-in");
        }else{
            $('.page-container').addClass("shrink-in");
        }
        setTimeout(resizeVideo,100);
        resizeVideo();
    });
    
}
var KEY_ENTER = 13;
var MAX_MESSAGES_COUNT = 200;
var $CHAT_MESSAGE = $('#js-chat-message-new-tmpl');
var $QUESTION_MESSAGE = $('#js-question-message-tmpl');
var $CHAT_TIPS_HISTORY = $('#js-chat-tips-history-tmpl');
var $CHAT_STATUS_ITEM_TMPL = $('#js-chat-status-tmpl');
var $CHAT_USER_ITEM_TMPL = $('#js-chat-user-item-tmpl');
var $CHAT_ROBOT_ITEM_TMPL = $('#js-chat-robot-item-tmpl');
var $chatStatusEventDomWrap = $('#js-chat-status-event');
var $chatContentDomWrap = $('.chat-wrap-content');
var $questionContentDomWrap = $('#questionList');
var $sendBtn = $('#js-send-btn');
var $sendTopBtn = $('#js-notice-btn');
var realUserTotal = 0;
var _messages_count = 0;
var _questions_count = 0;
var screenLockStatus = 0;
var questionScreenLockStatus = 0;
var deskTopNotice = false;
var _chatInterval = null;
var _questionInterval
var ON_LINE_STATUS = 1;
var OFF_LINE_STATUS = 0;
var __userPage = 1;
var __checked_video_pwd__ = 0;
var __onConnnectOldCallback = [];
var __teamName__ = "";
function getTimeFormat(time) {
    if (time) {
        var date = new Date(time);
    } else {
        var date = new Date();
    }
    var h = date.getHours();
    var m = date.getMinutes();
    if (h < 10) {
        h = "0" + h.toString();
    }
    if (m < 10) {
        m = "0" + m.toString();
    }
    return h + ":" + m;
}
function realPop(image,option){
    var windowWidth = $(window).width();
    var windowHeight = $(window).height();
    var w = image.width;
    var h = image.height;
    if (w == 0) w = 400;
    if (h == 0) h = 400;
    if (windowWidth < w || windowHeight < h) {
        if (w / h > windowWidth / windowHeight) {
            windowWidth -= 40;
            windowHeight = parseInt(h / w * windowWidth);
        } else {
            windowHeight -= 40  ;
            windowWidth = parseInt(w / h * windowHeight);
        }
    } else {
        windowWidth = w;
        windowHeight = h;
    }
    var html = "<img src='" + image.src + "' style=' width:" + windowWidth + "px; height:" + windowHeight + "px;margin:auto; display:block;' >";
    var myDlg = dialog({
        content: html,
        backdropOpacity:option.backdropOpacity?option.backdropOpacity:0.0,
        quickClose:option.quickClose == undefined?true:option.quickClose,
        padding:'0px',
        title:"图片",
        skin: 'notitle-dialog'
    });
    if(option.model){
        myDlg.showModal();
    }else{
        myDlg.show();
    }
}
function popImg(imgUrl,needLoad,option) {
    var image = new Image()
    image.src = imgUrl;
    if(!option)  option= {};
    if(!needLoad){
        realPop(image,option);
    }else{
        image.onload = function(){
            realPop(image,option);
        }
        image.onerror = function(){
            realPop(image,option);
        }
    }
    
    
}


function Setcookie(name, value,time) {
    var expdate = new Date();
    expdate.setTime(expdate.getTime() + time);
    document.cookie = name + "=" + value + ";expires=" + expdate.toGMTString() + ";path=/";

}

function getCookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=")
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1
            c_end = document.cookie.indexOf(";", c_start)
            if (c_end == -1) c_end = document.cookie.length
            return unescape(document.cookie.substring(c_start, c_end))
        }
    }
    return ""
}/*
function showTeamQuestions(teamId,showRight){
    if(!window.D.USER.logined){
        showLoginDialog();
        return;
    }
     $.get("/team/questions/"+window.D.roomId+"?teamId="+teamId,function(resp){
        
        if(resp.code != 0){
             dialog({title:"提示",
                content:resp.msg,
                quickClose: true,
                width:200,
                button: [{
                    value: '我知道啦',
                    callback: function () {
                        return true;
                    }
                }]
            }).show();
             return ;
        }
        resp.id = "js-team-questions";
        resp.showRight = showRight;
        if(window.__teamQDlg){
            window.__teamQDlg.close().remove();
        }
        if(!showRight){
            var button = [{
                value: '确定加入',
                callback: function () {
                    var allchecked = true;
                    var map = {teamId:teamId,ask:[],answer:[]};
                    $('#js-team-questions li').each(function(n,v){
                        var val = $(v).find('input:radio:checked').val();
                        if(val == undefined){
                            allchecked = false;
                        }else{
                            map.ask.push($(this).attr('data-id'));
                            map.answer.push(val);
                        }
                    })
                    if(!allchecked){
                        dialog({title:"提示",
                            content:"请选择答案",
                            quickClose: true,
                            button: [{
                                value: '我知道啦',
                                callback: function () {
                                    return true;
                                }
                            }]
                        }).show();
                    }else{
                        var that =this;
                        $.post('/team/add/'+window.D.roomId,map,function(ret){
                            that.close().remove();
                            if(ret.code == 0){
                                __teamName__ = ret.teamName;
                            }
                            dialog({title:"提示",
                                content:ret.msg,
                                quickClose: true,
                                width:200,
                                button: [{
                                    value: '我知道啦',
                                    callback: function () {
                                        return true;
                                    }
                                }]
                            }).show();
                        });
                    }
                    return false;
                }
            }];
        }else{
            var button =[{
                value: '我知道啦',
                callback: function () {return true;}
                }
            ];
        }
        window.__teamQDlg = dialog({
            title:resp.teamName,
            content:$("#js-hot-question-tmpl").render(resp),
            button:button,
            width:800
            
        }).show();
    })
}*/
function showLoginDialog(callback,hideClose){
    if(window.__loginDialog)return;
    if(window.__regDialog){
        window.__regDialog.remove();
    }
    var url = '/auth/login?back=/auth/pref&roomid=' + window.D.roomId;
    var iframeHtml = '<iframe src="'+url+'" width="430px" height="360px"></iframe>'
    if(window.D.loginUiType == 1){
        var iframeHtml = '<iframe src="'+url+'" width="340px" height="550px"></iframe>'
    }
    var height = (window.D.loginUiType == 1)?550:360;
    if(window.D.loginUiType == 2){
        var iframeHtml = '<iframe src="'+url+'" width="800px" height="310px"></iframe>'
        height = 310;
    }

    window.__loginDialog = dialog({
        content: iframeHtml,
        backdropOpacity:0.7,
        padding:'0px',
        height:height,
        skin: 'notitle-dialog ' + (hideClose?"hide-close":""),
        title:"用户登陆",
        cancelDisplay:false,
        cancel:function(){
            return !hideClose;
        },
        onclose:function(){
            window.__loginDialog.remove();
            window.__loginDialog = null;
            if(callback)callback();
        }
    }).showModal();
}
function showRegDialog(){
        var url = '/auth/reg?back=/auth/regsuc&roomid=' + window.D.roomId;
        var iframeHtml = '<iframe src="'+url+'" width="520" height="580"></iframe>'
        window.__regDialog = dialog({
            content: iframeHtml,
            backdropOpacity:0.7,
            padding:'0px',
            height:480,
            title:"用户注册",
        }).showModal();
}
function showFrameBanner(width,height,navId){
    var url = '/iframe/banners/' + window.D.roomId+"?navId="+navId;
    var iframeHtml = '<iframe src="'+url+'" width="'+width+'" height="'+height+'"></iframe>'
    var tmpDialog= dialog({
        content: iframeHtml,
        backdropOpacity:0.1,
        padding:'0px',
        title:"图片",
        height:height,
        skin: 'notitle-dialog'
    });
    tmpDialog.showModal();
}
function initDialog() {
    $("#js-live-btn").click(function(){
        $('#js-vod-player-wrap').hide();
        $('#js-vod-player-wrap').empty();
        refreshVideo();
    })
    $('.icon_luck_money').bind('click',function(e){
        var url = '/luckmoney/send/' + window.D.roomId;
        var iframeHtml = '<iframe src="'+url+'" width="360" height="510"></iframe>'
        window._sendLuckMoneyDlg = dialog({
            content: iframeHtml,
            backdropOpacity:0.3,
            padding:'0px',
            title:"图片",
            height:510,
            skin: 'notitle-dialog'
        });
        window._sendLuckMoneyDlg.showModal();
    })
    function showBetDialog(){
        var url = "/iframe/bet/" + window.D.roomId;
        var title = $(this).attr('data-title');
        var iframeHtml = '<iframe src="'+url+'" width="510" height="185"></iframe>';
         var title = $(this).attr('data-title');
         window._vodDialog = dialog({
            content: iframeHtml,
            backdropOpacity:0.1,
            height:185,
            padding:'0px',
            title:title?title:"今日大盘",
        }).showModal();
    }
    function showVodDialog(){
        var url = "/iframe/vodlist/" + window.D.roomId;
        var title = $(this).attr('data-title');
        var iframeHtml = '<iframe src="'+url+'" width="620" height="420"></iframe>';
         var title = $(this).attr('data-title');
         window._vodDialog = dialog({
            content: iframeHtml,
            backdropOpacity:0.1,
            height:420,
            padding:'0px',
            title:title?title:"视频库",
        }).showModal();
    }
    
    window.sendLuckMoneyCallback = function(){
        window._sendLuckMoneyDlg.remove();
    }


    function showTeacherInfos() {
        var url = '/iframe/teachers/' + window.D.roomId;
        var height = 380;
        
        var title = $(this).attr('data-title');
        var iframeHtml = '<iframe src="'+url+'" width="642" height="'+height+'"></iframe>'
        dialog({
            content: iframeHtml,
            backdropOpacity:0.1,
            padding:'0px',
            title:title?title:"专家团队",
            height:height,
        }).showModal();

    }
    function showHQZX(){
        var url = "https://markets.wallstreetcn.com/embed/sidebar/v2?_=eyJjaGFydCI6eyJpbnRlcnZhbCI6IjUifSwidGhlbWUiOiJkYXJrIiwiaGVpZ2h0IjozODUsIndpZHRoIjozNDMsImFjdGl2ZSI6MCwidGFicyI6W3sibmFtZSI6IuiCoeaMhyIsInN5bWJvbHMiOlsiU1BYNTAwIiwiMDAwMDAxIiwiVVMxMFllYXIiLCJOQVMxMDAiLCJVUzMwIiwiSlBOMjI1SU5ERVgiLCJoa2czM2luZGV4IiwiVUsxMDAiLCJldXN0eDUwaW5kZXgiXX1dfQ&utm_source=unknown&utm_medium=embed-sidebar&utm_campaign=open_platform&hmsr=unknown&hmmd=embed-sidebar&hmpl=open_platform";
        if (!window.D.USER.role.f_cjrl) {
            url = "/iframe/kf/" + window.D.roomId;
        }
        var title = $(this).attr('data-title');
        var iframeHtml = '<iframe src="'+url+'" width="700" height="500"></iframe>'
        dialog({
            content: iframeHtml,
            backdropOpacity:0.1,
            height:500,
            padding:'0px',
            title:title?title:"行情资讯"
        }).showModal();
    }
    function showCJRL() {
        var url = 'http://www.jin10.com/example/jin10.com.html';
        if (!window.D.USER.role.f_cjrl) {
            url = "/iframe/kf/" + window.D.roomId;
        }
        var title = $(this).attr('data-title');
        var iframeHtml = '<iframe src="'+url+'" width="700" height="500"></iframe>'
        dialog({
            content: iframeHtml,
            backdropOpacity:0.1,
            height:500,
            padding:'0px',
            title:title?title:"财经日历"
        }).showModal();
    }
    function showLessonv2() {
        var url = '/iframe/lesson/' + window.D.roomId;
        var iframeHtml = '<iframe src="'+url+'" width="600" height="527"></iframe>'
        var tmpDialog= dialog({
            content: iframeHtml,
            backdropOpacity:0.1,
            padding:'0px',
            title:"图片",
            height:527,
            skin: 'notitle-dialog'
        });
        tmpDialog.showModal();
    }
    function showLsgd(){
        var url = '/iframe/lsgd/' + window.D.roomId;
        var title = $(this).attr('data-title');
        var iframeHtml = '<iframe src="'+url+'" width="600" height="370"></iframe>'
        var tmpDialog= dialog({
            content: iframeHtml,
            backdropOpacity:0.1,
            padding:'0px',
            title:title?title:"老师观点",
            height:370,

        });
        tmpDialog.showModal();
    }
    function showCzjy(){
        var url = '/iframe/czjy/' + window.D.roomId;
        var title = $(this).attr('data-title');
        var iframeHtml = '<iframe src="'+url+'" width="600" height="370"></iframe>'
        var tmpDialog= dialog({
            content: iframeHtml,
            backdropOpacity:0.1,
            padding:'0px',
            title:title?title:"操作建议",
            height:370,

        });
        tmpDialog.showModal();
    }
    function showFiles(){
        var id = $(this).attr('data-id');
        if(id){
            var url = '/iframe/files/' + window.D.roomId + "?id="+id;
        }else{
            var url = '/iframe/files/' + window.D.roomId;
        }
        
        var iframeHtml = '<iframe src="'+url+'" width="300" height="400"></iframe>'
        var title = $(this).attr('data-title');
        
        var tmpDialog= dialog({
            content: iframeHtml,
            backdropOpacity:0.1,
            padding:'0px',
            title:title?title:"文件下载",
            height:370,
            //skin: 'notitle-dialog'

        });
        tmpDialog.showModal();
    }
    function showShare(){
        var url = '/iframe/share/' + window.D.roomId+"?tgURL="+window.D.tgURL+"&roomId="+window.D.roomId+"&roomTitle="+window.D.roomTitle;
        var iframeHtml = '<iframe src="'+url+'" width="280" height="250"></iframe>'
        var title = $(this).attr('data-title');
        var tmpDialog= dialog({
            content: iframeHtml,
            backdropOpacity:0.1,
            padding:'0px',
            title:title?title:"分享收藏",
            height:250,
            //skin: 'notitle-dialog'

        });
        tmpDialog.showModal();
    }
    function showArticle(){
        var url = '/article';
        var title = $(this).attr('data-title');
        var iframeHtml = '<iframe src="'+url+'" width="800" height="463"></iframe>'
        var tmpDialog= dialog({
            content: iframeHtml,
            backdropOpacity:0.1,
            padding:'0px',
            title:title?title:"每日内参",
            height:463,
           
        });
        tmpDialog.showModal();
    }
    function showStockPool() {
        var url = '/iframe/stockpool/' + $(this).attr('data-roomid');
        var title = $(this).attr('data-title');
        var iframeHtml = '<iframe src="'+url+'" width="800" height="463"></iframe>'
        var tmpDialog= dialog({
            content: iframeHtml,
            backdropOpacity:0.1,
            padding:'0px',
            title:title?title:"分享收藏",
            height:463,
           
        });
        tmpDialog.showModal();
        
    }
    $(".nav-show-banner").bind('click',function(){
        showFrameBanner($(this).attr('data-width'),$(this).attr('data-height'),$(this).attr('data-id'))
    })


     if(window.D.containFortune && window.D.jf_fortune_pop){
        showFortune();
    }

    function showFortune(){
        if(window._fortuneDialog){
            window._fortuneDialog.remove();
        }
        var iframeHtml = '<iframe id="fortuneDialog" src="/fortune/index" width="800" height="479"></iframe>'
        window._fortuneDialog = dialog({
            content: iframeHtml,
            backdropOpacity:0.0,
            height:479,
            padding:'0px',
            skin: 'notitle-dialog topclose',
            title:"xx"
        });
        window._fortuneDialog.showModal();
    }
    var tpSending = false;
    var __TPMAP__ = {};
    window.__onRecvTp = function(data){
        var item = {
            tpItems:data.tp_items,
            tpMyId:__TPMAP__[data.navId]
        }
        if(window.__TPNAVID == data.navId){
            window.__TPITEM.content($('#js-tps-tmpl').render(item));
            $('.zan_tp').on('click',function(){
                postTp($(this).attr("data-navid"),$(this).attr("data-id"));
            })
        }
    }
    function postTp(navId,itemId){
        if(tpSending)return;
        tpSending = true;
        if(__TPMAP__[navId]){
            return;
        }
        setTimeout(function(){
            tpSending = false;
        },3000);
         $.post('/tp/send',{"navId":navId,roomId:window.D.roomId,itemId:itemId},function(resp){
            if(resp.code == 0){
                __TPMAP__[navId] = resp.tp_id;
                $('#js-tps-'+resp.tp_id).find(".zan_tp").addClass("zan");
                $('#js-tps-'+resp.tp_id).find(".zan_tp").html("已投");
                $('#js-tps-'+resp.tp_id).find(".tp-num").html(resp.total);
            }else{
                dialog({title:"提示",
                    content:resp.msg,
                    quickClose: true,
                    button: [{
                        value: '我知道啦',
                        callback: function () {
                            return true;
                        }
                    }]
                }).show();
            }
        });
    }
    function showTP(){
        var id = $(this).attr('data-id');
        $.get('/tp/list?navId='+id,function(resp){
            window.__TPNAVID = id;
            if(parseInt( resp.tpMyId ) > 0){
                __TPMAP__[id] = resp.tpMyId;
            }
            
            window.__TPITEM = dialog({
                title:resp.title,
                content:$('#js-tps-tmpl').render(resp),
                onclose: function () {
                    window.__TPNAVID = 0;
                    window.__TPITEM  = null;
                },
            }).show();
            $('.zan_tp').on('click',function(){
                postTp($(this).attr("data-navid"),$(this).attr("data-id"));
            })
        })
    }
    function showJfRank(){
        var url = "/iframe/jfrank/" + window.D.roomId;
        var iframeHtml = '<iframe src="'+url+'" width="280" height="491"></iframe>'
          var title = $(this).attr('data-title');
        window._hdDialog = dialog({
            content: iframeHtml,
            backdropOpacity:0.3,
            height:380,
            width:280,
            padding:'0px',
            skin: '',
            title:title?title:"积分排行榜" 
        });
        window._hdDialog.showModal();
    }
    $('.js-ui-dialog-4041').bind("click",showJfRank);//有奖竞猜
    $('.js-ui-dialog-4012').bind("click",showCJRL);//财经日历
    $('.js-ui-dialog-4016').bind("click",showHQZX);//财经日历
    $('.js-ui-dialog-4035').bind("click",showTP);//财经日历
    $('.js-ui-dialog-4039').bind("click",showArticle);
    $(".js-ui-dialog-4031").bind('click',function(){
         var title = $(this).attr('data-title');
        $.get("/iframe/navinfo?navId="+$(this).attr("data-id"),function(resp){

            dialog({
                content: '<div class="nice-scroll-tmp1" style="overflow: auto;max-height:500px;width:600px;">'+resp.user_text+'</div>',
                backdropOpacity:0.0,
                width:600,
                padding:'10px',
                title:title,
            }).showModal();
            $('.nice-scroll-tmp1').niceScroll({
                cursorborder: '',
                horizrailenabled: false,
                cursorcolor: '#999',
                boxzoom: false
            });
        })
    })
    $(".js-ui-dialog-4037").bind('click',function(){
        var title = $(this).attr('data-title');
        var tmpDlg = dialog({
            content:"",
            backdropOpacity:0.0,
            width:600,
            height:450,
            padding:'10px',
            title:title,
        }).showModal();
        $.get("/json/news",function(resp){
            tmpDlg.content($('#js-news-list-tmpl').render(resp));
        })
    })
    $('.js-ui-dialog-4021').bind("click",function(){
        if($('.page-container').hasClass("shrink-in")){
            $('.page-container').removeClass("shrink-in");
        }else{
            $('.page-container').addClass("shrink-in");
        }
        setTimeout(resizeVideo,100);
        resizeVideo();
    });//财经日历
    
    $('.js-ui-dialog-4040').bind("click",showBetDialog);//视频库
    $('.js-ui-dialog-4022').bind("click",showVodDialog);//视频库
    $('.js-ui-dialog-4013').bind("click",showTeacherInfos);//专家团队
    $('.js-ui-dialog-4014').bind("click",showLessonv2);//课程表
    $('.js-ui-dialog-4007').bind("click",showCzjy);//操作建议
    $('.js-ui-dialog-4006').bind("click",showLsgd);//老师观点
    $('.js-ui-dialog-4009').bind("click",showFiles);//文章下载
    $('.js-ui-dialog-4010').bind("click",showShare);//分享收藏
    $('.js-ui-dialog-4001').click(showStockPool);
    $('.js-zjtd-dialog').bind('click',showTeacherInfos);
    $('.js-cjrl-dialog').bind('click',showCJRL);

    $('.js-ui-dialog-4020').bind("click",showFortune);//抽奖
    $('.js-ui-dialog-4004').bind('click',showQQs)
    function showQQs(){
        var url = '/iframe/qqs/' + window.D.roomId;
        var iframeHtml = '<iframe src="'+url+'" width="559" height="369"></iframe>'
        dialog({
            content: iframeHtml,
            backdropOpacity:0.3,
            padding:'0px',
            height:369,
            title:"客服",
            skin: 'notitle-dialog'
        }).showModal();
    }
    $('.qq-more').bind('click',showQQs)
    $('.js-login-dialog').bind('click', showLoginDialog);
    $('.js-sigup-dialog').bind('click', showRegDialog);
    $('.js-user-setting-dialog').bind('click', function() {
        var url = '/user/modify?back=/auth/pref&roomid=' + window.D.roomId;
        var iframeHtml = '<iframe src="'+url+'" width="400" height="580"></iframe>'
        dialog({
            content: iframeHtml,
            backdropOpacity:0.7,
            height:500,
            padding:'0px',
            title:"用户设置",
            
        }).showModal();

    });
    
    window.hdDialogCallback = function() {
        if(window._hdDialog){
           window._hdDialog.remove();
            window._hdDialog = null; 
        }
    }
    $('.js-sshd-dialog').bind('click', function() {
        if(window._hdDialog) window._hdDialog.remove();
        var url = "/iframe/hd/" + window.D.roomId;
        var iframeHtml = '<iframe src="'+url+'" width="800" height="280"></iframe>'
        window._hdDialog = dialog({
            content: iframeHtml,
            backdropOpacity:0.3,
            height:280,
            padding:'0px',
            title:"操作建议"
        });
        window._hdDialog.showModal();
    });
}

function resizeVideo(){
    var width = $('.main-video-player').width();
    height = width * window.D.videoHW;
    height+=28;
    $('.main-video-player').height(height);

    if($('.main-gift').length > 0){
        tmp = width/10;
        if(tmp > 80){
            tmp = 80;
        }
        height += tmp;
    }
    $('.main-room-info').css("top",height +3);
    resizeSiderUl();
}
function resizeChatHeight(){
    $('.chat-wrap-height').css("bottom",( parseInt( $('.chat-bottom').height() ) )+"px");
    if($('.chat-top-new').length > 0){
        $('.chat-wrap-height').css("top",( parseInt( $('.chat-top-new').height() +1))+"px");
        $('.chat-float-model').css("top",( parseInt( $('.chat-top-new').height() +5 ))+"px");
    }
    
}
function initBase() {
    $('.nice-scroll').niceScroll({
        cursorborder: '',
        cursorcolor: '#999',
        boxzoom: false
    });
    $( $('.main-room-info .tab-header li')[0] ).addClass("active");
    $( $('.main-room-info .tab-content .tab-pane')[0] ).addClass("active");
    $('.js-tab-select-img img').click(function() {
        popImg($(this).attr('src'),true);
    });
     $('.my-pop-img-qq').click(function() {
        var url = '/iframe/imgqq/' + window.D.roomId+"?img="+$(this).attr('data-img') + "&qqtype="+$(this).attr('data-qqtype');
        var iframeHtml = '<iframe src="'+url+'" width="800px" height="300"></iframe>'
        var tmpDialog= dialog({
            content: iframeHtml,
            backdropOpacity:0.1,
            padding:'0px',
            title:"图片",
            height:300,
            skin: 'notitle-dialog'
        });
        tmpDialog.showModal();
    });
    $('.my-pop-img').click(function() {
        popImg($(this).attr('data-img'),true);
    });
    $('.nice-scroll-h').niceScroll({
        cursorborder: '',
        horizrailenabled: false,
        cursorcolor: '#999',
        boxzoom: false
    });
    var runing_chat_open = 0;
    $('#chat-open-op').click(function(){
        if(runing_chat_open){
            return;
        }
        runing_chat_open = 1;
        var self = $(this);
        var state = parseInt( $(this).attr('data-state') );
        setTimeout(function(){
            runing_chat_open = 0;
        },1000);
        $.post("/chat/state/"+window.D.roomId,{state:(state?0:1)},function(resp){

            if(resp.code == 0){
                self.attr('data-state',resp.chat_open);
                if(resp.chat_open){
                    $('#chat-open-op').removeClass('closechat').addClass('openchat');
                }else{
                    $('#chat-open-op').removeClass('openchat').addClass('closechat');
                }
            }
        })
    })
    $(".main-video").resize(function(){
        resizeVideo();
    });
    $(window).resize(function(){
        resizeVideo();
        resizeChatHeight();
    })
    resizeChatHeight();
    resizeVideo();
    if(window.processPaste){
        $('#js-chat-form-input')[0].addEventListener( 'paste', processPaste);
    }
    $('.dds-card  .card-close').click(function(event) {
        $('.dds-card').css("visibility", "hidden");
    });
    //dropdownHover
    $('[data-hover="dropdown"]').dropdownHover();
    $('.profile-menu').hover(function(){
        $.get('/user/extern',function(data){
            if(data.code != 0) {
                return;
            }
            $('#idBetInfo .bet-cur').html("当前积分："+data.jf_cur)
        })
    },function(){});
    
   
    $('#js-start-video').bind('click',function(){
        $state = parseInt( $(this).attr('data-state') );
        $.post('/live/startvideo', { roomId:window.D.roomId,state : $state?0:1}, function(resp,text) {
            if(resp && resp.state != null){
                $('#js-start-video').attr('data-state',resp.state);
                if(resp.state == 0){
                    $('#js-start-video').addClass('closevideo').removeClass('openvideo');
                }else{
                    $('#js-start-video').addClass('openvideo').removeClass('closevideo');
                }
            }
        });
    })
     $('#js-gifgottrank-btn').bind("click",function(){
        var url = "/iframe/rankgiftgot/" + window.D.roomId;
        var iframeHtml = '<iframe src="'+url+'" width="280" height="491"></iframe>'
        window._hdDialog = dialog({
            content: iframeHtml,
            backdropOpacity:0.3,
            height:380,
            width:280,
            padding:'0px',
            skin: '',
            title:"收礼排行榜" 
        });
        window._hdDialog.showModal();
    })
    $('#js-giftrank-btn').bind("click",function(){
        var url = "/iframe/rankgiftsend/" + window.D.roomId;
        var iframeHtml = '<iframe src="'+url+'" width="280" height="491"></iframe>'
        window._hdDialog = dialog({
            content: iframeHtml,
            backdropOpacity:0.3,
            height:380,
            width:280,
            padding:'0px',
            skin: '',
            title:"送礼排行榜" 
        });
        window._hdDialog.showModal();
    })
    $('#js-jfrank-btn').bind("click",function(){
        var url = "/iframe/jfrank/" + window.D.roomId;
        var iframeHtml = '<iframe src="'+url+'" width="280" height="491"></iframe>'
        window._hdDialog = dialog({
            content: iframeHtml,
            backdropOpacity:0.3,
            height:380,
            width:280,
            padding:'0px',
            skin: '',
            title:"积分排行榜" 
        });
        window._hdDialog.showModal();
    })
    $('#js-betrank-btn').bind("click",function(){
        var url = "/iframe/betrank/" + window.D.roomId;
        var iframeHtml = '<iframe src="'+url+'" width="365" height="491"></iframe>'
        window._hdDialog = dialog({
            content: iframeHtml,
            backdropOpacity:0.3,
            height:380,
            width:365,
            padding:'0px',
            skin: '',
            title:"竞猜排行榜"
        });
        window._hdDialog.showModal();
    })
        //专家团队
    if (window.D.USER.logined && 　ZeroClipboard) {
        var client = new ZeroClipboard(document.getElementById("copy-button2"));
        client.on("ready", function(readyEvent) {
            client.on("aftercopy", function(event) {
                alert("复制成功");
            });
        });
    }
    $(".line-menu ul li").click(function() {
        if ($(this).find("a").attr("aria-controls") == "brand") {
            $(".brand-content").parents('.tab-content').scrollTop(0);
        }
    });

    //pop_ad
    $('.banner-close').click(function() {
        $('#FirstPop').hide();
    });

    
    if($("#colorpalette1").length > 0){
        $("#colorpalette1").colorPalette().on('selectColor', function(e) {
            $('#js-chat-color-btn .in').css('backgroundColor', e.color);
                $('#js-chat-color-btn').attr('data-color',e.color);
        });
    }
    
}
function initVideo(){
    var $refashVideoBtn = $('#js-refash-video');
    $refashVideoBtn.click(function(){
        refreshVideo();
    });
    if( $("#js-video-player-pwd").length > 0 ){
        $('#js-video-pwd-btn').click(function(){
            if( $("#js-video-password").val() == ""){
               dialog({title:"提示",content:"请输入视频密码",quickClose: true}).show();
               return;
            }
            $.post('/live/videopwd', {roomId:window.D.roomId, 'pwd': $("#js-video-password").val() }, function(resp,err) {
                if(resp.code == 0){
                    __checked_video_pwd__ = 1;
                    refreshVideo();
                }else{
                    dialog({title:"提示",content:resp.msg,quickClose: true}).show();
                }
            });
        })
    }
}
function initTheme() {
    if (!window.D.theme) window.D.theme = {};
    var $pageContainer = $('.page-container');

    function themeChangeEvent($themeItems, themeType, value) {
        var _themeValue = value;
        $themeItems.click(function() {
            var $this = $(this);
            var data = {};
            var theme = $this.data('theme');
            $themeItems.removeClass('active');
            $this.addClass('active');
            $pageContainer.removeClass(_themeValue).addClass(theme);
            data[themeType] = theme;
            updateRoomTheme(data);
            _themeValue = theme;
        });
        $themeItems.filter('[data-theme="' + value + '"]').addClass('active');
    };

    function updateRoomTheme(option) {
        $.post('/user/theme', option, function() {});
    };
    themeChangeEvent($('.theme .theme-bg'), 'backgroundImg', window.D.theme.backgroundImg ? window.D.theme.backgroundImg : window.D.defaultBgStyle);
    themeChangeEvent($('.btn-color-wrap .theme-color'), 'buttonColor', window.D.theme.buttonColor ? window.D.theme.buttonColor : 'theme-button-color-1');
    themeChangeEvent($('.theme-layout-video .theme-layout'), 'layout', window.D.theme.layout ? window.D.theme.layout : 'layout-video-left');
    themeChangeEvent($('.theme-layout-sider .theme-layout'), 'layoutsider', window.D.theme.layoutsider ? window.D.theme.layoutsider : 'layout-sider-left');
}

function startLifeCheck() {
    $(window).unload(function() {
        $.ajax({
            async: false,
            type: "POST",
            data: { _t: new Date().getTime() },
            url: '/live/life?roomId=' + window.D.roomId+"&last=1",
            dataType: 'json',
            success: function(data) {
               
            }
        });
    })
    var lifeCheckTimer = setInterval(function() {
        $.post('/live/life?roomId=' + window.D.roomId,{}, function(data) {
            if(data.roomFlag == 0){
                window.location.reload();
            }
        })
    }, 3* 60 * 1000);
    __onConnnectOldCallback.push(function(){
        clearInterval(lifeCheckTimer);
    });
    setTimeout(function() {
        $.post('/live/life?roomId=' + window.D.roomId+"&first=1", function(data) {
            if(data.roomFlag == 0){
                window.location.reload();
            }
        })
    }, 300);
}
function initBanner() {
    $('.js-banners').each(function(n,value){
        runBanner($(value));
    });
};
function runBanner($item) {

    var bannerIndex = 0;
    var $popLi = $item.find('.banner-num li');
    var $dscontentLi =  $item.find('.dscontent li');
    var max = $popLi.length;
    var bannerInterval = setInterval(function() {
        bannerIndex = (bannerIndex+1) % max;
        setBannerNum(bannerIndex);
    }, 10000);
    
    var setBannerNum = function(num) {
        $popLi.removeClass('on');
        $popLi.eq(num).addClass('on');
        $dscontentLi.hide();
        $dscontentLi.eq(num).show();
    };
    setBannerNum(bannerIndex);
    $popLi.click(function() {
        var $this = $(this);
        setBannerNum(parseInt($this.text()));
    });
};
function showQrCode(cantanier,url) {
    var _render = 'canvas';
    try {
        if (!document.createElement('canvas').getContext) {
            _render = "table";
        }
    } catch (err) {
        _render = "table";
    }
    $(cantanier).empty();
    $(cantanier).qrcode({
        render: _render,
        width: 180,
        height: 180,
        text: url,
    });
};
function initQrCode() {
    showQrCode('#qrcode',window.D.phoneUrl);
    showQrCode('#qrcode1',window.D.phoneUrl);
};

function checkSearch(putvalue) {
    var currentClass = null;
    if (__currentULTyleClass && __currentULTyleClass != "all") {
        currentClass = 'select-role-' + __currentULTyleClass;
    }
    var num = 0;

    if (putvalue && putvalue != "") {
        putvalue = putvalue.toLowerCase();
        $("#idUserList li").each(function(i, n) {
            if ($(n).attr("data-name").toLowerCase().indexOf(putvalue) != -1) {
                if (currentClass == null || $(n).hasClass(currentClass)) {
                    $(n).show();
                    num++;
                } else {
                    $(n).hide();
                }
            } else {
                $(n).hide();
            }
        });
    } else {
        if(!currentClass){
            $('#idUserList li').show();
        }else{
            $('#idUserList li').hide();
            $('#idUserList .'+currentClass).show();
        }
    }
    if(num > 0){
        $('#search-num').show();
        $('#search-num').html(num);
    }else{
        $('#search-num').hide();
        $('#search-num').html(num);
    }
}
var __currentULTyleClass = "all";

function initUlCheck() {
    var timer = null;
    $("#search-input").keyup(function() {
        checkSearch($("#search-input").val());
    });

    $('#js-ul-type-list').change(function() {
        __currentULTyleClass = $(this).val();
        checkSearch($("#search-input").val());
    })
}

function refreshUserListnum() {
    $('#js-ul-type-list option').each(function(i, n) {
        $item = $(n);
        if ($item.val() != 'all') {
            num = $("#idUserList .select-role-" + $item.val()).length;
            $item.html($item.attr('data-name') + "(" + num + ")");
        }
    });
}
function runGift(msg){
    if(!this.__giftQueue){
        this.__giftQueue = [];
    }
    if (msg) {
        this.__giftQueue.push(msg);
    }
    if (this.__giftRuning >= 10) {
        return;
    }
    if (this.__giftQueue.length <= 0) {
        return;
    }
    var data = this.__giftQueue.shift();
    this.__giftRuning ++;
    var self = this;
    var left = parseInt( Math.random()*40 );
    var top = parseInt( Math.random()*40 );
    if(!this.id){
        this.id = 1;
    }
    
    var curId = this.id ++;
    var html = '<img id="__gift__show__'+curId+'" width="100px" style="position: absolute;top:'+top+'px;left:'+left+'px;" src="'+data.gift_gif+'"></img>';
    $("#gift_show").append(html);
    setTimeout(function(){
        $("#__gift__show__"+curId).remove();
        self.__giftRuning --;
        runGift();
    },data.gift_showts*1000);
}
function runDanmu(msg) {
    if(!this.danmuList){
        this.danmuList = [];
    }
    if (msg) {
        this.danmuList.push(msg);
    }
    if (this.danmuRuning) {
        return;
    }
    if (this.danmuList.length <= 0) {
        return;
    }
    var self = this;
    var data = this.danmuList.shift();
    this.danmuRuning = 1;
    if (data.font_color) {
        $dom = $('<span style="color:' + data.font_color + '">' + data.msg + '</span>').parseEmotion();
    } else {
        $dom = $('<span >' + data.msg + '</span>').parseEmotion();
    }

    $('.danmu-content').empty().append($dom);
    $('.danmu-content').css('margin-left', $(window).width());
    $('.danmu-content').show();
    var speed = ($('.danmu-content').width() + $(window).width()) / 120 * 1000;
    $('.danmu-content').animate({ "margin-left": -$('.danmu-content').width() }, speed, 'linear', function() {
        self.danmuRuning = 0;
        $('.danmu-content').empty();
        $('.danmu-content').hide();
        runDanmu();
    });
}

function initNotice() {
    if( $('.chat-wrap-content-top').is(":hidden") ){
        return;
    }
    var html = $('#js_notice_msg').html();
    $dom = $('<span>' + html + '</span>').parseEmotion();
    $('#js_notice_msg').empty().append($dom);
    startNotice();
}

function startNotice() {
    $('#js_notice_msg').css('margin-left', $('.notice_wrap').width());
    var speed = ($('.notice_wrap').width() + $("#js_notice_msg").width()) / 50 * 1000;
    $('#js_notice_msg').animate({ "margin-left": -$('#js_notice_msg').width() }, speed, 'linear', function() {
        startNotice();
    });
}

function initToChat() {
    $('.to-chat-warp .myclose').click(function() {
        $('#js-chat-to-user').attr('data-uid', "");
        $('#js-chat-to-user').attr('data-usertype', "");
        $('#js-chat-to-user').html("大家");
        $(this).hide();
    })
    $('#js-chat-mgr-list').change(function() {
        var $options = $('#js-chat-mgr-list').find("option:selected");
        change($options.val(), $options.data('name'),$options.data('usertype'))
    });

    function change(uid, name,userType) {
        if (!uid || uid == window.D.USER.uid) {
            return;
        }
        var $options = $('#js-robot-list').find("option:selected");
        userId = $options.data('uid');
        if (userId == uid) {
            return;
        }
        $('#js-chat-to-user').attr('data-uid', uid);
        $('#js-chat-to-user').attr('data-usertype', userType);
        $('#js-chat-to-user').html(name);
        $('.to-chat-warp .myclose').show();
    }
    $('body').delegate('.js-chat-select-name', 'click', function() {
        change($(this).data('uid'), $(this).data('name'), $(this).data('usertype'))
    });
}
(function($) {
    $.fn.scrollHeightChange = function(handleFunction) {
        var element = this;
        var lastHeight = element[0].scrollHeight;

        setInterval(function() {

            if (lastHeight === element[0].scrollHeight)
                return;
            if (typeof(handleFunction) == 'function') {
                handleFunction();
                lastHeight = element[0].scrollHeight;
            }
        }, 100);
        return element;
    };
}(jQuery));

function startPrichat() {
    $(document).delegate('.rolebtn-prichat', 'click', function() {
        var uid = $(this).attr('data-uid');
        var name = $(this).attr('data-name');
        var pic = $(this).attr('data-pic');
        onPrivateChat({ uid: uid, name: name, pic: pic, active: 1 });
        //$.post('/chat/prichat/' + window.D.roomId,{'toUid':uid,msg:""}, function() {});
    });
}
function initCaiTiao(){
    var caitiaoMap = {};
    caitiaoMap['[彩条-顶一个]'] = window.D.cdn + "/assets/img/upload/dyg.gif";
    caitiaoMap['[彩条-鲜花]'] = window.D.cdn + "/assets/img/upload/xh.gif";
    caitiaoMap['[彩条-掌声]'] = window.D.cdn + "/assets/img/upload/zs.gif";
    caitiaoMap['[彩条-赞一个]'] = window.D.cdn + "/assets/img/upload/zyg.gif";
    caitiaoMap['[彩条-鲜花V2]'] = window.D.cdn + "/assets/img/upload/xianhua-xg.gif";
    caitiaoMap['[彩条-给力V2]'] = window.D.cdn + "/assets/img/upload/geili-xg.gif";
    caitiaoMap['[彩条-鼓掌V2]'] = window.D.cdn + "/assets/img/upload/guzhang-xg.gif";
    caitiaoMap['[彩条-顶起V2]']= window.D.cdn + "/assets/img/upload/dingqi-xg.gif";
    caitiaoMap['[彩条-点赞V2]'] = window.D.cdn + "/assets/img/upload/dianzan-xg.gif";
    $(".chat-form-caitiao img").click(function(){
        var url = $(this).attr('data-url');
        var id = $(this).attr('data-id');
      
        sendMessage({type:2, message:url ,ctId:id});
    
    })
}
function checkPhone(phonenum){
    var reg = /^13[0-9]{9}$|14[0-9]{9}|15[0-9]{9}|17[0-9]{9}$|18[0-9]{9}$/;
    return reg.test(phonenum);
}
function resizeSiderUl(){
    if($('.sider-userlist').length <= 0) return;
    $('.sider-userlist').height( $(window).height() - $('.sider-userlist').offset().top -3);
}
function initChat(option) {
    $CHAT_MESSAGE = $('#js-chat-message-new-tmpl');
    $QUESTION_MESSAGE = $('#js-question-message-tmpl');
    $CHAT_TIPS_HISTORY = $('#js-chat-tips-history-tmpl');
    $CHAT_USER_ITEM_TMPL = $('#js-chat-user-item-tmpl');
    $CHAT_ROBOT_ITEM_TMPL = $('#js-chat-robot-item-tmpl');
    $CHAT_STATUS_ITEM_TMPL = $('#js-chat-status-tmpl');
    $chatContentDomWrap = $('.chat-wrap-content');
    $chatStatusEventDomWrap = $('#js-chat-status-event');
    $questionContentDomWrap = $('#questionList');
    $sendBtn = $('#js-send-btn');
    $sendTopBtn = $('#js-notice-btn');
    var screenTimer = null;
    $('.chat-wrap-height').mouseover(function(event) {
         $('#js-screen-group').show();
         if(screenTimer){
            clearTimeout(screenTimer);
            screenTimer = null;
         }
    });
    $('.chat-wrap-height').mouseleave(function(event) {
        screenTimer = setTimeout(function(){
            $('#js-screen-group').hide();
        },500);
        
    });
     $('#js-chat-font-btn').click(function(){
        if($(this).hasClass('active')){
            $(this).removeClass('active');
        }
        $(this).addClass('active');
    });
     $(document).click(function(event){
        var $target = $(event.target);
        var id = $target.attr('id');
        if(id != 'js-chat-font-btn' && $target.parents('#js-chat-font-btn').length <=0 && $target.parents('.Font-op').length <= 0){
            $('#js-chat-font-btn').removeClass('active');
        }
    });
    
    $('.chat-font-bold-chose').on('click',function(){
        if( $(this).hasClass('chose') ){
            $(this).removeClass('chose')
        }else{
            $(this).addClass('chose')
        }
    });
    $('.chat-danmu-chose').on('click',function(){
        if( $(this).hasClass('chose') ){
            $(this).removeClass('chose')
        }else{
            $(this).addClass('chose')
        }
    });
    function resizeDanmu() {
        $('.danmu-warp').css('margin-top', $(window).height() / 2 - 20);
        //$('.notice_wrap').width($('.chat-top-history').width() - 60 -20);
        $('.notice_wrap').width($('.main-notice').width() - 60 -15);
    }
    
    $(window).resize(function() {
        resizeDanmu();
        resizeSiderUl();
        resizeTreasure();
    });
    resizeSiderUl();
    resizeDanmu();
    if(window.D.USER.showVipBuy){
        hideVideo();
        showVipDialog();
        return;
    }

    startChatConnect(window.D.chatOption);
    startPrichat();
    startLifeCheck();
    getRoominfos();
    getUserList();
    getRobotList();
    setInterval(function(){
        $('.select-role-robot').remove();
        __robotPage = 1;
        getRobotList();
    },5*60*1000);
    $('#js-more-user').click(function(){
        getRobotList();
        if($('#search-input').length == 0 && $('#js-ul-type-list').length == 0){
            getUserList();
        }
    })
    initNotice();
    initToChat();
    $('#js-send-btn').click(function() {     
        sendMessage();
    });
    $(".js-change-userbase-btn").click(function() {
        sendUserBase($(this))
    })
    $("#idNotifyBtn").click(function() {
        sendNotify()
    })
    $('#js-danmu-btn').click(function() {
        sendDanmu()
    })
    $chatContentDomWrap.scrollHeightChange(function() {
        if (screenLockStatus == 0) {
            $chatContentDomWrap.scrollTop($chatContentDomWrap[0].scrollHeight);
        }
    })
    $('#js-chat-form-input').keydown(function(event) {
        if (event.keyCode == KEY_ENTER && !event.ctrlKey) {
            sendMessage();
            event.preventDefault();
        } else if (event.keyCode == KEY_ENTER && event.ctrlKey) {
            $('#js-chat-form-input').val($('#js-chat-form-input').val() + "\r\n");
        }
    });

    var $chatPicDialog;
    $('body').delegate('.chat-pic', 'click', function() {
        popImg($(this).attr('src'));
    });

    $('#chat-clean-screen-btn').click(function() {
        _messages_count = 0;
        $chatContentDomWrap.empty();
    });

    $('#chat-lock-screen-btn').click(function() {
        if (screenLockStatus == 0) {
            $(this).removeClass("unlock").addClass('lock');
            screenLockStatus = 1;
        } else {
            $(this).removeClass("lock").addClass('unlock');
            screenLockStatus = 0;
        }
    });
    $('#chat-notice-deskTop-btn').click(function() {
        var $icon = $(this).find('.icon');
        if (deskTopNotice) {
            $icon.removeClass('icon-check').addClass('icon-volume-down');
            deskTopNotice = false;
        } else {
            $icon.removeClass('icon-volume-down').addClass('icon-check');
            deskTopNotice = true;
        }
    });

    $('#js-notice-btn').click(function() {
        sendNotice();
    });

    

    initCaiTiao();
    $('#js-chat-faces-btn').click(function(event) {
        alert('emo');
        $(this).sinaEmotion('#js-chat-form-input');
    
        event.stopPropagation();
    });

    if ($("#js-chat-picture-btn").length > 0) {
        $("#js-chat-picture-btn").uploadify({
            height: 22,
            width: 22,
            buttonText: "&nbsp;",
            swf: '/assets/js/uploadify-2.2/uploadify.swf',
            uploader: '/ajaxUpload?dir=chatpic',
            fileTypeDesc: 'Image Files',
            fileSizeLimit: '1024K',
            fileTypeExts: '*.gif; *.jpg; *.png',
            onUploadSuccess: function(file, data, response) {
                data = $.parseJSON(data);
                var text = '[' + data.img + ']';
                addToChatInput(text);
            }
        });
    }


    $('#js-robot-list').change(function() {
        var $this = $(this);
        var val = $this.val();
        if (val == '0') {
            $('#js-chat-question-btn').addClass('icon-question-text').removeClass('icon-question');
        } else {
            $('#js-chat-question-btn').addClass('icon-question').removeClass('icon-question-text');
        }
    });
}
function addToChatInput(text){
    var _input = $('#js-chat-form-input')[0];
    if (document.selection) {
        _input.focus();
        var cr = document.selection.createRange();
        cr.text = text;
        cr.collapse();
        cr.select();
    } else if (_input.selectionStart !== undefined) {
        var start = _input.selectionStart;
        var end = _input.selectionEnd;
        _input.value = _input.value.substring(0, start) + text + _input.value.substring(end,
            _input.value.length);
        _input.selectionStart = _input.selectionEnd = start + text.length;
    } else {
        _input.value += text;
    }
}


var __robotPage = 1;
var __robotGetting = false;
function getRobotList(){
    if (!window.D.showUserlist) {
        return;
    }
    if(__robotGetting){
        return;
    }
    __robotGetting = true;
    $.get('/live/robots?roomId=' + window.D.roomId + "&page=" + __robotPage, function(resp, data) {
        __robotGetting = false;
        $(".user-list").scrollTop(0)
        if(resp.robots){
            $.each(resp.robots, function(n, value) {
                outputRobot(value);
            });
            refreshUserListnum();
            if(resp.robots.length > 0){
                __robotPage ++;
            }
        }
        
        window.__real_robot_num = parseInt(resp.real_robot_num) || 0;
        updateTotal();
    });
}
function getMgrList(){
    if (!window.D.showUserlist) {
        return;
    }

    $.get('/live/userlist?mgr=1&roomId=' + window.D.roomId + "&page=1", function(resp, data) {
        if (resp.code != 0) {
            setTimeout(getUserList, 5000); 
            return
        }
        $.each(resp.list, function(n, value) {
            berforeOutputUser(value);
        });
        refreshUserListnum();
    });
}
var fistNext = 1;
function getUserList() {
    if (!window.D.showUserlist) {
        return;
    }

    $.get('/live/userlist?roomId=' + window.D.roomId + "&page=" + __userPage, function(resp, data) {
        if (resp.code != 0) {
            setTimeout(getUserList, 5000); 
            return
        }
        $.each(resp.list, function(n, value) {
            berforeOutputUser(value);
        });
        refreshUserListnum();
        if (resp.full) {
            __userPage += 1;
            if($('#search-input').length > 0 || $('#js-ul-type-list').length > 0){
                if(fistNext){
                    fistNext = 0;
                    setTimeout(getUserList, 5000);
                }else{
                    setTimeout(getUserList, 300);
                }
            }else{
                getMgrList();
            }
        }
    });
}




var entered__ = 0;
function reconnectChat(options){
    $.get('/live/chatsvr?roomId='+window.D.roomId,function(resp){
        if(resp.chatSvr){
            window.D.chatSvr = resp.chatSvr;
            options.pubKey = resp.pubKey;
            options.subKey = resp.subKey;
        }
        ROP.Enter(window.D.chatSvr,options.pubKey, options.subKey, options.clientId);
    })
}
function startChatConnect(options) {
    $.get('/live/chatsvr?roomId='+window.D.roomId,function(resp){
        if(resp.chatSvr){
            window.D.chatSvr = resp.chatSvr;
            options.pubKey = resp.pubKey;
            options.subKey = resp.subKey;
        }
        ROP.Enter(window.D.chatSvr,options.pubKey, options.subKey, options.clientId);
        if(options.bigRoom || options.mainShowAll){
            ROP.Subscribe("__present__" + options.siteTopic);
        }else{
            ROP.Subscribe("__present__" + options.topic);
        }
        
        if (options.topicAudit) {
            ROP.Subscribe(options.topicAudit);
        }
        if(options.topicMGR){
            ROP.Subscribe(options.topicMGR);
        }
        if (options.guestTopic) {
            ROP.Subscribe(options.guestTopic);
        }
        if(options.topicRealTime){
            ROP.Subscribe(options.topicRealTime);
        }
        ROP.Subscribe(options.topic);
        ROP.Subscribe(options.siteTopic);

        ROP.On('enter_suc', function() {
            console.log('连接成功');
            setTimeout(function() {
                $.post('/live/enter', {roomId:window.D.roomId, plat: window.D.USER.plat,entered:entered__ }, function(resp) {
                    if(resp.code == 404){
                        window.location.href = window.D.HOST;
                        return;
                    }
                });
                if(!entered__){
                    entered__ = 1;
                }
            }, 1000);
        })
        
        var connectold = false;
        ROP.On("connectold", function() {
            connectold = true;
            hideVideo();
            dialog({
                content: "<span style='color:red;font-size:30px;font-weight:bold;'>你的账号在其他的页面打开！</span>",
                backdropOpacity:0.7,
                padding:'15px',
                skin: ' hide-close' ,
                title:"提示",
                cancelDisplay:false,
                cancel:function(){
                    return false;
                },
                onclose:function(){
                }
            }).showModal();
            for(var i in __onConnnectOldCallback){
                try{
                   __onConnnectOldCallback[i](); 
               }catch(err){
                console.log(err);
               }
            }
        })
        ROP.On("reconnect", function() {

        })
        ROP.On('losed', function() {
            if (connectold) return;
            setTimeout(function(){reconnectChat(options);}, 3000);
        })
        ROP.On('enter_fail', function(err) {
            console.log('连接失败', err)
            setTimeout(function(){reconnectChat(options);}, 3000);
        })
        ROP.On('publish_data', function(data, topic) {
            data = eval('(' + data + ')');
            console.log("收到消息：", data, topic);
            if (topic == "__p2p__") {
                onRecvP2p(data);
                return;
            }
            if (data.cmd == "present") {
                if (data.state == 0) {
                    var obj = parseUid(data.clientId);
                    if (obj.uid) {
                        removeUser(obj);
                    }
                } else {
                }
                realUserTotal = data.total;
                updateTotal();
            } else {
                onRecvMsg(topic, data);
            }
        })
    });
}

function onRecvP2p(data) {
    if (data.cmd == "prichat") {
        onPrivateChat(data);
    }
}

function parseUid(clientId) {
    var id = clientId;
    var index = id.indexOf('_');
    if (index == -1) {
        return null;
    }
    id = id.substring(index + 1);
    index = id.indexOf('_');
    if (index == -1) {
        return null;
    }
    return {
        'uid': id.substring(0, index),
        'plat': id.substring(index + 1),
        'clientId': clientId
    };
}

function updateTotal() {
    $('#idUserTotal').html(realUserTotal + __base__ + __base_num__ + __real_robot_num);
    $('#idUserTotal1').html(realUserTotal + __base__ + __base_num__ + __real_robot_num);
    
}
function onFrameReload(){
    var idFrameABC = document.getElementById('idFrameABC');
    if(idFrameABC){
        if(!this.oldUrl){
            this.oldUrl = idFrameABC.src;
        }
        idFrameABC.src=this.oldUrl+"&_t"+new Date().getTime();
    }
}
function onRecvMsg(topic, data) {
    if (data.cmd == "chat") {
        onRecvChat(data);
    } else if(data.cmd == "cmd_reload"){
        window.location.reload();
    }else if(data.cmd == 'cmd_frame_reload'){
        onFrameReload();
    }else if(data.cmd == "goted_vip"){
        if(data.uid == window.D.USER.uid){
            window.location.reload();
        }
        
    } else if (data.cmd == 'del_chat') {
        onRecvDelMessage(data);
    } else if (data.cmd == "audit_chat") {
        onRecvAuditMsg(data);
    } else if (data.cmd == "enter") {
        onRecvUserEnter(data);
    } else if(data.cmd == "child_enter"){
        if(data.entered != 1){
            var dataObj = {
                time: getTimeFormat(data.time * 1000),
                name: data.user.name,
                type:data.user.type
            }
            outputUserState(dataObj);
        }
       
    }else if(data.cmd == "child_leave"){
        var dataObj = {
            time: getTimeFormat(data.time * 1000),
            name: data.user.name,
            type:data.user.type
        }
        outputUserState(dataObj,1);
        
    } else if(data.cmd == "leave"){
        onRecvUserLeave(data);
    }else if (data.cmd == "refreshVideo") {
        if(data.roomId){
            doRefreshVideo(data);
        }else{
            if(!__alone_video__){
                doRefreshVideo(data);
            }
        }     
    } else if(data.cmd == "lookVideo"){
         if (data.uid == window.D.USER.uid) {
            window.D.USER.lookvideo = data.lookvideo;
            if(window.D.USER.lookvideo){
                refreshVideo();
            }else{
                hideVideo();
            }
        }
    } else if (data.cmd == "killYou") {
        if (data.uid == window.D.USER.uid) {
            hideVideo();
            window.location.reload();
        } else {
            if (data.roomId == window.D.roomId && data.show) {
                outputSystemMessage(data.srcName + "被" + data.name + "请出房间", data.time, 14);
            }
        }
    } else if (data.cmd == "killIp") {
        if (data.uid == window.D.USER.uid) {
            hideVideo();
            window.location.reload();
        } else {
            if (data.roomId == window.D.roomId && data.show) {
                outputSystemMessage(data.srcName + "被" + data.name + "封杀IP", data.time, 14);
            }
        }
    } else if (data.cmd == "teacherChange") {
        onTeacherChange(data);
    }else if (data.cmd == "teacherEmpty") {
        onTeacherEmpty(data);
    } else if (data.cmd == "notice_msg") {
        var msg = "<span>" + data.msg + "</span>";
        var $dom = $(msg).parseEmotion();
        $('#js_notice_msg').empty().append($dom);
    } else if (data.cmd == "danmu_msg") {
        runDanmu(data);
    } else if (data.cmd == "base_user") {
        var tmp = parseInt(data.base_user);
        if (isNaN(tmp)) {
            return;
        }
        __base_num__ = tmp;
        updateTotal();
    } else if (data.cmd == "notify_msgs") {
        $('#chat_tz_msg').html(data.msg);
    } else if (data.cmd == "robot_num") {
        var tmp = parseInt(data.robot_num);
        if (isNaN(tmp)) {
            return;
        }
        __base__ = tmp;
        updateTotal();
    } else if (data.cmd == "cmd_sshd") {
        onRecvHd(data)
    } else if(data.cmd == "sendLuckMoney"){
        onRecvLuckMoney(data);
    }else if(data.cmd == "gotLuckMoney"){
        if(data.user.uid == window.D.USER.uid){
            outputSystemMessage("恭喜 您 抢到 " + data.fromName + " 的红包（￥"+data.money+"）", data.time, 14);
        }else{
            outputSystemMessage("恭喜 "+data.user.name + " 抢到 " + data.fromName + " 的红包（￥"+data.money+"）", data.time, 14);
        }
        if(data.left_num == 0){
            if(data.fromUid == window.D.USER.uid){
                outputSystemMessage("您发的红包已被抢完！", data.time,14);
            }else{
                outputSystemMessage(data.fromName + "的红包已被领完！",data.time, 14);
            }
        }
    }else if(data.cmd == "cmd_past"){
        if(data.uid == window.D.USER.uid){
            if(data.num > 0){
                outputSystemMessage("恭喜你签到成功！"+"连续签到"+data.num+"天！", data.time);
            }else{
                outputSystemMessage("恭喜你签到成功！", data.time);
            }
            
         }else{
            outputSystemMessage("恭喜"+data.name+"签到成功！", data.time);
         }
    }else if(data.cmd == "cmd_giftv2"){
        onRecvGiftV2(data);
    }else if(data.cmd == "cmd_hot_send"){
        onRecvHot(data);
    }else if(data.cmd == "cmd_hot_item"){
        onRecvHotItem(data);
    }else if(data.cmd == "cmd_team_item"){
        onRecvTeamItem(data);
    }else if(data.cmd == "cmd_tp_send"){
        window.__onRecvTp(data.data);
    }else if(data.cmd == "cmd_fortune"){
        if(window.frames.fortuneDialog.contentWindow.onRecvMsg){
            window.frames.fortuneDialog.contentWindow.onRecvMsg(data);
        }
    }else if(data.cmd == "vip_sutaus"){
        onRecvVip(data);
    }else{
        console.log('unknow msg', data, data.cmd);
    }

}

function showVipDialog(){
    window.D.USER.showVipBuy = 1;
    var url = '/pay/viplist';
    $.get('/pay/viplist',function(resp){
        dialog({
            content: resp,
            backdropOpacity:0.8,
            drag:true,
            padding:'0px',
            title:"私聊",
            skin:"notitle-dialog hide-close",
            cancelDisplay:false,
            cancel:function(){
                return false;
            }
        }).showModal();
        $('.freegot').click(function(){
            $.post("/pay/freevip",{id:$(this).data('id')},function(resp){
                if(resp.code == 0){
                    alert(resp.msg);
                    window.location.reload();
                }else{
                    window.dialog({title:"提示",content:resp.msg,quickClose: true}).show();
                }
            });
        });
        var sending = 0;
        $('.vip-pay-btn').click(function(event){
            if(sending){
                return;
            }
            sending = 1;
            var $this = $(this);
            var id = $this.data('id');
            var payType = $this.data('type');
            var name =  $this.data('name');
            setTimeout(function(){
                sending = 0;
            },3000);
            var payTypeCn = payType=="wechat"?"微信":"支付宝"
            $.post('/pay/vip',{payType:payType,id:id},function(resp){
                sending = 0;
                if(resp.code == 0){
                    window.showEwmDlg(name+"--请使用"+payTypeCn+"扫一扫",resp.qrcode);
                    checkOrder(resp.orderId);
                }else{
                    window.dialog({title:"提示",content:resp.msg,quickClose: true}).show();
                }
            })
        });
        function checkOrder(orderId){
            var timer = setInterval(function(){
                $.get('/pay/checkorder?orderId='+orderId,function(resp){
                    if(resp.status == 1){
                        alert("支付成功");
                        window.location.reload();
                    }else if(resp.status == 2){
                        alert("支付失败");
                        clearInterval(timer);
                    }
                })
            },3000);
        }
});
    /*setInterval(function(){
        $.get('/isVipClose?roomId='+window.D.roomId,function(resp){
            if(resp.vip_status == 0){
                window.location.reload();
            }
        })
    },5000);*/
}
function onRecvVip(data){
    if(data.vip_status == 1){
        if(!window.D.USER.logined){
            window.location.reload();
            return;
        }
        if(window.D.USER.vipLimitTs < data.time){
            showVipDialog();
            hideVideo();
            ROP.Leave();
            for(var i in __onConnnectOldCallback){
                try{
                   __onConnnectOldCallback[i](); 
               }catch(err){
                console.log(err);
               }
            }
        }
    }
}
function onRecvTeamItem(data){
    var find = 0;
    for(var i in window.D.TEAM.teams){
        if( window.D.TEAM.teams[i].id == data.team.id ){
            window.D.TEAM.teams[i] = data.team;
            find = 1;
            break;
        }
    }
    if(!find){
        window.D.TEAM.teams.push(data.team);
    }
    window.__renderTeam(window.D.TEAM);
}
function onRecvHotItem(data){
    if(data.isMain){
        var find = 0;
        for(var i in window.D.HOT.mainTeachers){
            if( window.D.HOT.mainTeachers[i].id == data.teacher.id ){
                window.D.HOT.mainTeachers[i] = data.teacher;
                find = 1;
                break;
            }
        }
        if(!find){
            window.D.HOT.mainTeachers.push(data.teacher);
        }
    }else{
        var find = 0;
        for(var i in window.D.HOT.teachers){
            if( window.D.HOT.teachers[i].id == data.teacher.id ){
                window.D.HOT.teachers[i] = data.teacher;
                find = 1;
                break;
            }
        }
        if(!find){
            window.D.HOT.teachers.push(data.teacher);
        }
    }
    window.__renderHot(window.D.HOT);
}
function onRecvHot(data){
    window.D.HOT.teachers = data.teachers;
    window.D.HOT.mainTeachers = data.mainTeachers;
    window.__renderHot(window.D.HOT);
}

function onRecvLuckMoney(data){
    $dom = $('#js-recv-luckmoney-tmpl').render(data);
    $chatContentDomWrap.append($dom);
}
function onRecvHd(data) {
    if (this._publishbuyadviceDialog) this._publishbuyadviceDialog.remove();
    $('#suggestion-tab-1 .suggestion-table').prepend($("#js-manual-tmpl").render(data));
    this._publishbuyadviceDialog = dialog({
        content: $('#js-publishbuyadvice-tmpl').render(data),
        backdropOpacity:0.3,
        quickClose:true,
        padding:'0px',
        title:"实时建议"
    });
    this._publishbuyadviceDialog.showModal();

}

function onTeacherChange(data) {
    var teacherName =  window.D.teacher_pre + data.teacher.name;
    $('#idTeacherName').html(teacherName);
    $("#idVideoTeacherList li").removeClass('active');
    if(window.D.videoShowed){
        $('#idCurTeacher'+data.teacher.uid).addClass('active');
    }
    
   // var html = $('#idCurTeacher'+data.teacher.uid);
   // $('#idCurTeacher'+data.teacher.uid).remove();
   // $("#idVideoTeacherList").prepend( html );
    $('[data-hover="dropdown"]').dropdownHover();
    $('#js-chat-mgr-list').find('.cur-teacher').remove();
    $('#js-chat-mgr-list').append('<option class="cur-teacher" value="' + data.teacher.uid + '" data-usertype="400"  data-name="' + data.teacher.name + '">' + data.teacher.name + '</option>')
}
function onTeacherEmpty(data){
    var teacherName =  window.D.teacher_pre  + "无";
    $("#idVideoTeacherList li").removeClass('active');
    $('#idTeacherName').html(teacherName);
    $('#js-chat-mgr-list').find('.cur-teacher').remove();
}
function refreshVideo(){
    $.get('/live/liveinfo?roomId='+window.D.roomId,function(data,text){
        doRefreshVideo(data);
    });
 }
 function doRefreshVideo(data){
    if(window.D.hideVideoAllTimes){
        return;
    }
    __alone_video__ = data.alone_video;
    if(data.live_state){
        showVideo(data);
    }else{
        hideVideo();
    }
 }
__alone_video__ = 0;
function showVideo(data){
    if(!data.live_state)
        return;
    if(!window.D.USER.lookvideo){
        hideVideo();
        return;
    }
    window.D.videoShowed = 1;
    if(data.alone_video){
        $('#idLessonV2').hide();
        $('#idTeacherName').hide();
        $('#idTeacherName').parent().removeClass('active');
        $('#js-start-video').hide();
        $("#idVideoTeacherList").hide();
    }else{
        $('#idVideoTeacherList').show();
        $('#js-start-video').show();
        $('#idTeacherName').show();
        $('#idLessonV2').show();
        $('#idTeacherName').parent().addClass('active');
    }
    if(data.teacherUid){
        onTeacherChange({teacher:{uid:data.teacherUid,name:data.teacherName}})
    }else{
        onTeacherEmpty();
    }
    
    $('#js-video-player-wrap').css('background-image','none');
    $('#js-refash-video').show();
    $('#js-start-video').addClass('closevideo').removeClass('openvideo');
    $('#js-start-video').attr('data-state',1);
    if(!__checked_video_pwd__){
        $('#js-video-player-pwd').show();
        if( $("#js-video-player-pwd").length <= 0 ){
            pushVideoOnline(data);
        }else{
            $('#js-refash-video').hide();
        }
    }else{
        $('#js-video-player-pwd').hide();
        pushVideoOnline(data);
    }
}

function hideVideo(){
    $('#idTeacherName').hide();
    $('#idTeacherName').parent().removeClass('active');
    $('#js-refash-video').hide();
    $("#idVideoTeacherList li").removeClass('active');
    window.D.videoShowed =  0;
    if(!window.D.USER.lookvideo){
        $('#js-video-player-wrap').css('background-image','url('+window.D.lookVideoImg+')');
    }else{
        $('#js-video-player-wrap').css('background-image','url('+window.D.videoBgImg+')');
    }
    $('#js-video-player-pwd').hide();
    $('#js-video-player-wrap').css('background-size','100% 100%');
    $('#js-start-video').addClass('openvideo').removeClass('closevideo');
    $('#js-start-video').attr('data-state',0);
    pushVideoffline();
}

function onRecvDelMessage(data) {
    var $cm = $('#js-chat-messages-' + data.id);
    _messages_count -= $cm.length;
    $cm.remove();
}

var _state_msg_count = 0;
function outputUserState(dataObj,isLeave){
    _state_msg_count++
    if(isLeave){
        $chatStatusEventDomWrap.append($("#js-chat-status-leave-tmpl").render(dataObj));
    }else{
        $chatStatusEventDomWrap.append($CHAT_STATUS_ITEM_TMPL.render(dataObj));
    }
    if (_state_msg_count >= 100) {
        $chatStatusEventDomWrap.find(':first').remove();
    }
    if($("#tab-content-dynamic").length > 0)
        $("#tab-content-dynamic").scrollTop($("#tab-content-dynamic")[0].scrollHeight + 20);
    
}
function onRecvUserEnter(data) {
    outputUser(data.user);
    if(data.entered == 1){
        return;
    }
    var dataObj = {
        time: getTimeFormat(data.time * 1000),
        name: data.user.name,
        type:data.user.type
    }
    outputUserState(dataObj);
    if(!data.user.role.f_privatechat && window.D.USER.role.f_privatechat && window.D.USER.type == 500){
            var mySelf = true;
            $('.select-role-500').each(function(n, value) {
                if($(value).attr('id') < window.D.uid){
                    mySelf = false;
                }
            });
            if(mySelf){
                var toUid = data.user.uid;
                var toName = data.user.name;
                var jsonObject = {toUid: toUid};
                $.post('/chat/prichatdef/'+window.D.roomId,jsonObject, function(data){
                }); 
            }
    }
}
function onRecvUserLeave(data){
    var dataObj = {
        time: getTimeFormat(data.time * 1000),
        name: data.user.name,
        type:data.user.type
    }
    outputUserState(dataObj,1);
    if(data.user.type == 500){
        $('#js-chat-mgr-list').find('.mgr-option-'+data.user.uid).remove();
    }
}

//消息
function onRecvChat(data) {
    if (data.sendUid != window.D.USER.uid || data.plat != 'pc') {
        if (data.uid == window.D.USER.uid) {
            data.meClass = 'chat-me';
        }
        if (data.hasFilter && !window.D.USER.isManager) {
            return;
        }

        if (data.hasFilter) {
            replaceDom = null;
            needRemove = false;
        } else {
            var replaceDom = $('#js-chat-messages-' + data.id);
            var needRemove = true;
            if (replaceDom.length <= 0) {
                needRemove = false;
               /* var children = $chatContentDomWrap.children();
                var noTimeDom = null;
                for (var i = children.length - 1; i >= 0; i--) {
                    var item = $(children[i]);
                    var curId = parseInt(item.attr('data-msgid'));
                    if (isNaN(curId)) {
                        if (!noTimeDom)
                            noTimeDom = item;
                        continue;
                    }
                    if (curId <= data.id) {
                        replaceDom = noTimeDom || item;
                        break;
                    } else {
                        noTimeDom = null;
                    }
                }*/
            }
            if (!needRemove) {
                _messages_count++;
            }
        }

        outputChatMessage($CHAT_MESSAGE.render(data), true, replaceDom, needRemove);
    }
}
//审核消息
function onRecvAuditMsg(data) {
    if (data.sendUid == window.D.USER.uid && data.plat == 'pc') {
        return;
    }
    if (!window.D.USER.role.f_audit_boardcast) {
        if (data.send_roomid != window.D.roomId) {
            return;
        }
    }
    outputChatMessage($CHAT_MESSAGE.render(data), true);
}
//私聊消息
function onPrivateChat(data) {
    if ((typeof window.frames.privateChatDialog) == 'undefined') {
        var url = '/chat/prichat/' + window.D.roomId + '?_t=' + (new Date()).getTime() + '&toUid=' + encodeURIComponent(data.uid) + '&message=' + encodeURIComponent(data.message || "");
        var iframeHtml = '<iframe id="privateChatDialog" src="'+url+'" width="700" height="500"></iframe>';
        dialog({
            content: iframeHtml,
            backdropOpacity:0.1,
            height:500,
            drag:true,
            padding:'0px',
            title:"私聊",
            skin:"notitle-dialog",
        }).showModal();
        var timer = setInterval(function(){
            if(window.frames.privateChatDialog && window.frames.privateChatDialog.contentWindow.onPrivateChatEvent){
                window.frames.privateChatDialog.contentWindow.onPrivateChatEvent(data);
                clearInterval(timer);
            }
            
        },100);
    } else {
        window.frames.privateChatDialog.contentWindow.onPrivateChatEvent(data);
    }
}

function isChatWaiting($sendBtn) {
    if (!_chatInterval) {
        var _count = window.D.USER.chatIntervalCount;
        $sendBtn.text(_count).addClass('waiting');
        _chatInterval = setInterval(function() {
            _count = _count - 1;
            if (_count > 0) {
                $sendBtn.text(_count);
            } else {
                $sendBtn.text("");
                $sendBtn.removeClass('waiting');
                clearInterval(_chatInterval);
                _chatInterval = null;
            }
        }, 1000);
        return false;
    } else {
        return true;
    }
}

function sendNotify() {
    var $chatInput = $('#idNotifyInput');
    var message = $.trim($chatInput.val());
    if (message.length > 0) {
        $chatInput.val('');
        $.post('/chat/notify/' + window.D.roomId, { msg: message }, function(text, status) {});
    }
}

function sendNotice() {
    var $chatInput = $('#js-chat-form-input');
    var message = $.trim($chatInput.val());
    $chatInput.focus();
    if (message.length > 0) {
        $chatInput.val('');
        $.post('/chat/notice/' + window.D.roomId, { msg: message }, function(text, status) {});
    }
}

function sendDanmu() {
    var $chatInput = $('#js-chat-form-input');
    var message = $.trim($chatInput.val());
    $chatInput.focus();
    if (message.length > 0) {
        var fontColor = $('#js-chat-color-btn').attr("data-color");
        $chatInput.val('');
        $.post('/chat/danmu/' + window.D.roomId, { msg: message, font_color: fontColor }, function(text, status) {});
    }
}

function sendUserBase($self) {
    var num = $self.parent().parent().find('.js-change-userbase-input').val();
    num = parseInt(num);
    if (isNaN(num) || num < 0) return;
    $.post('/live/userbase', { roomId:window.D.roomId,num: num }, function(text, status) {});
}

function getRoominfos() {
    $.get('/live/roominfos?roomId=' + window.D.roomId, function(resp, text) {
        if(resp.code == 404){
            window.location.href = window.D.HOST;
            return;
        }
        if (resp && resp.chatList) {
            resp.chatList.reverse();
            $.each(resp.chatList, function(n, value) {
                if(value.isLuckMoney){
                    $dom = $('#js-recv-luckmoney-tmpl').render(value);
                    $chatContentDomWrap.append($dom);
                    return;
                }
                if (value.uid == window.D.USER.uid) {
                    value.meClass = 'chat-me';
                }
                outputChatMessage($CHAT_MESSAGE.render(value), false);
            });
            if(resp.chatList.length > 0){
                $('.chat-wrap-content').append($CHAT_TIPS_HISTORY.render({}));
            }
            _messages_count = resp.chatList.length;
        }
        if (window.D.dynamicMsg)
            outputSystemMessage(window.D.dynamicMsg);
        
        if(resp && resp.teamName){
            __teamName__ = resp.teamName;
        }
        
        if (resp && resp.files) {
            $.each(resp.files, function(n, value) {
                $('#idFileWarp').append($("#js-file-tmpl").render(value));
            })
        }
 
        if (resp && resp.teachers) {
            $.each(resp.teachers, function(n, value) {
                $('#idTeachersWarp').append($("#js-start-lesson-tmpl").render(value));
            })
            $('.js-teacher-list').click(function() {
                $.post('/live/startlesson?roomId=' + window.D.roomId, { uid: $(this).data('id') }, function() {});
            })
        }
        if (resp && resp.myRobots) {
            $.each(resp.myRobots, function(n, value) {
                $('#js-robot-list').append($("#js-my-robot-tmpl").render(value));
            })
        }
        
        if (resp) {
            window.__base__ = parseInt(resp.robot_num) || 0;
            window.__real_robot_num = parseInt(resp.real_robot_num) || 0;
            updateTotal();
        }
        if(resp && resp.giftV2s){
            outputGiftV2(resp.giftV2s);
        }
        if(resp.lxpast_df > 0){
            if(resp && resp.prePast != null){
                window.D.prePast = resp.prePast;
                checkNextPast(resp.lxpast_df);
            }
        }else{
            if(resp && resp.pasted == 0){
                $('#idUserPastRed').show();
            }
        }
        
        if(resp && resp.treasureData){
            initTreasure(resp.treasureData);
        }
        if(resp && resp.hotTeachers){
            window.D.HOT = {
                sortAsc:resp.hotSortAsc,
                teachers:resp.hotTeachers,
                mainTeachers:resp.mainTeachers,
                ztMap:resp.ztMap,
            };
            window.__renderHot(window.D.HOT);
        }
        if(resp && resp.teams){
            window.D.TEAM = {
                teams:resp.teams,
                teamId:resp.teamId,
            };
            window.__renderTeam(window.D.TEAM);
        }
        if(resp && resp.arena){
            window.__renderArena(resp.arena);
        }
        if(resp && resp.teacherShowList){
            $('#idVideoTeacherList').html($('#js-video-teacherlist-tmpl').render({teacherShowList:resp.teacherShowList}));
            if( $('#idSiderTeacherList').length > 0 )
                $('#idSiderTeacherList').html($('#js-sider-teacher-list-tmpl').render({list:resp.teacherShowList}));
        }
        if(resp &&  resp.bbsTopicList){
            $('#idBBSList').html($('#js-bbs-list-tmpl').render({list:resp.bbsTopicList}))
        }
        $('[data-hover="dropdown"]').dropdownHover();
        doRefreshVideo(resp.liveInfo);
        resizeSiderUl();
        resizeVideo();
    });
}

function delegateArticle() {
    $('.option-list .media-summay img').attr("title", "点击查看原图");
    $('.js-article-reader-btn').click(function() {
        var $this = $(this);
        id = $this.data('id'),
            isExpend = $this.data('display');

        if (isExpend == 'expend') {
            $this.parents('.media').removeClass('active');
            $this.data("display", "collapse");
        } else {
            $this.parents('.media').addClass('active');
            var $readerNum = $this.parents('.media').find('.js-article-reader-num');
            var readerNum = parseInt($readerNum.text());
            $readerNum.text(readerNum + 1);
            $this.data("display", "expend");
            $.post('/live/article/' + window.D.roomId + '?id=' + id,{},function(text, status){
                if(text && text.count){
                    $readerNum.text(text.count);
                }
            });
        }
    });
    //图片放大
    var $chatPicDialog;
    $('.option-list .media-summay').delegate('img', 'click', function() {
        popImg($(this).attr('src'))
    });
}

function sendMessage(options) {

    var $chatInput = $('#js-chat-form-input');
    var message = $.trim($chatInput.val());
    if(options && options.message){
        message = options.message;
    }
    if (message.length <= 0) {
        return;
    }
    $chatInput.focus();
    if (isChatWaiting($sendBtn)) {
        return;
    }
    
    if(message.length > window.D.chatLen){
        dialog({title:"提示",
            content:"超出发送字数限制，最多"+window.D.chatLen+"个",
            quickClose: true,
            button: [{
                value: '我知道啦',
                callback: function () {
                    return true;
                }
            }]
        }).show();
        return;
    }

    var avatar = window.D.USER.pic;
    var userType = window.D.USER.type;
    var userId = window.D.USER.uid;
    var userName = window.D.USER.name;
    var meClass = 'chat-me';
    var isRobot = false;
    var toUid = $('#js-chat-to-user').attr('data-uid');
    var toName = $('#js-chat-to-user').html();
    var toUserType = $('#js-chat-to-user').attr('data-usertype');
    var fontColor = $('#js-chat-color-btn').attr("data-color");
    var fontWeight =$('.chat-font-bold-chose').hasClass('chose')?1:0;
    var sizeOption = $('#js-font-size-list').find("option:selected");
    if (sizeOption.length > 0) {
        var size = sizeOption.data('size');
    }
    if (!options) {
        options = {};
    }
    var robotList = $('#js-robot-list option')
    robotList.splice(0,1);
    var curTeamName = __teamName__;
    //check robot
    if($('#js-robot-num').val() > 0 && robotList.length > 0){
        isRobot = true;
        meClass = '';
        var preRelay = 0;
        for(var i = 0 ;i<$('#js-robot-num').val();i++){
            if(robotList.length <= 0){return;}
            var index = Math.floor(Math.random()*robotList.length);
            var robotOption = $( robotList[index]);
            robotList.splice(index,1);
            avatar = robotOption.data('avatar');
            userType = robotOption.data('type');
            userId = robotOption.data('uid');
            curTeamName = robotOption.data("team");
            userName = robotOption.html();
            if(i==0){
                realSend(0);
            }else{
                preRelay +=500;
                realSend(preRelay);
            }
            
        }
    }else{
        if ($('#js-robot-list').val() != 0 && robotList.length > 0) {
            isRobot = true;
            meClass = '';
            var robotOption = $('#js-robot-list').find("option:selected");
            avatar = robotOption.data('avatar');
            userType = robotOption.data('type');
            userId = robotOption.data('uid');
            curTeamName = robotOption.data("team");
            userName = $('#js-robot-list').val();
        }
        realSend(0);
    }
    
    
    function realSend(relay){
        $chatInput.val('');
        var messageData = {
            type: options.type || 1,
            message: message,
            // font_size: size,
            // font_color: fontColor,
            // font_weight: fontWeight,
            toUid: 'toUid',
            plat: 'pc',
            ctId:options.ctId,
        };
        
        // if(messageData.ctId){
        //     delete messageData.message;
        // }
        if (isRobot) {
            messageData.robotId = userId;
            if (toUid == userId) {
                toUid = null;
                toName = null;
            }
            delete messageData['font_size'];
            delete messageData['font_color'];
            delete messageData['font_weight'];
        }
        var data = {            
            uid: userId,
            name: userName,
            avatar: avatar,
            font_size: size,
            font_color: fontColor,
            font_weight: fontWeight,
            meClass: meClass,
            message: message,
            type: options.type || 1,
            userType: userType,
            to_uid: toUid,
            to_name: toName,
            to_userType:toUserType,
            selfShow: true,
            room_id: window.D.roomId,
            time: getTimeFormat(),
            team_name:curTeamName,
            send_roomid:window.D.roomId,
        }
       
        if (isRobot) {
            delete data['font_size'];
            delete data['font_color'];
            delete data['font_weight'];
        }
        if(relay == 0){
            
            doSend(messageData,data);

        }else{
            console.log(relay);
            setTimeout(function(){
                doSend(messageData,data);
            },relay);
        }
        
    }
    function  doSend(messageData,data){
        //alert(messageData.message);
        var id = window.D.USER.uid + '_' + new Date().getTime() + '_id';
        $.post('/livevideo/chat/send', messageData, function(message, status) {
		//alert(JSON.parse(text));
            //var message = JSON.parse(text);
            if (message.type =="1"){
                var addcontent='<div class="chat-message-new   chat-message-type-1 clearfix" data-time="09:31" data-msgid="132136983" id="js-chat-messages-132136983">'+
                '<div class="chat-header">'+
                '<span class="chat-name-bg">'+
                '<span class="chat-role-4"></span>'+
                '<span data-uid="11642897" data-name='+ message.user_id +'data-usertype="4" class="chat-name js-chat-select-name">'+ message.user_id+' </span>'+
                '<span class="chat-time">'+new Date().getFullYear()+'-'+new Date().getMonth()+'-'+new Date().getDate() +'   '+new Date().getHours()+':'+new Date().getMinutes() +'</span>'+
                '</span>'+
                '<div class="chat-op">'+
                '<!--可以看自己房间的用户信息-->'+
                '<a class="chat-message-look-btn rolebtn look" data-uid="11642897"></a>'+
                '<a class=" rolebtn del chat-message-delete-btn" data-id="132136983"></a>'+
                '</div>'+
                '</div>'+
                '<div class="dot-top"></div>'+
                '<div class="chat-body ">'+
                '<span class="chat-content" style="  ">'+
                '<!-- <img class="chat-pic" title="点击查看原图" src="http://res.wufangsoft.com/wolf/upload/admin/CFvveUEZEipLjyFbfGUbMCTER.gif" style="max-mwidth: 100%; max-height: 320px;"/> -->'+
                message.message +
                '</span>'+
                '<span class="chat-plat">来自:'+ message.platform+'</span>'+
                '</div>'+
                '</div>';
            }else{
                var addcontent='<div class="chat-message-new   chat-message-type-1 clearfix" data-time="09:31" data-msgid="132136983" id="js-chat-messages-132136983">'+
                '<div class="chat-header">'+
                '<span class="chat-name-bg">'+
                '<span class="chat-role-4"></span>'+
                '<span data-uid="11642897" data-name='+ message.user_id +'data-usertype="4" class="chat-name js-chat-select-name">'+ message.user_id+' </span>'+
                '<span class="chat-time">'+new Date().getFullYear()+'-'+new Date().getMonth()+'-'+new Date().getDate() +'   '+new Date().getHours()+':'+new Date().getMinutes() +'</span>'+
                '</span>'+
                '<div class="chat-op">'+
                '<!--可以看自己房间的用户信息-->'+
                '<a class="chat-message-look-btn rolebtn look" data-uid="11642897"></a>'+
                '<a class=" rolebtn del chat-message-delete-btn" data-id="132136983"></a>'+
                '</div>'+
                '</div>'+
                '<div class="dot-top"></div>'+
                '<div class="chat-body ">'+
                '<span class="chat-content" style="  ">'+
                ' <img class="chat-pic" title="点击查看原图" src='+ message.message +' style="max-mwidth: 100%; max-height: 320px;"/>'+
              
                '</span>'+
                '<span class="chat-plat">来自:'+ message.platform+'</span>'+
                '</div>'+
                '</div>';
            }
            $chatContentDomWrap.append(addcontent);
        });
        data.id = id;
       
        outputChatMessage($CHAT_MESSAGE.render(data), true)
    }
}
function outputSystemMessage(msg, time, font_size, font_color) {
    if (!time) time = getTimeFormat();
    $dom = $('#js-chat-system-tmpl').render({ text: msg, time: time, font_size: font_size, font_color: font_color });
    $chatContentDomWrap.append($dom);
}
function outputRobot(robot) {
    var oldHave = $('#robot_user_' + robot.uid);
    if(oldHave.length > 0){
        return;
    }
    $USER_LIST_WARP.append($CHAT_ROBOT_ITEM_TMPL.render(robot));
    checkUserVisiable($('#robot_user_' + robot.uid),robot.name);
}
var $USER_LIST_WARP = $('#idUserList');
var $LAST_TOP_USER = null;
function berforeOutputUser(user){
    if(user.type == 500){
        $('#js-chat-mgr-list').find('.mgr-option-'+user.uid).remove();
        $('#js-chat-mgr-list').append($("#js-mgr-tochat-tmpl").render(user));
    }
    var oldHave =$('#user_' + user.uid + "_" + user.plat);
    if(oldHave.length > 0){
        return false;
    }
    var renderUser = $CHAT_USER_ITEM_TMPL.render(user);
    if(user.role.f_privatechat || user.type == 500){
        $USER_LIST_WARP.prepend(renderUser);
        if(!$LAST_TOP_USER){
            $LAST_TOP_USER = $('#user_' + user.uid + "_" + user.plat);
        }
    }else if(user.type == 1000){
        $USER_LIST_WARP.append(renderUser);
    }else{
        if($LAST_TOP_USER){
            $LAST_TOP_USER.after(renderUser);
        }else{
            $USER_LIST_WARP.prepend(renderUser);
        }
    }
    checkUserVisiable($('#user_' + user.uid + "_" + user.plat),user.name);
    return true;
}
function checkUserVisiable($userItem,userName){
    var currentClass = null;
    if (__currentULTyleClass && __currentULTyleClass != "all") {
        currentClass = 'select-role-' + __currentULTyleClass;
    }
    var putvalue = $("#search-input").val()
    var num = $('#search-num').html();
    if(currentClass && !$userItem.hasClass(currentClass)){
        $userItem.hide();
    }else if( putvalue ){
        if(userName.toLowerCase().indexOf(putvalue.toLowerCase()) == -1){
            $userItem.hide();
        }else{
            var num = parseInt( $('#search-num').html() );
            num = num?num:0;
            num+=1;
            if(num > 0){
                $('#search-num').show();
                $('#search-num').html(num);
            }else{
                $('#search-num').hide();
            }
        }
        
    }
}
function removeUser(obj){
    var $itemUser = $('#user_' + obj.uid + "_" + obj.plat)
    $('#js-chat-mgr-list').find('.mgr-option-'+obj.uid).remove();
    if($LAST_TOP_USER && $LAST_TOP_USER.attr('id') == $itemUser.attr('id')){
        $LAST_TOP_USER = null;
    }
    if($itemUser.is(":visible") && $('#search-num').is(":visible")){
        var num = parseInt( $('#search-num').html() );
        num = num?num:0;
        num-=1;
        if(num > 0){
            $('#search-num').show();
            $('#search-num').html(num);
        }else{
            num = 0;
            $('#search-num').hide();
            $('#search-num').html(num);
        }
    }
    $itemUser.remove();
    refreshUserListnum();
}
function outputUser(user) {
    if( berforeOutputUser(user) ){
        refreshUserListnum();
    }
}

function outputChatMessage(message, isRealTime, $replaceDom, needRemove) {
    if(message.length < 20){
        return;
    }
    //alert(message);
    var $dom = $(message).parseEmotion();
    var $txt = $dom.find('.chat-content');
    if($txt && $txt.length > 0 && $txt.html() ){
        $txt.html( $txt.html().replace(/\n/g,"<br>") );
    }
    if ($replaceDom && $replaceDom.length > 0) {
        $replaceDom.after($dom);
        if (needRemove) $replaceDom.remove();
    } else {
        $chatContentDomWrap.append($dom);
    }

    if (_messages_count > MAX_MESSAGES_COUNT) {
        _messages_count = MAX_MESSAGES_COUNT;
        $chatContentDomWrap.find(':first').remove();
    }
    if (screenLockStatus == 0) {
        $chatContentDomWrap.scrollTop($chatContentDomWrap[0].scrollHeight);
    }
}


function startPopVisit() {
    
    function chronograph(time) {
        var note = $('#note'),
            ts = new Date(2016, 0, 1),
            newYear = true;
        if ((new Date()) > ts) {
            ts = (new Date()).getTime() + time;
            newYear = false;
        }
        $('#countdown').empty();
        $('#countdown').mycountdown({
            timestamp: ts,
            callback: function(days, hours, minutes, seconds) {}
        });
        setTimeout(function() {
            showLoginDialog(function(){
                 if(window.D.popType == 2){
                    refreshVideo();
                    chronograph(timeNum);
                    return true;
                }
            },window.D.popType == 1);
            hideVideo();
            if(window.D.popType == 1){
                ROP.Leave();
                window.D.hideVideoAllTimes = 1;
            }
            Setcookie("ws_visitors_remind", -1, 30 * 24 * 60 * 60 * 1000);
        }, time);
    }
    var visitorsNum = 0;
    if(window.D.popType == 1){
        visitorsNum = getCookie("ws_visitors_remind");
        if (visitorsNum == -1 || window.D.loginPopTs == 0) {
            chronograph(0);
            return;
        }
    }
    
    var timeNum = window.D.loginPopTs;
    if(visitorsNum > 0 && parseInt(visitorsNum * 1000) < parseInt(timeNum)){
        timeNum = parseInt(visitorsNum*1000);
    }
    chronograph(timeNum);
    if(window.D.popType == 1){
        var leftSecond = timeNum / 1000;
        var interTimer = setInterval(function() {
            leftSecond--;
            if (leftSecond < 0) {
                clearInterval(interTimer);
            }
        }, 1000);
        window.onbeforeunload = function() {
            if (visitorsNum != -1) {
                Setcookie("ws_visitors_remind", leftSecond, 30 *24 * 60 * 60 * 1000);
            }
        }
    }

   
}
function checkNextPast(df){
    if( this.__timer != null ){
        clearTimeout(this.__timer);
        this.__timer = null;
    }
    var nextPast = window.D.prePast + df*60;
    var now = parseInt(new Date().getTime()/1000);
    var dfTime = nextPast - now;
    if(dfTime <=0 ){
        $('#idUserPastRed').show();
        return;
    }
    $('#idUserPastRed').hide();
    this.__timer = setTimeout(checkNextPast,dfTime*1000,df);
}
function initPast(){
    var pastClicked = 0;
    $("#js-user-past").click(function(){
        if(pastClicked){
            return;
        }
        pastClicked = 1;
        setTimeout(function(){
            pastClicked = 0;
        },3000);
        var userId = $('#js-robot-list').find("option:selected").data('uid');
        var robotList = $('#js-robot-list option')
        robotList.splice(0,1);
        //check robot
        var isBathRobot = false;
        if($('#js-robot-num').val() > 0 && robotList.length > 0){
            isBathRobot = true;
            for(var i = 0 ;i<$('#js-robot-num').val();i++){
                if(robotList.length <= 0){return;}
                var index = Math.floor(Math.random()*robotList.length);
                var robotOption = $( robotList[index]);
                robotList.splice(index,1);
                userId = robotOption.data('uid');
                realPast();
            }
        }else{
            realPast();
        }
        function realPast(){
            $.post('/live/past',{roomId:window.D.roomId,'robotId':userId},function(resp){
                if(isBathRobot) return;
                if( resp.code == 0){
                    if(resp.lxpast_df > 0){
                        window.D.prePast = resp.unixTime;
                        checkNextPast(resp.lxpast_df);
                    }else{
                        $('#idUserPastRed').hide();
                    }
                }else if(resp.code == 401){
                    showLoginDialog();
                }else{
                    dialog({title:"提示",content:resp.msg,quickClose: true}).show();
                }
            });  
        }

        
        
    })
    
}

//{{$cdn}}/assets/img/fxts/wz.mp3
var playerTimer = null;
function playMp3(mp3Url,wavUrl){
    $("#idMp3Warp").html('<audio onended="playEnd();" autoplay="true"><source src="'+mp3Url+'" type="audio/mp3"> <source src="'+wavUrl+'" type="audio/wav"></audio>')
}
function playEnd(){
    playerTimer = setTimeout(function(){
            playMp3(window.D.cdn + "/assets/img/fxts/wz.mp3",window.D.cdn + "/assets/img/fxts/wz.wav");
    },10000);
    
}
function stopMp3(){
    $("#idMp3Warp").empty();
    if(playerTimer){
        clearTimeout(playerTimer);
    }
}

var $shareChatDialog = null;
function shareChatDialogCallback(){
    $shareChatDialog.remove();
    var $chatCheckbox = $('.js-chat-checkbox[name="messageId"]:checked');
    $chatCheckbox.prop('checked',false);
}
$(function(){
    var $container = $('.page-container');
    //删
    $container.delegate('.chat-message-delete-btn','click', function(){
        var $this = $(this);
        var messageId = $this.data('id');
        $.post('/chat/del/'+window.D.roomId, {id:messageId}, function(data){});
    }); 
    //用户信息
    $container.delegate('.chat-message-look-btn','click', function(){
        var item = $(this).parent().parent().find('.chat-name');
        $('#lookUserCard .card-inner').html('<div class="card-info"><p class="tips">正在加载中...</p></div>')
        $('#lookUserCard').css("visibility", "visible");
        $('#lookUserCard').css('top', item.offset().top - $('#lookUserCard').height() / 2 + 10);
        $('#lookUserCard').css('left', item.offset().left + 30);
        $('#lookUserCard').find('.card-arrow').addClass('arrow-left');
        $.get('/user/'+$(this).attr('data-uid'),function(resp,status){
            var html = $('#js-user-tmpl').render(resp.user);
            $('#lookUserCard .card-inner').html(html);
        });
    });
    $container.delegate('.rolebtn-look','click', function(){
        if(!window.D.USER.role.f_look){
            reutrn;
        }
        var item = $(this);
        var uid = item.attr('data-uid');
        if(!uid) return;
        $('.dds-card').css("visibility", "hidden");
        $('#listUserCard .card-inner').html('<div class="card-info"><p class="tips">正在加载中...</p></div>')
        $('#listUserCard').css("visibility", "visible");
        $('#listUserCard').css('top', item.offset().top - $('#listUserCard').height());
        $.get('/user/'+uid,function(resp,status){
            var html = $('#js-user-tmpl').render(resp.user);
            $('#listUserCard .card-inner').html(html);
        });
    });
    //禁言
    $(document).delegate('.user-gag-btn','click', function(){
        var $this = $(this);
        var uid =  $this.data('uid');
        var gag = $this.data('gag');
        if(gag){
            $.post('/user/ungag',{uid: uid}, function(data){
                $this.data('gag', 0);
                $this.text('禁言');
            });
        } else {
            $.post('/user/gag',{uid: uid}, function(data){
                $this.data('gag', 1);
                $this.text('解除禁言');
                
            });
        }
    });
    $(document).delegate('.user-lookvideo-btn','click', function(){
        var $this = $(this);
        var uid =  $this.data('uid');
        var lookvideo = $this.data('lookvideo');
        if(lookvideo){
            $.post('/user/unlookvideo',{uid: uid}, function(data){
                $this.data('lookvideo', 0);
                $this.text('看视频');
            });
        } else {
            $.post('/user/lookvideo',{uid: uid}, function(data){
                $this.data('lookvideo', 1);
                $this.text('禁视频');
            });
        }
    });
    $(document).delegate('.user-ip-btn','click', function(){
        var $this = $(this);
        var uid = $this.data('uid');
        $.post('/user/killip',{uid: uid,roomId:window.D.roomId}, function(data){
        });
    });
    //踢人
    $(document).delegate('.user-kick-btn','click', function(){
        var $this = $(this);
        var uid = $this.data('uid');
        var kick = $this.data('kick');
        if(kick){
            $.post('/user/unkick',{uid: uid}, function(data){
                $this.data('kick', 0);
                $this.text('踢出');
            });
        } else {
            $.post('/user/kick',{uid: uid,roomId:window.D.roomId}, function(data){
                $this.data('kick', 1);
                $this.text('解除踢出');
            });
        }
    });
    //通过
    $container.delegate('.chat-message-audit-btn','click', function(){
        var $this = $(this);
        var messageId =  $this.data('id');  $this.addClass('pass');
        $.post('/chat/pass/'+window.D.roomId, {id:messageId}, function(data){});
    });


    //转播
    $container.delegate('.chat-message-share-btn','click', function(){
        var $this = $(this);
        var messageId =  $this.data('id');
        var messageIds = [];
        messageIds.push(messageId);
        shareChatDialog({messageIds : messageIds});
    });


    function shareChatDialog(messageIds){
        if($('#chatShareChatDialog').length > 0){
            return;
        }
        var url = '/iframe/turnmsg/'+window.D.roomId+'?_t='+ (new Date()).getTime() + '&' + $.param(messageIds);
        var iframeHtml = '<iframe id="chatShareChatDialog" src="'+url+'" width="400" height="400"></iframe>'
        $shareChatDialog = dialog({
            content: iframeHtml,
            opacity:0.7,
            height:400,
            padding:'0px',
            title:"消息转播",
        });
        $shareChatDialog.showModal();
    }
    var $chatMore = $('#js-chat-form-more');
    var $chatExpendBtn = $('#js-expend-btn').click(function(){
        $this = $(this);
        if($chatMore.hasClass('expend')){
            $chatMore.removeClass('expend');
            $this.text('<');
        } else {
            $chatMore.addClass('expend');
            $this.text('>');
        }
    });
    $('#js-chat-form-more-share-btn').click(function(){
        var $chatCheckbox = $('.js-chat-checkbox[name="messageId"]:checked');
        var messageIds = [];

        if($chatCheckbox.length > 0){
            $chatCheckbox.each(function(){
                messageIds.push($(this).val());
            });
            shareChatDialog({messageIds : messageIds});
        } else {
            dialog({title:"提示",content:"请勾选要转播的消息",quickClose: true}).show();
            
        }
    });
    $(document).delegate('.js-chat-checkbox[name="messageId"]', 'click', function(){
        var $chatCheckbox = $('.js-chat-checkbox[name="messageId"]:checked');
        if($chatCheckbox.length > 0){
            $chatMore.addClass('expend');
            $chatExpendBtn.text('>');
        } else {
            $chatMore.removeClass('expend');
            $chatExpendBtn.text('<');
        }
    });
});




function getStock(){  
    $.ajax({
        cache : true,  
        url:"http://hq.sinajs.cn/list="+window.D.stockCode,  
        type : "GET",  
        dataType : "script",  
        success : function(){  
            // 上证指数
            var hq_arr = window.D.stockCode.split(",");
            for(var i in hq_arr){
                var id = "#idStock"+i;
                var szzs =  window['hq_str_'+hq_arr[i]].split(",");
                if(hq_arr[i] == "rt_hkHSI"){
                    var name = szzs[1];
                    var szzs1 = parseFloat(szzs[4]).toFixed(2);
                    var szzs2 = parseFloat(szzs[7]).toFixed(2);
                    var szzs3 = parseFloat(szzs[8]).toFixed(2); 
                }else if(hq_arr[i] == "gb_dji"){
                    var name = szzs[0];
                    var szzs1 = parseFloat(szzs[1]).toFixed(2);
                    var szzs2 = parseFloat(szzs[2]).toFixed(2);
                    var szzs3 = parseFloat(szzs[2]).toFixed(2); 
                }else if(hq_arr[i] == "hf_CHA50CFD"){
                    var name = szzs[13];
                    var szzs1 = parseFloat(szzs[0]).toFixed(2);
                    var szzs2 = parseFloat(szzs[1]).toFixed(2);
                    var szzs3 = parseFloat(szzs[1]).toFixed(2); 
                }else{
                    var name = szzs[0];
                   var szzs1 = parseFloat(szzs[1]).toFixed(2);
                    var szzs2 = parseFloat(szzs[2]).toFixed(2);
                    var szzs3 = parseFloat(szzs[3]).toFixed(2); 
                }
                
                
                
                $(id+" .name").html(name);
                $(id+" .num").html(szzs1);
                $(id+" .per-num").html(szzs3 + '%');
                $(id+" .num").removeClass().addClass('num');
                $(id+" .per-num").removeClass().addClass('per-num');
                if (szzs2 < 0) {
                    $(id+" .num").addClass('green');
                    $(id+" .per-num").addClass('green_Bg');
                } else if (szzs2 > 0) {
                    $(id+" .per-num ").html("+" + szzs3 + '%');
                    $(id+" .num").addClass('red');
                    $(id+" .per-num").addClass('red_Bg');
                } else {
                    $(id+" .num").addClass('gray');
                    $(id+" .per-num").addClass('gray_Bg');
                }
            }
        }
    });
}


function initStock(){
    if(window.D.stockCode != ""){
        getStock();
        setInterval(getStock,5000);
    }
    $('.guzhi-showmore').click(function(){
        if($(this).hasClass('open')){
            $('.guzhi-hide').hide();
            $(this).removeClass('open')
        }else{
            $('.guzhi-hide').show();
            $(this).addClass('open')
        }
    })
}

function resizeTreasure(){
    if($('.treasure').length <= 0){return;}
    $('.treasure-box-panel').css('top',$('.treasure').offset().top);
    $('.treasure-box-panel').css('left',$('.treasure').offset().left-$('.treasure-box-panel').outerWidth())
    
}

function initTreasure(treasureData){
    if(!treasureData){
        return;
    }
    if($('.treasure').length <= 0){return;}

    resizeTreasure();
    if(window.D.USER.logined){
        findTreasurehistory(treasureData);
        getTreasure();
    }
    $(".treasure-box").click(function(){
        $(".treasure-box-panel").show();//显示百宝箱里面的东西
        for(var i=1;i<8;i++){
            $('.treasure-box').removeClass('animate'+i);
        }
        $('.treasure-box').addClass('animate7');//打开百宝箱
    });
    $(".close-treasure-box").click(function(){
        $(".treasure-box-panel").hide();//关闭百宝箱里面的东西
        for(var i=1;i<8;i++){
           $('.treasure-box').removeClass('animate'+i);
        }
        $('.treasure-box').addClass('animate1');//关闭百宝箱
    });
    $(".treasure-box-panel .close-btn").click(function(){
        //$(".treasure-box-panel").hide();//关闭百宝箱里面的东西
        $(".close-treasure-box").click();
    });
        
    
        //打开百宝箱
        function openTreasure(openTime,indexs){
            if(openTime==0){
                return;//当倒计时为0的时候，不打开百宝箱
            }
            $('.treasure-count-down').countdown(openTime).on('update.countdown', function(event) {
                 var $this = $(this);
                 $this.html(event.strftime('<span>%H:%M:%S</span>'));
            }).on('finish.countdown', function(event) {
                $(this).html('00:00');
                $('.treasure-box').addClass('animate7');
            });
        }
        function  findTreasurehistory(data){
            $(".treasure-box-panel").hide();//关闭百宝箱里面的东西
            for(var i=1;i<8;i++){
               $('.treasure-box').removeClass('animate'+i);
            }
            $('.treasure-box').addClass('animate1');//关闭百宝箱
            var pass = 1;
            if(data){
               if(data.treasureindex==6){
                    pass = 1;
                }else{
                    pass = 0;
                    var  treasureindex = data.treasureindex;//当前领到第几个积分信息
                    $.each($(".treasure-box-panel .cb-list li"),function(index,it){
                        var  spanObj = $(this).find("span");
                        var  aObj = $(this).find("a");
                        aObj.attr("data-historyId",0);
                        if(index<4){
                             if(index<treasureindex){
                                spanObj.removeClass("may-get").removeClass("wait-get").addClass("yet");
                                aObj.removeClass("next-btn").removeClass("may-btn").addClass("yet-btn").html("已领取");
                             }else if(treasureindex == index && data.treasurestatus==1){
                                spanObj.removeClass("yet").removeClass("wait-get").addClass("may-get");
                                aObj.removeClass("next-btn").removeClass("yet-btn").addClass("may-btn").html("可领取");
                                aObj.attr("data-historyId",data.id);
                            }else{
                                spanObj.removeClass("may-get").removeClass("yet").addClass("wait-get");
                                aObj.removeClass("yet-btn").removeClass("may-btn").addClass("next-btn").html("礼物专享");
                             }
                        }else{
                             if(index<treasureindex){
                                 spanObj.removeClass("w-cq-get").removeClass("cq-get").addClass("yet");
                                 aObj.removeClass("next-btn").removeClass("may-btn").addClass("yet-btn").html("已领取");
                                 
                             }else if(treasureindex == index && data.treasurestatus==1){
                                    spanObj.removeClass("yet").removeClass("w-cq-get").addClass("cq-get");
                                    aObj.removeClass("next-btn").removeClass("yet-btn").addClass("may-btn").html("可领取");
                                    aObj.attr("data-historyId",data.id);
                            }else{
                                spanObj.removeClass("cq-get").removeClass("yet").addClass("w-cq-get");
                                aObj.removeClass("yet-btn").removeClass("may-btn").addClass("next-btn").html("酬勤专享");
                             }
                        }
                        if(treasureindex == index && data.treasurestatus == 0){
                            aObj.removeClass("yet-btn").removeClass("may-btn").addClass("next-btn").html("等待中");
                        }
                    });
                    if(data.treasurestatus==0){
                        openTreasure(getTreasureTime(data.treasureindex),data.treasureindex);//启动百宝箱时间
                    }else{
                        $(".treasure-box-panel").show();//显示百宝箱里面的东西
                        for(var i=1;i<8;i++){
                            $('.treasure-box').removeClass('animate'+i);
                        }
                        $('.treasure-box').addClass('animate7');//打开百宝箱
                        $(".get-state-ard").html("别着急，奖励正在准备中……");
                    }
                }
            }
            if(pass==1){
                 $.each($(".treasure-box-panel .cb-list li"),function(index,it){
                        var  spanObj = $(this).find("span");
                        var  aObj = $(this).find("a");
                        if(index<4){
                            spanObj.removeClass("may-get").removeClass("wait-get").addClass("yet");
                            aObj.removeClass("next-btn").removeClass("may-btn").addClass("yet-btn").html("已领取");
                        }else{
                            spanObj.removeClass("w-cq-get").removeClass("cq-get").addClass("yet");
                            aObj.removeClass("next-btn").removeClass("may-btn").addClass("yet-btn").html("已领取");
                        }
                   
                });
                 $(".get-state-ard").html("今天的宝箱已经领完了，等明天把");
            }
        }
        
        //根据类型获取打开百宝箱时间
        function getTreasureTime(index){
            $(".get-state-ard").html("别着急，奖励正在准备中……");
            var fiveMins = new Date().getTime();
            var time = $( $('.treasure-box-panel .cb-list li')[index] ).attr('data-time');
            time = time==''||time=='null'?"0":time;
            time = parseFloat(time);
            if(time>0){
               setTimeout(function() {
                    addTreasure(index);//添加百宝箱以便领取积分信息
               },time*60*1000);
            }
            if(time==0){
                return 0;
            }
            return fiveMins+time*60*1000;
        }
        
        //添加当前百宝箱记录信息
        function addTreasure(treasureindex){
            $.post('/treasure/add',{roomId:window.D.roomId},function(data){
                    var id = 0;
                    $(".treasure-box-panel").hide();//显示百宝箱里面的东西
                    for(var i=1;i<8;i++){
                        $('.treasure-box').removeClass('animate'+i);
                    }
                    if(data.code==0){
                        id = data.value;
                        $('.treasure-box').addClass('animate7');
                        $(".treasure-box-panel").show();//显示百宝箱里面的东西
                    }else{
                        $('.treasure-box').addClass('animate1');//打开百宝箱
                        alert("额,百宝箱有点紧打不开。");
                        //alert(data.value);
                    }
                    $.each($(".treasure-box-panel .cb-list li"),function(index,it){
                        var spanObj = $(this).find("span");
                        var aObj = $(this).find("a");
                        if(index<4){
                             if(index<=treasureindex){
                                spanObj.removeClass("may-get").removeClass("wait-get").addClass("yet");
                                aObj.removeClass("next-btn").removeClass("may-btn").addClass("yet-btn").html("已领取");
                                if(treasureindex == index){
                                    spanObj.removeClass("yet").removeClass("wait-get").addClass("may-get");
                                    aObj.removeClass("next-btn").removeClass("yet-btn").addClass("may-btn").html("可领取");
                                    aObj.attr("data-historyId",id);
                                }
                             }else{
                                 spanObj.removeClass("may-get").removeClass("yet").addClass("wait-get");
                                 aObj.removeClass("yet-btn").removeClass("may-btn").addClass("next-btn").html("礼物专享");
                             }
                        }else{
                             if(treasureindex>=index){
                                 spanObj.removeClass("w-cq-get").removeClass("cq-get").addClass("yet");
                                 aObj.removeClass("next-btn").removeClass("may-btn").addClass("yet-btn").html("已领取");
                                 if(treasureindex == index){
                                    spanObj.removeClass("yet").removeClass("w-cq-get").addClass("cq-get");
                                    aObj.removeClass("next-btn").removeClass("yet-btn").addClass("may-btn").html("可领取");
                                    aObj.attr("data-historyId",id);
                                 }
                             }else{
                                spanObj.removeClass("cq-get").removeClass("yet").addClass("w-cq-get");
                                aObj.removeClass("yet-btn").removeClass("may-btn").addClass("next-btn").html("酬勤专享");
                             }
                        }
                   });
            });
        }
        //领取百宝箱积分信息
        function getTreasure(){
            //领取百宝箱积分信息
            $(".treasure-box-panel .cb-list li a").click(function(){
                var historyid = $(this).attr("data-historyid");
                var scores = $(this).attr("data-scores");
                var indexs = $(this).attr("data-index");
                indexs = parseFloat(indexs);
                scores = parseFloat(scores);
                $.post('/treasure/got',{roomId:window.D.roomId},function(data){
                    if(data.code==0){
                         $.each($(".treasure-box-panel .cb-list li"),function(index,it){
                            var  spanObj = $(this).find("span");
                            var  aObj = $(this).find("a");
                            if(index==indexs){
                                if(index<4){
                                     spanObj.removeClass("may-get").removeClass("wait-get").addClass("yet");
                                     aObj.removeClass("next-btn").removeClass("may-btn").addClass("yet-btn").html("已领取");
                                }else{
                                     spanObj.removeClass("w-cq-get").removeClass("cq-get").addClass("yet");
                                     aObj.removeClass("next-btn").removeClass("may-btn").addClass("yet-btn").html("已领取");
                                }
                            }
                            if((indexs+1)==index){
                                aObj.removeClass("yet-btn").removeClass("may-btn").addClass("next-btn").html("等待中");
                            }
                        });
                        if(indexs==5){
                            setTimeout(function() {
                                findTreasurehistory(data);//获取领取百宝箱信息
                            },5000);
                        }else{
                            setTimeout(function() {
                                findTreasurehistory(data);//获取领取百宝箱信息
                            },2000);
                        }
                        //累积用户积分
                      
                        $(".get-state-ard").show().html("恭喜你已领取了<b>" +data.jf_num + "</b>积分，领取酬勤专享经验可获更多积分！");
                    }else{
                       alert(data.msg);
                    }
                }); 

           });
        }
        
        //获取积分
        function getScores(treasureindex){
            var scores = 0 ;
            $.each($(".treasure-box-panel .cb-list li"),function(index,it){
                var  aObj = $(this).find("a");
                if(treasureindex==index){
                    scores =  aObj.attr("data-scores");
                }
            });
            return scores;
        }


}
function outputGiftV2(giftV2s,giftCates){
    if($('#js-gift-panel').length <= 0){return;}
    var html = $('#js-giftv2s-new-tmpl').render({"giftV2s":giftV2s});
    $('#js-gift-panel').html(html);
    initGiftV2();
}
function initGiftV2(){
    if($('#js-gift-panel').length <= 0){return;}
     $('.gift-scroll').niceScroll({
        cursorborder: '',
        horizrailenabled: false,
        cursorcolor: '#999',
        boxzoom: false
    });
    var $giftTipsTmpl = $('#js-gift-tips-new-tmpl');
    var $giftIcon = $('#js-gift-btn');
    $giftIcon.click(function(){
        $(this).addClass('active');
    });
    $(document).click(function(event){
        var $target = $(event.target);
        var id = $target.attr('id');
        if(id != 'js-gift-btn' && $target.parents('#js-gift-btn').length <=0 && $target.parents('#js-gift-panel').length <= 0){
            $giftIcon.removeClass('active');
        }
    });
    var sending = 0;
    var timer = 0;
    var removeTimer = 0;
    $('body').delegate('.main-gift-tip', 'mouseenter', function(event){
        clearTimeout(removeTimer);
    }).delegate('.main-gift-tip', 'mouseleave', function(event){
        $('.main-gift-tip').remove();         
    })
    var sendingPay = 0;
    $('body').delegate('.pay-btn','click',function(event){
        if(!window.D.USER.logined){
            showLoginDialog();
            return;
        }
        if(sendingPay){
            return;
        }
        sendingPay = 1;
        var $this = $(this);
        var id = $this.data('id');
        var payType = $this.data('type');
        var name = $this.data('name');
        var payTypeCn = payType=="wechat"?"微信":"支付宝"
        var timerPay = setTimeout(function(){
            sendingPay = 0;
        },3000);
        $.post('/pay/gift',{payType:payType,id:id},function(resp){
            sendingPay = 0;
            clearTimeout(timerPay);
            if(resp.code == 0){
                var dlg = showEwmDlg("打赏"+name+"--请使用"+payTypeCn+"扫一扫",resp.qrcode);
                checkOrder(resp.orderId,dlg);
            }else{
                dialog({title:"提示",content:resp.msg,quickClose: true}).show();
            }
        })
    })
    function checkOrder(orderId,dlg){
        var timer = setInterval(function(){
            $.get('/pay/checkorder?orderId='+orderId,function(resp){
                if(resp.status == 1){
                    clearInterval(timer);
                    alert("支付成功");
                    dlg.remove();
                    
                }else if(resp.status == 2){
                    clearInterval(timer);
                    alert("支付失败");
                    dlg.remove();
                    
                }
            })
        },3000);
        dlg.addEventListener('close',function(){
            clearTimeout(timer);
        })
    }
    $('#js-gift-panel').delegate('.gift', 'mouseenter', function(event){
        var $this = $(this);
        var id = $this.data('id');
        var name = $this.data('name');
        var title = $this.data('title');
        var credit = $this.data('credit');
        var path = $this.data('path');
        var top = $this.offset().top - 162;//192 
        if(!window.D.chargeOpend){
            top += 30;//60;
        }
        var left = $this.offset().left - (140-$this.width())/2; 
        var $giftTips = $giftTipsTmpl.render({
            id: id,
            title: title,
            path: path,
            name: name,
            credit: credit,
        });
        $('.main-gift-tip').remove();
        clearTimeout(removeTimer);
        $('body').append($giftTips);
        $('.main-gift-tip').css('left',left).css('top',top);
    }).delegate('.gift', 'mouseleave', function(event){
       removeTimer = setTimeout(function(){
            $('.main-gift-tip').remove();
       },500)
    }).delegate('.gift', 'click', function(event){
        if(window.D.chargeOpend){
            return;
        }
        event.preventDefault();
        var $this = $(this);
        var id = $this.data('id');
        var name = $this.data('name');
        var title = $this.data('title');
        var credit = $this.data('credit');
        var path = $this.data('path');
        event.stopPropagation();
        if(sending){
            return;
        }
        if(id > 0){
            sending = 1;
            var timer = setTimeout(function(){
                sending=0;
                timer = 0;
            },3000);

            /*var userId = $('#js-robot-list').find("option:selected").data('uid');
            var robotList = $('#js-robot-list option')
            robotList.splice(0,1);
            //check robot
            var isBathRobot = false;
            if($('#js-robot-num').val() > 0 && robotList.length > 0){
                isBathRobot = true;
                for(var i = 0 ;i<$('#js-robot-num').val();i++){
                    if(robotList.length <= 0){return;}
                    var index = Math.floor(Math.random()*robotList.length);
                    var robotOption = $( robotList[index]);
                    robotList.splice(index,1);
                    userId = robotOption.data('uid');
                    realSendGift();
                }
            }else{*/
                realSendGift();
            /*}*/
            function realSendGift(){
                $.post('/gift/send', {roomId:window.D.roomId,num:1,id:id/*,uid:userId*/}, function(data){
                    
                    if(timer){
                        clearTimeout(timer);
                        timer = 0;
                        setTimeout(function(){
                            sending = 0;
                        },500)
                    }else{
                        sending = 0;
                    }
                    if(data.code != 0){
                       dialog({title:"提示",content:data.msg,quickClose: true}).show();
                    }
                });
            }
        }
        
    });
}


var firstInterval,middeleInterval,lastInterval,endsInterval;
var __giftV2Queue__ = [];
var __gfitPmdQueue__ =[];
var __giftPmdIndex__ = 1;
function onRecvGiftV2(data) {
    if(data && !data.pmd_status){
        var $tmpl = $('#js-pro-ryPopGift-tmpl');
        var $first =  $(".ryPopGift.ryPopGift_small.first");
        var $middele =  $(".ryPopGift.ryPopGift_small.middele");
        var $last =  $(".ryPopGift.ryPopGift_small.last");
        var $ends =  $(".ryPopGift.ryPopGift_small.ends");
        var $obj = $first,choose = -1;
        if(data.giftName==$first.find(".giftname").html()&&data.user==$first.find(".nickname").html()){
            choose = 1;
        }else if(data.giftName==$middele.find(".giftname").html()&&data.user==$middele.find(".nickname").html()){
            choose = 2;
        }else if(data.giftName==$last.find(".giftname").html()&&data.user==$last.find(".nickname").html()){
            choose = 3;
        }else if(data.giftName==$ends.find(".giftname").html()&&data.user==$ends.find(".nickname").html()){
            choose = 4;
        }else if(!$first.hasClass("active")||($first.hasClass("active")&&data.giftName==$first.find(".giftname").html()&&data.user==$first.find(".nickname").html())){
            choose = 1;
        }else if($first.hasClass("active")&&!$middele.hasClass("active")||($middele.hasClass("active")&&data.giftName==$middele.find(".giftname").html()&&data.user==$middele.find(".nickname").html())){
            choose = 2;
        }else if($first.hasClass("active")&&$middele.hasClass("active")&&!$last.hasClass("active")||($last.hasClass("active")&&data.giftName==$last.find(".giftname").html()&&data.user==$last.find(".nickname").html())){
            choose = 3;
        }else if($first.hasClass("active")&&$middele.hasClass("active")&&$last.hasClass("active")&&!$ends.hasClass("active")||($ends.hasClass("active")&&data.giftName==$ends.find(".giftname").html()&&data.user==$ends.find(".nickname").html())){
            choose = 4;
        }
        
        if(choose == -1){
            __giftV2Queue__.push(data);
            return;
        }
        if(choose==2){
            $obj = $middele;
            if(middeleInterval){clearInterval(middeleInterval);/*取消定时器*/}
            middeleInterval = setInterval(function () {
               removeActive("middele",middeleInterval);
            }, 6000);
        }else if(choose==3) {
            $obj = $last;
            if(lastInterval){clearInterval(lastInterval);/*取消定时器*/}
            lastInterval = setInterval(function () {
                removeActive("last",lastInterval);
            }, 6000);
        }else if(choose==4) {
            $obj = $ends;
            if(endsInterval){clearInterval(endsInterval);/*取消定时器*/}
            endsInterval = setInterval(function () {
                removeActive("ends",endsInterval);
            }, 6000);
        }else{
            $obj = $first;
            if(firstInterval){clearInterval(firstInterval);/*取消定时器*/}
            firstInterval = setInterval(function () {
               removeActive("first",firstInterval);
            }, 6000);
        }
        
        if(data.giftName==$obj.find(".giftname").html()&&$obj.find(".nickname").html()){
            var gitNum = $obj.find(".giftNum").attr("data-num");
            gitNum = gitNum==""||gitNum=="undefined"?"0":gitNum;
            gitNum = parseFloat(gitNum);
            gitNum = gitNum+1;
            $obj.find(".giftNum").attr("data-num",gitNum);
            $obj.find(".giftNum").html("x"+gitNum);
        }else{
            $obj.empty().append($tmpl.render(data));
        }
        $obj.find(".giftNum").addClass("active");
        setTimeout(function() {
           $obj.find(".giftNum").removeClass("active");
        },500);
        $obj.addClass("active");//显示送礼物信息
    }else if(data && data.pmd_status){
        data.index = __giftPmdIndex__++;
        var pwdId = "#gift_pmd_"+data.index;
        $("#js-gift-pmd-warp").prepend($("#js-gift-pmd-tmpl").render(data));
        $(pwdId).css('left',$('#js-gift-pmd-warp').width());
        var speed = 15000;
        $(pwdId).animate({ "left": -$(pwdId).width() }, speed, 'linear', function() {
            $(pwdId).remove();
        });
        
        //__gfitPmdQueue__.push(data);
    }
}
//移除显示礼物特效
function removeActive(obj,objInterval){
  $(".ryPopGift.ryPopGift_small."+obj).empty().removeClass("active");
  if(objInterval){clearInterval(objInterval);/*取消定时器*/}
  setTimeout(function(){ onRecvGiftV2(__giftV2Queue__.shift()) },200);
}

function initTeam(){
    if($('#idTeamRank').length <= 0) return;
    $('#idTeamRank').delegate('.js-chose-team', 'click', function() {
        var tid = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        var team_base = $(this).attr('data-base');
        var team_got = $(this).attr('data-got');
        var renderHtml = $('#js-team-op-tmpl').render({
            id:tid,
            name:name,
            team_base:parseInt(team_base),
            team_got:parseInt(team_got),
        });
        if(window.__teamSetDialog){
            window.__teamSetDialog.remove();
        }
        window.__teamSetDialog = dialog({
            content: renderHtml,
            backdropOpacity:0.0,
            padding:'15px',
            title:name+"--加数量",
        });
        window.__teamSetDialog.show();
    });
    var baseadding = 0;
    $('body').delegate('.js-team-set-btn', 'click', function() {
        var tid = $(this).attr('data-id');
        var min = parseInt( $(this).parent().children(".js-min-team-num").val());
        var max = parseInt( $(this).parent().children(".js-max-team-num").val());
        var num = Math.floor( Math.random()*(max-min) ) + min;
        if(baseadding){
            return;
        }
        baseadding = 1;
        setTimeout(function(){
            baseadding = 0;
        },1000);
        $.post('/team/baseadd',{tid:tid,num:num},function(resp){
            if(resp.code != 0){
                dialog({title:"提示",
                    content:resp.msg,
                    quickClose: true,
                    button: [{
                        value: '我知道啦',
                        callback: function () {
                            return true;
                        }
                    }]
                }).show();
            }
        });
    });
    function renderTeam(resp){
        resp.userHots = {};
        resp.teams.sort(function(a,b){
            var aHot = a.team_base + a.team_got;
            var bHot =  b.team_base +  b.team_got;
            if(aHot == bHot){
                return a.sort >  b.sort ? -1:1;
            }
            return aHot > bHot ? -1:1;
        })
        for(var i in resp.teams){
            $("#teambase_cur_set_"+resp.teams[i].id).html(resp.teams[i].team_base)
            $("#teamtotal_cur_set_"+resp.teams[i].id).html(resp.teams[i].team_base+resp.teams[i].team_got)
        }
        $('#idTeamRank').html($('#js-teams-tmpl').render(resp));
        $("#idTeamRank .look_sy").on('click',function(){
            var url = '/iframe/teacherstock/' + window.D.roomId +"?tid="+$(this).attr("data-id");
            var title = $(this).attr('data-title');
            var iframeHtml = '<iframe src="'+url+'" width="800" height="463"></iframe>'
            var tmpDialog= dialog({
                content: iframeHtml,
                backdropOpacity:0.1,
                padding:'0px',
                title:"收益",
                height:463,
               
            });
            tmpDialog.showModal();
        });
        $('#idTeamRank .zan_team').on('click',function(){
            if($(this).hasClass('zan')){
                return;
            }
            if(parseInt(window.D.TEAM.teamId) > 0){
                return;
            }
            var teamId = $(this).attr("data-id");
            var teamName = $(this).attr("data-name");
            dialog({title:"提示-"+teamName,
            content:"您仅有一次加入机会，继续请确定，返回请取消",
            quickClose: true,
            button: [{
                    value: '确定',
                    callback: function () {
                        postTeam(teamId);
                        return true;
                    }
                },{
                    value: '取消',
                    callback: function () {
                        return true;
                    }
                }]
            }).show();
            
        })
    }
    window.__renderTeam = renderTeam;
    
    function postTeam(postTid){
        if(this.sending)return;
        this.sending = true;
        var self = this;
        setTimeout(function(){
            self.sending = false;
        },3000);
        $.post('/team/send',{"teamId":postTid,roomId:window.D.roomId},function(resp){
            if(resp.code == 0){
                window.D.TEAM.teamId = postTid;
                __teamName__ = resp.teamName;
                $('#js-hot-team-'+postTid).find(".hot-rank-num").html(resp.total);
                $('#js-hot-team-'+postTid).find(".zan_team").addClass("zan").html("已加入");
                 
                 dialog({title:"提示",
                    content:resp.msg,
                    quickClose: true,
                    button: [{
                        value: '我知道啦',
                        callback: function () {
                            return true;
                        }
                    }]
                }).show();
            }else{
                dialog({title:"提示",
                    content:resp.msg,
                    quickClose: true,
                    button: [{
                        value: '我知道啦',
                        callback: function () {
                            return true;
                        }
                    }]
                }).show();
            }
        })
    }
}

function initHot(){
    if($('#idHotRank').length <= 0) return;
    if(window.D.hot_got_max > 0 && window.D.hot_got_ts > 0){
        var hotGotTimer = setInterval(function(){
            $.post('/hot/got',{roomId:window.D.roomId},function(resp){
                if(resp.full){
                    clearInterval(hotGotTimer);
                }
            });
        },window.D.hot_got_ts*60*1000);
        __onConnnectOldCallback.push(function(){
            clearInterval(hotGotTimer);
        })
    }
     $('#idHotRank').delegate('.js-chost-hot-teahcer', 'click', function() {
        var tid = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        var hot_base = $(this).attr('data-base');
        var hot_got = $(this).attr('data-got');
        var renderHtml = $('#js-hot-op-tmpl').render({
            id:tid,
            name:name,
            hot_base:parseInt(hot_base),
            hot_got:parseInt(hot_got),
        });
        if(window.__hotSetDialog){
            window.__hotSetDialog.remove();
        }
        window.__hotSetDialog = dialog({
            content: renderHtml,
            backdropOpacity:0.0,
            padding:'15px',
            title:name+"--加票",
        });
        window.__hotSetDialog.show();
    });
     var baseadding = 0;
    $('body').delegate('.js-hot-set-btn', 'click', function() {
        var tid = $(this).attr('data-id');
        var min = parseInt( $(this).parent().children(".js-min-hot-num").val());
        var max = parseInt( $(this).parent().children(".js-max-hot-num").val());
        var num = Math.floor( Math.random()*(max-min) ) + min;
        if(baseadding){
            return;
        }
        baseadding = 1;
        setTimeout(function(){
            baseadding = 0;
        },1000);
        $.post('/hot/baseadd',{tid:tid,num:num},function(resp){

        });
    });
    function renderHot(resp){
        resp.userHots = {};
        resp.teachers.sort(function(a,b){
            if(a.fired !=  b.fired){
                return a.fired <  b.fired ? -1:1;
            }
            var aHot = a.hot_base + a.hot_got;
            var bHot =  b.hot_base +  b.hot_got;
            if(aHot == bHot){
                if(window.D.HOT.sortAsc){
                    return a.sort <  b.sort ? -1:1;
                }
                return a.sort >  b.sort ? -1:1;
            }
            if(window.D.HOT.sortAsc){
                return aHot < bHot ? -1:1;
            }
            return aHot > bHot ? -1:1;
        })
        resp.mainTeachers.sort(function(a,b){
            if(a.fired !=  b.fired){
                return a.fired <  b.fired ? -1:1;
            }
            var aHot = a.hot_base + a.hot_got;
            var bHot =  b.hot_base +  b.hot_got;
            if(aHot == bHot){
                if(window.D.HOT.sortAsc){
                    return a.sort <  b.sort ? -1:1;
                }
                return a.sort >  b.sort ? -1:1;
            }
            if(window.D.HOT.sortAsc){
                return aHot < bHot ? -1:1;
            }
            return aHot > bHot ? -1:1;
        })
        for(var i in resp.teachers){
            $("#hotbase_cur_set_"+resp.teachers[i].id).html(resp.teachers[i].hot_base)
            $("#hottotal_cur_set_"+resp.teachers[i].id).html(resp.teachers[i].hot_base+resp.teachers[i].hot_got)
        }
        $('#idHotRank').html($('#js-hots-tmpl').render(resp));
        $('#idHotRank .zan_teacher').on('click',function(){
            postHot($(this).attr("data-id"));
        })
        $("#idHotRank .zt-zc-btn").on("click",function(){
            postZT($(this).attr("data-id"),1);
        })
        $("#idHotRank .zt-tt-btn").on("click",function(){
            postZT($(this).attr("data-id"),0);
        })
        $('#idHotRank .addmoney').on('click',function(){
            postAddMoney($(this).attr("data-id"));
        })
        $("#idHotRank .look_sy").on('click',function(){
            var url = '/iframe/teacherstock/' + window.D.roomId +"?tid="+$(this).attr("data-id");
            var title = $(this).attr('data-title');
            var iframeHtml = '<iframe src="'+url+'" width="800" height="463"></iframe>'
            var tmpDialog= dialog({
                content: iframeHtml,
                backdropOpacity:0.1,
                padding:'0px',
                title:"收益",
                height:463,
               
            });
            tmpDialog.showModal();
        });
    }
    window.__renderHot = renderHot;
    function postAddMoney(postTid){
         if(this.sending)return;
            this.sending = true;
            var self = this;
            setTimeout(function(){
                self.sending = false;
            },3000);
           $.post('/hot/jfsend',{"tid":postTid,roomId:window.D.roomId},function(resp){
               dialog({title:"提示",
                    content:resp.msg,
                    quickClose: true,
                    button: [{
                        value: '我知道啦',
                        callback: function () {
                            return true;
                        }
                    }]
                }).show();
            });
       
    }

    function postZT(postTid,zc){
        //if(window.D.HOT.ztMap[postTid]) return;
        if(this.sending)return;
        this.sending = true;
        var self = this;
        setTimeout(function(){
            self.sending = false;
        },3000);
         $.post('/hot/zt',{"tid":postTid,roomId:window.D.roomId,zc:zc},function(resp){
            self.sending = false;
            if(resp.code == 0){
                window.D.HOT.ztMap[postTid] = 1;
               /* $item = $('#js-zt-teacher-'+postTid).find(".zt-zc-btn");
                $item1 = $('#js-zt-teacher-'+postTid).find(".zt-tt-btn");
                $item.removeClass("zt-zc-btn").addClass('zt-goted');
                $item1.removeClass("zt-tt-btn").addClass('zt-goted');
                $item.html("已投");
                $item1.html("已投");*/
                $('#js-zt-teacher-'+postTid).find(".zt-zc-bg span").html(resp.zc_total);
                $('#js-zt-teacher-'+postTid).find(".zt-tt-bg span").html(resp.tt_total);
            }else{
                dialog({title:"提示",
                    content:resp.msg,
                    quickClose: true,
                    button: [{
                        value: '我知道啦',
                        callback: function () {
                            return true;
                        }
                    }]
                }).show();
            }
        });
    }
    function postHot(postTid){
        if(this.sending)return;
        this.sending = true;
        var self = this;
        setTimeout(function(){
            self.sending = false;
        },3000);
        $.post('/hot/send',{"tid":postTid,roomId:window.D.roomId},function(resp){
            if(resp.code == 0){
                //$('#js-hot-teacher-'+postTid).find(".zan_teacher").addClass("zan");
                //$('#js-hot-teacher-'+postTid).find(".zan_teacher").html("已"+window.D.hot_btn);
                $('#js-hot-teacher-'+postTid).find(".hot-rank-num").html(resp.total);
                if(resp.show){
                     dialog({title:"提示",
                        content:resp.msg,
                        quickClose: true,
                        button: [{
                            value: '我知道啦',
                            callback: function () {
                                return true;
                            }
                        }]
                    }).show();
                }
            }else if(resp.code == 203){
                var tid = resp.tid;
                resp.id = "js-hot-dialog";
                dialog({
                    title:"提示",
                    content:$("#js-hot-question-tmpl").render(resp),
                    button: [{
                        value: '确定',
                        callback: function () {
                            var allchecked = true;
                            var map = {tid:tid,ask:[],answer:[],roomId:window.D.roomId};
                            $('#js-hot-dialog li').each(function(n,v){
                                var val = $(v).find('input:radio:checked').val();
                                if(val == undefined){
                                    allchecked = false;
                                }else{
                                    map.ask.push($(this).attr('data-id'));
                                    map.answer.push(val);
                                }
                            })
                            if(!allchecked){
                                dialog({title:"提示",
                                    content:"请选择问题答案",
                                    quickClose: true,
                                    button: [{
                                        value: '我知道啦',
                                        callback: function () {
                                            return true;
                                        }
                                    }]
                                }).show();
                            }else{
                                var that =this;
                                dialog({title:"提示",
                                    content:"您仅有一次投票机会，继续请确定，返回请取消",
                                    quickClose: true,
                                    button: [{
                                        value: '确定',
                                        callback: function () {
                                            $.post('/hot/answer',map,function(ret){
                                                that.close().remove();
                                                if(ret.code == 0){
                                                    $('#js-hot-teacher-'+postTid).find(".zan_teacher").addClass("zan");
                                                    $('#js-hot-teacher-'+postTid).find(".zan_teacher").html("已投票");
                                                    $('#js-hot-teacher-'+postTid).find(".hot-rank-num").html(resp.total);
                                                    dialog({title:"提示",
                                                        content:ret.msg,
                                                        quickClose: true,
                                                        button: [{
                                                            value: '我知道啦',
                                                            callback: function () {
                                                                return true;
                                                            }
                                                        }]
                                                    }).show();
                                                }else{
                                                    dialog({title:"提示",
                                                        content:"投票失败:答案错误！",
                                                        quickClose: true,
                                                        button: [{
                                                            value: '我知道啦',
                                                            callback: function () {
                                                                that.close().remove();
                                                                return true;
                                                            }
                                                        }]
                                                    }).show();
                                                }

                                            })
                                            return true;
                                        }
                                    },{
                                        value: '取消',
                                        callback: function () {
                                            return true;
                                        }
                                    }]
                                }).show();
                                
                            }
                            return false;
                        }
                    },{
                        value: '取消',
                        callback: function () {
                            return true;
                        }
                    }]
                }).showModal();
            }else{
                dialog({title:"提示",
                    content:resp.msg,
                    quickClose: true,
                    button: [{
                        value: '我知道啦',
                        callback: function () {
                            return true;
                        }
                    }]
                }).show();
            }
        })
    }
}

function playVod(vodurl){
    $('#js-vod-player-wrap').show();
    if(window._vodDialog){
        window._vodDialog.remove();
    }
    pushVideoffline();
    $('#js-vod-player-wrap').empty();
    var objectPlayer=new aodianPlayer({
        container:'js-vod-player-wrap',
        hlsUrl: vodurl,
        width: '100%',
        height: '100%',
        autostart: true,
        bufferlength: '1',
        maxbufferlength: '2',
        stretching: '1',
        controlbardisplay: 'enable',
    });
}
function pushVideoOnline(data){
    $('#js-vod-player-wrap').hide();
    if(data.vod_url){
        setVideoChannel(4,null,data.vod_url);
    }else{
        setVideoChannel(data.live_type,data.live_play,data.live_hls);
    }
}
function pushVideoffline(){
    if(window.D.onVideoOff){
        window.D.onVideoOff();
    }
    $('#js-video-player-wrap').empty();
}
function setVideoChannel(channelType,rtmpUrl,hlsUrl){
    $videoPlayerWrap = $('#js-video-player-wrap');
    var isTeacher = window.D.USER.isTeacher;
    if( channelType == 4  ||channelType == 8){
        $videoPlayerWrap.empty();
        var objectPlayer=new aodianPlayer({
            container:$videoPlayerWrap.attr("id"),
            rtmpUrl:  rtmpUrl,
            hlsUrl: hlsUrl,
            width: '100%',
            height: '100%',
            autostart: true,
            bufferlength: '1',
            maxbufferlength: '2',
            stretching: '1',
            controlbardisplay: 'enable',
        });
        if (isTeacher) {
            var timer = setInterval(function(){
                if(objectPlayer.setMute && objectPlayer.handle){
                    objectPlayer.setMute(true);
                    clearInterval(timer);
                }
            },50)
        }
    }else if(channelType == 5 ){
        $videoPlayerWrap.empty();
        var objectPlayer=new mpsPlayer({
            container:'js-video-player-wrap',//播放器容器ID，必要参数
            uin: rtmpUrl,//用户ID
            appId: hlsUrl,//播放实例ID
            width: '100%',//播放器宽度，可用数字、百分比等
            height: '100%',//播放器高度，可用数字、百分比等
            autostart: true,//是否自动播放，默认为false
            controlbardisplay: 'enable',//是否显示控制栏，值为：disable、enable默认为disable。
            isclickplay: false,//是否单击播放，默认为false
            isfullscreen: true//是否双击全屏，默认为true
        });
        if (isTeacher) {
            var timer = setInterval(function(){
                if(objectPlayer.setMute&& objectPlayer.handle){
                    objectPlayer.setMute(true);
                    clearInterval(timer);
                }
            },50)
        }
    }else if(channelType == 20){
        $videoPlayerWrap.html('<video id="videoElement" class="centeredVideo" controls autoplay width="100%" height="100%">Your browser is too old which doesnot support HTML5 video.</video>');
        var player = document.getElementById('videoElement');
        if (flvjs.isSupported()) {
            var flvPlayer = flvjs.createPlayer({
                type: 'flv',
                url: rtmpUrl,
                enableWorker:true,
            });
            flvPlayer.attachMediaElement(videoElement);
            flvPlayer.load(); //加载
            flvPlayer.play();
        }
        window.D.onVideoOff =  function(){
            if(flvPlayer){
                flvPlayer.unload();
                flvPlayer.detachMediaElement();
                flvPlayer.destroy();
                flvPlayer = null;
            }
        }
    }else{
        var $videoPlayerTmpl = null;
        if(channelType == 3){
            $videoPlayerTmpl =  $('#js-video-yy-tmpl');
        }else if(channelType == 9 || channelType == 11){
            $videoPlayerTmpl =  $("#js-video-yynew-tmpl");
        }
        if($videoPlayerTmpl){
            var palyerParames = {
                channelNumber:  rtmpUrl,
                width: $videoPlayerWrap.width(),
                height: $videoPlayerWrap.height()
            }
            $videoPlayerWrap.empty().append($videoPlayerTmpl.render(palyerParames));
        }
        
    }
}


function initArena(){
    
    window.__renderArena = function(data){
        $('.sider-arena .arena-body').html( $('#js-arena-tmpl').render(data) );
        $('.arena-btn').click(onArena)
    }
    function onArena(){
        if(!window.D.USER.logined){
            showLoginDialog();
            return;
        }
        if( this.getting ){
            return;
        }
        this.getting = 1;
        var self = this;
        var timer = setTimeout(function(){
            self.getting = 0;
            timer = 0;
        },5000);
        $.get('/arena/history',function(resp){
            self.getting = 0;
            if(timer) {
                clearTimeout(timer);
                timer = 0;
            }
            var html = $('#js-arena-history-tmpl').render(resp);
            var myDlg = dialog({
                content: html,
                backdropOpacity:0.0,
                quickClose:false,
                padding:'0px',
                title:"1",
                width:430,
                skin: 'notitle-dialog',
      
            });
            myDlg.showModal();
            $('.arena-history-box .body').niceScroll({
                cursorborder: '',
                horizrailenabled: false,
                cursorcolor: '#999',
                boxzoom: false
            });
            $(".arena-wy-btn").click(function(){
                myDlg.remove();
                onMyArena();
            });
        })
    }
    function onMyArena(){
        var myDlg = dialog({
            content: $("#js-arena-post-tmpl").render({}),
            backdropOpacity:0.0,
            quickClose:false,
            padding:'0px',
            title:"1",
            skin: 'notitle-dialog',
  
        });
        myDlg.showModal();

        $(".arena-post-btn").click(function(){

            if( onSubmit() ){
                myDlg.remove();
            }
        });
    }
    function onSubmit(){
        var stock_name = $(".arena-post-box .stock_name").val();
        //var contact_info = $(".arena-post-box .contact_info").val();
        if(!stock_name ){
            return false;
        }
        $.post('/arena/send',{stock_name:stock_name},function(resp){
            if(resp.code == 0){
                dialog({title:"攻擂提示",
                    content:resp.msg,
                    quickClose: true,
                    button: [{
                        value: '我知道啦',
                        callback: function () {
                        return true;
                        }
                    }]
                }).show();
            }
        });
        return true;
    }
}

function initQuestion(){
    var questionDlg = null;
    $('.js-ui-dialog-4036').bind("click",function(){
        var questionDlg = dialog({
            content: $('#js-question-history-box-tmpl').render({}),
            backdropOpacity:0.0,
            quickClose:false,
            padding:'0px',
            title:"1",
            width:430,
            skin: 'notitle-dialog',
            onclose:function(){
                questionDlg = null;
            }
        });
        questionDlg.showModal();
        $('.question-history-box .body').niceScroll({
            cursorborder: '',
            horizrailenabled: false,
            cursorcolor: '#999',
            boxzoom: false
        });
        $(".question-wy-btn").click(function(){
            onMyArena();
        });
        getQuestion();
    });
    function getQuestion(){
        if(!window.D.USER.logined){
            showLoginDialog();
            return;
        }
        if( this.getting ){
            return;
        }
        this.getting = 1;
        var self = this;
        var timer = setTimeout(function(){
            self.getting = 0;
            timer = 0;
        },5000);
        $.get('/question/history',function(resp){
            self.getting = 0;
            if(timer) {
                clearTimeout(timer);
                timer = 0;
            }
            var html = $('#js-question-history-tmpl').render(resp);
            $('.question-history-box .body').html(html);
            
        })
    }
    function onMyArena(){
        var myDlg = dialog({
            content: $("#js-question-post-tmpl").render({}),
            backdropOpacity:0.0,
            quickClose:false,
            padding:'0px',
            title:"1",
            skin: 'notitle-dialog',

        });
        myDlg.showModal();

        $(".question-post-btn").click(function(){

            if( onSubmit() ){
                myDlg.remove();
            }
        });
    }
    function onSubmit(){
        var text = $(".question-post-box .question-text").val();

        if(!text){
            return false;
        }
        $.post('/question/send',{text:text},function(resp){
            if(resp.code == 0){
                getQuestion();
            }
            dialog({title:"提示",
                content:resp.msg,
                quickClose: true,
                button: [{
                    value: '我知道啦',
                    callback: function () {
                    return true;
                    }
                }]
            }).show();
            
        });
        return true;
    }
}


function showEwmDlg($title,$url){
    var dlg = dialog({title:$title,
        content:"<div id='idPayEwm'></div>",
        backdropOpacity:0.2,
    }).showModal();
    showQrCode('#idPayEwm',$url);
    return dlg;
}


function checkPhone(phonenum){
    var reg = /^13[0-9]{9}$|14[0-9]{9}|15[0-9]{9}|17[0-9]{9}$|18[0-9]{9}$/;
    return reg.test(phonenum);
}
function initLuckMoney(){
    var TotalMilliSeconds = 0;
    function takeCount() {
        TotalMilliSeconds--;
        if (TotalMilliSeconds <= 0) {
            clearInterval(smsTimer);
            $(".lm-phone-check .js-send-code").removeAttr("disabled");
            $('.lm-phone-check .js-send-code').html("重发验证码");
            return;
        }
        $('.lm-phone-check .js-send-code').html("[" + TotalMilliSeconds + "]秒重发");
    }
    var __sendSMS = function(option) {
        TotalMilliSeconds = 10;
        $.ajax({
            type: 'POST',
            url: '/luckmoney/sms',
            data: {
                phonenum: option.phonenum,
                captcha: option.captcha,
                type:option.type,
                roomId:option.roomId,
                lmId:option.lmId,
            },
            dataType: 'json',
            async: true,
            success: function(data) {
                if (data.code == 0) {
                    if (option.suc) {
                        option.suc(data);
                    }
                } else {
                    if (option.fail) {
                        option.fail(data);
                    }
                }
            },
            error: option.fail,
        });
    };
    $("body").delegate('.lm-phone-check .js-send-code','click', function(){
        var phonenum = $('.lm-phone-check .js-phone').val();
        var captcha = $('.lm-phone-check').attr('data-captcha');
        var lmId = $('.lm-phone-check').attr('data-id');
        if(!checkPhone(phonenum)){
            dialog({title:"错误",content:"请输入正确的手机号码",quickClose: true}).show();
            return;
        }
        if (TotalMilliSeconds > 0) return
        __sendSMS({
            phonenum:phonenum,
            captcha:captcha,
            type:'luckmoney',
            roomId:window.D.roomId,
            lmId:lmId,
            suc:function(){
                $("#sent_message_code").attr("disabled","disabled");
                $('#sent_message_code').html("[300]秒重发");
                TotalMilliSeconds = 300;
                smsTimer = setInterval(takeCount, 1000);
            },
            fail:function(data){
                dialog({title:"错误",content:data.msg,quickClose: true}).show();
                $("#sent_message_code").attr("disabled","disabled");
                $('#sent_message_code').html("[10]秒重发");
                TotalMilliSeconds = 10;
                smsTimer = setInterval(takeCount, 1000);
            }
        })
    });
    $("body").delegate('.lm-phone-check .lm-btn-suc','click', function(){
        var phonenum = $('.lm-phone-check .js-phone').val();
        var smsCode = $('.lm-phone-check .js-smsCode').val();
        var id = $('.lm-phone-check').attr('data-id');
        sendGot(id,phonenum,smsCode);
    });
    function sendCheck(id){
        if(this.goting){
            return;
        }
        this.goting = true;
        var self = this;
        $.post('/luckmoney/check/' + window.D.roomId, { 'id': id }, function(resp,err) {
            setTimeout(function(){
                self.goting = false;
            },1000);
            if(resp.code == 0){
                if(resp.needPhone){
                    window._phoneCheckDlg = dialog({
                        content: $('#js-luckmoney-phone-tmpl').render(resp),
                        backdropOpacity:0.3,
                        drag:true,
                        padding:'0px',
                        height:314,
                        title:"红包",
                        skin:"notitle-dialog nobg-dialog",
                    });
                    window._phoneCheckDlg.showModal();
                }
                
            }else if(resp.code == 401 || resp.code == 404) {
                window._lmFailDlg = dialog({
                    content: $('#js-gotfail-luckmoney-tmpl').render(resp),
                    backdropOpacity:0.3,
                    drag:true,
                    padding:'0px',
                    height:261,
                    title:"红包",
                    skin:"notitle-dialog nobg-dialog",
                });
                window._lmFailDlg.showModal();
            }else{
                dialog({
                    content: "你已经抢过改红包了。",
                    backdropOpacity:0.3,
                    drag:true,
                    quickClose: true,
                    title:"红包",
                }).showModal();
            }
        });
    }
    function sendGot(id,phone,smsCode){
        if(this.goting){
            return;
        }
        this.goting = true;
        $.post('/luckmoney/got/' + window.D.roomId, { 'id': id,'phone':phone,smsCode:smsCode }, function(resp,err) {
            setTimeout(function(){
                self.goting = false;
            },1000);
            TotalMilliSeconds = 10;
            if(resp && resp.code == 0){
                TotalMilliSeconds = 0;
                if(window._phoneCheckDlg)window._phoneCheckDlg.remove();
                window._lmSucDlg = dialog({
                    content: $('#js-gotsuc-luckmoney-tmpl').render(resp),
                    backdropOpacity:0.3,
                    drag:true,
                    padding:'0px',
                    height:261,
                    title:"红包",
                    skin:"notitle-dialog nobg-dialog",
                });
                window._lmSucDlg.showModal();
            }else if(resp){
                if(resp.code == 403){
                    TotalMilliSeconds = 0;
                     if(window._phoneCheckDlg)window._phoneCheckDlg.remove();
                    window._lmFailDlg = dialog({
                        content: $('#js-gotfail-luckmoney-tmpl').render(resp),
                        backdropOpacity:0.3,
                        drag:true,
                        padding:'0px',
                        height:261,
                        title:"红包",
                        skin:"notitle-dialog nobg-dialog",
                    });
                    window._lmFailDlg.showModal();
                }else if(resp.code == 110){
                    dialog({
                        content: resp.msg,
                        backdropOpacity:0.3,
                        drag:true,
                        title:"红包",
                        quickClose: true,
                    }).show();
                }else if(resp.code == 401){
                    showLoginDialog();
                }else{
                    if(window._phoneCheckDlg)window._phoneCheckDlg.remove();
                    dialog({
                        content: resp.msg,
                        backdropOpacity:0.3,
                        drag:true,
                        title:"红包",
                        quickClose: true,
                    }).show();
                }
            }else{
                dialog({
                    content: "系统繁忙",
                    backdropOpacity:0.3,
                    drag:true,
                    title:"红包异常",
                    quickClose: true,
                }).show();
            }
         }); 
    }
    
     $('body').delegate('.lm-got-bg .btn-got', 'click', function() {
        if(window.D.luckmoney_need_phone){
            sendCheck($(this).attr('data-id'));
        }else{
            sendGot($(this).attr('data-id'),"","");
        }
        
    });
}