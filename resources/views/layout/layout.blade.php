<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/asset/css/style.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <title>Bi shop</title>
</head>
<body>
@yield('header')
<header>
    <div class="header">
        <div class="left">
            <a class="logotip" href="/" alt=""><img class="logot" src="{{asset('asset/img/logot.png')}}" alt="Bi SHOP"></a>
        </div>
        <div class="right">
            <ul>
                @guest
                    <li><a class="{{ request()->is('product/delete') ? 'actives' : null }}" href="{{route('auth')}}">Авторизация</a></li>
                    <li><a class="{{ request()->is('product/delete') ? 'actives' : null }}" href="{{route('register')}}">Регистрация</a></li>
                @endguest
                @auth
                    @if(Auth::user()->isAdmin)
                        <li><a class="{{ request()->is('product/delete') ? 'actives' : null }}" onclick="color()" href="{{route('deleteProduct')}}">Удалить заказ</a></li>
                        <li><a class="{{ request()->is('addproduct') ? 'actives' : null }}" href="{{route('addproduct')}}">Добавить товар</a></li>
                        <li><a class="{{ request()->is('/product/order') ? 'actives' : null }}" href="{{route('orderProduct')}}">Оплаченные товары</a></li>
                    @endif
                    @if(Auth::user()->isAdmin==0)
                    <li><a class="{{ request()->is('product/view/*') ? 'actives' : null }}" href="{{'/product/view/'. Auth::user()->id}}">Просмотр корзины</a></li>
                    @endif
                            <li><a href="{{route('Exit')}}">Выход</a></li>
                @endauth
            </ul>
        </div>
    </div>
</header>

@yield('content')
</body>
</html>
