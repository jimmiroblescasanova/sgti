@component('mail::message')
# Registro completado

Hola {{ $msg['nombre'] }}, se ha completado tu registro para el evento con la siguiente información:

Nombre completo: {{ $msg['nombre'] . ' ' . $msg['apellidos'] }}

Correo: {{ $msg['correo'] }}

Empresa: {{ $msg['empresa'] }}

Teléfono: {{ $msg['telefono'] }}

Te esperamos, no faltes!
@endcomponent
