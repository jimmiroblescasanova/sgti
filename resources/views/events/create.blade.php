@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear un nuevo evento</div>

                    <div class="card-body">
                        @include('alerts.errors')
                        <form action="{{ route('events.store') }}"
                            method="POST"
                            autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha:</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha') }}">
                            </div>
                            <button class="btn btn-primary btn-block">Crear</button>
                            <a href="{{ route('events.index') }}" class="btn btn-link btn-block">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection