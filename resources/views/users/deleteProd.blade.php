@extends('layout.layout')
<head>
    <link rel="stylesheet" href="/asset/css/style.css">
</head>
@section('content')
    <style>
        .buy{
            width: auto;
        }
    </style>
    <h1 class="topText">Удаление заказов</h1>
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>Адрес доставки</th>
                <th>Номер продукта</th>
                <th>Покупатель</th>
                <th>Общая сумма</th>
                <th>Кол-во</th>
                <th>Удаление</th>
            </tr>
            </thead>
            <tbody>
            @foreach($delivery as $prod)
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
                    <td><a class="buy" href="{{"/product/delete/". $prod->id}}">on</a></td>

                </tr>
            @endforeach
            </tbody>
        </table>

@endsection
