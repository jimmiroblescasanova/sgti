@extends('layouts.error')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 col-lg-6">
                <img src="{{ asset('/img/error-img.png') }}" class="img-fluid" alt="error">
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="display-1">:(</div>
                <div class="error-num">Error 500</div>
                <p class="lead">Parece que hay un error en la matrix.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div>
                <a href="{{ route('index') }}" class="btn btn-primary">Ir a la página principal</a>
                <a href="#" class="btn btn-outline-danger">Reportar error al administrador</a>
            </div>
        </div>
    </div>
@endsection
