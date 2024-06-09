@extends('layouts.app')

@section('content')


    <!-- delete -->
    <div class="delete margin marginbottom">
        <div class="container">
            <div class="delete-items">
                <p class="title">Вы действительно хотите удалить <span class="pink">{{$subcategory->name}}</span>?</p>
                <div class="delete-actions">
                    <form action="{{route('subcategory.destroy', $subcategory->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="deleteitem">Удалить</button>
                    </form>
                    <a href="{{route('profile', '#admin')}}"  class="cancel">Отмена</a>
                </div>
            </div>
        </div>
    </div>


@endsection
