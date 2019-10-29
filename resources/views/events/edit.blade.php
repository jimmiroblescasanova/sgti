@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar evento</div>

                    <div class="card-body">
                        @include('alerts.errors')
                        <form action="{{ route('events.update', $evento) }}"
                            method="POST"
                            autocomplete="off">
                            @csrf @method('patch')
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $evento->nombre) }}">
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha:</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha', $evento->fecha->format('Y-m-d')) }}">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input"
                                    type="radio"
                                    name="inactivo"
                                    id="activar"
                                    value="0"
                                    {{ ($evento->inactivo===0) ? 'checked' : '' }}>
                                <label class="form-check-label"
                                    for="activar"
                                    >Activar</label>
                            </div>
                            <div class="form-group form-check">
                                <input class="form-check-input"
                                    type="radio"
                                    name="inactivo"
                                    id="desactivar"
                                    value="1"
                                    {{ ($evento->inactivo===1) ? 'checked' : '' }}>
                                <label class="form-check-label"
                                    for="desactivar"
                                    >Desactivar</label>
                            </div>
                            <button class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection