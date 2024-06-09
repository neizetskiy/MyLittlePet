@extends('layouts.app')

@section('content')



    <!-- add -->
    <div class="addmessage" id="addmsg">
        Товар успешно добавлен!
    </div>

    <div class="add margin80 marginbottom">
        <div class="container">
            <p class="title tac">Добавить вариант товара</p>
            <form class="regform" id="add" method="post" action="{{route('variant.store', $id)}}" name="add" enctype="multipart/form-data">
                @csrf

                <div class="input-msg">
                    <input type="text" name="weight" class="reginput @error('weight') redborder @enderror"  value="{{old('weight')}}" placeholder="Вес товара (г)">
                    @error('weight')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>

                <div class="input-msg">
                    <input type="text" name="price" class="reginput @error('price') redborder @enderror"  value="{{old('price')}}" placeholder="Цена за вес">
                    @error('price')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <div class="div" id="file-inputs"></div>
                @error('img')  <label for="" class="errlabel">{{$message}}</label> @enderror
                @error('img.*')  <label for="" class="errlabel">{{$message}}</label> @enderror

                <input type="submit" name="add" value="Добавить вариант" class="submitbtn">
            </form>
        </div>
    </div>
    <script src="/public/assets/js/imgpreview.js"></script>

@endsection
