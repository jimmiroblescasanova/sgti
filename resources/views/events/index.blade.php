@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bienvenido, {{ Auth::user()->name }}!</div>
                    <div class="card-body ">
                        <h5>Lista de eventos</h5>
                        <hr>
                        <ul class="list-group">
                            @forelse($eventos as $evento)
                                <li class="list-group-item shadow-sm border-0 d-flex justify-content-between mb-3">
                                    <span class="{{ ($evento->inactivo === 1) ? 'text-danger' : '' }}"
                                        >{{ $evento->nombre }}</span>
                                    <span><a href="{{ route('events.show', $evento) }}">Ver</a></span>
                                </li>
                            @empty
                                <span>No hay ningún registro.</span>
                            @endforelse
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('events.create') }}"
                            class="btn btn-primary btn-block"
                            >Crear evento nuevo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
