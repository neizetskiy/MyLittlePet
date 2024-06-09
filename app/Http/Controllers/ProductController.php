<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Foodtype;
use App\Models\Image_weight;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $foodtypes = Foodtype::all();
        $subcategories = Subcategory::all();
        return view('pages.add', compact('categories', 'subcategories', 'foodtypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|string|max:255',
            'description'=> 'required|string|max:5000',
            'category_id' =>'required',
            'subcategory_id' => 'required',
            'foodtype_id' => 'required',
            'ingredients' => 'required|string|max:5000',
            'minerals' =>'required|string|max:5000',
            'img'=>'required|array',
            'img.*'=>'image',
            'weight' => 'required',
            'price' => 'required',
        ],[
            'required'=>'Заполните поле',
            'img.required'=>'Загрузите изображение',
            'image'=>'Файл должен быть изображением!',
            'max' => 'Слишком длинное поле!',

        ]);
        $item = Product::query()->create($validated);

        $variant = ProductVariant::query()->create([
            'product_id' => $item->id,
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

        return redirect()->route('catalog')->withErrors(['success'=>'Товар добавлен!']);
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $foodtypes = Foodtype::all();
        $subcategories = Subcategory::all();
        return view('pages.update', compact('product','categories', 'foodtypes', 'subcategories'));
    }

    public function update(Product $product, Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|string|max:255',
            'description'=> 'required|string|max:5000',
            'category_id' =>'required',
            'subcategory_id' => 'required',
            'foodtype_id' => 'required',
            'ingredients' => 'required|string|max:5000',
            'minerals' =>'required|string|max:5000',
        ],[
            'required'=>'Заполните поле',
            'max' => 'Слишком длинное поле!',
        ]);

        $product->update($validated);

        $variantid = ProductVariant::query()->where('product_id', $product->id)->first();

        return redirect()->route('product', $variantid->id)->withErrors(['success'=>'Товар изменен!']);
    }

    public function delete(Product $product)
    {
        return view('pages.delete', compact('product'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('catalog')->withErrors(['success'=>'Товар удален!']);
    }
}
