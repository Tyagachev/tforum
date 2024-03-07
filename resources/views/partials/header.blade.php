<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <div class="d-flex align-items-center">
                    <div class="header_logo-wrp">
                        <img class="header_logo" src="{{ asset('img/tlogo.png') }}">
                    </div>
                    <div>
                        <a class="navbar-brand text-white text-uppercase" href="{{ url('/') }}">Tarisland-forum</a>
                    </div>
                </div>
                <div>
                    <a href="{{ route('index.news') }}"><button class="btn btn-outline-info">Новости</button></a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white link-dark" href="{{ route('login') }}"><button class="btn btn-outline-light me-2">Вход</button></a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><button class="btn btn-warning">Регистрация</button></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile.index', auth()->user()) }}">Профиль</a>
                                    @can('view', auth()->user())
                                        <a class="dropdown-item" href="{{ route('admin.index') }}">Админка</a>
                                    @endcan
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Выйти
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
</nav>
