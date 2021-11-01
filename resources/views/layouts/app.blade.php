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

    <!-- Style -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="{{ $theme . '-theme' }}">
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
        <nav class="navbar navbar-expand-md navbar-light shadow-sm {{ $theme . '-theme' }}">
            <div class="container" id="menu">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Lewa strona menu -->
                    <ul class="navbar-nav me-auto">
                        <li>
                            <a class="nav-link" href="{{ route('news.index') }}">Aktualności</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('ad') }}">Deklaracja dostępności</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('tos') }}">Regulamin</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('about') }}">O nas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Kontakt</a>
                        </li>
                    </ul>

                    <!-- Prawa strona menu -->
                    <ul class="navbar-nav align-self-end ms-auto">
                        <li>
                            <i  id="theme-toggle" class="fas fa-adjust"></i>
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
                                @if(Auth::user()->is_admin)
                                <a class="dropdown-item" href="{{ route('dashboard') }}">
                                    Panel administratora
                                </a>
                                @endif
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
        <main class="py-4" id="content" style="min-height: 69vh;">
            @yield('content')
        </main>
        <footer class="footer font-small">
            <div class="row mx-auto justify-content-center text-center shadow pb-3">
                <div class="col-2">
                    <p class="footer-header mt-3 mb-0">Dane kontaktowe</p>
                    <hr class="border-white mt-1 mb-1">
                    <div class="textwidget text-left">
                        <strong>Widzialni w internecie</strong><br>
                        <span tabindex="0">ul. {!!$contact->street!!} {!!$contact->building_number!!}</span><br> <span tabindex="0">
                        <i aria-label="Kod pocztowy" class="fa fa-home"></i> {!!$contact->postcode!!} {!!$contact->city!!}</span><br>
                        <span tabindex="0"><i aria-label="Adres E-mail" class="fa fa-envelope"></i></span>
                        <a>{!!$contact->email!!}</a><br>
                        <span tabindex="0"><i aria-label="Numer telefonu" class="fas fa-phone-square"></i> {!!$contact->phone_number!!}</span><br>
                    </div>
                </div>
                <div class="col-2 offset-1">
                    <p class="footer-header mt-3 mb-0">Godziny kontaktowe</p>
                    <hr class="border-white mt-1 mb-1">
                    <div class="textwidget text-left">
                        <i class="far fa-clock"></i> <span tabindex="0">Od poniedziałku do piątku od 8:00 do 16:00</span><br>
                        <i class="far fa-clock"></i> <span tabindex="0">W soboty i niedzielę nieczynne</span>
                    </div>
                </div>
                <div class="col-2 offset-1">
                    <p class="footer-header mt-3 mb-0">Szybkie linki</p>
                    <hr class="border-white mt-1 mb-1">
                    <a class="" href="{{ route('news.index') }}">Aktualności</a>
                    <br>
                    <a class="" href="{{ route('ad') }}">Deklaracja dostępności</a>
                    <br>
                    <a class="" href="{{ route('tos') }}">Regulamin</a>
                    <br>
                    <a class="" href="{{ route('about') }}">O nas</a>
                    <br>
                    <a class="" href="{{ route('contact') }}">Kontakt</a>
                </div>
            </div>
            <div class="row mx-auto">
                <div class="col-12 text-center py-3">© 2021 Copyright: Daniel Klemczak</div>
            </div>
        </footer>
    </div>
    <script>
        var toggle_icon = document.getElementById('theme-toggle');
        var body = document.getElementsByTagName('body')[0];
        var nav = document.getElementsByTagName('nav')[0];
        var dark_theme_class = 'dark-theme';
        var light_theme_class = 'light-theme';

        toggle_icon.addEventListener('click', function() {
            if (body.classList.contains(dark_theme_class)) {

                body.classList.remove(dark_theme_class);
                body.classList.add(light_theme_class);

                nav.classList.remove(dark_theme_class);
                nav.classList.add(light_theme_class);

                setCookie('theme', 'light');
            }
            else {
                body.classList.add(dark_theme_class);
                body.classList.remove(light_theme_class);

                nav.classList.remove(dark_theme_class);
                nav.classList.add(light_theme_class);

                setCookie('theme', 'dark');
            }
        });

        function setCookie(name, value) {
            var d = new Date();
            d.setTime(d.getTime() + (365*24*60*60*1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
        }
    </script>
</body>
</html>
