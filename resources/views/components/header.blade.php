<div class="upheader" id="header">
    <div class="container">
        <div class="upheader-items">
            <a href="https://yandex.ru/maps/43/kazan/house/ulitsa_akademika_glushko_16g/YEAYdARlQUAFQFtvfXt5dXpiZg==/?ll=49.236294%2C55.784487&z=17.42" target="_blank">ул. Академика Глушко, 16Г</a>
            <a href="mailto:mylittlepet.shop@yandex.ru">mylittlepet.shop@yandex.ru</a>
            <a href="tel:+79999676767">+7 (917) 856-46-91</a>
        </div>
    </div>
</div>

<!-- header -->
<header>
    <div class="container">
        <div class="header">
            <div class="topheader">
                <a href="{{route('index')}}" class="logo" id="logo"><img src="/public/assets/imgs/header/v3.png" alt=""></a>
                <form action="{{route('catalog')}}" method="get" class="searchform">
                    <input type="text" name="result" placeholder="Найти на MyLittlePet..." class="searchinput" @if(isset($_GET['result'])) value="{{$_GET['result']}}" @endif>
                    <button type="submit" class="searchbtn"><img src="/public/assets/imgs/header/Search.png" alt=""></button>
                </form>
                <div class="menu">
                    @auth()
                    <a href="{{route('profile')}}" class="menu-item">
                        <img src="/public/assets/imgs/header/profile.png" alt="">
                        <p>{{auth()->user()->name}}</p>
                    </a>
                    <a href="{{route('cart')}}" class="menu-item">
                        <img src="/public/assets/imgs/header/cart.png" alt="">
                        <p>Корзина</p>

                    </a>
                    @endauth

                    @guest()
                            <a href="{{route('login')}}" class="menu-item">
                                <img src="/public/assets/imgs/header/profile.png" alt="">
                                <p>Войти</p>
                            </a>
                    @endguest

                </div>
            </div>

            <div class="downheader">
                <nav>
                    <div class="catalog-link">
                        <a href="{{route('catalog')}}" class="link" id="cataloglink">Каталог</a>
                        <div class="catalog-link-selection">
                            @if(isset($categories))
                                @foreach($categories as $category)
                                <a href="{{route('catalog', array_merge($_GET, ['category' =>$category->id]))}}">{{$category->name}}</a>
                              @endforeach
                            @endif
                        </div>
                    </div>

                    <a href="{{route('about')}}" class="link">О нас</a>
                    <a href="{{route('index', '#aboutfood')}}" class="link">О кормах</a>
                    <p class="link openmodal" id="openmodal">Скидки и акции</p>
                </nav>
            </div>
        </div>


            <div class="burger-header">
            <!-- burger -->


                    <a href="{{route('index')}}" class="logo"><img src="/public/assets/imgs/header/v3.png" alt=""></a>
                    <img src="/public/assets/imgs/header/burger.png" alt="" id="burgerbtn" class="burgerbutton">

            <div class="burgermenu">
                <div class="burgerhead">
                    <a href="/" class="logoburger"><img src="/public/assets/imgs/header/v3.png" alt="Logo" class="logoburger"></a>
                    <p id="closeburger">x</p>
                </div>
                <div class="burgernav">
                    <a href="{{route('catalog')}}" class="link">Каталог</a>
                    <a href="{{route('about')}}" class="link">О нас</a>
                    <a href="{{route('index', '#aboutfood')}}" class="link">О кормах</a>
                    <a href="#opnemodal" class="link openmodal">Скидки и акции</a>
                </div>
                <div class="burgernav">
                    @guest()
                    <a href="{{route('login')}}" class="link">Вход</a>
                    @endguest

                    @auth()
                    <a href="{{route('profile')}}" class="link">Профиль</a>
                    <a href="{{route('cart')}}" class="link">Корзина</a>
                    @endauth
                </div>
                <div class="search">
                    <form action="{{route('catalog')}}" method="get" class="searchformburger">
                        <input type="text" name="result" class="searchinpt" placeholder="Найти на MyLittlePet...">
                        <input type="submit" value="поиск" class="searchbtn">
                    </form>
                </div>
            </div>
            </div>
    </div>
    <div class="bottom-menu">
        <nav>
            <div class="catalog-link">
                <a href="{{route('catalog')}}" class="link" id="cataloglink">Каталог</a>
                <div class="catalog-link-selection">
                    <a href="{{route('catalog', array_merge($_GET, ['category' =>'cat']))}}">Для кошек</a>
                    <a href="{{route('catalog', array_merge($_GET, ['category' =>'dog']))}}">Для собак</a>
                </div>
            </div>
            <a href="{{route('about')}}" class="link">О нас</a>
            <a href="{{route('index', '#aboutfood')}}" class="link">О кормах</a>
            <p class="link openmodal" id="openmodal">Скидки и акции</p>
        </nav>
        <div class="menu">
            @auth()
            <a href="{{route('profile')}}" class="menu-item">
                <img src="/public/assets/imgs/header/profile.png" alt="">
                <p>{{auth()->user()->name}}</p>
            </a>
            <a href="{{route('cart')}}" class="menu-item">
                <img src="/public/assets/imgs/header/cart.png" alt="">
                <p>Корзина</p>
            </a>
            @endauth

            @guest()
                    <a href="{{route('login')}}" class="menu-item">
                        <img src="/public/assets/imgs/header/profile.png" alt="">
                        <p>Войти</p>
                    </a>
             @endguest
        </div>
    </div>
</header>
