<?php

namespace App\Http\Controllers;

use App\Models\Promocode;
use Illuminate\Http\Request;

class PromocodeController extends Controller
{
    public function create()
    {
        return view('pages.addpromocode');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code'=>'required|string|max:10|unique:promocodes,code',
            'discount'=>'required|numeric|min:1|max:99'
        ],[
            'required' => 'Заполните поле!',
            'unique'=>'Такой промокод существует!',
            'code.max' => 'Длина промокода больше 10!',
            'numeric' => 'Введите числовое значение!',
            'min' => 'Введите значение от 1!',
            'max' => 'Введите значение до 99!'
        ]);

        Promocode::query()->create($validated);

        return redirect()->route('profile', '#admin')->withErrors(['success'=>'Промокод добавлен!']);
    }

    public function delete(Promocode $promocode)
    {
        return view('pages.deletepromocode', compact('promocode'));
    }

    public function destroy(Promocode $promocode)
    {
        $promocode->delete();
        return redirect()->route('profile', '#admin')->withErrors(['success'=>'Промокод удален!']);
    }
}
