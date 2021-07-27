<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/common.js') }}"></script>
</head>
<body class="lp">
<div class="login-page">
    <div class="content">
        <div class="logo">
            <img src="{{ asset('img/logo.svg') }}">
        </div>
        <div class="top-text">
            @if (session('resent'))
                {{ __('auth.verification_link_sent_email') }}
            @else
                {{ __('auth.verify_your_email') }}
            @endif
        </div>
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit">{{ __('auth.click_request_another') }}</button>
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
