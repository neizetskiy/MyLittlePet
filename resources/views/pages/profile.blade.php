@extends('layouts.app')

@section('content')
    <!-- profile -->
    <div class="profile margin">
        <div class="container">
            <div class="profile-items">
                <div class="profile-img">
                    <img src="{{auth()->user()->img}}" alt="userimg">
                    <a href="{{route('logout')}}" class="delcartbtn">выйти</a>
                </div>
                <div class="profile-text">
                    <p class="title tal">Здравствуйте, <span class="pink">{{auth()->user()->name}}</span>!</p>
                    <div class="profile-info">
                        <p><span class="pink">Почта: </span>{{auth()->user()->email}}</p>
                        <p><span class="pink">Дата регистрации: </span>{{auth()->user()->dataReg}}</p>
                        <a href="{{route('profile.edit')}}" class="editprofile">Редактировать профиль</a>
                        @admin
                        <a href="#admin" class="editprofile">Админ-панель</a>
                        @endadmin
                    </div>

                </div>
                <a href="{{route('logout')}}" id="logoutadaptive" class="delcartbtn">выйти</a>
            </div>
        </div>
    </div>


    <!-- orders -->



    <div class="orders margin marginbottom">

        <div class="container">
            <p class="title">История заказов</p>
            @if($orders->isEmpty())
                <h2 class="margin40">Заказов нет 😓</h2>
                <a href="{{route('catalog')}}" class="pink">К покупкам</a>
            @endif
            <div class="order-list">

                @foreach($orders as $order)
                <div class="oneorder">
                    <div class="order-head">
                        <div class="order-head-left">
                            <p>#{{$order->id}}</p>
                            <p>статус: {{$order->status}}</p>
                        </div>
                        <p class="orderdetail">Детали заказа</p>
                    </div>
                    <div class="order-body">
                        @foreach($order->orderitems as $item)
                        <div class="order-product">
                            <div class="order-img">
                                <img src="{{$item->product_img}}" alt="">
                            </div>
                            <div class="order-text">
                                <p>{{$item->product_name}}</p>
                                <p>{{$item->weight}} гр</p>
                                <p>{{$item->quantity}} шт</p>
                            </div>
                        </div>
                        @endforeach

                        <div class="ordertotal">
                            <p class="customer">Итого: {{ number_format(round($order->total, 2), 0, ',', ' ') }} ₽</p>
                        </div>

                            @if($order->status == 'Создан')
                            <form action="{{route('order.cancel', $order->id)}}" method="post" class="orderform">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="useredit">Отменить</button>
                            </form>
                            @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <!-- admin panel -->
    @admin
    <div class="admin margin marginbottom" id="admin">
        <div class="container">
            <p class="title">Панель администратора</p>
            <div class="admin-add margin60">
                <a href="{{route('product.create')}}" class="pink">+ Добавить товар</a>
            </div>

            <!-- Подкатегории -->
            <div class="admin-categories margin60">
                <p class="subtitle">Категории</p>
                <div class="admin-add">
                    <a href="{{route('subcategory.create')}}" class="pink">+ Добавить подкатегорию</a>
                </div>
                <div class="admin-categories-items">
                    @foreach($subcategories as $subcat)
                    <div class="admin-category">
                        <p>{{$subcat->name}}</p>
                        <a href="{{route('subcategory.delete', $subcat->id)}}" class="delcartbtn">Удалить</a>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="admin-categories margin60">
                <p class="subtitle">Промокоды</p>
                <div class="admin-add">
                    <a href="{{route('promocode.create')}}" class="pink">+ Добавить промокод</a>
                </div>
                <div class="admin-categories-items">
                    @foreach($promocodes as $promo)
                        <div class="admin-category">
                            <p>{{$promo->code}} ({{$promo->discount}}%)</p>
                            <a href="{{route('promocode.delete', $promo->id)}}" class="delcartbtn">Удалить</a>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="admin-subs margin40">
                <p class="subtitle">Рассылка </p>
                <div class="admin-add margin20">
                    <a href="{{route('email.sendPage')}}" class="pink">+ Отправить рассылку</a>
                </div>
            </div>

            <div class="admin-orders" id="allorders">
                <p class="subtitle">Заказы пользователей</p>
                <div class="order-filters">
                    @if(isset($_GET['status']))
                        <a href="{{ route('profile')}}#allorders" class="orderfilterbtn">Все</a>
                    @endif
                    <a href="{{ route('profile', ['status' => 'Принят']) }}#allorders" class="orderfilterbtn @if(isset($_GET['status']) && $_GET['status'] == 'Принят') orderfilterbtnactive @endif">Принят</a>
                    <a href="{{ route('profile', ['status' => 'Отменен']) }}#allorders" class="orderfilterbtn @if(isset($_GET['status']) && $_GET['status'] == 'Отменен') orderfilterbtnactive @endif">Отменен</a>
                    <a href="{{ route('profile', ['status' => 'Создан']) }}#allorders" class="orderfilterbtn @if(isset($_GET['status']) && $_GET['status'] == 'Создан') orderfilterbtnactive @endif" >Создан</a>
                </div>
                @if($allorders->isEmpty())
                    <h2 class="margin40">Заказов нет 😓</h2>
                @endif
                <div class="order-list">
                    @foreach($allorders as $order)
                    <div class="oneorder">
                        <div class="order-head" id="">
                            <div class="order-head-left">
                                <p>#{{$order->id}}</p>
                                <p>статус: {{$order->status}}</p>

                            </div>
                            <div class="order-head-actions">
                                @if($order->status == 'Создан')
                                    <form action="{{route('order.confirm', $order->id)}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="orderactionbtn"><img src="/public/assets/imgs/profile/success.png" alt=""></button>
                                    </form>

                                    <form action="{{route('order.cancelbyadmin', $order->id)}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="orderactionbtn"><img src="/public/assets/imgs/profile/decline.png" alt=""></button>
                                    </form>
                                @endif

                                @if($order->status == 'Принят')
                                        <form action="{{route('order.cancelbyadmin', $order->id)}}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="orderactionbtn"><img src="/public/assets/imgs/profile/decline.png" alt=""></button>
                                        </form>
                                @endif

                                @if($order->status == 'Отменен')
                                        <form action="{{route('order.confirm', $order->id)}}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="orderactionbtn"><img src="/public/assets/imgs/profile/success.png" alt=""></button>
                                        </form>
                                @endif
                            </div>
                            <p class="orderdetail">Детали заказа</p>
                        </div>
                        <div class="order-body">

                            @foreach($order->orderitems as $item)
                                <div class="order-product">
                                    <div class="order-img">
                                        <img src="{{$item->product_img}}" alt="">
                                    </div>
                                    <div class="order-text">
                                        <p>{{$item->product_name}}</p>
                                        <p>{{$item->weight}} гр</p>
                                        <p>{{$item->quantity}} шт</p>
                                    </div>
                                </div>
                            @endforeach
                                <div class="ordertotal">
                                    <p class="customer">Итого: {{ number_format(round($order->total, 2), 0, ',', ' ') }} ₽</p>
                                </div>
                            <div class="customer-info">
                                <p class="customer">Контактные данные</p>
                                <div class="customer-items">
                                <p>Имя: {{$order->customer_name}}</p>
                                <a href="mailto:{{$order->customer_email}}" class="pink">Почта: {{$order->customer_email}}</a>
                                <a href="tel:{{$order->customer_phone}}" class="pink">Телефон: {{$order->customer_phone}}</a>
                                </div>
                                <p class="customer">Способ оплаты: {{$order->payment}}</p>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    @endadmin


@endsection
