<nav class="navbar fixed-top navbar-expand-md navbar-light bg-white scrolling-navbar">

	<div class="container">
		<!-- Brand -->
		<a class="navbar-brand" href="{{ route('index') }}">
			<strong class="blue-text">JRC</strong>
		</a>

		<!-- Collapse -->
		<button class="navbar-toggler"
			type="button"
			data-toggle="collapse"
			data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent"
			aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- Links -->
		<div class="collapse navbar-collapse" id="navbarSupportedContent">

			<!-- Left -->
			<ul class="nav mr-auto">
				<li class="nav-item">
					<a class="nav-link active" href="{{ route('index') }}">Inicio
						<span class="sr-only">(current)</span>
					</a>
				</li>
			</ul>

			<!-- Right -->
			<ul class="navbar-nav ml-auto">
				@guest
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
					</li>
					@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
						</li>
					@endif
				@endguest
				@auth
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle"
							href="#"
							id="navbarDropdown"
							role="button"
							data-toggle="dropdown"
							aria-haspopup="true"
							aria-expanded="false"
							v-pre>
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<div class="dropdown-menu"
							aria-labelledby="navbarDropdown">

							@if(Auth::user()->isAdmin())
								<a class="dropdown-item"
								href="{{ route('home') }}"
								>Panel Admin</a>
							@endif

							<a class="dropdown-item"
								href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();"
								>Salir
							</a>

							<form id="logout-form"
								action="{{ route('logout') }}"
								method="POST"
								style="display: none;">
								@csrf
							</form>
						</div>
					</li>
				@endauth
			</ul>
		</div>
	</div>
</nav>
