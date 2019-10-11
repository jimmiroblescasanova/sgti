@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear un nuevo curso</div>

                    <div class="card-body">
                        <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data"
                              autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="">Nombre:</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="descripction">Descripción:</label>
                                <textarea name="description" id="description"
                                          class="form-control">{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="link">URL:</label>
                                <input type="text" class="form-control" name="link" id="link" value="{{ old('link') }}">
                            </div>
                            <div class="form-group">
                                <label for="img">Seleccionar imagen:</label>
                                <input type="file" id="img" class="form-control-file" name="img">
                            </div>
                            <button class="btn btn-primary">Crear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection