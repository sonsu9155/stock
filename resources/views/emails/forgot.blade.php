@extends('bsb.templates.email')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>
            财智通
            </h2>
        </div>
        <div class="body">
            <h4>你好 {{$user->name}},</h4>
            <p>
            您最近要求重置财智通帐户的密码。 单击下面的链接以重置它。<br><br>
                <a href="{!! url('password/reset/'.$token) !!}">重置你的密码</a>
                <br><br>
                如果您在单击密码重置按钮时遇到问题，请将以下URL复制并粘贴到您的Web浏览器中。<br><br>
                {!! url('password/reset/'.$token) !!}
                <br><br>
                如果您没有要求重置密码，请忽略此电子邮件或回复告诉我们。 此密码重置仅在接下来的30分钟内有效。<br><br>

                谢谢，<br>
                财智通团队<br><br>
                
            </p>
        </div>
    </div>
</div>
@endsection
