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
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="logo">
                <img src="{{ asset('img/logo.svg') }}">
            </div>
            <div class="top-text">
                {{ __('passwords.reset_password') }}
            </div>
            @if (session('status'))
                <div class="top-text">
                    {{ session('status') }}
                </div>
            @endif
            <div class="field-name">
                {{ __('app.email') }}
            </div>
            <input class="ltr" type="text" placeholder="{{ __('auth.enter_email') }}" name="email"
                   value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <strong>{{ $message }}</strong>
            @enderror
            <button type="submit">{{ __('passwords.send_link_reset_password') }}</button>
        </form>
    </div>
    <div class="bottom-block">
        {{ __('auth.already_registered') }} <a href="{{ route('login') }}">{{ __('auth.login') }}</a>
    </div>
    <div class="copy">
        <p>{{ __('app.all_rights_reserved') }}</p>
        <a href="#">{{ __('app.privacy_policy') }}</a>
    </div>
</div>
</body>
</html>
