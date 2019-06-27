
var IsOpen = 0;
$(document).ready(function() {
    //股票查询事件
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
    var initStockCode = '600111';
    $('#buy_code').val(initStockCode);
    getstockname();
    if (IsOpen == 0) //休市
    {
        $('#btnOk').attr('disabled', 'true');
        $('#xiushi').html('休市中');
    }
    $('#buy_code').blur(function() {
        getstockname();
    });
    $("#orderfrom").submit(function() {
        $('#btnOk').attr('disabled', 'true');

        var bull_code = $('#buy_code').val();
        var bull_name = $('#buy_name').text();
        var price_type = $("input[name='price_type']:checked").val();
        var buy_type = $(":radio[name='gender']:checked").val();
        var bull_price = $('#cur_price').val();
        var bull_num = $('#bull_num').val();
        if (bull_code == '') {
            alert('请输入股票代码');
            $('#btnOk').button("enable");
            return false;
        }
        if (typeof(buy_type) == 'undefined') {
            alert('请选择买升或者买跌');
            $('#btnOk').button("enable");

            return false;
        }
        if (bull_num < 1) {
            alert('请输入股票数量');
            $('#btnOk').button("enable");

            return false;
        }
        if (bull_num > 0 && bull_code) {
            $.post("buy.php", {
                    type: "bull",
                    code: '' + bull_code + '',
                    buy_type: '' + buy_type + '',
                    price_type: '' + price_type + '',
                    buy_num: '' + bull_num + '',
                    buys_price: '' + bull_price + ''
                },
                function(data) {
                    res = data.split('|');
                    if (res[0] == 'true') {
                        if (res[1].indexOf('当日委托查询') != -1) {
                            alert('下单成功');
                            $('#btnOk').button("enable");
                        } else {
                            alert('下单成功');
                            $('#btnOk').button("enable");
                        }
                    } else {
                        alert('下单失败');
                        $('#btnOk').button("enable");
                    }
                    //$('#Msg').html(data);
                });
        }
        return false;
    });
});
function getstockname() {
    code = $('#buy_code').val();
    alert(code);
        if (code.length == 6) {
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.open( "GET", /site/ajaxmobi?stockcode=' + code, false ); // false for synchronous request
            xmlHttp.send( null );
             stock = xmlHttp.responseText;            
                if (stock.indexOf(',') != -1) {
                    alert(stock);
                    //stock = res.split(',');
                    $('#buy_name').html(stock[2]);
                    $('#buy_dc').html(0.0015 * 100 + '%');
                    //$('#buy_dc').html(stock[9]+' ‰');
                    if (stock[3] == '1' || stock[4] == '1') //停牌或关盘
                    {
                        $('#btnOk').attr('disabled', 'true');
                    }
                    if (stock[7] == '0') {
                        $('#can_bull_up').attr('disabled', 'true');
                    }
                    if (stock[8] == '0') {
                        $('#can_bull_down').attr('disabled', 'true');
                    }
                    //获取行情数据
                    $('#sell_5_price').html('<font color="#ff0000">' + Math.floor(stock[11] * 100) / 100 + '</font>');
                    $('#sell_5_num').html(Math.floor(stock[12] / 100));
                    $('#sell_4_price').html('<font color="#ff0000">' + Math.floor(stock[13] * 100) / 100 + '</font>');
                    $('#sell_4_num').html(Math.floor(stock[14] / 100));
                    $('#sell_3_price').html('<font color="#ff0000">' + Math.floor(stock[15] * 100) / 100 + '</font>');
                    $('#sell_3_num').html(Math.floor(stock[16] / 100));
                    $('#sell_2_price').html('<font color="#ff0000">' + Math.floor(stock[17] * 100) / 100 + '</font>');

                    $('#sell_2_num').html(Math.floor(stock[18] / 100));
                    $('#sell_1_price').html('<font color="#ff0000">' + Math.floor(stock[19] * 100) / 100 + '</font>');
                    $('#sell_1_num').html(Math.floor(stock[20] / 100));

                    $('#cur_price').html(Math.floor(stock[31] * 100) / 100);
                    $('#cur_price2').html(Math.floor(stock[31] * 100) / 100);

                    $('#buy_1_num').html(Math.floor(stock[30] / 100));
                    $('#buy_1_price').html('<font color="#ff0000">' + Math.floor(stock[29] * 100) / 100 + '</font>');
                    $('#buy_2_num').html(Math.floor(stock[28] / 100));
                    $('#buy_2_price').html('<font color="#ff0000">' + Math.floor(stock[27] * 100) / 100 + '</font>');
                    $('#buy_3_num').html(Math.floor(stock[26] / 100));
                    $('#buy_3_price').html('<font color="#ff0000">' + Math.floor(stock[25] * 100) / 100 + '</font>');
                    $('#buy_4_num').html(Math.floor(stock[24] / 100));
                    $('#buy_4_price').html('<font color="#ff0000">' + Math.floor(stock[23] * 100) / 100 + '</font>');
                    $('#buy_5_num').html(Math.floor(stock[22] / 100));
                    $('#buy_5_price').html('<font color="#ff0000">' + Math.floor(stock[21] * 100) / 100 + '</font>');
                    //显示行情K线图
                    getProductKImage('min');
                }
            },
            error: function() {
                location.reload();
            }       
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
