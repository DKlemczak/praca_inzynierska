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
<body class="{{ $theme . '-theme'}} {{ $FontSize }}">
    <div id="app">
        <div class="col-12 row" style="position: fixed; z-index:10;">
            <div>
                <a class="ukryte-menu px-2" aria-label="Przejście do menu strony" href="#menu">Menu</a>
                <a class="ukryte-menu px-2" aria-label="Przejście do zawartości strony" href="#content">Treść podstrony</a>
                <a class="ukryte-menu px-2" aria-label="Przejście do stopki strony" href="#footer">Stopka strony</a>
            </div>
        </div>
        <nav class="navbar navbar-color navbar-expand-lg navbar-light border-bottom {{ $theme . '-theme' }}">
            <div class="container" id="menu">
                <a class="navbar-brand onhoverline" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Lewa strona menu -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link onhoverline" href="{{ route('news.index') }}">Aktualności</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link onhoverline" href="{{ route('ad') }}">Deklaracja dostępności</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link onhoverline" href="{{ route('tos') }}">Regulamin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link onhoverline" href="{{ route('about') }}">O nas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link onhoverline" href="{{ route('contact') }}">Kontakt</a>
                        </li>
                    </ul>

                    <!-- Prawa strona menu -->
                    <ul class="navbar-nav align-self-end m-auto">
                        <li class="nav-item my-auto mr-auto">
                            <i id="theme-toggle" class="fas fa-adjust onhoverline"></i>
                            <span class="onhoverline" onclick="setFontSize('fontA')">A</span>
                            <span class="onhoverline" onclick="setFontSize('fontAA')">A+</span>
                            <span class="onhoverline" onclick="setFontSize('fontAAA')">A++</span>
                            <i class="fas fa-align-left onhoverline" onclick="unjustifyText()"></i>
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
                        @if(Auth::user()->is_admin)
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('dashboard') }}">
                                    Panel administratora
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
                        @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4" id="content" style="min-height: 65vh;">
            @yield('content')
        </main>
        <footer class="footer font-small">
            <div class="row mx-auto justify-content-center text-center pb-3 border-top">
                <div class="col-lg-2 col-12">
                    <p class="footer-header mt-3 mb-0">Dane kontaktowe</p>
                    <hr class="border-white mt-1 mb-1">
                    <div class="textwidget text-left">
                        <strong>Widzialni w internecie</strong><br>
                        <span tabindex="0">ul. {!!$contact->street!!} {!!$contact->building_number!!}</span><br> <span tabindex="0">
                        <i aria-label="Kod pocztowy" class="fa fa-home"></i> {!!$contact->postcode!!} {!!$contact->city!!}</span><br>
                        <span tabindex="0"><i aria-label="Adres E-mail" class="fa fa-envelope"></i> {!!$contact->email!!}</span><br>
                        <span tabindex="0"><i aria-label="Numer telefonu" class="fas fa-phone-square"></i> {!!$contact->phone_number!!}</span><br>
                    </div>
                </div>
                <div class="col-lg-2 col-12 offset-lg-1">
                    <p class="footer-header mt-3 mb-0">Godziny kontaktowe</p>
                    <hr class="border-white mt-1 mb-1">
                    <div class="textwidget text-left">
                        <i class="far fa-clock"></i> <span tabindex="0">Od poniedziałku do piątku od 8:00 do 16:00</span><br>
                        <i class="far fa-clock"></i> <span tabindex="0">W soboty i niedzielę nieczynne</span>
                    </div>
                </div>
                <div class="col-lg-2 col-12 offset-lg-1">
                    <p class="footer-header mt-3 mb-0">Szybkie linki</p>
                    <hr class="border-white mt-1 mb-1">
                    <a href="{{ route('news.index') }}">Aktualności</a>
                    <br>
                    <a href="{{ route('ad') }}">Deklaracja dostępności</a>
                    <br>
                    <a href="{{ route('tos') }}">Regulamin</a>
                    <br>
                    <a href="{{ route('about') }}">O nas</a>
                    <br>
                    <a href="{{ route('contact') }}">Kontakt</a>
                </div>
            </div>
            <div class="row mx-auto border-top">
                <div class="col-12 text-center py-3"><p tabindex="0" class="m-0 p-0">© 2021 Copyright: Daniel Klemczak</p></div>
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

                nav.classList.add(dark_theme_class);
                nav.classList.remove(light_theme_class);

                setCookie('theme', 'dark');
            }
        });

        function setFontSize(mode) {
            var body = document.getElementsByTagName('body')[0];
            var a = 'fontA';
            var aa = 'fontAA';
            var aaa = 'fontAAA';
            if(mode == 'fontA')
            {
                body.classList.add(a);
                body.classList.remove(aa);
                body.classList.remove(aaa);

                setCookie('FontSize', mode);
            }
            else if(mode == 'fontAA')
            {
                body.classList.remove(a);
                body.classList.add(aa);
                body.classList.remove(aaa);

                setCookie('FontSize', mode);
            }
            else if(mode == 'fontAAA')
            {
                body.classList.remove(a);
                body.classList.remove(aa);
                body.classList.add(aaa);

                setCookie('FontSize', mode);
            }
        }

        function unjustifyText() {
            var body = document.getElementsByTagName('main')[0];
            var alignClass = 'text-left';
            if(body.classList.contains(alignClass))
            {
                body.classList.remove(alignClass);
                setCookie('alignClass', '');
            }
            else
            {
                body.classList.add(alignClass);
                setCookie('alignClass', alignClass);
            }
        }

        function setCookie(name, value) {
            var d = new Date();
            d.setTime(d.getTime() + (365*24*60*60*1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
        }
    </script>
</body>
</html>
