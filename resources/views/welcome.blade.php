@extends('layout.layout')
@section('content')
    @csrf
    <style>
        img{
            width: 60%;
            box-shadow: 0 0 15px 5px white;
        }

    </style>
    <h1 style="align-items: center; text-align: center">Товары</h1>
    @foreach($products as $product)
        <div class="cart">
            <h3>{{$product->name}}</h3>
            <img src="{{asset('/storage/'. $product->photo)}}">
{{--            <img src="{{ asset('/storage/'. $product->photo) ? asset($product->photo) : '' . ' https://via.placeholder.com/100x100'}}">--}}

            <p class="p">{{$product->description}}</p>
            <hr>
            <p class="p">{{$product->weight}} Кг.</p>
            <hr>
            <p class="p">{{$product->price}} Руб.</p>
            @if(Auth::user())
                <a class="buy" href="{{"/buy/product/". $product->id}}">Подробнее</a>
            @endif
            @if(Auth::check() && Auth::user()->isAdmin == 1)
                <a class="buy" href="{{"/product/update/". $product->id}}">Редактировать</a>
            @endif
        </div>
    @endforeach
@endsection
{{--{{asset("/storage/app/public/". $product->photo)}}--}}
