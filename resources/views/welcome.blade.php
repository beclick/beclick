<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">

    <title>Добро пожаловать – beclick</title>
</head>
<body>
<br>
<h2>тут находится лендинг пейж</h2>
@auth
    <a href="{{ route('home') }}"><h2 class="reg-main__title">Домашняя страница</h2></a>
@else
    <a href="{{ route('login') }}"><h2 class="reg-main__title">Вход</h2></a>
    @if (Route::has('register'))
        <a href="{{ route('register') }}"><h2 class="reg-main__title">Регистрация</h2></a>
    @endif
@endif
</body>
</html>
