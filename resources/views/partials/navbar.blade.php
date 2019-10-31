<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
     <div class="container">

      <a class="navbar-brand text-primary" href="{{ url('/') }}">
          JRC
      </a>

      <button class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                  <a class="nav-link {{ setActive('index') }}" href="{{ route('index') }}">Inicio</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ setActive('calendar') }}" href="{{ route('calendar') }}">Calendario</a>
              </li>
              @guest
                  <li class="nav-item">
                      <a class="nav-link {{ setActive('login') }}" href="{{ route('login') }}">Identificarse</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link {{ setActive('register') }}" href="{{ route('register') }}">Registrarse</a>
                      </li>
                  @endif
              <!-- Authentication Links -->
              @else
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle"
                          href="#"
                          id="navbarDropdown"
                          role="button"
                          data-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                          v-pre
                          >{{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu"
                          aria-labelledby="navbarDropdown">

                          @if(Auth::user()->isAdmin())
                              <a href="{{ route('courses.index') }}" class="dropdown-item {{ setActive('courses.*') }}">Manuales</a>
                              <a href="{{ route('events.index') }}" class="dropdown-item {{ setActive('events.*') }}">Eventos</a>
                              <a href="{{ route('users') }}" class="dropdown-item {{ setActive('users') }}">Usuarios</a>
                            @endif

                          <a class="dropdown-item"
                              href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"
                              >Salir</a>

                          <form id="logout-form"
                              action="{{ route('logout') }}"
                              method="POST"
                              class="d-none">
                              @csrf
                          </form>

                      </div>
                  </li>
              @endauth
          </ul>
      </div>
     </div>
</nav>