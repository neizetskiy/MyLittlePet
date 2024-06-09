@extends('layouts.app')

@section('content')
    <div class="ordersuccess">
        <div class="ordersuccess-items">
            <p class="smile">🐱</p>
            <p class="title">Заказ успешно офрмлен!</p>
            <a href="{{route('profile')}}" class="pink">К заказам</a>
        </div>
    </div>
@endsection
