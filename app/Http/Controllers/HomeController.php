<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home', [
            'cursos' => Course::get()
        ]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'link' => 'required',
            'img' => 'required'
        ]);

        $imagen = request()->file('img');

        $fecha = date('ymdhis');
        $nombre_imagen = $imagen->getClientOriginalName();
        $nombre_compuesto = $fecha.'-'.$nombre_imagen;

        Storage::disk('local')->put('public/cursos/'.$nombre_compuesto, File::get($imagen));

        Course::create([
            'name' => request('name'),
            'description' => request('description'),
            'link' => request('link'),
            'img' => $nombre_compuesto
        ]);

        return redirect()->route('home')
            ->with('success', 'Creado correctamente');
    }

    public function destroy(Course $id)
    {
        Storage::delete('public/cursos/' . $id->img);

        $id->delete();

        return redirect()->route('home')
            ->with('success', 'Eliminado correctamente');
    }
}
