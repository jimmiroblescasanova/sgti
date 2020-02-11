<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventRegistration;
use App\Mail\RegistrationSuccess;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CreateEventRegistrationRequest;

class EventRegistrationController extends Controller
{
    //
     public function create($slug)
     {
          return view('registration.index', [
               'event' => Event::where('slug', '=', $slug)->firstOrFail(),
          ]);
     }

     public function store(CreateEventRegistrationRequest $request)
     {
          EventRegistration::create( $request->validated() );

          Mail::to( $request->correo )
               ->bcc('jimmirobles@hotmail.com')
               ->send( new RegistrationSuccess($request) );

          alert()->success('Recibirás una confirmación vía correo electrónico', 'Registrado')
               ->persistent('Cerrar');

          return redirect()->route('index');
     }
}
