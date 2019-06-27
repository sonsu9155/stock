
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link  rel="stylesheet"  type="text/css" href="css/layout.css">	
	<script src="js/jQuery.js" type="text/javascript" charset="utf-8"></script>
	<title>收件箱</title>
    <link href="./style/ymPrompt.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="./js/jquery.js"></script>
    <script type="text/javascript" src="./js/ymPrompt.js"></script>
    <script type="text/javascript" src="./js/function.js"></script>
    <script type="text/javascript"> 
    $(document).ready(function(){
     
    });
    function ShowUserInfo(user)
    {
        ymPrompt.win({message:'./member_user.php?type=userinfo&username='+user,width:500,height:280,title:'会员'+user+'的详细信息',iframe:true});
    }
     
    function Message(id)
    {
        ymPrompt.win({message:'./message.php?type=read&id='+id,width:500,height:280,title:'阅读短信',iframe:true,handler:function(){self.location.href=self.location.href;}});
    }
    </script> 
</head>
<body>


<div id="main_content" class="full">
		<div class="breadcrumbs">
			<span class="breadcrumbs_left breadcrumbs_radius"></span>
			<span class="breadcrumbs_right breadcrumbs_radius"></span>
			<div class="title user public_bg"></div>
			<div class="currbread">
				<span class="breadico public_bg"></span>
				<a href="javascript:;">您当前的位置：</a>&gt;
				<a href="user.php">我的帐户</a>&gt;
				<a href="javascript:;">收件箱</a>
			</div> 
		</div>
		<div class="page_content">
			<div class="page_top">
				<div class="page_menu">
				<ul>
					<li><a href="user.php">基本信息</a>|</li>
					<li><a href="pwd.php">修改密码</a>|</li>
					<li><a href="payment.php">在线入金</a>|</li>
                    <li><a href="payment.php?type=log">存款记录</a>|</li>
                    <li><a href="atm.php">申请提款</a>|</li>
                    <li><a href="atm.php?type=log">提款记录</a>|</li>
                    <li><a href="message.php" class="public_bg">收件箱</a></li>
                    
				</ul>
			</div>			<div class="page_search">

			</div>
			<div class="clear"></div>
			</div>
			<div class="page_table relative page_height page_table_padding page_users">

				<table cellspacing="0" cellpadding="0" class="table table-type1 table_padding table_nborder table_tleft tcolor">
					<tbody>
				
						 <tr> 
                              <th align="center">编号</th> 
                              <th align="center">发送用户</th>     
                              <th>标题</th>
                              <th align="center">时间</th> 
                              <th align="center">标识</th>
                              <!-- <th width="8%" align="right">设置</th>  -->
                            </tr> 
                         
                         <tr class="even">
                            <td align="center">353</td> 
                            <td align="center">管理员发送</td>
                            <td ><a href="javascript:Message('353');">333</a></td> 
                            <td align="center">2019-01-23 16:57:06</td> 
                            <td align="center">已读</td>
                            <td align="right"><a href="message.php?type=del&id=353" onClick="if(confirm('确定要删除该条短信吗？')){return true;}else{return false;}">删除</a></td>
                          </tr>
                          <tr>
                            <td colspan="6" align="center" bgcolor="#FFFFFF">
                            <div id="" class="sabrosus">
                            <table border="0" align="center" cellpadding="2" cellspacing="0" class="">
                              <tr align="center" >
                                <td><a id='page_first' href="message.php?PageNum=">首页</a></td>
                                <td><a id='page_prev' href="message.php?PageNum=">上页</a></td>
                                <td><a class="cur" href="javascript:void(0);">1</a></td>
                                <td><a id='page_next' href="message.php?PageNum=">下页</a></td>
                                <td><a id='page_last' href="message.php?PageNum=">尾页</a></td>
                              </tr>
                            </table>
                            </div></td>
                          </tr>
						
					</tbody>
				</table>
		
				<div class="verify_content verify_padding">
 					<div class="clear"></div>
				</div><div class="page_info">
	
		
		<div class="clear"></div>
	</div>
</div>				
			</div> <!--page_table end-->

		</div> <!--page_content end-->
	</div>


</body>
</html>