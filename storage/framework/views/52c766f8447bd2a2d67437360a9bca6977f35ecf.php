<?php $__env->startSection('css'); ?>
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/css/util.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
<!--===============================================================================================-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="banner_n" style="background:url('../skin/images/zhaos.jpg') repeat center center;"> </div>
<!--------主体--------->

<div class="limiter">
		<div class="container-table100">
        <h1>欢迎访问我们的网站</h1>        
			<div class="wrap-table100">            
            <div class="row">
                <div class="col-sm-6">
                    <div style="width:100%;">                        
                            <div style="padding:10px 0 0 0;" >
                                <p style="margin:10px 0 0 10px;">股东代码：<span  ><?php echo e($moneywallet->id); ?></span></p>
                                <p style="margin:10px 0 0 10px;">账户资金：<span id="a_money" class="l_zMoney"><?php echo e($moneywallet->before_amount + $moneywallet->after_amount - $stockwallet->after_amount); ?></span>元</p>
                                <p style="margin:10px 0 0 10px;">占用资金：<span id="a_zZymoney" class="l_zZymoney"><?php echo e($moneywallet->before_amount); ?></span>&nbsp;元</p>
                                <p style="margin:10px 0 0 10px;">可用额度：<span class="l_kyMoney" id="a_kyMoney"><?php echo e($moneywallet->after_amount); ?></span>元 </p>
                            </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div>                    
                            <div style="padding:10px 0 0 0;" >				
                                <form name="fm1" id="fm1"  method="post" action="/site/fund" >
                                <?php echo e(csrf_field()); ?>

                                    <table width="100%"  border="1" align="center" cellpadding="0" cellspacing="0"  style="color:#000000; border-color:#eeeeee;">
                                        <tr class="even">
                                            <td height="23" align="right" class="fb12"><strong>操作类型<span class="textalign">：</span></strong></td>
                                            <td align="left">
                                                <select name="type" size="1" id="type" style="width:140px;">
                                                    <option value="入款" >入款</option>
                                                    <option value="扣款" >扣款</option>
                                                </select>
                                            </td>
                                        </tr>    
                                        <tr class="even">
                                            <td height="23" align="right" class="fb12"><strong>转账金额<span class="textalign">：</span></strong></td>
                                            <td align="left"><input name="money" type="text" class="input" id="money" onKeyPress="Isnum();" size="18" style="width:45%">元 (不能小于<font color="#FF0000">100</font>元)</td>
                                        </tr>
                                        <tr class="even">
                                            <td height="23" align="right" class="fb12"><strong>选择银行<span class="textalign">：</span></strong></td>
                                            <td align="left">
                                                <select name="bank" size="1" id="bank" style="width:140px;">
                                                    <option value="工商银行" >工商银行</option>
                                                    <option value="建设银行">建设银行</option>
                                                    <option value="农业银行">农业银行</option>
                                                    <option value="招商银行">招商银行</option>
                                                    <option value="中国银行">中国银行</option>
                                                    <option value="浦东银行">浦东银行</option>
                                                    <option value="广发银行">广发银行</option>
                                                    <option value="交通银行">交通银行</option>
                                                    <option value="光大银行">光大银行</option>
                                                    <option value="北京银行">北京银行</option>
                                                    <option value="兴业银行">兴业银行</option>
                                                    <option value="民生银行">民生银行</option>
                                                    <option value="中信银行">中信银行</option>
                                                    <option value="邮政储蓄">邮政储蓄</option>
                                                    <option value="支付宝">支付宝</option>
                                                    <option value="微信">微信</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr class="even">
                                            <td height="23" align="right" class="fb12"> </td>
                                            <td align="left"><input  type="button" onclick="checkm()" value="转账" size="18"></td>
                                        </tr>								
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
				<div class="table100 ver1 m-b-110" style="width: 100%;">
                
					<div class="table100-head">
                    
						<table>
							<thead>
								<tr class="row100 head" style="height: 0px;">
									<th class="cell100 column1">证券代码</th>
									<th class="cell100 column2">证券名称</th>
									<th class="cell100 column3">升/跌</th>
									<th class="cell100 column4">买入成本价</th>                                    
                                    <th class="cell100 column5">买入下单时间</th>
                                    <th class="cell100 column6">买出成本价</th>
                                    <th class="cell100 column7">买出下单时间</th>
                                    <th class="cell100 column8">手数</th>
                                    <th class="cell100 column9">留仓费</th>
                                    <th class="cell100 column10">盈亏</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
                       
						<table>
							<tbody>
                                <?php if($sell_histories): ?>
                                <?php $__currentLoopData = $sell_histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $sellhistory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr class="row100 body">
                                    <td class="cell100 column1"> <?php echo e($sellhistory->stockType->code); ?></td>                                    
                                    <td class="cell100 column2"> <?php echo e($sellhistory->stockType->cn_name); ?></td>

                                    <?php if( $sellhistory->method =="1"): ?>
                                    <td class="cell100 column3"><font color="#00B700">买跌</font></td>
                                    <?php else: ?>
                                    <td class="cell100 column3"> <font color="#FF0909">买升</font></td>
                                    <?php endif; ?> 

									<td class="cell100 column4"><?php echo e($sellhistory->buy_cost); ?></td>
                                    <td class="cell100 column5"><?php echo e($sellhistory->buy_time); ?></td>
                                    <td class="cell100 column6"><?php echo e($sellhistory->sell_cost); ?></td>
                                    <td class="cell100 column7"><?php echo e($sellhistory->created_at); ?></td>
                                    <td class="cell100 column8"><?php echo e($sellhistory->amount); ?></td>
                                    <td class="cell100 column9"><?php echo e($sellhistory->save_fee); ?></td>
                                    <td class="cell100 column10"><?php echo e($sellhistory->fee); ?></td>
                                </tr>								
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

							</tbody>
						</table>
					</div>
				</div>

    <script src="/js/jQuery.js" type="text/javascript" charset="utf-8"></script>
    <script language="javascript">
        function checks(){
        if(reform.money.value==""){
            alert("请输入充值金额!");
            reform.money.focus();
            return false;
            }else if(parseFloat(reform.money.value)< 100){
            alert("充值金额不能小于100元!");
            reform.money.focus();
            return false;
            }else if(reform.payvia.value==""){
            alert("请选择支付方式!");
            reform.payvia.focus();
            return false;
            }else
            {
            reform.fsubmit.value=" 正在提交您的支付信息.. ";
            reform.fsubmit.disabled=true;
            return true;
        
            }
        }
        function Isnum(){
        return ((event.keyCode >= 48) && (event.keyCode <= 57));
        }
        function checkm(){
        var fm1 = document.getElementById('fm1');
        if(isNaN(fm1.money.value)){
            alert("请正确输入金额！");
            return false	
            }
        if (fm1.money.value< 100){
            alert('存入金额至少为100元');
            return false
        } else {
            fm1.submit();
            return true;
        }
        }
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.site_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>