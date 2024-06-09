<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Foodtype;
use App\Models\Image_weight;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Promocode;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $productvariants = ProductVariant::query()->orderBy('id', 'DESC')->take(4)->get();
        return view('pages.index', compact('productvariants'));
    }

    public function home()
    {
        return redirect('/');
    }

    public function catalog(Request $request){
        $products = Product::query();

        if($request->has('result')){
            $products->where('name', 'LIKE', '%' . $request['result'] . '%');
        }

        if($request->has('category')){
            $products->where('category_id', $request['category']);
        }
        if($request->has('subcategory')){
            $products->where('subcategory_id', $request['subcategory']);
        }
        if($request -> has('foodtype')){
            $products->where('foodtype_id', $request['foodtype']);
        }

        $products = $products->get();
        $productIds = $products->pluck('id')->toArray();

        $productvariants = ProductVariant::whereIn('product_id', $productIds);

        if($request->has('price')){
            if($request['price']=='asc'){
                $productvariants->orderBy('price', 'ASC');
            }else if($request['price']=='desc'){
                $productvariants->orderBy('price', 'DESC');
            }
        }

        $productvariants = $productvariants->get();

        $categories = Category::all();
        $foodtypes = Foodtype::all();
        $subcategories = Subcategory::all();

        return view('pages.catalog', compact('productvariants', 'categories', 'subcategories', 'foodtypes'));
    }

    public function product($id)
    {
        $productvariant = ProductVariant::query()->findOrFail($id);
        $variants = ProductVariant::query()->where('product_id', $productvariant->product_id)->get();
        $images = Image_weight::query()->where('product_variant_id', $id)->get();
        return view('pages.product', compact('productvariant', 'variants', 'images'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function profile(Request $request)
    {
        $orders = Order::query()->where('user_id', auth()->id())->orderBy('id', 'DESC')->get();
        if(auth()->user()->role=='admin'){
            $subcategories = Subcategory::all();
            $promocodes = Promocode::all();
            $allorders = Order::query()->orderBy('id', 'DESC');
            if($request->has('status')){
                if($request->status =='Принят'){
                    $allorders->where('status', 'Принят');
                }
                if($request->status =='Отменен'){
                    $allorders->where('status', 'Отменен');
                }
                if($request->status =='Создан'){
                    $allorders->where('status','Создан');
                }
            }
            $allorders=$allorders->get();
            return view('pages.profile', compact('subcategories', 'promocodes', 'allorders', 'orders'));
        }else{
            return view('pages.profile', compact('orders'));
        }
    }

    public function successOrder()
    {
        return view('pages.ordersuccess');
    }
}
