@extends('layouts.app')

@section('content')


    <!-- delete -->
    <div class="delete margin marginbottom">
        <div class="container">
            <div class="delete-items">
                <p class="title">Вы действительно хотите удалить промокод<span class="pink">{{$promocode->code}}</span>?</p>
                <div class="delete-actions">
                    <form action="{{route('promocode.destroy', $promocode->id)}}" method="post">
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
