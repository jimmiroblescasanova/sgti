@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido, {{ Auth::user()->name }}!</div>
                <div class="card-body">
                    <h5>Lista de manuales</h5>
                    <hr>
                    @if ( session('success') )
                        @include('alerts.success')
                    @endif
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <td>id</td>
                                <td>nombre</td>
                                <td>description</td>
                                <td>acción</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cursos as $curso)
                            <tr>
                                <td>{{ $curso->id }}</td>
                                <td>{{ $curso->name }}</td>
                                <td><small>{{ $curso->description }}</small></td>
                                <td>
                                    <form method="POST" action="{{ route('courses.destroy', $curso->id) }}">
                                        @csrf @method('DELETE')
                                        <input type="submit" class="btn btn-link" value="Eliminar">
                                    </form>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('courses.create') }}" class="btn btn-primary btn-block">Crear curso</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
