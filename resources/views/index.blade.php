@extends('layouts.main')

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
               <a href="{{ route('comments') }}" class="btn btn-outline-white btn-lg">Enviar comentarios
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
                     <img src="/storage/{{ $course->img }}"
                     class="card-img-top" alt="">
                     @if($course->tag === 'private')
                     @auth
                     <a href="{{ '/docs/' . $course->url . '/index.htm' }}"
                        target="_blank">
                        @else
                        <a href="{{ route('login') }}">
                            @endauth
                            @else
                            <a href="{{ '/docs/' . $course->url . '/index.htm' }}"
                                target="_blank">
                                @endif
                                <div class="mask rgba-white-slight"></div>
                           </a>
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
                      <a href="{{ '/docs/' . $course->url . '/index.htm' }}" target="_blank"
                         class="btn btn-primary btn-md">Ver online
                         <i class="fas fa-play ml-2"></i>
                    </a>
                    @else
                    <a href="{{ route('login') }}"
                    class="btn btn-primary btn-md">Ver online
                    <i class="fas fa-play ml-2"></i>
               </a>
               @endauth
               @else
               <a href="{{ '/docs/' . $course->url . '/index.htm' }}" target="_blank"
                  class="btn btn-primary btn-md">Ver online
                  <i class="fas fa-play ml-2"></i>
             </a>
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