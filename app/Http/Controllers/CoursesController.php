<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\CreateCourseRequest;
use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
{
    //

	public function index()
	{
		return view('courses.index', [
			'cursos' => Course::get()
		]);
	}

    public function create()
    {
        return view('courses.create');
    }

    public function store(CreateCourseRequest $request)
    {
        $curso = new Course( $request->validated() );

        $curso->img = $request->file('img')->store('cursos');

        $curso->save();

        return redirect()->route('courses.index')
            ->with('success', 'Creado correctamente');
    }

    public function show($id)
    {
        return view('courses.show', [
            'curso' => Course::find($id)
        ]);
    }

    public function destroy(Course $id)
    {
        Storage::delete($id->img);

        $id->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Eliminado correctamente');
    }
}
