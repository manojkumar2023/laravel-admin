@extends('layouts.login')

@section('content')
<div class="login-content">
    <h1>Agent Login</h1>
    <p> Lorem ipsum dolor sit amet, coectetuer adipiscing elit sed diam nonummy et nibh euismod aliquam erat volutpat. Lorem ipsum dolor sit amet, coectetuer adipiscing. </p>
    <form action="{{ route('login') }}" class="login-form" method="POST">
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

<!-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->