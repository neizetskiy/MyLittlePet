@extends('layouts.app')

@section('content')


    <!-- delete -->
    <div class="delete margin marginbottom">
        <div class="container">
            <div class="delete-items">
                <p class="title">Вы действительно хотите удалить <span class="pink">{{$product->name}}</span>?</p>
                <div class="subcat">
                    <p><span class="pink">Категория:</span> {{$product->category->name}}</p>
                    <p><span class="pink">Подкатегория:</span> {{$product->subcategory->name}}</p>
                </div>
                <div class="delete-actions">
                    <form action="{{route('product.destroy', $product->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="deleteitem">Удалить</button>
                    </form>
                    <a href="#" onclick="window.history.go(-1)" class="cancel">Отмена</a>
                </div>
            </div>
        </div>
    </div>


@endsection
