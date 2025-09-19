@extends('layouts.login')

@section('content')
<div class="login-content">
    <h1>Admin Login</h1>
    <p> Lorem ipsum dolor sit amet, coectetuer adipiscing elit sed diam nonummy et nibh euismod aliquam erat volutpat. Lorem ipsum dolor sit amet, coectetuer adipiscing. </p>
    <form action="{{ route('admin.login') }}" class="login-form" method="POST">
        @csrf
        <div class="row">
                <div class="col-xs-6">
                    <input class="form-control form-control-solid placeholder-no-fix @error('email') is-invalid @enderror" type="email" autocomplete="off" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required />
                    @error('email')
                        <span class="help-block text-danger"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="col-xs-6">
                    <input class="form-control form-control-solid placeholder-no-fix @error('password') is-invalid @enderror" type="password" autocomplete="off" placeholder="{{ __('Password') }}" name="password" required autocomplete="current-password" />
                    @error('password')
                        <span class="help-block text-danger"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
        </div>
        <!-- <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span>Enter any {{ __('E-Mail Address') }} and {{ __('Password') }}. </span>
        </div> -->
        <div class="row">
            <div class="col-sm-4">
                <div class="rem-password">
                    <p>Remember Me
                        <input type="checkbox" class="rem-checkbox" name="remember" />
                    </p>
                </div>
            </div>
            <div class="col-sm-8 text-right">
                <div class="forgot-password">
                    <a href="javascript:;" id="forget-password" class="forget-password">{{ __('Forgot Password?') }}</a>
                </div>
                <button class="btn blue" type="submit">{{ __('Sign In') }}</button>
            </div>
        </div>
    </form>
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" action="javascript:;" method="post">
        <h3 class="font-green">Forgot Password ?</h3>
        <p> Enter your e-mail address below to reset your password. </p>
        <div class="form-group">
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="{{ __('E-Mail Address') }}" name="email" />
        </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn grey btn-default">Back</button>
            <button type="submit" class="btn blue btn-success uppercase pull-right">Submit</button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
</div>
@endsection