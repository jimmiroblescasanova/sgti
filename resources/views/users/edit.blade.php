	@extends('layouts.app')


	@section('content')

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Editar usuario</div>

					<div class="card-body">
						@include('alerts.errors')
						<form action="{{ route('users.update', $usuario) }}" method="POST" autocomplete="off">
							@csrf @method('PATCH')
							<div class="form-group">
								<label for="name">Nombre:</label>
								<input type="text" class="form-control" name="name" value="{{ $usuario->name }}">
							</div>
							<div class="form-group">
								<label for="email">Email:</label>
								<input type="email" class="form-control" name="email" value="{{ $usuario->email }}">
							</div>
							<div class="form-group">
								<label for="level">Nivel:</label>
								<select class="form-control" id="level" name="level">
									<option value="0" {{ ($usuario->level==0) ? 'selected' : '' }}>Usuario</option>
									<option value="1" {{ ($usuario->level==1) ? 'selected' : '' }}>Admin</option>
								</select>
							</div>
							<button class="btn btn-primary btn-block">Actualizar</button>
							<a href="{{ route('users') }}" class="btn btn-link btn-block">Cancelar</a>
						</form>
					</div>
				</div>
			</div>
		</div>

		@endsection