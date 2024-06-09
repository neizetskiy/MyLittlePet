@extends('layouts.app')

@section('content')
    <div class="checkout margin marginbottom">
        <div class="container">
            <p class="title">Оформление заказа</p>
            <form action="{{route('checkout')}}" class="checkout-items margin40" method="post">
                @csrf
                <div class="checkout-left">
                    <div class="checkout-payment">
                        <p class="subtitle">Способ оплаты</p>
                        <div class="payment-methods">
                            <div class="payment-method">
                                <input type="radio" id="payment1" name="payment" value="Картой онлайн" checked>
                                <label for="payment1" class="payment-label">
                                    <img src="/public/assets/imgs/payments/credit-card.png" alt="Credit Card">
                                    <span>Картой онлайн</span>
                                </label>
                            </div>
                            <div class="payment-method">
                                <input type="radio" id="payment2" name="payment" value="Наличными при получении">
                                <label for="payment2" class="payment-label">
                                    <img src="/public/assets/imgs/payments/credit-card.png" alt="Credit Card">
                                    <span>Картой при получении</span>
                                </label>
                            </div>
                            <div class="payment-method">
                                <input type="radio" id="payment3" name="payment" value="Наличными при получении">
                                <label for="payment3" class="payment-label">
                                    <img src="/public/assets/imgs/payments/money.png" alt="Credit Card">
                                    <span>Наличными при получении</span>
                                </label>
                            </div>
                        </div>
                        @error('payment') <label for="" class="errlabel" >{{$message}}</label>@enderror
                    </div>
                    <div class="checkout-customer">
                        <p class="subtitle">Контактные данные</p>
                        <div class="checkoutform">
                            <div class="input-msg">
                                <input type="text" name="name" class="reginput @error('name') redborder @enderror" placeholder="Имя" value="{{auth()->user()->name}}">
                                @error('name') <label for="" class="errlabel">{{$message}}</label> @enderror
                            </div>
                            <div class="input-msg">
                                <input type="text" name="email" class="reginput @error('email') redborder @enderror" placeholder="Email" value="{{auth()->user()->email}}">
                                @error('email') <label for="" class="errlabel">{{$message}}</label> @enderror
                            </div>
                            <div class="input-msg">
                                <input type="text" name="phone" class="reginput @error('phone') redborder @enderror" id="phone-number" placeholder="Номер телефона">
                                @error('phone') <label for="" class="errlabel">{{$message}}</label>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="checkout-adress">
                        <p class="subtitle">Способ получения</p>
                        <div class="checkout-point">
                            <div class="checkout-point-img">
                                <img src="/public/assets/imgs/location/location.png" alt="">
                            </div>
                            <div class="checkout-point-text">
                                <p><span class="pointspan">Пункт MyLittlePet</span></p>
                                <p>ТЦ "Академик", улица Академика Глушко, 16Г, Казань, Республика Татарстан, 420100</p>
                                <a href="https://yandex.ru/maps/43/kazan/house/ulitsa_akademika_glushko_16g/YEAYdARlQUAFQFtvfXt5dXpiZg==/?ll=49.236294%2C55.784487&z=17.42" target="_blank" class="pink">Посмотреть на карте</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="checkout-fixed">
                    @if($discount != 0)
                    <div class="checkout-promo">
                        <h3>Скидка</h3>
                        <h3><span class="redspan">{{ number_format($discount, 0, ',', ' ') }} ₽</span></h3>
                    </div>
                    @endif
                    <div class="checkout-promo">
                        <p class="subtitle"><span class="pink">Итого:</span></p>
                        <p class="subtitle">{{ number_format($total, 0, ',', ' ') }} ₽</p>
                    </div>
                        <input type="hidden" name="total" value="{{$total}}">
                    <button type="submit" class="addtocart">Оформить заказ</button>

                </div>
            </form>
        </div>
    </div>
@endsection
