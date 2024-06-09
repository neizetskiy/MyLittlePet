@extends('layouts.app')

@section('content')
    <!-- catalog -->
    <div class="catalog margin" id="catalog">
        <div class="container">
            <div class="catalog-head">
                <p class="title">Каталог</p>
            </div>

            <div class="catalog-head">
                <div class="title-head-column">
                    <p class="subtitle">Сортировка</p>
                    @if(isset($_GET['category']) ||isset($_GET['subcategory'])  || isset($_GET['foodtype']) || isset($_GET['result']))
                        <a href="{{route('catalog')}}" class="delcartbtn">Очистить все</a>
                    @endif
                </div>


                <div class="sort">
                    <div class="sortaccordion">
                        <button class="sort-head">Упорядочить</button>
                        <div class="sort-selection">
                            <a href="{{request()->fullUrlWithQuery(['price' => null])}}">По умолчанию</a>
                            <a href="{{route('catalog', array_merge($_GET, ['price' => 'asc']))}}">Сначало дешевые</a>
                            <a href="{{route('catalog', array_merge($_GET, ['price' => 'desc']))}}">Сначало дорогие</a>
                        </div>
                    </div>
                </div>
            </div>

            @if(isset($_GET['sort']))
                <div class="cleardiv">
                    <a href="?page=catalog" class="clear">Очистить фильтры</a>
                </div>
            @endif
            <div class="sort-items">
                <form class="sort-item">
                    <p class="filtertitle">Животное</p>

                    @if(isset($_GET['category']))
                        <a href="{{request()->fullUrlWithQuery(['category' => null])}}" class="redtext">Очистить фильтр</a>
                    @endif

                    @foreach($categories as $cat)
                    <div class="sort-item-item">
                        <input @checked(isset($_GET['category'])&&$_GET['category'] == $cat->id) type="radio" name="pet" id="{{$cat->id}}" class="radio" onclick="window.location.href='{{route('catalog', array_merge($_GET, ['category'=>$cat->id]))}}'">
                        <label for="cat" onclick="window.location.href='{{route('catalog', array_merge($_GET, ['category'=>$cat->id]))}}'">{{$cat->name}}</label>
                    </div>
                    @endforeach
                </form>

                <form class="sort-item">
                    <p class="filtertitle">Тип корма</p>
                    @if(isset($_GET['foodtype']))
                        <a href="{{request()->fullUrlWithQuery(['foodtype' => null])}}" class="redtext">Очистить фильтр</a>
                    @endif
                    @foreach($foodtypes as $foodtype)
                    <div class="sort-item-item">
                        <input @checked(isset($_GET['foodtype'])&&$_GET['foodtype'] == $foodtype->id)  type="radio"  name="foodtype" id="{{$foodtype->id}}" class="radio" onclick="window.location.href='{{route('catalog', array_merge($_GET, ['foodtype'=>$foodtype->id]))}}'">
                        <label for="nowater" onclick="window.location.href='{{route('catalog', array_merge($_GET, ['foodtype'=>$foodtype->id]))}}'">{{$foodtype->name}}</label>
                    </div>
                    @endforeach
                </form>
                <form class="sort-item">
                    <p class="filtertitle">Назначение</p>
                    @if(isset($_GET['subcategory']))
                        <a href="{{request()->fullUrlWithQuery(['subcategory' => null])}}" class="redtext">Очистить фильтр</a>
                    @endif
                    @foreach($subcategories as $subcat)
                    <div class="sort-item-item">
                        <input @checked(isset($_GET['subcategory'])&&$_GET['subcategory'] == $subcat->id) type="radio" name="purpose" id="{{$subcat->id}}" class="radio" onclick="window.location.href='{{route('catalog', array_merge($_GET, ['subcategory'=>$subcat->id]))}}'">
                        <label for="sterilized" onclick="window.location.href='{{route('catalog', array_merge($_GET, ['subcategory'=>$subcat->id]))}}'">{{$subcat->name}}</label>
                    </div>
                    @endforeach
                </form>
            </div>

            <div class="products-items marginbottom">
                @if($productvariants->isEmpty())
                    <p class="subtitle">Товары не найдены 😓</p>
                @endif
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
@endsection
