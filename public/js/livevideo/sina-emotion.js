/*!
 * jQuery Sina Emotion v2.1.0
 * http://www.clanfei.com/
 *
 * Copyright 2012-2014 Lanfei
 * Released under the MIT license
 *
 * Date: 2014-05-19T20:10:23+0800
 */
(function($) {

	var $target;

	var options;

	var emotions;

	var categories;

	window.emotionsMap;

	var parsingArray = [];

	var defCategory = '默认';



	var initEvents = function() {
		$('body').bind({
			click: function() {
				if(!options.noAutoHide){
                    $(options.container).hide();
				    $('.bottom-wrap').removeClass('active');
                }
			}
		});

		$(options.container).bind({
			click: function(event) {
				event.stopPropagation();
			}
		}).delegate('.prev', {
			click: function(event) {
				var page = $(options.container +' .categories').data('page');
				showCatPage(page - 1);
				event.preventDefault();
			}
		}).delegate('.next', {
			click: function(event) {
				var page = $(options.container +' .categories').data('page');
				showCatPage(page + 1);
				event.preventDefault();
			}
		}).delegate('.category', {
			click: function(event) {
				$(options.container +' .categories .current').removeClass('current');
				showCategory($.trim($(this).addClass('current').text()));
				event.preventDefault();
			}
		}).delegate('.page', {
			click: function(event) {
				$(options.container +' .pages .current').removeClass('current');
				var page = parseInt($(this).addClass('current').text() - 1);
				showFacePage(page);
				event.preventDefault();
			}
		}).delegate('.face', {
			click: function(event) {
				event.preventDefault();
				//$('.bottom-wrap').removeClass('active');
				//$(options.container).hide();
				$target.insertText($(this).children('img').prop('alt'));
			}
		});
	};

	var loadEmotions = function(callback) {

		if(emotions){
			callback && callback();
			return;
		}

		if (!options) {
			options = $.fn.sinaEmotion.options;
            if(!options.container){
                options.container = "#sinaEmotion";
            }
		}

		emotions = {};
		categories = [];
		window.emotionsMap = {};
        if($(options.container +"").length ==  0){
            $('body').append('<div id="sinaEmotion" class="sina-emo">正在加载，请稍后...</div>');
        }
		initEvents();
				var json = {
        "code": 1,
        "data": [{
            "phrase": "[坏笑]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/50/pcmoren_huaixiao_org.png",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/50/pcmoren_huaixiao_thumb.png",
            "value": "[坏笑]"
        },
        {
            "phrase": "[舔屏]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/40/pcmoren_tian_org.png",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/40/pcmoren_tian_thumb.png",
            "value": "[舔屏]"
        },
        {
            "phrase": "[污]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/3c/pcmoren_wu_org.png",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/3c/pcmoren_wu_thumb.png",
            "value": "[污]"
        },
        {
            "phrase": "[微笑]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/5c/huanglianwx_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/5c/huanglianwx_thumb.gif",
            "value": "[微笑]"
        },
        {
            "phrase": "[嘻嘻]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/0b/tootha_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/0b/tootha_thumb.gif",
            "value": "[嘻嘻]"
        },
        {
            "phrase": "[哈哈]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6a/laugh.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6a/laugh.gif",
            "value": "[哈哈]"
        },
        {
            "phrase": "[可爱]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/14/tza_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/14/tza_thumb.gif",
            "value": "[可爱]"
        },
        {
            "phrase": "[可怜]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/af/kl_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/af/kl_thumb.gif",
            "value": "[可怜]"
        },
        {
            "phrase": "[挖鼻]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/0b/wabi_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/0b/wabi_thumb.gif",
            "value": "[挖鼻]"
        },
        {
            "phrase": "[吃惊]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/f4/cj_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/f4/cj_thumb.gif",
            "value": "[吃惊]"
        },
        {
            "phrase": "[害羞]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6e/shamea_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6e/shamea_thumb.gif",
            "value": "[害羞]"
        },
        {
            "phrase": "[挤眼]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/c3/zy_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/c3/zy_thumb.gif",
            "value": "[挤眼]"
        },
        {
            "phrase": "[闭嘴]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/29/bz_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/29/bz_thumb.gif",
            "value": "[闭嘴]"
        },
        {
            "phrase": "[鄙视]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/71/bs2_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/71/bs2_thumb.gif",
            "value": "[鄙视]"
        },
        {
            "phrase": "[爱你]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6d/lovea_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6d/lovea_thumb.gif",
            "value": "[爱你]"
        },
        {
            "phrase": "[泪]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/9d/sada_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/9d/sada_thumb.gif",
            "value": "[泪]"
        },
        {
            "phrase": "[偷笑]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/19/heia_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/19/heia_thumb.gif",
            "value": "[偷笑]"
        },
        {
            "phrase": "[亲亲]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/8f/qq_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/8f/qq_thumb.gif",
            "value": "[亲亲]"
        },
        {
            "phrase": "[生病]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/b6/sb_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/b6/sb_thumb.gif",
            "value": "[生病]"
        },
        {
            "phrase": "[太开心]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/58/mb_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/58/mb_thumb.gif",
            "value": "[太开心]"
        },
        {
            "phrase": "[白眼]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d9/landeln_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d9/landeln_thumb.gif",
            "value": "[白眼]"
        },
        {
            "phrase": "[右哼哼]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/98/yhh_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/98/yhh_thumb.gif",
            "value": "[右哼哼]"
        },
        {
            "phrase": "[左哼哼]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6d/zhh_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6d/zhh_thumb.gif",
            "value": "[左哼哼]"
        },
        {
            "phrase": "[嘘]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/a6/x_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/a6/x_thumb.gif",
            "value": "[嘘]"
        },
        {
            "phrase": "[衰]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/af/cry.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/af/cry.gif",
            "value": "[衰]"
        },
        {
            "phrase": "[委屈]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/73/wq_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/73/wq_thumb.gif",
            "value": "[委屈]"
        },
        {
            "phrase": "[吐]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/9e/t_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/9e/t_thumb.gif",
            "value": "[吐]"
        },
        {
            "phrase": "[哈欠]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/cc/haqianv2_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/cc/haqianv2_thumb.gif",
            "value": "[哈欠]"
        },
        {
            "phrase": "[抱抱_旧]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/27/bba_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/27/bba_thumb.gif",
            "value": "[抱抱_旧]"
        },
        {
            "phrase": "[怒]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/7c/angrya_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/7c/angrya_thumb.gif",
            "value": "[怒]"
        },
        {
            "phrase": "[疑问]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/5c/yw_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/5c/yw_thumb.gif",
            "value": "[疑问]"
        },
        {
            "phrase": "[馋嘴]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/a5/cza_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/a5/cza_thumb.gif",
            "value": "[馋嘴]"
        },
        {
            "phrase": "[拜拜]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/70/88_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/70/88_thumb.gif",
            "value": "[拜拜]"
        },
        {
            "phrase": "[思考]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/e9/sk_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/e9/sk_thumb.gif",
            "value": "[思考]"
        },
        {
            "phrase": "[汗]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/24/sweata_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/24/sweata_thumb.gif",
            "value": "[汗]"
        },
        {
            "phrase": "[困]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/40/kunv2_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/40/kunv2_thumb.gif",
            "value": "[困]"
        },
        {
            "phrase": "[睡]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/96/huangliansj_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/96/huangliansj_thumb.gif",
            "value": "[睡]"
        },
        {
            "phrase": "[钱]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/90/money_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/90/money_thumb.gif",
            "value": "[钱]"
        },
        {
            "phrase": "[失望]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/0c/sw_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/0c/sw_thumb.gif",
            "value": "[失望]"
        },
        {
            "phrase": "[酷]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/40/cool_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/40/cool_thumb.gif",
            "value": "[酷]"
        },
        {
            "phrase": "[色]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/20/huanglianse_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/20/huanglianse_thumb.gif",
            "value": "[色]"
        },
        {
            "phrase": "[哼]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/49/hatea_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/49/hatea_thumb.gif",
            "value": "[哼]"
        },
        {
            "phrase": "[鼓掌]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/36/gza_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/36/gza_thumb.gif",
            "value": "[鼓掌]"
        },
        {
            "phrase": "[晕]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d9/dizzya_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d9/dizzya_thumb.gif",
            "value": "[晕]"
        },
        {
            "phrase": "[悲伤]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/1a/bs_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/1a/bs_thumb.gif",
            "value": "[悲伤]"
        },
        {
            "phrase": "[抓狂]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/62/crazya_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/62/crazya_thumb.gif",
            "value": "[抓狂]"
        },
        {
            "phrase": "[黑线]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/91/h_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/91/h_thumb.gif",
            "value": "[黑线]"
        },
        {
            "phrase": "[阴险]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6d/yx_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6d/yx_thumb.gif",
            "value": "[阴险]"
        },
        {
            "phrase": "[怒骂]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/60/numav2_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/60/numav2_thumb.gif",
            "value": "[怒骂]"
        },
        {
            "phrase": "[互粉]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/89/hufen_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/89/hufen_thumb.gif",
            "value": "[互粉]"
        },
        {
            "phrase": "[心]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/40/hearta_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/40/hearta_thumb.gif",
            "value": "[心]"
        },
        {
            "phrase": "[伤心]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/ea/unheart.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/ea/unheart.gif",
            "value": "[伤心]"
        },
        {
            "phrase": "[母亲节]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/36/carnation_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/36/carnation_thumb.gif",
            "value": "[母亲节]"
        },
        {
            "phrase": "[猪头]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/58/pig.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/58/pig.gif",
            "value": "[猪头]"
        },
        {
            "phrase": "[熊猫]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6e/panda_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6e/panda_thumb.gif",
            "value": "[熊猫]"
        },
        {
            "phrase": "[兔子]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/81/rabbit_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/81/rabbit_thumb.gif",
            "value": "[兔子]"
        },
        {
            "phrase": "[ok]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d6/ok_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d6/ok_thumb.gif",
            "value": "[ok]"
        },
        {
            "phrase": "[耶]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d9/ye_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d9/ye_thumb.gif",
            "value": "[耶]"
        },
        {
            "phrase": "[good]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d8/good_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d8/good_thumb.gif",
            "value": "[good]"
        },
        {
            "phrase": "[NO]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/ae/buyao_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/ae/buyao_org.gif",
            "value": "[NO]"
        },
        {
            "phrase": "[赞]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d0/z2_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d0/z2_thumb.gif",
            "value": "[赞]"
        },
        {
            "phrase": "[来]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/40/come_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/40/come_thumb.gif",
            "value": "[来]"
        },
        {
            "phrase": "[弱]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d8/sad_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d8/sad_thumb.gif",
            "value": "[弱]"
        },
        {
            "phrase": "[草泥马]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/7a/shenshou_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/7a/shenshou_thumb.gif",
            "value": "[草泥马]"
        },
        {
            "phrase": "[神马]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/60/horse2_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/60/horse2_thumb.gif",
            "value": "[神马]"
        },
        {
            "phrase": "[囧]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/15/j_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/15/j_thumb.gif",
            "value": "[囧]"
        },
        {
            "phrase": "[浮云]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/bc/fuyun_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/bc/fuyun_thumb.gif",
            "value": "[浮云]"
        },
        {
            "phrase": "[给力]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/1e/geiliv2_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/1e/geiliv2_thumb.gif",
            "value": "[给力]"
        },
        {
            "phrase": "[围观]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/f2/wg_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/f2/wg_thumb.gif",
            "value": "[围观]"
        },
        {
            "phrase": "[威武]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/70/vw_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/70/vw_thumb.gif",
            "value": "[威武]"
        },
        {
            "phrase": "[话筒]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/9f/huatongv2_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/9f/huatongv2_thumb.gif",
            "value": "[话筒]"
        },
        {
            "phrase": "[蜡烛]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d9/lazhuv2_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d9/lazhuv2_thumb.gif",
            "value": "[蜡烛]"
        },
        {
            "phrase": "[蛋糕]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/3a/cakev2_thumb.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/3a/cakev2_thumb.gif",
            "value": "[蛋糕]"
        },
        {
            "phrase": "[发红包]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/ca/fahongbao_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/ca/fahongbao_thumb.gif",
            "value": "[发红包]"
        },
        {
            "phrase": "[红包飞]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/c8/../e0/hongbao1_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/c8/../e0/hongbao1_thumb.gif",
            "value": "[红包飞]"
        },
        {
            "phrase": "[广告]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/60/ad_new0902_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/60/ad_new0902_thumb.gif",
            "value": "[广告]"
        },
        {
            "phrase": "[doge]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/b6/doge_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/b6/doge_thumb.gif",
            "value": "[doge]"
        },
        {
            "phrase": "[喵喵]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/4a/mm_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/4a/mm_thumb.gif",
            "value": "[喵喵]"
        },
        {
            "phrase": "[二哈]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/74/moren_hashiqi_org.png",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/74/moren_hashiqi_thumb.png",
            "value": "[二哈]"
        },
        {
            "phrase": "[哆啦A梦吃惊]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/f0/dorachijing_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/f0/dorachijing_thumb.gif",
            "value": "[哆啦A梦吃惊]"
        },
        {
            "phrase": "[哆啦A梦微笑]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/9e/jqmweixiao_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/9e/jqmweixiao_thumb.gif",
            "value": "[哆啦A梦微笑]"
        },
        {
            "phrase": "[哆啦A梦花心]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/08/dorahaose_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/08/dorahaose_thumb.gif",
            "value": "[哆啦A梦花心]"
        },
        {
            "phrase": "[笑cry]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/34/xiaoku_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/34/xiaoku_thumb.gif",
            "value": "[笑cry]"
        },
        {
            "phrase": "[摊手]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/09/pcmoren_tanshou_org.png",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/09/pcmoren_tanshou_thumb.png",
            "value": "[摊手]"
        },
        {
            "phrase": "[抱抱]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/70/pcmoren_baobao_org.png",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/70/pcmoren_baobao_thumb.png",
            "value": "[抱抱]"
        },
        {
            "phrase": "[冰川时代希德奶奶]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/35/bhsj5_nainai_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/35/bhsj5_nainai_thumb.gif",
            "value": "[冰川时代希德奶奶]"
        },
        {
            "phrase": "[快银]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/7e/xman_kuaiyin_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/7e/xman_kuaiyin_org.gif",
            "value": "[快银]"
        },
        {
            "phrase": "[暴风女]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/7b/xman_baofengnv_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/7b/xman_baofengnv_thumb.gif",
            "value": "[暴风女]"
        },
        {
            "phrase": "[芒果流口水]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/64/mango_07_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/64/mango_07_thumb.gif",
            "value": "[芒果流口水]"
        },
        {
            "phrase": "[芒果点赞]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/5c/mango_12_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/5c/mango_12_thumb.gif",
            "value": "[芒果点赞]"
        },
        {
            "phrase": "[芒果大笑]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/9f/mango_02_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/9f/mango_02_thumb.gif",
            "value": "[芒果大笑]"
        },
        {
            "phrase": "[芒果得意]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/ee/mango_03_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/ee/mango_03_thumb.gif",
            "value": "[芒果得意]"
        },
        {
            "phrase": "[芒果萌萌哒]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/49/mango_11_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/49/mango_11_thumb.gif",
            "value": "[芒果萌萌哒]"
        },
        {
            "phrase": "[羊年大吉]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/cc/yangniandj_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/cc/yangniandj_thumb.gif",
            "value": "[羊年大吉]"
        },
        {
            "phrase": "[西瓜]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6b/watermelon.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6b/watermelon.gif",
            "value": "[西瓜]"
        },
        {
            "phrase": "[足球]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/c0/football.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/c0/football.gif",
            "value": "[足球]"
        },
        {
            "phrase": "[老妈我爱你]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/46/mothersday_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/46/mothersday_thumb.gif",
            "value": "[老妈我爱你]"
        },

        {
            "phrase": "[肥皂]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/e5/soap_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/e5/soap_thumb.gif",
            "value": "[肥皂]"
        },
        {
            "phrase": "[有钱]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/e6/youqian_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/e6/youqian_thumb.gif",
            "value": "[有钱]"
        },
        {
            "phrase": "[地球一小时]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/dc/earth1r_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/dc/earth1r_thumb.gif",
            "value": "[地球一小时]"
        },
        {
            "phrase": "[国旗]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/dc/flag_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/dc/flag_thumb.gif",
            "value": "[国旗]"
        },
        {
            "phrase": "[许愿]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/87/lxhxuyuan_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/87/lxhxuyuan_thumb.gif",
            "value": "[许愿]"
        },
        {
            "phrase": "[风扇]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/92/fan.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/92/fan.gif",
            "value": "[风扇]"
        },
        {
            "phrase": "[炸鸡和啤酒]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/f4/zhaji_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/f4/zhaji_thumb.gif",
            "value": "[炸鸡和啤酒]"
        },
        {
            "phrase": "[雪]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/00/snow_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/00/snow_thumb.gif",
            "value": "[雪]"
        },
        {
            "phrase": "[马上有对象]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/ee/mashangyouduixiang_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/ee/mashangyouduixiang_thumb.gif",
            "value": "[马上有对象]"
        },
        {
            "phrase": "[马到成功旧]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/30/madaochenggong_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/30/madaochenggong_thumb.gif",
            "value": "[马到成功旧]"
        },
        {
            "phrase": "[青啤鸿运当头]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/f8/hongyun_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/f8/hongyun_thumb.gif",
            "value": "[青啤鸿运当头]"
        },
        {
            "phrase": "[让红包飞]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/0b/hongbaofei2014_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/0b/hongbaofei2014_thumb.gif",
            "value": "[让红包飞]"
        },
        {
            "phrase": "[ali做鬼脸]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/20/alizuoguiliannew_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/20/alizuoguiliannew_thumb.gif",
            "value": "[ali做鬼脸]"
        },
        {
            "phrase": "[ali哇]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/de/aliwanew_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/de/aliwanew_thumb.gif",
            "value": "[ali哇]"
        },
        {
            "phrase": "[xkl转圈]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/f4/xklzhuanquan_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/f4/xklzhuanquan_thumb.gif",
            "value": "[xkl转圈]"
        },
        {
            "phrase": "[酷库熊顽皮]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/46/kxwanpi_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/46/kxwanpi_thumb.gif",
            "value": "[酷库熊顽皮]"
        },
        {
            "phrase": "[bm可爱]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/95/bmkeai_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/95/bmkeai_thumb.gif",
            "value": "[bm可爱]"
        },
        {
            "phrase": "[BOBO爱你]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/74/boaini_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/74/boaini_thumb.gif",
            "value": "[BOBO爱你]"
        },
        {
            "phrase": "[转发]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/02/lxhzhuanfa_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/02/lxhzhuanfa_thumb.gif",
            "value": "[转发]"
        },
        {
            "phrase": "[得意地笑]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d4/lxhdeyidixiao_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d4/lxhdeyidixiao_thumb.gif",
            "value": "[得意地笑]"
        },
        {
            "phrase": "[ppb鼓掌]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/7e/ppbguzhang_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/7e/ppbguzhang_thumb.gif",
            "value": "[ppb鼓掌]"
        },
        {
            "phrase": "[din推撞]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/dd/dintuizhuang_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/dd/dintuizhuang_thumb.gif",
            "value": "[din推撞]"
        },
        {
            "phrase": "[moc转发]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/cb/moczhuanfa_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/cb/moczhuanfa_thumb.gif",
            "value": "[moc转发]"
        },
        {
            "phrase": "[lt切克闹]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/73/ltqiekenao_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/73/ltqiekenao_thumb.gif",
            "value": "[lt切克闹]"
        },
        {
            "phrase": "[江南style]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/67/gangnamstyle_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/67/gangnamstyle_thumb.gif",
            "value": "[江南style]"
        },
        {
            "phrase": "[笑哈哈]",
            "url": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/32/lxhwahaha_org.gif",
            "category": "",
            "icon": "http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/32/lxhwahaha_thumb.gif",
            "value": "[笑哈哈]"
        }]
    };


			var item, category;
			var data = json.data;

			$(options.container).html('<ul class="categories"></ul><ul class="faces"></ul><ul class="pages"></ul>');

			for (var i = 0, l = data.length; i < l; ++i) {
				item = data[i];
				category = item.category || defCategory;

				if (!emotions[category]) {
					emotions[category] = [];
					categories.push(category);
				}

				emotions[category].push({
					icon: item.icon,
					phrase: item.phrase
				});

				emotionsMap[item.phrase] = item.icon;
			}

			$(parsingArray).parseEmotion();
			parsingArray = null;

			callback && callback();
	};

	var showCatPage = function(page) {

		var html = '';
		var length = categories.length;
		var maxPage = Math.ceil(length / 5);
		var $categories = $(options.container +' .categories');
		var category = $categories.data('category') || defCategory;

		page = (page + maxPage) % maxPage;

		for (var i = page * 5; i < length && i < (page + 1) * 5; ++i) {
			html += '<li class="item"><a href="#" class="category' + (category == categories[i] ? ' current' : '') + '">' + categories[i] + '</a></li>';
		}

		$categories.data('page', page).html(html);
	};

	var showCategory = function(category) {
		$(options.container +' .categories').data('category', category);
		showFacePage(0);
		showPages();
	};

	var showFacePage = function(page) {

		var face;
		var html = '';
		var pageHtml = '';
		var rows = options.rows;
		var category = $(options.container +' .categories').data('category');
		var faces = emotions[category];
		page = page || 0;

		for (var i = page * rows, l = faces.length; i < l && i < (page + 1) * rows; ++i) {
			face = faces[i];
			html += '<li class="item"><a href="#" class="face"><img class="sina-emotion" src="' + face.icon + '" alt="' + face.phrase + '" /></a></li>';
		}

		$(options.container +' .faces').html(html);
	};

	var showPages = function() {

		var html = '';
		var rows = options.rows;
		var category = $(options.container +' .categories').data('category');
		var faces = emotions[category];
		var length = faces.length;

		if (length > rows) {
			for (var i = 0, l = Math.ceil(length / rows); i < l; ++i) {
				html += '<li class="item"><a href="#" class="page' + (i == 0 ? ' current' : '') + '">' + (i + 1) + '</a></li>';
			}
			$(options.container +' .pages').html(html).show();
		} else {
			$(options.container +' .pages').hide();
		}
	};

	/**
	 * 为某个元素设置点击事件，点击弹出表情选择窗口
	 * @param  {[type]} target [description]
	 * @return {[type]}        [description]
	 */
	$.fn.sinaEmotion = function(target) {

		target = target || function(){
			return $(this).parents('form').find('textarea,input[type=text]').eq(0);
		};

		var $that = $(this).last();
		var offset = $that.offset();

		if($that.is(':visible')){
			if(typeof target == 'function'){
				$target = target.call($that);
			}else{
				$target = $(target);
			}

			loadEmotions(function(){
				showCategory(defCategory);
				showCatPage(0);
                if(!options.nocss){
                    $(options.container).css({
                        top: offset.top - $(options.container).outerHeight() - 5,
                        left: offset.left - 9,
                    }).show();
                }else{
                    $(options.container).show();
                }
				
			});
		}
		return this;
	};

	$.fn.parseEmotion = function() {

		if(! categories){
			parsingArray = $(this);
			loadEmotions();
		}else if(categories.length == 0){
			parsingArray = parsingArray.add($(this));
		}else{
			$(this).each(function() {

				var $this = $(this);
				var html = $this.html();

				html = html.replace(/<.*?>/g, function($1) {
					$1 = $1.replace('[', '&#91;');
					$1 = $1.replace(']', '&#93;');
					return $1;
				}).replace(/\[[^\[\]]*?\]/g, function($1) {
					var url = emotionsMap[$1];
					if (url) {
						return '<img class="sina-emotion" src="' + url + '" alt="' + $1 + '" />';
					}else{
						if( $1.indexOf('upload') > 0 ){
							url = $1;
							url = $1.replace('[', '');
							url = url.replace(']', '');
							return '<img class="chat-pic" title="点击查看原图" src="' + url + '"  style="max-mwidth: 100%; max-height: 320px;" onerror="this.src=\'/assets/img/error-img.png\'" />';
						}else{
							return $1;
						}
					}
					return $1;
				});

				$this.html(html);
			});
		}

		return this;
	};

	$.fn.insertText = function(text) {
		this.each(function() {
			if (this.tagName !== 'INPUT' && this.tagName !== 'TEXTAREA') {
				return;
			}
			if (document.selection) {
				this.focus();
				var cr = document.selection.createRange();
				cr.text = text;
				cr.collapse();
				cr.select();
			} else if (this.selectionStart !== undefined) {
				var start = this.selectionStart;
				var end = this.selectionEnd;
				this.value = this.value.substring(0, start) + text + this.value.substring(end, this.value.length);
				this.selectionStart = this.selectionEnd = start + text.length;
			} else {
				this.value += text;
			}
		});
		return this;
	}

	$.fn.sinaEmotion.options = {
		rows: 54,				// 每页显示的表情数
        container:"#sinaEmotion",
	};
})(jQuery);
