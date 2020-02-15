<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ops! {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <style>
        .error-num {
            font-family: "Montserrat", sans-serif;
            font-size: 80px;
        }
    </style>
</head>
<body>
@yield('content')
</body>
</html>
