<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Skrypty -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Czcionki -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/04566ad3f7.js" crossorigin="anonymous"></script>
    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>

    <!-- Style -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="col-12 row" style="position: fixed; z-index:10;">
            <div>
                <a class="ukryte-menu px-2" aria-label="Przejście do menu strony" href="#menu">Menu</a>
                <a class="ukryte-menu px-2" aria-label="Przejście do zawartości strony" href="#content">Treść podstrony</a>
                <a class="ukryte-menu px-2" aria-label="Przejście do stopki strony" href="#footer">Stopka strony</a>
            </div>
        </div>
        <div class="dostepnosci">
            <!--Tutaj dostępności-->
        </div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container" id="menu">
                <a class="navbar-brand" href="{{ url('dashboard') }}">
                    Panel administratora
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Lewa strona menu -->
                    <ul class="navbar-nav me-auto">
                        <li>
                            <a class="nav-link" href="{{ route('dashboard.staticsites.index') }}">Strony statyczne</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('dashboard.news.index') }}">Aktualności</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('dashboard.contact.index') }}">Kontakt</a>
                        </li>
                    </ul>

                    <!-- Prawa strona menu -->
                    <ul class="navbar-nav align-self-end ms-auto">
                        <li>
                            <i class="fas fa-adjust"></i>
                            <span>A</span>
                            <span>A+</span>
                            <span>A++</span>
                        </li>
                        @guest
                             <!--@if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Logowanie') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Rejestracja') }}</a>
                                </li>
                            @endif-->
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('index') }}">
                                    Strona główna
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Wyloguj') }}
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
        <main class="py-4" id="content">
            @yield('content')
        </main>
        <footer id="footer">
        </footer>
    </div>
</body>
</html>
