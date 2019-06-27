<div style="height: 60px;"></div>
<div class="foot1009" style="position:fixed;bottom:0px;left:0px;width:100%;height:60px;_bottom:auto;_width:100%;_position:absolute;z-index:90000; border-top:1px solid #1c1b29;background:#2b2a3a;">
    <table width="100%" height="60px" align="center">
        <tr>
            <td width="20%" height="60px" style="font-size: 12px;text-overflow: ellipsis;" align="center">
                <div><a href="/site/wapindex2" target="_self">
                        <img src="/images/site/ico1.png" />
                    </a></div>
                <div><a href="/site/wapindex2" target="_self">
                        <font color="#fff">首页</font>
                    </a></div>
            </td>
            <td width="20%" height="60px" style="font-size: 12px;text-overflow: ellipsis;margin-top: 2px;" align="center">
                <div><a href="/site/waporder" target="_self"><img src="/images/site/ico2.png" /></a></div>
                <div><a href="/site/waporder" target="_self">
                        <font color="#fff">交易</font>
                    </a></div>
            </td>
            <td width="20%" height="60px" style="font-size: 12px;text-overflow: ellipsis;margin-top: 2px;" align="center">
                <div><a href="/site/wapnew" target="_self"><img src="/images/site/ico4.png" /></a></div>
                <div><a href="/site/wapnew" target="_self">
                        <font color="#fff">资讯</font>
                    </a></div>
            </td>
            <td width="20%" height="60px" style="font-size: 12px;text-overflow: ellipsis;margin-top: 2px;" align="center">
                <div><a href="/site/wapindex" target="_self"><img src="/images/site/ico5.png" /></a></div>
                <div><a href="/site/wapindex" target="_self">
                        <font color="#fff">我的</font>
                    </a></div>
            </td>
        </tr>
    </table>
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