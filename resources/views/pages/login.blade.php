@extends('layouts.app')

@section('content')

    <!-- login -->
    <div class="login margin80 marginbottom">
        <div class="container">
            <p class="title tac">Вход</p>
            <form action="{{route('auth')}}" method="post" id="auth" class="regform">
                @csrf
                <div class="input-msg">
                    <input type="text" name="email" class="reginput @error('email') redborder @enderror" placeholder="почта">
                    @error('email')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>

                <div class="input-msg">
                    <input type="password" name="password" class="reginput @error('password') redborder @enderror" placeholder="пароль">
                    @error('password')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>

                @error('auth')  <label for="" class="errlabel">{{$message}}</label> @enderror

                <input type="submit" value="Войти" class="submitbtn">
            </form>
            <div class="noacc margin40">
                <p>нет аккаунта?</p>
                <a href="{{route('registerPage')}}" class="yellow bold">зарегестрироваться</a>
            </div>
        </div>
    </div>

@endsection
