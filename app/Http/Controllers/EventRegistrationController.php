<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventRegistration;
use App\Exports\EventRegistrationsExport;
use App\Http\Requests\CreateEventRegistrationRequest;
use App\Mail\RegistrationSuccess;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

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

     public function export($id)
     {
         return (new EventRegistrationsExport)->evento($id)->download('registro.xlsx');
     }
}
