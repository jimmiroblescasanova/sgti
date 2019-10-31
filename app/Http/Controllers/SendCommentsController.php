<?php

namespace App\Http\Controllers;

use App\Mail\SendComments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendCommentsController extends Controller
{
    public function index()
    {
        return view('front.send-comments');
    }

    public function send(Request $request)
    {
        $message = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'comments' => 'required|min:10'
        ]);

        alert()->success('Gracias por tus comentarios.')
               ->persistent('Cerrar');

        Mail::to('habannaslim@gmail.com')->send( new SendComments($message) );

        return redirect()->route('index');
    }
}
