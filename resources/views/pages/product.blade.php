@extends('layouts.app')

@section('content')

<!-- product page -->
    <div class="productpage margin">
        <div class="container">
            <div class="productpage-items">

                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach($images as $image)
                        <div class="swiper-slide"><img class="swiperimg" src="{{$image->img}}" alt="img{{$image->id}}"></div>
                        @endforeach

                        ...
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                    <!-- If we need scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>

                <div class="productpage-info">
                    <p class="title tal">{{$productvariant->product->name}}</p>
                    <p class="productp"><span class="productpagespan">Животное: </span>{{$productvariant->product->category->name}}</p>
                    <p class="productp"><span class="productpagespan">Тип корма: </span>{{$productvariant->product->foodtype->name}}</p>
                    <p class="productp"><span class="productpagespan">Назначение: </span>{{$productvariant->product->subcategory->name}}</p>
                    <p class="productp"><span class="productpagespan">Описание: </span>{{$productvariant->product->description}}</p>
                    <p class="productp"><span class="productpagespan">Вес: </span>{{$productvariant->weight}} г</p>
                    @admin
                    <a href="{{route('variant.add', $productvariant->product->id)}}" class="pink">+ Добавить вариант</a>
                    @endadmin
                    <div class="productpage-variants">
                        @foreach($variants as $variant)
                            <div class="productpage-variant">
                                <a href="{{route('product', $variant->id)}}" class="variantbtn @if($variant->id != $productvariant->id) variantunactive @endif">{{$variant->weight}} г</a>
                                @admin
                                <a href="{{route('variant.delete', $variant->id)}}" class="delvariantbtn">Удалить</a>
                                @endadmin
                            </div>
                        @endforeach
                    </div>
                    <div class="productpage-price">
                        <p>{{ number_format($productvariant->price, 0, ',', ' ') }} ₽</p>
                        @auth()
                            <form action="{{route('cart.add', $productvariant->id)}}" method="post">
                                @csrf
                                <button type="submit" class="addtocart">В корзину</button>
                            </form>
                        @endauth
                        @guest()
                            <a href="{{route('login')}}" class="addtocart">В корзину</a>
                        @endguest
                        @admin
                        <div class="productpage-actions">
                            <a href="{{route('product.edit', $productvariant->product->id)}}"><img src="/public/assets/imgs/productpage/edit.png" alt=""></a>
                            <a href="{{route('product.delete', $productvariant->product->id)}}"><img src="/public/assets/imgs/productpage/delete.png" alt=""></a>
                        </div>
                        @endadmin
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="productpage-aboutfood margin marginbottom">
        <div class="container">
            <div class="productpage-sostav">
                <div class="nutrients">
                    <div class="nutrients-head">
                        <p class="subtitle pink tab nutrients-active">Минеральные вещества</p>
                        <p class="subtitle pink tab ">Состав</p>
                    </div>
                    <div class="nutrient tabs">
                        <p>{{$productvariant->product->minerals}}</p>
                    </div>
                    <div class="nutrient tabs nevidno">
                        <p>{{$productvariant->product->ingredients}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="/public/assets/js/slider.js"></script>


@endsection
