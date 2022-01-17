@extends('layout.layout')
<head>
    <link rel="stylesheet" href="/asset/css/style.css">
</head>
@section('content')


    <form style="margin: 3% auto; background-color: lightgray;" method="post">
        <div style="background-color: lightgray; border:none" class="cart">
            <h1>{{$delevery->id}}</h1>
            <p>@if($delevery->address_id == 1)
                    Челябинск</td>
            @elseif($delevery->address_id == 2)
                Москва
            @elseif($delevery->address_id == 3)
                Питер
                @endif</p>
            <hr>
            <p>Пользователь: {{$delevery->users_id}}</p>
            <hr>
            <p>Номер товара: {{$delevery->products_id}}</p>
            <hr>
            <p>Количество: {{$delevery->value}}</p>
            <hr>
            <p>Цена: {{$delevery->price}} Рублей</p>
            <hr>
        </div>
        @csrf
        <button class="buy" style="background-color: red; width: auto; color: white" type="submit">Удалить заказ</button>
    </form>
@endsection

