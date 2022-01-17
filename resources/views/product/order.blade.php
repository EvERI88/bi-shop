@extends('layout.layout')
<head>
    <link rel="stylesheet" href="/asset/css/style.css">
</head>
@section('content')
    <h1 class="topText">Оплаченные товары</h1>
    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>Адрес доставки</th>
            <th>Продукт</th>
            <th>Покупатель</th>
            <th>Общая сумма</th>
            <th>Кол-во</th>
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
                <td style="text-overflow:clip; height: 30px">@foreach($tovar as $tov)
                        @if($tov->id==$prod->products_id)
                            {{Str::limit($tov->name,20)}}
                        @endif
                    @endforeach
                </td>
                <td>{{$prod->users_id}}</td>
                <td>{{$prod->price}}</td>
                <td>{{$prod->value}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

