@extends('layout.layout')
<head>
    <link rel="stylesheet" href="/asset/css/style.css">
</head>
@section('content')
<h1 class="topText">Корзина</h1>
<table>

    <thead>
    <tr>
        <th>id</th>
        <th>Адрес доставки</th>
        <th>Продукт</th>
        <th>Покупатель</th>
        <th>Общая сумма</th>
        <th>Кол-во</th>
        <th>Удалить</th>
    </tr>
    </thead>
    <tbody>
    @foreach($del as $prod)
        @if($prod->users_id==Auth::user()->id)
        <tr>
            <td>{{$prod->id}}</td>
            <td>@if($prod->address_id == 1)
                    Челябинск</td>
            @elseif($prod->address_id == 2)
                Москва
            @elseif($prod->address_id == 3)
                Питер
            @endif
            <td style="text-overflow:clip; height: 30px">@foreach($tovar as $tov)
                    @if($tov->id==$prod->products_id)
                        {{Str::limit($tov->name,20)}}
                    @endif
                @endforeach
            </td>

            <td>{{$prod->users_id}}</td>
            <td>{{$prod->price}}</td>
            <td>{{$prod->value}}</td>
            <td><a class="buy" href="{{"/product/delete/". $prod->id}}">Удалить</a></td>
        </tr>
        @elseif(Auth::user()->isAdmin == true)
            <tr>
                <td>{{$prod->id}}</td>
                <td>@if($prod->address_id == 1)
                        Челябинск</td>
                @elseif($prod->address_id == 2)
                    Москва
                @elseif($prod->address_id == 3)
                    Питер
                @endif
                <td>{{$prod->products_id}}</td>
                <td>{{$prod->users_id}}</td>
                <td>{{$prod->price}}</td>
                <td>{{$prod->value}}</td>
                <td>{{$prod->time}}</td>
                @csrf
                <td><a class="buy" href="{{"/product/delete/". $prod->id}}">on</a></td>
            </tr>
        @endif

    @endforeach
    </tbody>
    <div class="centers">
        <a href="#" class="open-popup">Оплатить товары</a>
    </div>
</table>
<div class="popup__bg">
    <form method="post" class="popup">
        @csrf
        <img src="/asset/img/cross-15.svg" class="close-popup">
        <div class="bank">
            <h2>Форма для карты</h2>
            <p>Номер карты:</p>
            <input required type="text" placeholder="Номер карты" maxlength="16" minlength="16" name="number">
            <p>Владелец карты:</p>
            <input required type="text" placeholder="ФИО" name="FIO">
            <p>Дата выпуска:</p>
            <input required type="date" placeholder="Выпушенна в" name="dateOne">
            <p>Годна до:</p>
            <input required type="date" placeholder="Действует до" name="dateTwo">
            <p>Код:</p>
            <input required type="text" placeholder="Код" maxlength="3" minlength="3" name="code">
            <button class="buy" type="submit">Оплатить</button>
        </div>

    </form>
</div>
<script src="/asset/js/script.js"></script>
@endsection
