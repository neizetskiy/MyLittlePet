@extends('layouts.app')
@section('content')


    <div class="login margin80 marginbottom">
        <div class="container">
            <p class="title tac">Добавить промокод</p>
            <form action="{{route('promocode.store')}}" method="post" id="auth" class="regform">
                @csrf
                <div class="input-msg">
                    <input type="text" name="code" class="reginput @error('code') redborder @enderror" placeholder="Промокод">
                    @error('code')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <div class="input-msg">
                    <input type="text" name="discount" class="reginput @error('discount') redborder @enderror" placeholder="Процент скидки">
                    @error('discount')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <input type="submit" value="Добавить" class="submitbtn">
            </form>
        </div>
    </div>

@endsection
