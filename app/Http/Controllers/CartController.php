<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariant;
use App\Models\Promocode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cartPage(Request $request)
    {
        $id = auth()->id();
        $carts = Cart::query()->where('user_id', $id)->get();
        $total = 0;

        $promocode = session('promocode');
        foreach ($carts as $cart){
            $total += $cart->productVariant->price * $cart->quantity;
        }

        if($promocode){
            $discount = $total* ($promocode->discount / 100);
            $total -= $discount;
        }

        return view('pages.cart', compact('carts', 'total', 'promocode'));
    }

    public function addToCart(Request $request, ProductVariant $productVariant)
    {
        $cart = Cart::query()->where('user_id', auth()->id())->where('product_variant_id', $productVariant->id)->first();
        if($cart){
            $cart->quantity++;
            $cart->save();
        }else{
            Cart::query()->create([
                'user_id'=>auth()->id(),
                'product_variant_id'=>$productVariant->id
            ]);
        }
        return redirect()->back()->withErrors(['success' => 'Товар добавлен в корзину!']);
    }

    public function increaseQuantity(Cart $cart)
    {
        $cart->quantity++;
        $cart->save();
        return redirect()->back();
    }

    public function reduceQuantity(Request $request, Cart $cart)
    {
        if($cart->quantity == 1){
            $cart->delete();
            return redirect()->back()->withErrors(['success'=> 'Товар удален из корзины!']);
        }else{
            $cart->quantity --;
            $cart->save();
            return redirect()->back();
        }
    }

    public function destroyFromCart(Request $request, Cart $cart)
    {
        $cart->delete();
        return redirect()->back()->withErrors(['success'=>'Товар удален из корзины!']);
    }

    public function applyPromo(Request $request)
    {

        if ($request->has('action') && $request->action === 'remove') {
            $request->session()->forget('promocode');
            return redirect()->back()->withErrors(['success' =>'Промокод удален']);
        }
        $promocode = Promocode::query()->where('code', $request->code)->first();

        if(!$promocode){
            return back()->withErrors(['code' => 'Неверный промокод!']);
        }else{
            $request->session()->put('promocode', $promocode);
            return redirect()->back()->withErrors(['success' => 'Промокод применен!']);
        }

    }

    public function checkoutPage()
    {
        $carts = Cart::query()->where('user_id', auth()->id())->get();

        $total = 0;
        $promocode = session('promocode');
        foreach ($carts as $cart){
            $total += $cart->productVariant->price * $cart->quantity;
        }
        if($promocode){
            $discount = $total* ($promocode->discount / 100);
            $total -= $discount;
        }else{
            $discount = 0;
        }

        if($carts->isNotEmpty()){
            return view('pages.checkout', compact('total', 'discount'));
        }else{
            return redirect()->back();
        }

    }

    public function checkout(Request $request)
    {
        $carts = Cart::query()->where('user_id', auth()->id())->get();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email'=> 'required|email',
            'phone' => 'required|size:16',
            'payment'=>'required',
            'total'=>'required'
        ],[
            'required' => 'Заполните поле!',
            'size'=>'Телефон должен быть из 11 цифр!',
            'email' => 'Неверный формат почты!',
        ]);

        $order = Order::query()->create([
            'user_id' => auth()->id(),
            'customer_email' => $validated['email'],
            'customer_name' => $validated['name'],
            'customer_phone'=>$validated['phone'],
            'payment' => $validated['payment'],
            'total'=>$validated['total'],
        ]);


        foreach ($carts as $cart){
            OrderItem::query()->create([
                'order_id'=>$order->id,
                'product_id'=>$cart->productvariant->id,
                'product_img'=>$cart->productvariant->images->first()->img,
                'product_name'=>$cart->productvariant->product->name,
                'price'=> $cart->productvariant->price,
                'weight'=>$cart->productvariant->weight,
                'quantity'=>$cart->quantity
            ]);
            $cart->delete();
        }

       Session::forget('promocode');

        return redirect()->route('success.order');
    }
}
