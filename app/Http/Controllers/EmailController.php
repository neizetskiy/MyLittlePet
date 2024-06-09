<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Models\Sub;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendPage()
    {
        return view('pages.emailsend');
    }

    public function send(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ],[
            'required' => 'Заполните поле!'
        ]);

        $emails = Sub::all();

        foreach ($emails as $email) {
            SendEmailJob::dispatch($email['email'], $request->subject, $request->message);
        }

        return redirect()->route('profile', '#admin')->withErrors(['success'=> 'Рассылка в очереди!']);
    }
}
