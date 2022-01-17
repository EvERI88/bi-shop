@extends('layout.layout')
<head>
    <link rel="stylesheet" href="/asset/css/style.css">
</head>
@section('content')


    <h1 class="topText">Редактировать товар</h1>
    <form enctype="multipart/form-data"  method="post">
        @csrf
        <input type="text" name="name" placeholder="Название">
        @error('name')<p style="color: red">{{$message}}</p>@enderror
        <textarea placeholder="Описание" name="description" id="" cols="20" rows="20" style="
            margin: 3%;
            height: 60px;
            font-size: 18px;
            resize: none;
            align-items: center;">
        </textarea>
        @error('description')<p style="color: red">{{$message}}</p>@enderror
        <input type="number" name="price" placeholder="Цена">
        @error('price')<p style="color: red">{{$message}}</p>@enderror
        <input type="number" name="weight" placeholder="Вес">
        @error('weight')<p style="color: red">{{$message}}</p>@enderror
        <input type="file" name="photo" placeholder="photo">
        @error('password_confirmation')<p style="color: red">{{$message}}</p>@enderror
        <input type="reset" class="buy" placeholder="Сбросить поля">
        <button class="buy" type="submit">Отредактировать товар</button>
    </form>
@endsection

