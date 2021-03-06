<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ asset('/admin/lib/html5shiv.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/admin/lib/respond.min.js') }}"></script>
    <![endif]-->
    <link href="{{ asset('/admin/static/h-ui/css/H-ui.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/admin/static/h-ui.admin/css/H-ui.login.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/admin/static/h-ui.admin/css/style.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/admin/lib/Hui-iconfont/1.0.8/iconfont.css') }}" rel="stylesheet" type="text/css"/>
    <title>在线教育-后台登录</title>
</head>
<body>
<div class="loginWraper">
    <div id="loginform" class="loginBox">
        {{--错误提示--}}
        @include('admin.layouts.errormsg')

        <form class="form form-horizontal" action="{{ route('admin.public.loginsave') }}" method="post">
            {{--csrf验证--}}
            {{--{{ csrf_field() }}--}}
            {{--laravel5.6后加的标签--}}
            @csrf
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
                <div class="formControls col-xs-8">
                    <input name="username" type="text" placeholder="用户名" value="admin" class="input-text size-L">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                <div class="formControls col-xs-8">
                    <input name="password" type="text" placeholder="密码" value="admin" class="input-text size-L">
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input class="input-text size-L" type="text" name="vcode" placeholder="验证码" style="width:150px;">
                     <a id="kanbuq" href="javascript:;">看不清，换一张</a></div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <label for="online">
                        <input type="checkbox" name="online" value="1">
                        使我保持登录状态</label>
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
                    <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="footer">Copyright 尘舞飞扬</div>
<script type="text/javascript" src="{{ asset('/admin/lib/jquery/1.9.1/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/static/h-ui/js/H-ui.min.js') }}"></script>
<script>
    $('#kanbuq').click(function () {
        var img = $(this).prev();
        img.attr('src','&vt='+Math.random());
    })
</script>
</body>
</html>