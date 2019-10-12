@if($errors->any())
    <p>Se han presentado algunos errores:</p>
    @foreach($errors->all() as $error)
        <li style="color:red;"><small>{{ $error }}</small></li>
    @endforeach
@endif