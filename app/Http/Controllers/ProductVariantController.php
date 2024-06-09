<?php

namespace App\Http\Controllers;

use App\Models\Image_weight;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function create($id)
    {
        return view('pages.addvariant', compact('id'));
    }

    public function store(Request $request, $id)
    {

        $validated = $request->validate([
            'weight'=> 'required|numeric',
            'price'=>'required|numeric',
            'img'=>'required|array',
            'img.*'=>'image'
        ],[
            'numeric'=>'Введите числовое значение!',
            'required'  => 'Заполните поле!',
            'img.required' => 'Загрузите изображение!',
            'image' => 'Файл должен быть изображением!'
        ]);

        $variant = ProductVariant::query()->create([
            'product_id' => $id,
            'weight' => $validated['weight'],
            'price' => $validated['price'],
        ]);
        if ($request->hasFile('img')) {
            $images = $request->file('img');
            foreach ($images as $image) {
                $path = "/public/storage/" . $image->store('products', 'public');
                Image_weight::create([
                    'img' => $path,
                    'product_variant_id' => $variant->id
                ]);
            }
        }

        return redirect()->route('product', $variant->id)->withErrors(['success'=>'Вариант добавлен!']);
    }

    public function delete(ProductVariant $productVariant)
    {
        $variants = ProductVariant::query()->where('product_id', $productVariant->product_id)->count();
        return view('pages.deletevariant', compact('productVariant', 'variants'));
    }

    public function destroy(ProductVariant $productVariant)
    {
        $id = $productVariant->product->id;
        $productVariant->delete();
        $variants = ProductVariant::query()->where('product_id', $id)->get();
        $count = $variants->count();
        if($count==0){
            $product = Product::query()->find($id);
            $product->delete();
            return redirect()->route('catalog')->withErrors(['success'=>'Вариант удален!']);
        }else{
            return redirect()->route('product', $variants->first()->id)->withErrors(['success'=>'Вариант удален!']);
        }
    }
}
