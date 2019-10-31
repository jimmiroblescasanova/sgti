@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Enviar comentarios...</div>
                    <div class="card-body">
                        <form action="{{ route('comments.send') }}" method="POST" autocomplete="off">
                            @csrf
                            @honeypot
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input class="form-control shadow-sm @error('name') is-invalid @enderror"
                                type="text"
                                name="name"
                                value="{{ old('name') }}">
                                @include('alerts.form-error', ['campo'=>'name'])
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input class="form-control shadow-sm @error('email') is-invalid @enderror"
                                type="email"
                                name="email"
                                value="{{ old('email') }}">
                                @include('alerts.form-error', ['campo'=>'email'])
                            </div>
                            <div class="form-group">
                                <label for="comments">Comentarios:</label>
                                <textarea class="form-control shadow-sm @error('comments') is-invalid @enderror"
                                name="comments">{{ old('comments') }}</textarea>
                                @include('alerts.form-error', ['campo'=>'comments'])
                            </div>
                            <button class="btn btn-primary btn-block">Enviar</button>
                            <a href="{{ route('index') }}" class="btn btn-link btn-block">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection