@extends('layouts.app')

@section('content')



    <!-- add -->
    <div class="addmessage" id="addmsg">
        Товар успешно добавлен!
    </div>

    <div class="add margin80 marginbottom">
        <div class="container">
            <p class="title tac">Редактировать товар</p>
            <form class="regform" id="add" method="post" action="{{route('product.update', $product->id)}}" name="add" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="input-msg">
                    <input type="text" name="name" class="reginput @error('name') redborder @enderror"  value="{{$product->name}}" placeholder="Название товара">
                    @error('name') <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <div class="input-msg">
                    <textarea name="description" cols="30" rows="6" class="addtextarea @error('description') redborder @enderror" placeholder="Описание">{{$product->description}}</textarea>
                    @error('description')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <div class="input-msg">
                    <select name="category_id" id="" class="reginput @error('category_id') redborder @enderror">
                        @foreach($categories as $cat)
                            <option value="{{$cat->id}}" @selected($product->category_id == $cat->id)>{{$cat->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <div class="input-msg">
                    <select name="subcategory_id" id="" class="reginput @error('subcategory_id') redborder @enderror">
                        @foreach($subcategories as $subcat)
                            <option value="{{$subcat->id}}" @selected($product->subcategory_id == $subcat->id)>{{$subcat->name}}</option>
                        @endforeach
                    </select>
                    @error('subcategory_id')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <div class="input-msg">
                    <select name="foodtype_id" id="" class="reginput @error('foodtype_id') redborder @enderror">
                        @foreach($foodtypes as $foodtype)
                            <option value="{{$foodtype->id}}" @selected($product->foodtype_id == $foodtype->id)>{{$foodtype->name}}</option>
                        @endforeach
                    </select>
                    @error('foodtype_id')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <div class="input-msg">
                    <textarea name="ingredients" cols="30" rows="6" class="addtextarea @error('ingredients') redborder @enderror" placeholder="Состав">{{$product->ingredients}}</textarea>
                    @error('ingredients')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>
                <div class="input-msg">
                    <textarea name="minerals" cols="30" rows="6" class="addtextarea @error('minerals') redborder @enderror" placeholder="Минеральные вещества">{{$product->minerals}}</textarea>
                    @error('minerals')  <label for="" class="errlabel">{{$message}}</label> @enderror
                </div>

                <input type="submit" name="add" value="Редактировать товар" class="submitbtn">
            </form>
        </div>
    </div>


@endsection
