@extends('layout.layout')
@section('content')
    <form action="" method="post">
        @csrf
        <input type="text" name="name" placeholder="Имя">
        @error('name')<p style="color: red">{{$message}}</p>@enderror
        <input type="email" name="email" placeholder="Емаил">
        @error('email')<p style="color: red">{{$message}}</p>@enderror
        <input type="login" name="login" placeholder="Логин">
        @error('login')<p style="color: red">{{$message}}</p>@enderror
        <input type="password" name="password" placeholder="Пароль">
        @error('password')<p style="color: red">{{$message}}</p>@enderror
        <input type="password" name="password_confirmation" placeholder="Потдверждение пароля">
        @error('password_confirmation')<p style="color: red">{{$message}}</p>@enderror
        <button type="submit">Зарегестироваться</button>
    </form>
@endsection
