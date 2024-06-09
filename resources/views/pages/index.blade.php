@extends('layouts.app')



@section('content')


    <!-- banner -->
    <div class="banner">
        <img src="/public/assets/imgs/banner/pawleft.png" alt="" class="pawleft">
        <div class="container">
            <div class="banner-items">
                <div class="banner-text">
                    <h1><span class="bspan">MyLittlePet</span> - корми питомцев правильно!</h1>
                    <a href="{{route('catalog')}}" class="bbtn">В каталог</a>
                </div>
                <img src="/public/assets/imgs/banner/banner.png" alt=""  class="bannerdesk">
                <img src="/public/assets/imgs/banner/bannertablet.png" alt=""  class="bannertablet">
            </div>
        </div>
        <img src="/public/assets/imgs/banner/pawright.png" alt="" class="pawright">
    </div>



    <!-- categories -->
    <div class="categories margin60">
        <div class="container">

            <div class="categories-items">
                <a href="{{route('catalog', array_merge($_GET,['category' => 1]))}}" class="categref">
                    <div class="category">
                        <h3>Корм для <br> <span>кошек</span> </h3>
                        <img src="/public/assets/imgs/categories/cat3.png" alt="cat" class="categimg" id="firstcat">
                    </div>
                </a>
                <a href="{{route('catalog', array_merge($_GET,['category' => 2]))}}" class="categref">
                    <div class="category">
                        <h3>Корм для <br> <span>собак</span> </h3>
                        <img src="/public/assets/imgs/categories/dog2.png" alt="cat" class="categimg" id="seccat">
                    </div>
                </a>
            </div>
        </div>
    </div>


    <!-- new products -->
    <div class="products margin">
        <img src="/public/assets/imgs/newitems/food1.png" alt="" id="primg1" class="productsimg">
        <img src="/public/assets/imgs/newitems/food2.png" alt="" id="primg2" class="productsimg">
        <div class="container">
            <div class="products-head">
                <p class="title">Новые товары</p>
                <a href="{{route('catalog')}}">показать все</a>
            </div>
            <div class="products-items">
                @foreach($productvariants as $productvariant)
                <a href="{{route('product', $productvariant->id)}}" class="product-link">
                    <div class="product">
                        <img src="{{$productvariant->images->first()->img}}" alt="">
                        <p>{{$productvariant->product->foodtype->name}} корм {{$productvariant->product->category->name}}</p>
                        <p class="productname">{{$productvariant->product->name}}</p>
                        <div class="price">
                            <p class="prprice">{{ number_format($productvariant->price, 0, ',', ' ') }} ₽</p>
                            <p class="prprice weight"><span class="pink">{{$productvariant->weight}}</span> г</p>
                        </div>
                    </div>
                </a>
                @endforeach

            </div>
        </div>
    </div>


    <!-- about us -->
    <div class="about margin">
        <img src="/public/assets/imgs/about/paw.png" alt="" class="aboutpaw">
        <div class="container">
            <div class="about-items">
                <div class="about-item">
                    <p class="title white">О компании</p>
                    <div class="about-text">
                        <p class="white"><span class="aboutspan">MyLittlePet</span> - молодая компания, которая разрабатывает корма  холистик и суперпремиум класса. <br>
                            Мы используем лишь отборные и качественные ингредиенты при изготовлении наших кормов! Все кормы соответствуют нормам. <br>
                            Также наша компания разработала комплекс витаминов MyLittlePet BIO, которые добавляются во все корма для поддержания здоровья домашних питомцев.
                        </p>
                        <a href="{{route('about')}}" class="aboutbtn">Подробнее</a>
                    </div>

                </div>
                <div class="about-item">
                    <img src="/public/assets/imgs/about/pets.png" alt="pets">
                </div>
            </div>
        </div>
    </div>



    <!-- about food -->
    <div class="aboutfood margin" id="aboutfood">
        <div class="container">
            <p class="title">О кормах <span class="aboutfoodspan">MyLittlePet</span></p>
            <div class="aboutfood-items">
                <div class="aboutfood-item">
                    <div class="aboutfood-info">
                        <img src="/public/assets/imgs/aboutfood/fresh.png" alt="" class="aboutfoodicon">
                        <p>Натуральные ингредиенты</p>
                    </div>
                    <div class="aboutfood-info">
                        <img src="/public/assets/imgs/aboutfood/quality.png" alt="" class="aboutfoodicon">
                        <p>Премиальное качество</p>
                    </div>
                </div>
                <div class="aboutfood-item">
                    <!-- <img src="/public/assets/imgs/aboutfood/bowl.png" alt="" class="bowl"> -->
                    <iframe frameborder="0"  class="juxtapose" width="500px" height="500px" src="https://cdn.knightlab.com/libs/juxtapose/latest/embed/index.html?uid=f42623c4-0ae3-11ef-9396-d93975fe8866"></iframe>
                </div>
                <div class="aboutfood-item">
                    <div class="aboutfood-info-rev">
                        <p>Более 70% <br> мяса</p>
                        <img src="/public/assets/imgs/aboutfood/meat.png" alt="" class="aboutfoodicon">
                    </div>
                    <div class="aboutfood-info-rev">
                        <p>Рекомендовано ветеринарами</p>
                        <img src="/public/assets/imgs/aboutfood/vet.png" alt="" class="aboutfoodicon">
                    </div>
                </div>
                <div class="aboutfood-phone">
                    <div class="aboutfood-info-phone">
                        <img src="/public/assets/imgs/aboutfood/fresh.png" alt="" class="aboutfoodicon">
                        <p>Натуральные ингредиенты</p>
                    </div>
                    <div class="aboutfood-info-phone">
                        <img src="/public/assets/imgs/aboutfood/quality.png" alt="" class="aboutfoodicon">
                        <p>Премиальное качество</p>
                    </div>
                    <div class="aboutfood-info-phone">
                        <img src="/public/assets/imgs/aboutfood/meat.png" alt="" class="aboutfoodicon">
                        <p>Более 70% <br> мяса</p>
                    </div>
                    <div class="aboutfood-info-phone">
                        <img src="/public/assets/imgs/aboutfood/vet.png" alt="" class="aboutfoodicon">
                        <p>Рекомендовано ветеринарами</p>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Questions and Answers -->
    <div class="qa margin">
        <div class="container">
            <p class="title">Вопросы и ответы</p>
            <div class="questions-items">
                <div class="question">
                    <button class="question-head">В каком году основана компания?</button>
                    <div class="panel">
                        <p>Компания MyLittlePet основана в 2022 году в г.Казань</p>
                    </div>
                </div>
                <div class="question">
                    <button class="question-head">Где производится корм?</button>
                    <div class="panel">
                        <p>Корм компании MyLittlePet производится на заводе в г.Казань</p>
                    </div>
                </div>
                <div class="question">
                    <button class="question-head">Что такое MyLittlePet BIO?</button>
                    <div class="panel">
                        <p>MyLittlePet BIO - комплекс добавок в рацион сухих и влажных кормов для поддержания здоровья шерсти питомца, его организма.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- contacts -->
    <div class="contacts margin">
        <img src="/public/assets/imgs/contacts/pawleft.png" alt="" class="contactspawleft">
        <div class="container">
            <div class="contacts-items">
                <div class="contacts-item">
                    <p class="title white">Наши контакты</p>
                    <div class="contacts-text">
                        <div class="contacts-info">
                            <a href="https://yandex.ru/maps/43/kazan/house/ulitsa_akademika_glushko_16g/YEAYdARlQUAFQFtvfXt5dXpiZg==/?ll=49.236294%2C55.784487&z=17.42" target="_blank">ул. Академика Глушко, 16Г</a>
                            <p>9:00 - 20:00, без выходных</p>
                        </div>
                        <div class="contacts-info">
                            <a href="tel:+79999878787">+7 (917) 856-46-91</a>
                            <a href="mailto:mylittlepet.shop@yandex.ru">mylittlepet.shop@yandex.ru</a>
                        </div>
                        <div class="contacts-social">
                            <a href="https://t.me/neizzzy" target="_blank"><img src="/public/assets/imgs/contacts/tg.png" alt=""></a>
                            <a href="https://www.whatsapp.com/" target="_blank"><img src="/public/assets/imgs/contacts/wh.png" alt=""></a>
                            <a href="https://vk.com/neizetskiy" target="_blank"><img src="/public/assets/imgs/contacts/vk.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="contacts-map">
                    <iframe class="map" src="https://yandex.ru/map-widget/v1/?um=constructor%3A7559383c643d99638fc454dd3c75f87ead3e373afe8d60c18320d5c3e6193f9e&amp;source=constructor" width="635" height="510" frameborder="0"></iframe>
                    <!-- <iframe class="map" src="https://yandex.ru/map-widget/v1/?um=constructor%3A3e263c817119723347996fe5565c51f497cf3d85a5235a0c12b267945a43c57c&amp;source=constructor" width="635" height="510" frameborder="0"></iframe> -->
                </div>
            </div>
            <hr class="line">
        </div>
        <img src="/public/assets/imgs/contacts/pawright.png" alt="" class="contactspawright">
    </div>

    <a href="#header" class="goup">
        <div class="triangle"></div>
    </a>


@endsection

