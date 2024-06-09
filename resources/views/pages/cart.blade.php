@extends('layouts.app')

@section('content')
    <script src="/public/assets/js/count.js" defer></script>
    <div class="catalog margin marginbottom">
        <div class="container">

            @if($carts -> isNotEmpty())
            <p class="title">Корзина</p>
            @endif

            @if($carts->isEmpty())
            <div class="products-head marginbottom">
            <p class="title">Корзина пуста!</p>
            <a href="{{route('catalog')}}">к покупкам</a>
            </div>
            @endif

            <div class="cart" id="cart">
                <div class="cart-items">
                    @foreach($carts as $cart)
                    <div class="product">
                        <a href="{{route('product', $cart->productvariant->id)}}"><img src="{{$cart->productvariant->images->first()->img}}" alt=""></a>
                        <a href="{{route('product', $cart->productvariant->id)}}" class="productname">{{$cart->productvariant->product->name}}</a>
                        <p>{{$cart->productVariant->weight}} г</p>
                        <div class="price">
                            <p>{{ number_format($cart->productvariant->price, 0, ',', ' ') }} ₽</p>
                            <div class="cartcount">
                                <form action="{{route('cart.reduce', $cart->id)}}" method="post">
                                    @csrf
                                    <button type="submit" class="mincount"><</button>
                                </form>
                                <p class="сcount">{{$cart->quantity}}</p>
                                <form action="{{route('cart.increase', $cart->id)}}" method="post">
                                    @csrf
                                    <button type="submit" class="plcount">></button>
                                </form>

                            </div>

                            <form action="{{route('cart.destroy', $cart->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delcartbtn">🗑️</button>
                            </form>

                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="cart-price">
                    @if($carts->isNotEmpty())
                    <p id="finaprice"><span class="pink">Итого: </span> {{ number_format($total, 0, ',', ' ') }} ₽</p>
                        <form action="{{route('apply.promo')}}" class="promo-form" method="post">
                            @csrf
                            @if ($promocode)
                                <input type="text" value="{{$promocode->code}}" class="reginput" placeholder="Промокод" disabled>
                                <button type="submit" name="action" value="remove" class="submitbtn">Удалить</button>
                            @else
                                <div class="input-msg">
                                    <input type="text" name="code" class="reginput @error('code') redborder @enderror" placeholder="Промокод">
                                    @error('code')  <label for="" class="errlabel">{{$message}}</label> @enderror
                                </div>

                            <button type="submit" class="submitbtn">Применить</button>
                                @endif
                        </form>
                    <a href="{{route('checkout.page')}}" class="addtocart">К оформлению →</a>
                    @endif
                </div>
            </div>

        </div>
    </div>

@endsection
