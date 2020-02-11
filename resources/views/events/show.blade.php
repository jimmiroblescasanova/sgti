@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span>Bienvenido, {{ Auth::user()->name }}!</span>

                    </div>
                    <div class="card-body">
                        @if($evento->inactivo === 1)
                            <div class="alert alert-danger" role="alert">
                              Evento finalizado
                            </div>
                        @endif
                        <h4>Evento: {{ $evento->nombre }}</h4>
                        <small>Fecha: {{ $evento->fecha->format('d-m-Y') }}</small>
                            <p><a href="{{ route('events.download', $evento->id) }}">Descargar XLS</a></p>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Nombre completo</th>
                                        <th>Correo</th>
                                        <th>Empresa</th>
                                        <th>Teléfono</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($registros as $registro)
                                        <tr>
                                            <td>{{ $registro->nombre .' '. $registro->apellidos }}</td>
                                            <td>{{ $registro->correo }}</td>
                                            <td>{{ $registro->empresa }}</td>
                                            <td>{{ $registro->telefono }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('events.edit', $evento) }}"
                            class="btn btn-primary btn-block">Editar</a>
                        @if($evento->inactivo === 1)
                            <a href="#"
                            class="btn btn-danger btn-block"
                            onclick="event.preventDefault();
                            document.getElementById('eliminar').submit();"
                            >Eliminar</a>
                        @endif
                        <a href="{{ route('events.index') }}"
                            class="btn btn-link btn-block">Atrás</a>
                        <form action="{{ route('events.destroy', $evento )}}"
                            id="eliminar"
                            method="POST"
                            class="invisible">
                            @csrf @method('delete')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
