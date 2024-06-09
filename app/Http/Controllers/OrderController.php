<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function cancel(Order $order)
    {
        $order->status = 'Отменен';
        $order ->save();
        return redirect()->route('profile')->withErrors(['success'=>'Заказ отменен!']);
    }

    public function cancelByAdmin(Order $order)
    {
        $order->status = 'Отменен';
        $order ->save();
        return redirect()->route('profile', '#admin')->withErrors(['success'=>'Заказ отменен!']);
    }

    public function confirm(Order $order){
        $order->status = 'Принят';
        $order ->save();
        return redirect()->route('profile', '#admin')->withErrors(['success'=>'Заказ принят!']);
    }
}
