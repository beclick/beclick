<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link href="{{ asset('style.css') . '?' . rand(0, 99999) }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/common.js') }}"></script>
</head>
<body class="lp">
<div class="login-page">
    <div class="content">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="logo">
                <img src="{{ asset('img/logo.svg') }}">
            </div>
            <div class="top-text">
                {{ __('enter_email_and_password') }}
            </div>
            <div class="field-name">
                {{ __('enter_email') }}
            </div>
            <input class="ltr" type="text" placeholder="{{ __('enter_email') }}" name="email"
                   value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <strong>{{ $message }}</strong>
            @enderror
            <div class="field-name">
                {{ __('password') }}
            </div>
            <div class="pass">
                <a class="show-pass"></a>
                <input class="ltr" type="password" placeholder="{{ __('enter_password') }}" name="password"
                       required autocomplete="current-password">
                @error('password')
                <strong>{{ $message }}</strong>
                @enderror
            </div>
            <div class="agree">
                <input type="checkbox" class="checkbox" id="agree"><label for="agree">{{ __('auth.remember_me') }}</label>
            </div>
            <button type="submit">{{ __('login') }}</button>
            <div class="or">
                {{ __('or') }}
            </div>
            <a href="{{ route('auth.social', 'google') }}" class="google-login">
                <img src="img/google.png">
            </a>
        </form>
    </div>
    <div class="bottom-block">
        @if (Route::has('password.request'))
            <p><a href="{{ route('password.request') }}">
                {{ __('forgot_your_password') }}
            </a></p>
        @endif
            {{ __('no_account') }} <a href="{{ route('register') }}">{{ __('register_now') }}</a>
    </div>
    <div class="copy">
        <p>{{ __('all_rights_reserved') }}</p>
        <a href="#">{{ __('privacy_policy') }}</a>
    </div>
</div>
</body>
</html>
