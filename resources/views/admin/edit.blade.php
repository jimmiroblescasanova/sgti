@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar curso</div>

                    <div class="card-body">
                        @include('alerts.errors')
                        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="">Nombre:</label>
                                <input type="text" class="form-control" name="name" value="{{ $curso->nombre }}">
                            </div>
                            <div class="form-group">
                                <label for="descripction">Descripción:</label>
                                <textarea name="description" id="description"
                                          class="form-control">{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="url">URL:</label>
                                <input type="text" class="form-control" name="url" id="url" value="{{ old('url') }}">
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="img">
                                    <label class="custom-file-label" for="customFile">Seleccionar imagen</label>
                                </div>
                            </div>
                            <button class="btn btn-primary">Crear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection