@extends('layouts.pc_template')
@section('javascript')
  <title>收件箱</title>
	<script type="text/javascript" src="/js/jquery.js"></script>
  <script type="text/javascript" src="/js/function.js"></script>
  <script type="text/javascript"> 
    $(document).ready(function(){
     
    });
    function ShowUserInfo(user)
    {
        ymPrompt.win({message:'./member_user.php?type=userinfo&username='+user,width:500,height:280,title:'会员'+user+'的详细信息',iframe:true});
    }
     
    function Message(id)
    {
        ymPrompt.win({message:'./w2messga.php?type=read&id='+id,width:500,height:280,title:'阅读短信',iframe:true,handler:function(){self.location.href=self.location.href;}});
    }
  </script> 
@endsection
@section('css')
	<style>
	a{
    text-decoration:none;
    color: #000000;
  }
  </style>

@section('content')
<div class="col-sm-10">
  <div style="width:100%; height:288px; background-color:#FFFFFF; ">
    <div style="width:100%; height:31px;background-image:url(/images/rtoubu.png);" ></div>
      <div style="width:100%;height:257px;background-image:url(/images/rzhongjian.png); padding:10px 0 0 0;" >
        <table  width="100%" border="1" cellspacing="0" cellpadding="0" style="color:#000000; border-color:#eeeeee; background-color:#FFFFFF; text-align:center;">
          <tbody>
              <tr style="height:28px;"> 
                <th align="center">编号</th> 
                <th align="center">发送用户</th>     
                <th>标题</th>
                <th align="center">时间</th> 
                <th align="center">标识</th>
                <th width="8%" align="right">设置</th>
              </tr> 
              @if($user_messages)
              @foreach( $user_messages as $user_message)
              <tr style="height:28px;">
                <td align="center">353</td> 
                <td align="center">管理员发送</td>
                <td >{{ $user_message->body }}</td> 
                <td align="center">{{ $user_message->created_at }}</td> 
                <td align="center">已读</td>
                <td align="right"><a href="w2messga.php?type=del&id=353" onClick="if(confirm('确定要删除该条短信吗？')){return true;}else{return false;}">删除</a></td>
              </tr>
              @endforeach
              @endif
              <tr style="height:28px;">
                <td colspan="6" align="center" bgcolor="#FFFFFF">
                  <div id="" class="sabrosus">
                    <table border="0" align="center" cellpadding="2" cellspacing="0" class="">
                      <tr align="center" >
                        <td><a id='page_first' href="w2messga.php?PageNum=">首页</a></td>
                        <td><a id='page_prev' href="w2messga.php?PageNum=">上页</a></td>
                        <td><a class="cur" href="javascript:void(0);">1</a></td>
                        <td><a id='page_next' href="w2messga.php?PageNum=">下页</a></td>
                        <td><a id='page_last' href="w2messga.php?PageNum=">尾页</a></td>
                      </tr>
                    </table>
                  </div>
                </td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>				
</div>
@endsection