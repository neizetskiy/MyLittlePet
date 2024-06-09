@extends('layouts.app')

@section('content')


    <!-- edit -->
    <div class="editprofileform margin80">
        <div class="container">
            <p class="title tac">Изменить пароль</p>
            <form action="{{route('password.update')}}" id="editpr" method="post" class="regform" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="input-msg">
                    <input type="password" name="old_password" class="reginput @error('old_password') redborder @enderror" placeholder="Старый пароль">
                    @error('old_password')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <div class="input-msg">
                    <input type="password" name="password" class="reginput @error('password') redborder @enderror" placeholder="Новый пароль">
                    @error('password')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <div class="input-msg">
                    <input type="password" name="password_confirmation" class="reginput" placeholder="Повторите новый пароль">
                </div>

                <input type="submit" name="upduser" value="Изменить пароль" class="submitbtn">
            </form>
        </div>
    </div>


@endsection
