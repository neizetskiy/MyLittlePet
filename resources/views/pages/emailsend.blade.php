@extends('layouts.app')

@section('content')
    <div class="login margin80 marginbottom">
        <div class="container">
            <p class="title tac">Отправить рассылку</p>
            <form action="{{route('email.send')}}" method="post" id="auth" class="regform">
                @csrf
                <div class="input-msg">
                    <input type="text" name="subject" class="reginput @error('subject') redborder @enderror" placeholder="Заголовок письма">
                    @error('subject')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <div class="input-msg">
                    <textarea name="message" cols="30" rows="6" class="addtextarea @error('message') redborder @enderror" placeholder="Сообщение"></textarea>
                    @error('message')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <input type="submit" value="Отправить" class="submitbtn">
            </form>
        </div>
    </div>
@endsection
