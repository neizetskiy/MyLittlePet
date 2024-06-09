<?php

namespace App\Http\Controllers;


use App\Models\Sub;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register()
    {
        return view('pages.registration');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|max:255|email|unique:users,email',
            'name'=>'required|string|max:255',
            'password' => 'required|min:6|max:255|confirmed',
            'agree' => 'required',
            'agreesub' => 'nullable'
        ],[
            'required'=>'Заполните поле!',
            'max'=>'Слишком длинные данные!',
            'email.email'=>'Неверный формат почты!',
            'email.unique'=>'Такая почта уже используется!',
            'password.min'=>'Пароль меньше 7-ми символов',
            'confirmed'=>'Пароли не совпадают!',
            'agree.required'=>'Согласитесь с правилами!',

        ]);


        if($request->has('agreesub') && $request->agreesub != null){
            $subbed = Sub::query()->where('email', $validated['email'])->exists();
            if(!$subbed){
                Sub::query()->create([
                    'email' => $validated['email']
                ]);
            }
        }

       $user = User::query()->create($validated);


       auth()->login($user);

       return redirect()->route('index')->withErrors(['success'=>'Вы зарегестрировались!']);
    }

    public function login()
    {
        return view('pages.login');
    }

    public function auth(Request $request)
    {
        $validated = $request->validate([
            'email'=>'required',
            'password' => 'required'
        ],[
            'required'=>'Заполните поле!'
        ]);

        if(auth()->attempt($validated)){
            return redirect()->route('index')->withErrors(['success'=>'Вы авторизовались!']);
        }else{
            return redirect()->route('login')->withErrors(['auth'=> 'Неверный логин или пароль!']);
        }
    }

    public function logout()
    {
        Session::forget('promocode');
        auth()->logout();
        return redirect('/');
    }
}
