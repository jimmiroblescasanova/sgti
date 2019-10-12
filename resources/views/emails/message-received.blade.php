@component('mail::message')
# Mensaje recibido

Nombre: {{ $msg['name'] }}

Correo: {{ $msg['email'] }}

Mensaje: {{ $msg['comments'] }}

Del sitio: {{ config('app.url') }}
@endcomponent
