@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 mb-4">
                <h1 class="display-4 text-primary">Documentación CONTPAQi</h1>
                <p class="lead text-secondary">Este proyecto esta creado con la finalidad de compartir la documentación de uso libre y manuales de usuario de la paquetería CONTPAQi, para que los usuarios puedan utilizar su sistema de la mejor manera posible.</p>
                <a href="{{ route('comments') }}" class="btn btn-primary btn-lg">Enviar comentarios <i class="fas fa-envelope ml-2"></i></a>
            </div>
            <div class="col-12 col-lg-6">
                <img src="{{ asset('/img/cowork.svg') }}" alt="" class="img-fluid">
            </div>
        </div>
        <!--Section: Jumbotron-->
        <hr class="my-5">
        <!--Section: Cards-->
        <section class="text-center">
        <!--Grid row-->
            <div class="row mb-4 wow fadeIn">
                @foreach ($courses as $course)
                    <!--Grid column-->
                    <div class="col-lg-4 col-md-12 mb-4">
                        <!--Card-->
                        <div class="card">
                            <!--Card image-->
                            <div class="view overlay">
                                <img src="/storage/{{ $course->img }}" class="card-img-top" alt="">
                                @if($course->tag === 'private')
                                    @auth
                                        <a href="{{ '/docs/' . $course->url . '/index.html' }}" target="_blank"></a>
                                    @else
                                        <a href="{{ route('login') }}"></a>
                                    @endauth
                                @else
                                    <a href="{{ '/docs/' . $course->url . '/index.html' }}" target="_blank"></a>
                                @endif
                                {{-- <div class="mask rgba-white-slight"></div> --}}
                            </div>
                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title">{{ $course->name }}</h4>
                                    <div class="justify-content-center">
                                        <span class="badge badge-pill {{ ($course->tag === 'public') ? 'badge-success' : 'badge-danger' }}">{{ $course->tag }}</span>
                                    </div>
                                </div>
                                <!--Text-->
                                <p class="card-text">{{ $course->description }}</p>
                                @if($course->tag === 'private')
                                    @auth
                                        <a href="{{ '/docs/' . $course->url . '/index.html' }}" target="_blank" class="btn btn-primary btn-md">Ver online <i class="fas fa-play ml-2"></i></a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-primary btn-md">Ver online <i class="fas fa-play ml-2"></i></a>
                                    @endauth
                                @else
                                    <a href="{{ '/docs/' . $course->url . '/index.html' }}" target="_blank" class="btn btn-primary btn-md">Ver online <i class="fas fa-play ml-2"></i></a>
                                @endif
                            </div>
                        </div>
                        <!--/.Card-->
                    </div>
                    <!--Grid column-->
                @endforeach
            </div>
            <!--Grid row-->
            <!--Pagination-->
            <nav class="d-flex justify-content-center wow fadeIn">
                {{ $courses->links() }}
            </nav>
            <!--Pagination-->
        </section>
        <!--Section: Cards-->
    </div>
@endsection