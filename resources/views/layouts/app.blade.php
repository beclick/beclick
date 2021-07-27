<!doctype html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/png">

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <!-- Common -->
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">

    <!-- Styles -->
    <link href="{{ asset('style.css') . '?' . rand(0, 99999) }}" rel="stylesheet">
    <link href="{{ asset('slick.css') }}" rel="stylesheet">

</head>
<body style="display: none">
<header class="header">
    <nav class="top-menu">
        <ul>
            <li><a href="#">{{ __('app.recomended') }}</a></li>
            <li><a href="#">{{ __('app.forum') }}</a></li>
            <li><a href="#">{{ __('app.useful') }}</a></li>
            <li><a href="#">{{ __('app.faq') }}</a></li>
        </ul>
    </nav>
    <div class="flex">
        <div class="left-side">
            <a class="menu-button"></a>
            <a href="{{ route('new_project') }}"><button class="add">{{ __('app.create_project') }} +</button></a>
            <div class="profile-link">
                <i class="fa fa-angle-down"></i> {{ __('app.my_profile') }} <img src="{{ asset('img/avatar.png') }}">
                <div class="sub">
                    <ul>
                        <li><a href="{{ route('profile') }}">{{ __('app.my_profile') }}</a></li>
                        <li><a href="{{ route('profile.edit') }}">{{ __('app.edit_profile') }}</a></li>
                        <li><a class="nav-link" href=""
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('app.exit') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="{{ route('payment') }}" class="subscribe"></a>
        </div>
        <div class="right-side">
            <ul>
                <li><a href="#">{{ __('app.articles') }}</a></li>
                <li><a href="{{ route('payment') }}">{{ __('app.prices') }}</a></li>
                <li><a href="{{ route('requests') }}">@if ($requ_count > 0)
                            <span>{{ $requ_count }}</span>@endif{{ __('app.requests_kp') }}</a></li>
                <li><a href="{{ route('projects') }}">@if ($resp_count > 0)
                            <span>{{ $resp_count }}</span>@endif{{ __('app.my_projects') }}</a></li>
            </ul>
            <a class="catalog-link"><i class="fa fa-angle-down"></i> {{ __('app.catalog_of_performers') }}
                <span></span></a>
            <div class="logo">
                <a href="{{ route('home') }}"><img src="{{ asset('img/logo.svg') }}"></a>
            </div>
        </div>
    </div>
    <div class="mobile-menu">
        <ul class="ul1">
            <li><a href="#">{{ __('app.articles') }}</a></li>
            <li><a href="{{ route('payment') }}">{{ __('app.prices') }}</a></li>
            <li><a href="{{ route('requests') }}">@if ($requ_count > 0)
                        <span>{{ $requ_count }}</span>@endif{{ __('app.requests_kp') }}</a></li>
            <li><a href="{{ route('projects') }}">@if ($resp_count > 0)
                        <span>{{ $resp_count }}</span>@endif{{ __('app.my_projects') }}</a></li>
        </ul>
        <ul class="ul2">
            <li><a href="#">{{ __('app.recomended') }}</a></li>
            <li><a href="#">{{ __('app.forum') }}</a></li>
            <li><a href="#">{{ __('app.useful') }}</a></li>
            <li><a href="#">{{ __('app.faq') }}</a></li>
        </ul>
        <a href="{{ route('new_project') }}">
            <button class="add">{{ __('app.create_project') }} +</button>
        </a>
    </div>
    <div class="mob-header-catalog">
        <ul>
            @foreach($all_categories[0] as $category)
                <li>
                    <a>
                        <span>{{ $category->title }}</span>
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <ul>
                        @if (isset($all_categories[$category->id]))
                            @foreach($all_categories[$category->id] as $cat)
                                <li>
                                    <a href="{{ route('find', ['category' => $category->id, 'subcategory' => $cat->id]) }}"
                                       class="link"><span><i>({{ $cat->count }})</i>{{ $cat->title }}</span></a></li>
                            @endforeach
                        @endif
                    </ul>
                </li>
            @endforeach
        </ul>
        <div class="name">
            {{  __('app.find12') }}
        </div>
        @include('layouts.recomended')
    </div>
    <div class="header-catalog">
        <ul>
            @foreach($all_categories[0] as $category)
                <li>
                    <a href="{{ route('find', ['category' => $category->id]) }}">
                        <span>{{ $category->title }}</span>
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <div class="sub">
                        <div class="flex">
                            <div class="col shops">
                                <div class="name">
                                    {{  __('app.find12') }}
                                </div>
                                @include('layouts.recomended')
                            </div>
                            @if (isset($all_categories[$category->id]))
                                @php
                                    $i = $all_categories[$category->id]->count()/2;
                                @endphp
                                <div class="col">
                                    @foreach($all_categories[$category->id] as $cat)
                                        <a href="{{ route('find', ['category' => $category->id, 'subcategory' => $cat->id]) }}"
                                           class="link"><span><i>({{ $cat->count }})</i>{{ $cat->title }}</span></a>
                                        @if ($loop->iteration >= $i)
                                            @php
                                                $i = 999999;
                                            @endphp
                                </div>
                                <div class="col">
                                    @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</header>

<div class="wrap">
    @yield('content')
</div>

<footer class="footer">
    <div class="wrap">
        <div class="flex">
            <nav>
                <p>{{ __('app.about_project') }}</p>
                <ul>
                    <li><a href="#">{{ __('app.about') }}</a></li>
                    <li><a href="#">{{ __('app.contacts') }}</a></li>
                    <li><a href="#">{{ __('app.privacy_policy') }}</a></li>
                    <li><a href="#">{{ __('app.map_site') }}</a></li>
                </ul>
            </nav>
            <nav>
                <p>{{ __('app.to_the_customer') }}</p>
                <ul>
                    <li><a href="#">{{ __('app.recomended') }}</a></li>
                    <li><a href="#">{{ __('app.support') }}</a></li>
                    <li><a href="#">{{ __('app.catalog_of_performers') }}</a></li>
                    <li><a href="#">{{ __('app.prices') }}</a></li>
                </ul>
            </nav>
            <nav>
                <p>{{ __('app.for_the_contractor') }}</p>
                <ul>
                    <li><a href="#">{{ __('app.support') }}</a></li>
                    <li><a href="#">{{ __('app.companies') }}</a></li>
                    <li><a href="#">{{ __('app.articles') }}</a></li>
                    <li><a href="#">{{ __('app.forum') }}</a></li>
                </ul>
            </nav>
            <div class="social">
                <p>{{ __('app.social_networks') }}</p>
                <div class="links">
                    <a href="#"><img src="{{ asset('img/social1.svg') }}"></a>
                    <a href="#"><img src="{{ asset('img/social2.svg') }}"></a>
                    <a href="#"><img src="{{ asset('img/social3.svg') }}"></a>
                    <a href="#"><img src="{{ asset('img/social4.svg') }}"></a>
                </div>
                <p>{{ __('app.subscribe_news') }}</p>
                <form>
                    <input type="text" placeholder="e-mail">
                    <button></button>
                </form>
            </div>
        </div>
        <div class="line"></div>
        <div class="flex">
            <div class="payment">
                {{ __('app.payment_system') }} <img src="{{ asset('img/payment.svg') }}">
            </div>
            <div class="copy">
                {{ __('app.all_rights_reserved') }}
            </div>
        </div>
    </div>
</footer>

<div class="alrt" style="display: none">
    <a class="close"></a>
    <p>@isset($alert) {{ $alert }} @endisset</p>
</div>

<script>
    $(document).ready(function () {
        $('body').children().each(function () {
            $(this).html($(this).html().replace(/\u2028/g, ''));
        });

        $.ajax({
            url: "{{ route('resource', ['scripts' => 'start']) }}",
        }).done(function (data) {
            $('head').append(data);
            const key = setInterval(function () {
                $('body').css('display', 'block');
                if ($('body').css('display') == 'block') {
                    clearInterval(key);
                }
            }, 10);
        });

        @isset($alert)
        history.replaceState(null, null, '{{ route($route) }}');
        setTimeout(function () {
            $('.alrt').fadeIn();
        }, 300);
        setTimeout(function () {
            $('.alrt').fadeOut();
        }, 3500);
        @endisset
    });
</script>

</body>
</html>
