<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Jimmi Robles | Manuales</title>
    @include('partials.css')
</head>

<body>

<!--Main Navigation-->
<header>

    <!-- Navbar -->
@include('partials.navbar')
<!-- Navbar -->

</header>
<!--Main Navigation-->

<!--Main layout-->
<main class="mt-5 pt-5">
    @yield('contenido')
</main>
<!--Main layout-->

<!--Footer-->
@include('partials.footer')
<!--/.Footer-->

<!-- SCRIPTS -->
@include('partials.js')
<script type="text/javascript">
    // Animations initialization
    new WOW().init();
</script>
</body>

</html>
