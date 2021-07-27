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
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="logo">
                <img src="{{ asset('img/logo.svg') }}">
            </div>
            <div class="top-text">
                {{ __('passwords.new_password') }}
            </div>
            <div class="field-name">
                {{ __('app.email') }}
            </div>
            <input class="ltr" type="text" placeholder="{{ __('auth.enter_email') }}" name="email"
                   value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <strong>{{ $message }}</strong>
            @enderror
            <div class="field-name">
                {{ __('auth.password') }}
            </div>
            <div class="pass">
                <a class="show-pass"></a>
                <input class="ltr" type="password" placeholder="{{ __('auth.enter_password') }}" name="password" required
                       autocomplete="new-password">
                @error('password')
                <strong>{{ $message }}</strong>
                @enderror
            </div>
            <div class="pass">
                <a class="show-pass"></a>
                <input class="ltr" type="password" placeholder="{{ __('auth.confirm_password') }}" name="password_confirmation" required autocomplete="new-password">
            </div>
            <button type="submit">{{ __('passwords.set_new_password') }}</button>
        </form>
    </div>
    <div class="bottom-block">
    </div>
    <div class="copy">
        <p>{{ __('app.all_rights_reserved') }}</p>
        <a href="#">{{ __('app.privacy_policy') }}</a>
    </div>
</div>
</body>
</html>
