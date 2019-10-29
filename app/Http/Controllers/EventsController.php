<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventRegistration;
use App\Http\Requests\EventRequest;

class EventsController extends Controller
{

    public function index()
    {
        return view('events.index', [
            'eventos' => Event::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(EventRequest $request)
    {
        Event::create( $request->validated() );

        return redirect()->route('events.index')
            ->with('success', 'Creado correctamente');
    }

    public function show($id)
    {
        return view('events.show', [
            'evento' => Event::find($id),
            'registros' => EventRegistration::where('event_id', $id)->get()
        ]);
    }

    public function edit(Event $id)
    {
        return view('events.edit', [
            'evento' => $id
        ]);
    }

    public function update(EventRequest $request, Event $id)
    {
        $id->update( $request->validated() );

        return redirect()->route('events.show', $id)
            ->with('success', 'Actualizado correctamente');
    }

    public function destroy(Event $id)
    {
        $id->delete();

        return redirect()->route('events.index')
            ->with('success', 'Eliminado correctamente');
    }
}
