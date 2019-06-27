<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <META HTTP-EQUIV="pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate">
    <META HTTP-EQUIV="expires" CONTENT="0">
    <meta name="viewport" content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="keywords" content="" />
    <meta name="description" content="股票交易系统">
    <meta name="author" content="" />
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="telephone=no" name="format-detection">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <link rel="stylesheet" href="/css/jquery.mobile-1.3.2.min.css">
    <link href="/css/global-ver.css" rel="stylesheet" type="text/css" />
    <link href="/css/index.css" rel="stylesheet" type="text/css" /> 
    <link href="/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/css/ymPrompt.css" rel="stylesheet" type="text/css" />
    <link href="/css/tip-violet.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <script src="/js/jquery.mobile-1.3.2.min.js"></script> -->
    <script src="/js/jquery-1.8.2.min.js"></script>
    <script src="/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/js/me_function.js"></script>
    <script type="text/javascript" src="/js/cookie.js"></script>
    <script type="text/javascript" src="/js/ymPrompt.js"></script>
    <script type="text/javascript" src="/js/jquery.poshytip.js"></script>
    <script type="text/javascript" src="/js/SuggestServer_3_0_16.js" charset="gb2312"></script>

    <script type="text/javascript">
        var IsOpen = 1;
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var suggestServer = new SuggestServer();
            suggestServer.bind({
                "input": "buy_code",
                "value": "@2@",
                "type": "",
                "max": 10,
                "width": 250,
                "head": ["选项", "代码", "中文名称"],
                "body": [-1, 2, 4],
                "fix": {
                    "ie6": [0, -1],
                    "ie7": [0, -1],
                    "firefox": [1, 1]
                },
                "callback": null
            });
            var initStockCode = '000001';
            $('#buy_code').val(initStockCode);
            getstockname();
            if (IsOpen == 0) 
            {
                $('#btnOk').attr('disabled', 'true');
               
                $('#xiushi').html('休市中');
            }

            $('#buy_code').blur(function() {                
                getstockname();
            });

            $("#btnOk").click(function() {
              
                var bull_code = $('#buy_code').val();
                var bull_name = $('#buy_name').text();
                var price_type = $("input[name='price_type']:checked").val();
                var buy_type = $(":radio[name='gender']:checked").val();
                var bull_price = $('#cur_price').text();
                var user_money = $('#spn_cancash').text();
                var bull_num = $('#bull_num').val();
                if (user_money.substring(5) == '0'){
                    alert('填写资金');
                    return false;
                }
                else if (bull_code == '') {
                    alert('请输入股票代码');
                    $('#btnOk').button("enable");
                    return false;
                }
                else if (typeof(buy_type) == 'undefined') {
                    alert('请选择买升或者买跌');
                    $('#btnOk').button("enable");
                    return false;
                }
                else if (bull_num < 1) {
                    alert('请输入股票数量');
                    $('#btnOk').button("enable");
                    return false;
                }
                else if (bull_num > 0 && bull_code) {
                    $.post("/site/buystock", {
                            type: "bull",
                            code: '' + bull_code + '',
                            cn_name:'' + bull_name + '',
                            buy_type: '' + buy_type + '',
                            price_type: '' + '1' + '',
                            buy_num: '' + bull_num + '',
                            buys_price: '' + bull_price + ''
                        },
                        function(data) {                            
                            console.log(data);
                            var json_data = JSON.parse(data);
                            if (json_data.error) {                                
                                alert(json_data.content);
                                $('#btnOk').button("enable");                   
                            } else if(json_data.success) {                                
                                alert(json_data.content);
                                    $('#btnOk').button("enable");   
                            }
                            $('#Msg').html(data);
                        });
                }
                return false;
            });

        });

        function getstockname() {
            code = $('#buy_code').val();
           
             if (code.length == 6) {
                $.ajax({
                    type: 'GET',
                    dataType: 'html',
                    cache: false,
                    url: '/site/getstock?stockcode=' + code,
                    success: function(res) {
                            stock = res.split(',');
                          
                            $('#buy_name').html(stock[0]);
                           
                            if (stock[3] == '1' || stock[4] == '1') 
                            {
                                $('#btnOk').attr('disabled', 'true');
                            }
                            if (stock[7] == '0') {
                                $('#can_bull_up').attr('disabled', 'true');
                            }
                            if (stock[8] == '0') {
                                $('#can_bull_down').attr('disabled', 'true');
                            }
                            $('#sell_5_price').html('<font color="#ff0000">' + Math.floor(stock[29] * 100) / 100 + '</font>');
                            $('#sell_5_num').html(Math.floor(stock[28] / 100));
                            $('#sell_4_price').html('<font color="#ff0000">' + Math.floor(stock[27] * 100) / 100 + '</font>');
                            $('#sell_4_num').html(Math.floor(stock[26] / 100));
                            $('#sell_3_price').html('<font color="#ff0000">' + Math.floor(stock[25] * 100) / 100 + '</font>');
                            $('#sell_3_num').html(Math.floor(stock[24] / 100));
                            $('#sell_2_price').html('<font color="#ff0000">' + Math.floor(stock[23] * 100) / 100 + '</font>');

                            $('#sell_2_num').html(Math.floor(stock[22] / 100));
                            $('#sell_1_price').html('<font color="#ff0000">' + Math.floor(stock[21] * 100) / 100 + '</font>');
                            $('#sell_1_num').html(Math.floor(stock[20] / 100));

                            $('#cur_price').html(Math.floor(parseFloat(stock[3]) * 100) / 100);
                            $('#cur_price2').html(Math.floor(parseFloat(stock[3]) * 100) / 100);

                            $('#buy_1_num').html(Math.floor(stock[10] / 100));
                            $('#buy_1_price').html('<font color="#ff0000">' + Math.floor(stock[11] * 100) / 100 + '</font>');
                            $('#buy_2_num').html(Math.floor(stock[12] / 100));
                            $('#buy_2_price').html('<font color="#ff0000">' + Math.floor(stock[13] * 100) / 100 + '</font>');
                            $('#buy_3_num').html(Math.floor(stock[14] / 100));
                            $('#buy_3_price').html('<font color="#ff0000">' + Math.floor(stock[15] * 100) / 100 + '</font>');
                            $('#buy_4_num').html(Math.floor(stock[16] / 100));
                            $('#buy_4_price').html('<font color="#ff0000">' + Math.floor(stock[17] * 100) / 100 + '</font>');
                            $('#buy_5_num').html(Math.floor(stock[18] / 100));
                            $('#buy_5_price').html('<font color="#ff0000">' + Math.floor(stock[19] * 100) / 100 + '</font>');
                            getProductKImage('min');                        
                    },
                    error: function() {
                    }
                });
            }  
        }
        function getProductKImage(kkstr) {
            var kuangdu = $(document.body).width();
            var area_str = "sh";
            if (kkstr == "") {
                kstr = "min";
            } else {
                kstr = kkstr;
            }
            var code = $("#buy_code").val();
            if (code.substring(0, 1) == "6") {
                area_str = "sh";
            }
            if (code.substring(0, 1) == "0" || code.substring(0, 1) == "3")
                area_str = "sz";
            if (code != "" && code.length == 6) {
                if (area_str != "") {
                    var picstr = "<div style='position:relative;' class='img-box'><img id='pic_k_id' class='sj-img' src='http://image2.sinajs.cn/newchart/" + kstr + "/n/" + area_str + code + ".gif?" + Math.random() * 100000 + "' border='0' width='" + kuangdu + "' /><i style='width: 31px;height: 20px;position: absolute;background: #1c1b29;right: 10%;top: 49.2%;'></i></div>";
                    $('#pic').html(picstr);
                }
            }
        }
    </script>
    <style>
        .ui-block-a,.ui-block-b,.ui-block-c,.ui-block-d{
            border: 1px ;
            height: 20px;
            text-align: left;
            color:white;
        }
        .ui-body-c, .ui-overlay-c {
            text-shadow: none;
            color: #FFF;
            background: transparent;
            border: 1px solid #777596;
        }
        .ui-corner-all {
            -webkit-border-radius: .3em;
            border-radius: .3em;
        }
        .ui-btn-corner-all {
            -webkit-border-radius: .3em;
            border-radius: .3em;
        }
        .ui-btn-up-c {
            border: 0;
            color: #222;
            text-shadow: none;
        }
        .ui-controlgroup-horizontal .ui-checkbox .ui-btn-inner, .ui-controlgroup-horizontal .ui-radio .ui-btn-inner {
            padding: 5px 10px;
        }
        .btn_mairu .ui-btn-inner{
        background: #3fbcef; 
        }
        .btn_mairu .ui-btn-up-c {
            color: #FFF;
        }
        .ui-block-a {
            font-size: 14px;
        }
        .ui-block-b>div {
            font-size: 14px;
        }
        .ui-block-c>div {
            font-size: 14px;
        }
        .ui-radio-on {
            background: #3fbcef!important;
        }
        .ui-radio input {
            opacity: 0;
        }
        .img-box {
            position: relative;
            width: 100%;
            height: 100%;
            display: inline-block;
        }
        .img-box .sj-img {
            width: 100%;
        }
        }
        .img-box .sj-img:before {
                content: "";
                width: 31px;
            height: 20px;
            position: absolute;
            background: #1c1b29;
            right: 0;
            bottom: 84px;
        }
        </style>
</head>
<body style="background-color: #1c1b29;">
<div class="row">
    <div id="Div1" class="header col-sm-12" style="height:7%;width:110%">
        <a href="/site/waporder.php">
            财智通
        </a>
    </div>
    <div class="mairu col-sm-12" style="margin-top: 0%;">
        <div class="mairu-li"><a href="/site/waporder">买入</a></div>
        <div class="mairu-li"><a href="/site/waptrade">持仓</a></div>
        <div class="mairu-li"><a href="/site/wapmingxi">明细</a></div>
    </div>
    <div style="width:100%; margin:0; padding:0;border-top:0;background: #1c1b29;" class="col-sm-12">
        <div style="width:100%;" class="row">
            <div id="left" class="col-sm-5" style="width:55%; float:left;border-right: 1px  dashed black;border-bottom: 1px  dashed black; padding:10px 0 10px 20px;box-sizing: border-box;">
                <form method="post" id="orderfrom" action="" style="margin-left: 10%;">
                    <div style="width:90%; ">
                        <div class="ui-grid-a">
                            <div class="ui-block-b" id="spn_cancash" style="width:100%;text-align: left;">可用额度：<?php echo e(number_format($moneywallet->after_amount , 2)); ?></div>
                        </div>
                    </div>
                    <div style="width:90%; text-align:center;    margin-top: 5px;">
                        <input type="search" name="buy_code" id="buy_code" placeholder="股票代码" style="width:80%;">
                    </div>
                    <div style="width:90%;  margin-top: 5px;">
                    <?php echo $__env->make('flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="ui-grid-a" style="margin-top: 5px;" >
                            <font color="#ff0000">
                                <div class="ui-block-a" id="buy_name"></div>
                                <div class="ui-block-b" id="xiushi"></div>
                            </font>
                        </div>
                        <div class="ui-grid-c">
                            <div class="ui-block-a" style="margin-top: 5px;">
                                <font size="-1">现价:</font>
                            </div>
                            
                            <div class="ui-block-b" id="cur_price2" style="margin-top: 5px;"></div>
                            
                            <div class="ui-block-c" style="margin-top: 5px;">
                                <font size="-1">手续费:</font>
                            </div>   
                            <div class="ui-block-d" id="buy_dc" style="margin-top: 5px;"><?php echo e($buyingfee * 100); ?> %</div>
                            
                        </div>
                    </div>
                    <div style="width:90%; text-align:center;overflow:hidden;margin-top: 15px;">
                        <input type="text" name="bull_num" id="bull_num" placeholder="委托手数" style="width:80%;">
                    </div>
                    <div style="width:90%;" style="margin-top: 5px;">
                        <fieldset data-role="controlgroup" data-type="horizontal" style="text-align:center;">
                            <label for="can_bull_up" style="background:#ff0000;border-radius: 5px; margin-right: 15px; text-align: center; width: 30%;height: 13%;margin-top: 12px;">
                                <font color="#FFF">融资</font>
                                <input type="radio" name="gender" id="can_bull_up" value="1" />
                            </label>
                            
                            <label for="can_bull_down" style="background:#007520;border-radius: 5px;margin-left: 15px; text-align: center; width: 30%;height: 13%;margin-top: 12px;">
                                <font color="#FFF">融券</font>
                                <input type="radio" name="gender" id="can_bull_down" value="2">
                            </label>
                           
                        </fieldset>
                    </div>
                    <div class="btn_mairu" style="width:90%; text-align:center; overflow:hidden; margin-top: 5px;">
                        <input id="price_type" type="hidden" name="price_type" value="1" checked />
                        <input id="btnOk" type="button" value="委托" style="width:80%;">
                    </div>
                </form>
            </div>
            <div id="right" class="col-sm-7" style="width:45%; float:right;padding-top:10px; border:1px;border-bottom:#000000; border-right:#000000; border-top:#000000; ">
                <div class="ui-grid-b">
                    <div class="ui-block-a">卖5</div>
                    <div class="ui-block-b">
                        <div id="sell_5_price">----</div>
                    </div>
                    <div class="ui-block-c">
                        <div id="sell_5_num">----</div>
                    </div>
                    <div class="ui-block-a">卖4</div>
                    <div class="ui-block-b">
                        <div id="sell_4_price">----</div>
                    </div>
                    <div class="ui-block-c">
                        <div id="sell_4_num">----</div>
                    </div>
                    <div class="ui-block-a">卖3</div>
                    <div class="ui-block-b">
                        <div id="sell_3_price" >----</div>
                    </div>
                    <div class="ui-block-c">
                        <div id="sell_3_num" >----</div>
                    </div>
                    <div class="ui-block-a" >卖2</div>
                    <div class="ui-block-b">
                        <div id="sell_2_price" >----</div>
                    </div>
                    <div class="ui-block-c">
                        <div id="sell_2_num" >----</div>
                    </div>
                    <div class="ui-block-a" >卖1</div>
                    <div class="ui-block-b">
                        <div id="sell_1_price" >----</div>
                    </div>
                    <div class="ui-block-c">
                        <div id="sell_1_num" >----</div>
                    </div>
                    <div class="ui-block-a" >现价</div>
                    <div class="ui-block-b">
                        <div id="cur_price" ></div>
                    </div>
                    <div class="ui-block-c" ></div>
                    <div class="ui-block-a" >买1</div>
                    <div class="ui-block-b">
                        <div id="buy_1_price" >----</div>
                    </div>
                    <div class="ui-block-c">
                        <div id="buy_1_num" >----</div>
                    </div>
                    <div class="ui-block-a" >买2</div>
                    <div class="ui-block-b">
                        <div id="buy_2_price" >----</div>
                    </div>
                    <div class="ui-block-c">
                        <div id="buy_2_num" >----</div>
                    </div>
                    <div class="ui-block-a" >买3</div>
                    <div class="ui-block-b">
                        <div id="buy_3_price" >----</div>
                    </div>
                    <div class="ui-block-c">
                        <div id="buy_3_num" >----</div>
                    </div>
                    <div class="ui-block-a" >买4</div>
                    <div class="ui-block-b">
                        <div id="buy_4_price" >----</div>
                    </div>
                    <div class="ui-block-c">
                        <div id="buy_4_num" >----</div>
                    </div>
                    <div class="ui-block-a" >买5</div>
                    <div class="ui-block-b">
                        <div id="buy_5_price" >----</div>
                    </div>
                    <div class="ui-block-c">
                        <div id="buy_5_num" >----</div>
                    </div>
                </div>
            </div>
        </div>
        <div style="width:100%;" class="row" style="margin-left:0">
            <div id="pic" style="width: 100%;"></div>
        </div>
    </div>  
    
    <div class="foot1009 col-sm-12" style="position:fixed;bottom:0px;left:0px;width:100%;height:60px;_bottom:auto;_width:100%;_position:absolute;z-index:90000; border-top:1px solid #1c1b29;background:#2b2a3a;">
        <table width="100%" height="60px" align="center">
            <tr>
                <td width="20%" height="60px" style="font-size: 12px;text-overflow: ellipsis;" align="center">
                    <div><a href="/site/wapindex2" target="_self">
                            <img src="/images/site/ico1.png" />
                        </a>
                    </div>
                    <div><a href="/site/wapindex2" target="_self">
                            <font color="#fff">首页</font>
                        </a>
                    </div>
                </td>
                <td width="20%" height="60px" style="font-size: 12px;text-overflow: ellipsis;margin-top: 2px;" align="center">
                    <div><a href="/site/waporder" target="_self"><img src="/images/site/ico2.png" /></a></div>
                    <div><a href="/site/waporder" target="_self">
                            <font color="#fff">交易</font>
                        </a>
                    </div>
                </td>
                <td width="20%" height="60px" style="font-size: 12px;text-overflow: ellipsis;margin-top: 2px;" align="center">
                    <div><a href="/site/wapnew" target="_self"><img src="/images/site/ico4.png" /></a></div>
                    <div><a href="/site/wapnew" target="_self">
                            <font color="#fff">资讯</font>
                        </a>
                    </div>
                </td>
                <td width="20%" height="60px" style="font-size: 12px;text-overflow: ellipsis;margin-top: 2px;" align="center">
                    <div><a href="/site/wapindex" target="_self"><img src="/images/site/ico5.png" /></a></div>
                    <div><a href="/site/wapindex" target="_self">
                            <font color="#fff">我的</font>
                        </a>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    
</div>
    <script type="text/javascript">
        $(document).ready(function() {
            var Cts = window.location.pathname;
            if (Cts.indexOf("/site/wapindex2") >= 0) {
                $(".foot1009 table tr td:nth-child(1) font").css("color", "#00a8ec");
                $(".foot1009 table tr td:nth-child(1) img").attr('src', "/images/site/ico1_hover.png");
            } else if (Cts.indexOf("waporder.php") >= 0) {
                $(".foot1009 table tr td:nth-child(2) font").css("color", "#00a8ec");
                $(".foot1009 table tr td:nth-child(2) img").attr('src', "/images/siteico2_hover.png");
            } else if (Cts.indexOf("wapnew.php") >= 0) {
                $(".foot1009 table tr td:nth-child(3) font").css("color", "#00a8ec");
                $(".foot1009 table tr td:nth-child(3) img").attr('src', "/images/site/ico4_hover.png");
            } else if (Cts.indexOf("wapindex.php") >= 0) {
                $(".foot1009 table tr td:nth-child(4) font").css("color", "#00a8ec");
                $(".foot1009 table tr td:nth-child(4) img").attr('src', "/images/site/ico5_hover.png");
            }
        });
    </script>
    <script type="text/javascript">
        $(".include").each(function() {
            if (!!$(this).attr("file")) {
                var $includeObj = $(this);
                $(this).load($(this).attr("file"), function(html) {
                    $includeObj.after(html).remove(); 
                })
            }
        });
    </script>
</body>
</html>
