<?php

namespace App\Http\Controllers;

use App\Models\Sub;
use Illuminate\Http\Request;


class SubController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'emailsub' => 'required|email|unique:subs,email',
        ],[
            'required' => 'Введите почту!',
            'email' =>'Неверный формат почты!',
            'unique' => 'Вы уже подписаны на рассылку!'
        ]);

        if(Sub::query()->create(['email'=>$validated['emailsub']])){
            return redirect()->back()->withErrors(['success' => 'Вы успешно подписались!']);
        }else{
            return redirect()->back();
        }

    }
}
