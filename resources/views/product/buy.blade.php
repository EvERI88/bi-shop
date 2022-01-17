@extends('layout.layout')
<head>
    <link rel="stylesheet" href="/asset/css/style.css">
</head>
@section('content')
    <div class="cart">

        <h3>{{$product->name}}</h3>
        <img src="{{asset('/storage/'. $product->photo)}}">
        <p>Вес: {{$product->weight}} Кг.</p>
        <p>Цена: {{$product->price}} Р.</p>
        <p class="pr">Описание: {{$product->description}}</p>
        <div class="cart__buy">
            <form style=" width: 300px; padding: 0 30px;background-color: rgba(0,0,0,0);" method="post" enctype="multipart/form-data">
                @csrf
                <p class="center">Куда доставить?</p>
                <select name="address_id">
                    @foreach($addresses as $address)
                        <option value="{{$address->id}}">{{$address->name}}</option>
                    @endforeach
                </select>
                @error('address_id')<p>{{$message}}</p>@enderror
                <input id="none" name="products_id" placeholder="{{$product->id}}" value="{{$product->id}}"/>
                @error('products_id')<p>{{$message}}</p>@enderror
                <input id="none" name="price" placeholder="{{$product->price}}" value="{{$product->price}}"/>
                @error('price')<p>{{$message}}</p>@enderror
                <input id="none" name="users_id" placeholder="{{$product->price}}" value="{{Auth::user()->id}}"/>
                @error('users_id')<p>{{$message}}</p>@enderror
                <p class="center">Выберите кол-во товара:</p>
                <input type="number" name="value" value="1" min="1" max="5" step="1">
                @error('value')<p>{{$message}}</p>@enderror
                <button style="width: 96%; margin: 1% auto" class="buy" type="submit">Добавить в корзину</button>
            </form>
        </div>
    </div>
    @endsection
