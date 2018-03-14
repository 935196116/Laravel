@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Register</div>--}}

                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" method="POST" action="{{ route('register') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                            {{--<label for="name" class="col-md-4 control-label">Name</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>--}}

                                {{--@if ($errors->has('name'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Register--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<!-- 模态输入-->
<div class="am-modal am-modal-prompt" tabindex="-1" id="add-prompt">
    <div class="am-modal-dialog">
        <div class="am-modal-hd title">输入验证码</div>
        <div class="am-modal-bd">
            <input type="text" class="am-modal-prompt-input" placeholder="输入手机验证码">
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-cancel>取消</span>
            <span class="am-modal-btn" data-am-modal-confirm>提交</span>
        </div>
    </div>
</div>

<div class="am-g tpl-g">

    <div class="tpl-login">
        <div class="tpl-login-content">
            <div class="tpl-login-title">注册用户</div>
            <span class="tpl-login-content-info">
                  创建一个新的用户
              </span>


            <form class="am-form tpl-form-line-form" method="POST" action="{{ route('register') }}">



                {{ csrf_field() }}
                <div class="am-form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <input id="name" placeholder="手机号码" type="text" class="tpl-form-input" name="phone" value="{{ old('phone') }}" required autofocus>
                    @if ($errors->has('phone'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                    @endif

                </div>


                <div class="am-form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input  placeholder="昵称" type="text" class="tpl-form-input" name="name" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif

                </div>


                <div class="am-form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="tpl-form-input" value="{{ old('password') }}" name="password" placeholder="请输入密码">
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="am-form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"   class="tpl-form-input"placeholder="再次输入密码">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="am-form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                    <input type="text" class="tpl-form-input" name="captcha" placeholder="请输入下图所示验证码">
                    <br>
                    <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">

                    @if ($errors->has('captcha'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                    @endif
                </div>



                {{--<div class="am-form-group tpl-login-remember-me">--}}
                    {{--<input id="remember-me" type="checkbox">--}}
                    {{--<label for="remember-me">--}}

                        {{--我已阅读并同意 <a href="javascript:;">《用户注册协议》</a>--}}
                    {{--</label>--}}

                {{--</div>--}}






                <div class="am-form-group">

                    <button type="button" id="confirm" class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn">确认</button>

                </div>

            </form>

        </div>
    </div>
</div>
<script>
    var captcha = $("input[name='captcha']").get(0);
    $("#confirm").on("click",function () {





            $('#add-prompt').modal({
                relatedTarget: captcha,
                onConfirm: function(e) {
//                        alert('你输入的是：' + e.data || '');
//                    postRegion(e.data);
//                    this.relatedTarget.value = e.data;

                    $("form").submit();


                },
                onCancel: function(e) {

                }
            });

    })
</script>
@stop
