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
                                <input type="text" class="form-control" name="name" value="Jimmi Robles">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" value="jimmirobles@hotmail.com">
                            </div>
                            <div class="form-group">
                                <label for="comments">Comentarios:</label>
                                <textarea name="comments" class="form-control">Hola mundo!!!</textarea>
                            </div>
                            <button class="btn btn-primary">Enviar</button>
                        </form>
                        @include('alerts.errors')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection