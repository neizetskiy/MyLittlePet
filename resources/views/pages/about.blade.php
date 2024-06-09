@extends('layouts.app')

@section('content')
    <div class="aboutpage margin">
        <div class="container">
            <div class="aboutpage-items">
                <div class="aboutpage-item">
                    <p class="title">О компании</p>
                    <div class="about-text">
                        <p><span class="aboutspan">MyLittlePet</span> - молодая компания, которая разрабатывает корма  холистик и суперпремиум класса. <br>
                            Мы используем лишь отборные и качественные ингредиенты при изготовлении наших кормов! Все кормы соответствуют нормам. <br>
                            Также наша компания разработала комплекс витаминов MyLittlePet BIO, которые добавляются во все корма для поддержания здоровья домашних питомцев.
                        </p>
                        <a href="/public/assets/documents/document.pdf" target="_blank" class="document">документация</a>
                    </div>

                </div>
                <div class="aboutpage-item">
                    <img src="/public/assets/imgs/about/pets2.png" alt="pets">
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
                </div>
            </div>
            <hr class="line">
        </div>
        <img src="/public/assets/imgs/contacts/pawright.png" alt="" class="contactspawright">
    </div>
@endsection
