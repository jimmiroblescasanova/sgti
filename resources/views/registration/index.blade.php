@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <form class="bg-white shadow rounded py-3 px-4"
                    action="{{ route('registration.store') }}"
                    method="POST"
                    autocomplete="off">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $id_evento }}">
                    <h2>Registrarme al evento seleccionado</h2>
                    <hr>
                    <div class="form-group">
                        <label for="nombre">Nombre(s):</label>
                        <input class="form-control bg-light shadow-sm @error('nombre') is-invalid @else border-0 @enderror"
                            type="text"
                            id="nombre"
                            name="nombre"
                            value="{{ old('nombre') }}"
                            placeholder="Ingresa tu nombre...">
                            @include('alerts.form-error', ['campo'=>'nombre'])
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos:</label>
                        <input class="form-control bg-light shadow-sm @error('apellidos') is-invalid @else border-0 @enderror"
                            type="text"
                            id="apellidos"
                            name="apellidos"
                            value="{{ old('apellidos') }}"
                            placeholder="Ingresa tus apellidos...">
                            @include('alerts.form-error', ['campo'=>'apellidos'])
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo:</label>
                        <input class="form-control bg-light shadow-sm @error('correo') is-invalid @else border-0 @enderror"
                            type="text"
                            id="correo"
                            name="correo"
                            value="{{ old('correo') }}"
                            placeholder="Ingresa tu correo electrónico...">
                            @include('alerts.form-error', ['campo'=>'correo'])
                    </div>
                    <div class="form-group">
                        <label for="empresa">Empresa:</label>
                        <input class="form-control bg-light shadow-sm @error('empresa') is-invalid @else border-0 @enderror"
                            type="text"
                            id="empresa"
                            name="empresa"
                            value="{{ old('empresa') }}"
                            placeholder="Nombre de tu empresa...">
                            @include('alerts.form-error', ['campo'=>'empresa'])
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input class="form-control bg-light shadow-sm @error('telefono') is-invalid @else border-0 @enderror"
                            type="text"
                            id="telefono"
                            name="telefono"
                            value="{{ old('telefono') }}"
                            placeholder="Telefono a 10 digitos...">
                            @include('alerts.form-error', ['campo'=>'telefono'])
                    </div>
                    <button class="btn btn-primary btn-block">Registrarme</button>
                    <a href="{{ route('calendar') }}" class="btn btn-link btn-block">Atrás</a>
                </form>
                {{-- End form --}}
            </div>
        </div>
        {{-- End row --}}
    </div>
@endsection