@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center m-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Curso seleccionado:
                    </div>
                    <div class="card-body">
                        <span class="display-4">{{ $curso->name }}</span>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <img src="/storage/{{ $curso->img }}" alt="" class="img-thumbnail">
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <p>{{ $curso->description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" onclick="return deleteConfirmation();" class="btn btn-danger btn-block">Eliminar</a>
                        <a href="{{ route('courses.index') }}" class="btn btn-link btn-block">Atrás</a>
                        <form action="{{ route('courses.destroy', $curso )}}"
                            id="eliminar"
                            method="POST"
                            class="d-none">
                            @csrf @method('delete')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script>
        function deleteConfirmation() {
            event.preventDefault();
            swal({
              title: "Estas seguro?",
              text: "Una vez eliminado, no se podrá recuperar!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                document.getElementById('eliminar').submit();
              } else {
                swal("No se ha eliminado nada.");
              }
            });
        }
    </script>
@endsection