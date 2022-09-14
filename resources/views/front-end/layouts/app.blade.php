<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>
    <!-- Estilos -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}?v=<?php echo time();?>">
    <!-- Estilos -->
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/aba09469eb.js" crossorigin="anonymous"></script>
    <!-- FontAwesome -->



    <style>

    </style>
</head>

<body>
    <div class="navbar-desktop_menu">
        <ul>
            <li>
                <a class="logo-flex" href="{{ url('/') }}">
                    <img src="{{ asset('images/images/logos/cubos.png') }}" width="50" alt="">
                    <p>Giltec</p>
                </a>
            </li>
            <li>
                @if (request()->routeIs('obras') || request()->routeIs('categoriaObras') ||
                     request()->routeIs('obra') )
                    <a class="menu-item_actived" href="{{ route('obras') }}">Obras</a>
                @else
                    <a  href="{{ route('obras') }}">Obras</a>
                @endif
                <ul class="submenu_links">
                    @yield('link-submenu-desktop')
                </ul>
            </li>
            <li>
                @if (request()->routeIs('doctecnica'))
                    <a class="menu-item_actived" href="{{ route('doctecnica') }}">Documentación técnica</a>
                @else
                    <a href="{{ route('doctecnica') }}">Documentación técnica</a>
                @endif

                <ul class="submenu_links">
                    @yield('documentacion-tecnica')
                </ul>
            </li>
            <li>
                @if (request()->routeIs('empresa'))
                    <a class="menu-item_actived" href="{{ route('empresa') }}">Empresa</a>
                @else
                    <a href="{{ route('empresa') }}">Empresa</a>
                @endif
            </li>
            <li>
                <a href="{{ route('contacto') }}">Contacto</a>
            </li>
        </ul>
        <div class="direccion_menu">
            <img src="{{ asset('images/images/logos/iso-oca.png') }}" width="100">
            <p>Foru Kalea, 1, 01001 Gasteiz, Araba</p>
        </div>
    </div>
    <nav class="navbar-container">
        <!-- navbar mobile -->
        <div class="navbar-mobile">
            <div class="navbar-mobile_logo">
                <img class="open-menu" src="{{ asset('images/images/logos/logo_white.png') }}" width="110" alt="">

            </div>
            <div class="navbar-mobile_menu">
                <div class="btn-close">
                    <i class="fas fa-times"></i>
                </div>
                <ul class="list-mobile-menu">
                    <li>
                        <a class="logo-flex" href="{{ url('/') }}">
                            <img src="{{ asset('images/images/logos/cubos.png') }}" width="100" alt="">
                            <p>Giltec</p>
                        </a>
                    </li>
                    <li>
                        <a class="menu-item_actived" href="{{ route('obras') }}">Obras</a>
                        <ul class="submenu_links">
                            @yield('links-submenu-mobile')
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('doctecnica') }}">Documentación técnica</a>
                        <ul class="submenu_links">
                            @yield('links-submenu-doctencnica-mobile')
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('empresa') }}">Empresa</a>
                    </li>
                    <li>
                        <a href="{{ route('contacto') }}">Contacto</a>
                    </li>
                    <li class="info-address">
                        <img src="{{ asset('images/images/logos/iso-oca.png') }}" width="100">
                        <p>Foru Kalea, 1, 01001 Gasteiz, Araba</p>
                    </li>
                </ul>
            </div>
            <div class="navbar-mobile_icon_open_menu">
                <i class="fas fa-bars"></i>
            </div>
        </div>
        <!-- navbar mobile -->
    </nav>

    <main role="main" class="main-content">
        @yield('main-content')
    </main>

    <!-- Script -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- Script -->
</body>
</html>
