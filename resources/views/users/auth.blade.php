@extends('layout.layout')
@section('content')
    <form action="" method="post">
        @csrf
        <input type="login" name="login" placeholder="Логин">
        @error('login')<p style="color: red">{{$message}}</p>@enderror
        <input type="password" name="password" placeholder="Пароль">
        @error('password')<p style="color: red">{{$message}}</p>@enderror
        <button type="submit">Войти</button>
    </form>
@endsection
