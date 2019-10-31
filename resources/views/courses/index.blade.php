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
                    <ul class="list-group">
                        @forelse($cursos as $curso)
                        <li class="list-group-item shadow-sm border-0 d-flex justify-content-between mb-3">
                            <span>{{ $curso->name }}
                                @if($curso->tag === 'public')
                                    <span class="badge badge-success">Público</span>
                                @else
                                    <span class="badge badge-danger">Privado</span>
                                @endif
                            </span>
                            <span><a href="{{ route('courses.show', $curso) }}">Ver</a></span>
                        </li>
                        @empty
                        <li class="list-group-item shadow-sm border-0 d-flex justify-content-between mb-3">No existe ningún registro. </li>
                        @endforelse
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{ route('courses.create') }}" class="btn btn-primary btn-block">Crear curso</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
