@extends('templates.main')

@section('contenido')

    <div class="container">

        <!--Section: Jumbotron-->
        <section class="card wow fadeIn"
                 style="background-image: url(https://mdbootstrap.com/img/Photos/Others/gradient1.jpg);">

            <!-- Content -->
            <div class="card-body text-white text-center py-5 px-5 my-5">

                <h1 class="mb-4">
                    <strong>Documentación CONTPAQi</strong>
                </h1>
                <!--<p>
                    <strong>Best & free guide of responsive web design</strong>
                </p>-->
                <p class="mb-4">Este proyecto esta creado con la finalidad de compartir la documentación de uso libre y
                    manuales de usuario de la paquetería CONTPAQi, para que los usuarios puedan utilizar su sistema de
                    la mejor manera posible.
                </p>
                <a target="_blank" href="https://mdbootstrap.com/education/bootstrap/"
                   class="btn btn-outline-white btn-lg">Enviar comentarios
                    <i class="fas fa-envelope ml-2"></i>
                </a>

            </div>
            <!-- Content -->
        </section>
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
                                <img src="{{ asset('storage/docs') . $course->img }}"
                                     class="card-img-top" alt="">
                                <a href="{{ '/docs/' . $course->link }}"
                                   target="_blank">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title">{{ $course->name }}</h4>
                                <!--Text-->
                                <p class="card-text">{{ $course->description }}</p>
                                <a href="{{ asset('docs') . $course->link }}" target="_blank" class="btn btn-primary btn-md">Ver online
                                    <i class="fas fa-play ml-2"></i>
                                </a>
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