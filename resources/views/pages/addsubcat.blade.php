@extends('layouts.app')

@section('content')


    <div class="login margin80 marginbottom">
        <div class="container">
            <p class="title tac">Добавить подкатегорию</p>
            <form action="{{route('subcategory.store')}}" method="post" id="auth" class="regform">
                @csrf
                <div class="input-msg">
                    <input type="text" name="name" class="reginput @error('name') redborder @enderror" placeholder="Название">
                    @error('name')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>

                <input type="submit" value="Добавить" class="submitbtn">
            </form>
        </div>
    </div>

@endsection
