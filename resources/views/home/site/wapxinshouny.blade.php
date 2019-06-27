<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <meta name="viewport" content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="keywords" content="" />
    <meta name="description" content="股票交易系统">
    <meta name="author" content="" />
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="telephone=no" name="format-detection">
    <link href="css/global-ver.css" rel="stylesheet" type="text/css" />
    <link href="css/index.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery-1.8.2.min.js"></script>
</head>

<body>
    <div data-role="page" id="pagetwo">
        <div class="include" file="/header.blade.php"></div>
        <table style="margin-top:47px;  solid #eeeeee; width:100%; height:24px; text-align:center; color:#FFFFFF;">
            <tr> 融资融券与普通借贷的区别 </tr>
            <tr><p>融资融券是什么？<br/></p><p>首先我们要搞清楚融资融券是什么，简单地说就是一种信用交易，分为融资交易和融券交易两部分。比如我交存一定的担保物后，证券公司会出借资金供我买入证券或出借证券供我卖出，然后在约定的时间内将所借的资金或证券归还。<br/></p><p>与普通借贷的区别？ 同普通借贷相比，融资融券有以下几个优势：<br/></p><p>（1） 随借随还，灵活计息 融资融券可以随借随还，从你融资买入股票算起，到客户偿还资金结束，按实际使用天数计息。如果你当天借出，收市之前归还，是不收取利息的。<br/></p><p>（2） 加杠杆，增大收益 加杠杆是融资融券的优势，例如你有10万元，可以获得10%的收益；通过融资增大一倍杠杆，资金变成了20万，相当于可以获得20%的收益。<br/></p><p>（3） 借贷成本低 融资融券费率一般是8.35%，券商之间可能会有不同的调整；再对比一下商业银行和小贷，银行一般都是在15%-18%,小贷比商业银行的成本还要高一点。<br/></p><p>（4） 独有的融券功能 国内证券市场唯一可以作为做空个股的工具就是融资融券（目前市场上，期权和期货只能做空指数）。A股做空大家可能还不习惯，但是，一旦机会来了收益是很可观的。<br/></p><p>开通业务有门槛？<br/></p><p>融资融券要开通的基本条件，满足以下的情况，您就可以向证券公司营业部走起啦：<br/></p><p>（1） 你的账户需要开户并交易满六个月</p><p>a</p><p>（2） 开融资融券前20个交易日，日均证券资产在50万以上<br/></p><p>&nbsp;（3） 开户当天不低于50万 开通的条件肯定是不止这些，但三点是最重要的条件，每一条都是刚性规定，是必须要满足的。<br/></p><p>港券宝的开通完全没有门槛，简单注册，即可交易，完全一分钟开户。</p><p>&nbsp;</p> </tr>
        </table>
        <p></p>
        <p></p>
        <p></p>
        <div class="include" file="/footerblade.php"></div>
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
    </div>
</body>

</html>