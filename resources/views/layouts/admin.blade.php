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
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="pt-5 min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow align-items-center fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('img/logo.svg') }}">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @if (\Session::get('admin') == 1)
                        <li class="nav-item text-right">
                            <a class="nav-link" href=""><h5><strong>Администратор</strong></h5></a>
                        </li>
                    @else
                        <li class="nav-item text-right">
                            <a class="nav-link" href="{{ route('admin.login') }}"><strong>Вход в админку</strong></a>
                        </li>
                    @endif
                    <li class="dropdown-divider"></li>
                </ul>
                <ul class="navbar-nav mr-auto d-lg-none">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.home') }}">Пользователи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.cruds') }}">CRUD`s</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><strong>Выход</strong></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @if (\Session::get('admin') == 1)
        <ul class="nav justify-content-end d-none d-lg-flex bg-white pt-4 pb-1">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.home') }}">Пользователи</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.cruds') }}">CRUD`s</a>
            </li>
            <li class="nav-item ml-5">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><strong>Выход</strong></a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    @endif

    <main class="py-5">
        @yield('content')
    </main>

    <div class="modal fade" id="myaction" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-block btn-secondary" data-dismiss="modal">
                        Закрыть
                    </button>
                </div>
            </div>
        </div>
    </div>

    @if (isset($alert) and $alert != null)
        <div class="modal fade" id="alert" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded-0">
                    <div class="modal-body">
                        <div class="col modal-title text-center p-3">
                            <h5>{{ $alert }}</h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-block btn-success btn-lg rounded-0" data-dismiss="modal">
                            Понятно
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $('#alert').modal('show')
            });
        </script>
    @endisset

</div>


<footer class="d-flex justify-content-between align-items-center bg-white py-2">
    <div class="container">
        <div class="row">
            <div class="text-center col-md-auto">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('img/logo.svg') }}">
                </a>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
