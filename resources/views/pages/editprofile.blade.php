@extends('layouts.app')

@section('content')


    <!-- edit -->
    <div class="editprofileform margin80">
        <div class="container">
            <p class="title tac">Изменить профиль</p>
            <form action="{{route('profile.update')}}" id="editpr" method="post" class="regform" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="profile-img">
                    <img id="profileimg" src="{{auth()->user()->img}}" alt="userimg">
                </div>
                <div class="input-msg">
                    <div>
                        <input type="file" id="file-input-1" name="img">
                        <label for="file-input-1" class="addphoto">Выберите файл</label>
                    </div>

                    @error('img')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>

                <div class="input-msg">
                    <input type="text" name="name" class="reginput @error('name') redborder @enderror" value="{{auth()->user()->name}}" placeholder="Имя пользователя">
                    @error('name')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>

                <a href="{{route('password.change')}}" class="pink">Сменить пароль</a>

                <input type="submit" name="upduser" value="Изменить" class="submitbtn">
            </form>
        </div>
    </div>


@endsection
