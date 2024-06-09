@extends('layouts.app')

@section('content')

    <!-- registration -->
    <div class="registration margin80 marginbottom">
        <div class="container">
            <p class="title tac">Регистрация</p>
            <form action="{{route('register')}}" method="post" id="reg" class="regform">
                @csrf
                <div class="input-msg">
                    <input type="text" name="email" class="reginput @error('email') redborder @enderror" placeholder="Почта" value="{{old('email')}}">
                  @error('email')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>

                <div class="input-msg">
                    <input type="text" name="name" class="reginput @error('name') redborder @enderror" placeholder="Имя" value="{{old('name')}}">
                    @error('name')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <div class="input-msg">
                    <input type="password" name="password" class="reginput @error('password') redborder @enderror" placeholder="Пароль">
                    @error('password')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <div class="input-msg">
                    <input type="password" name="password_confirmation" class="reginput @error('password') redborder @enderror" placeholder="Повторите пароль">
                </div>

                <div class="input-msg">
                    <div class="divcheckbox">
                        <input type="checkbox" name="agree" class="checkinpt">
                        <a href="/public/assets/documents/document.pdf" target="_blank">Согласен/сна на <span class="pink">обработку пересональных данных</span></a>
                    </div>
                    @error('agree')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>

                <div class="divcheckbox">
                    <input type="checkbox" name="agreesub" class="checkinpt">
                    <p>Согласен/сна на получение рассылки скидок и акций</p>
                </div>

                <input type="submit" value="Зарегистрироваться" class="submitbtn">
            </form>
            <div class="noacc margin40">
                <p>есть аккаунт?</p>
                <a href="{{route('login')}}" class="yellow bold">войти</a>
            </div>
        </div>
    </div>

@endsection
