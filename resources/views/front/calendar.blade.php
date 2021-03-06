@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 col-lg-4 col-md-4 col-sm-6">
                <h1>Eventos disponibles</h1>
                <p class="lead text-secondary">Estos son todos los eventos disponibles en los cuales se pueden registrar
                    sin costo.</p>
                <p class="lead text-secondary">Se enviará un correo de confirmación al completar el registro.</p>
            </div>
            <div class="col-6 col-lg-4 col-md-4 col-sm-6">
                <img src="{{ asset('/img/calendar.svg') }}" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                <h3>Próximo evento:</h3>
                @if(!empty($primero))
                    <div class="card">
                        @if ($primero->image)
                            <img src="/storage/{{ $primero->image }}" class="img-fluid">
                        @else
                            <img src="/img/event-cover-default.jpg" class="card-img-top" alt="evento">
                        @endif
                        <div class="card-body">
                            @if( !empty($primero) )
                                <h5 class="card-title">{{ $primero->nombre }}</h5>
                                <p class="card-text">Fecha: {{ $primero->fecha->format('d/m/Y') }}</p>
                                <a href="{{ route('registration.create', $primero->slug) }}"
                                   class="btn btn-primary btn-block">Registrarme</a>
                            @else
                                <p>No existe ningún evento próximo.</p>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <hr>
        <h2 class="mb-4">Eventos disponibles:</h2>
        @forelse($eventos->chunk(4) as $chunk)
            <div class="row">
                @foreach($chunk as $evento)
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-3">
                        <div class="card">
                            @if ($evento->image)
                                <img src="/storage/{{ $evento->image }}" class="img-fluid">
                            @else
                                <img src="/img/event-cover-default.jpg" class="card-img-top" alt="...">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $evento->nombre }}</h5>
                                <p class="card-text">Fecha del evento: {{ $evento->fecha->format('d/m/Y') }}</p>
                                @if (!$evento->inactivo)
                                    <a href="{{ route('registration.create', $evento->slug) }}"
                                       class="btn btn-block btn-primary">Registrarme</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @empty
            <div class="row">
                <div class="col-12 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <p>No existe ningún registro por el momento.</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
        <div class="row col-12 justify-content-center">
            {{ $eventos->links() }}
        </div>
    </div>
@endsection
