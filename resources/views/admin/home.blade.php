@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Lista de cursos disponibles
                </div>
                <div class="card-body">
                    @foreach($cursos as $curso)
                        <li>{{ $curso->name }}</li>
                    @endforeach
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary btn-sm">Crear curso</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
