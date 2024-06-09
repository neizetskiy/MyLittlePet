@extends('layouts.app')

@section('content')
<div class="delete margin marginbottom">
    <div class="container">
        <div class="delete-items">
            <p class="title">Вы действительно хотите удалить вариант <span class="pink">{{$productVariant->weight}} г</span>?</p>
            <div class="subcat">
                <p><span class="pink">Цена: </span> {{$productVariant->price}} ₽</p>
                <p><span class="pink">Товар: </span>{{$productVariant->product->category->name}} {{$productVariant->product->name}}</p>
                @if($variants == 1)
                    <p class="redtext">Удаляя этот вариант, удалится полностью товар!</p>
                @endif
            </div>
            <div class="delete-actions">
                <form action="{{route('variant.destroy', $productVariant->id)}}" method="post">
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
