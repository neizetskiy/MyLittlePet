<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('pages.editprofile');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|string|max:255',
            'img'=>'nullable|image',
        ],[
            'required' => 'Заполните поле!',
            'max' =>'Слишком длинное поле!',
            'image' => 'Файл должен быть изображением!'
        ]);

        auth()->user()->name = $validated['name'];
        if($request->hasFile('img')){
            auth()->user()->img = '/public/storage/'. $request->file('img')->store('profile');
        }

        auth()->user()->save();

        return redirect()->route('profile')->withErrors(['success'=>'Профиль изменен!']);

    }

    public function changePassword()
    {
        return view('pages.changepassword');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'old_password'=>'required',
            'password' =>'required|string|min:6|max:255|confirmed'
        ],[
            'required'=>'Заполните поле!',
            'password.min'=>'Пароль меньше 7-ми символов!',
            'confirmed'=>'Пароли не совпадают!'
        ]);

        if(!Hash::check($validated['old_password'], auth()->user()->password)){
            return redirect()->route('password.change')->withErrors(['old_password'=>'Пароль не совпадает!']);
        }else{
            auth()->user()->password = $validated['password'];
            auth()->user()->save();
        }

        return redirect()->route('profile')->withErrors(['success'=>'Пароль изменен!']);
    }
}
