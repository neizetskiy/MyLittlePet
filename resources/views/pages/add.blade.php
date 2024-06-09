@extends('layouts.app')

@section('content')



    <!-- add -->
    <div class="addmessage" id="addmsg">
        Товар успешно добавлен!
    </div>

    <div class="add margin80 marginbottom">
        <div class="container">
            <p class="title tac">Добавить товар</p>
            <form class="regform" id="add" method="post" action="{{route('product.store')}}" name="add" enctype="multipart/form-data">
                @csrf
                <div class="input-msg">
                    <input type="text" name="name" class="reginput @error('name') redborder @enderror"  value="{{old('name')}}" placeholder="Название товара">
                    @error('name')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <div class="input-msg">
                    <textarea name="description" cols="30" rows="6" class="addtextarea @error('description') redborder @enderror" placeholder="Описание">{{old('description')}}</textarea>
                    @error('description')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <div class="input-msg">
                    <select name="category_id" id="" class="reginput @error('category_id') redborder @enderror">
                        @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <div class="input-msg">
                    <select name="subcategory_id" id="" class="reginput @error('subcategory_id') redborder @enderror">
                        @foreach($subcategories as $subcat)
                            <option value="{{$subcat->id}}">{{$subcat->name}}</option>
                        @endforeach
                    </select>
                    @error('subcategory_id')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <div class="input-msg">
                    <select name="foodtype_id" id="" class="reginput @error('foodtype_id') redborder @enderror">
                        @foreach($foodtypes as $foodtype)
                            <option value="{{$foodtype->id}}">{{$foodtype->name}}</option>
                        @endforeach
                    </select>
                    @error('foodtype_id')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <div class="input-msg">
                    <textarea name="ingredients" cols="30" rows="6" class="addtextarea @error('ingredients') redborder @enderror" placeholder="Состав">{{old('ingredients')}}</textarea>
                    @error('ingredients')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <div class="input-msg">
                    <textarea name="minerals" cols="30" rows="6" class="addtextarea @error('minerals') redborder @enderror" placeholder="Минеральные вещества">{{old('minerals')}}</textarea>
                    @error('minerals')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>

                <div class="input-msg">
                    <input type="text" name="weight" class="reginput @error('weight') redborder @enderror"  value="{{old('weight')}}" placeholder="Вес товара (г)">
                    @error('weight')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>

                <div class="input-msg">
                    <input type="text" name="price" class="reginput @error('price') redborder @enderror"  value="{{old('price')}}" placeholder="Цена за вес">
                    @error('price')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <div class="div" id="file-inputs">

                </div>
                @error('img')  <label for="" class="errlabel">{{$message}}</label> @enderror
                @error('img.*')  <label for="" class="errlabel">{{$message}}</label> @enderror
                <input type="submit" name="add" value="Добавить товар" class="submitbtn">
            </form>
        </div>
    </div>
    <script src="/public/assets/js/imgpreview.js"></script>

@endsection
