<?php $__env->startSection('javascript'); ?>
	<title>沪深A股行情列表页</title>
    <meta name="keywords" content="SST-4交易平台" />
    <meta name="Description" content="SST-4交易平台" />
    <script type="text/javascript" src="js/SuggestServer_3_0_16.js" charset="gb2312"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			//股票查询事件
			var suggestServer = new SuggestServer();
			suggestServer.bind({
				"input": "stockcode",
				"value": "@2@",
				"type": "",
				"max": 10,
				"width": 250,
				"head": ["选项", "代码", "中文名称"],
				"body": [-1, 2, 4],
				"fix": { "ie6" : [0, - 1], "ie7" : [0, - 1], "firefox" : [1, 1]},
				"callback": null
			});
			
			Getw2Fav();	
			var interveltime = "10";
			var refresh = null;
			window.setInterval(function() {
				if (refresh == null)
				refresh = window.setInterval(function() { Getw2Fav(); }, parseInt(interveltime, 10) * 1000);
			}, 10000);
		});

		function Getw2Fav() {
			$.ajax({
				type: 'GET',
				url:  'ajax.php?type=getw2fav',
				cache: false,
				success:function(res)
				{
					$("#divstockslist").html(res);
				}
			});
		}

		</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-sm-10">
	<div style="width:100%; height:288px; ">
		<div style="width:100%; height:31px;background-image:url(/images/rtoubu.png);" ></div>
			<div style="width:100%;height:257px;background-image:url(/images/rzhongjian.png); padding:10px 0 0 0;" >
					<div id="divstockslist" style="color:#000000;"> 
							<span class="loading"><img src="" border="0" align="absmiddle" hspace="3" />加载中...</span>
					</div> 
					<table align="center" cellpadding="0" cellspacing="0" > 
					<tr >
						<td width="104" align="center"  style="color:#000000;"> <input type="checkbox"  onClick="SelectAll('check_name')" >&nbsp;&nbsp;全选&nbsp;&nbsp;</td>
						<td lign="center" > <input type="button" name="btn_delete" onClick="productDelete()" value="批量取消关注股票" class="button3" /></td>                     
					</tr>
					</table>
					<div id="divstocks" style="display:none;"></div> 
					<div id="tdpage"></div>    
			</div>
		</div>
	</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pc_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>