<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GILTEC ARQUITECTOS TÉCNICOS - Home</title>
    <!-- Estilos -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}?v=<?php echo time();?>">
    <!-- Estilos -->
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/aba09469eb.js" crossorigin="anonymous"></script>
    <!-- FontAwesome -->

    <style>
    .menu-home a{
        color: #000 !important;
        font-weight: bold;
    }
    .direccion_menu-mobile p,
    .direccion_menu p{
        color: #000 !important;
        font-weight: bold;
    }
    </style>
</head>

<body class="page-home">

    <div class="navbar-desktop_menu menu-home">
        <ul>
            <li>
                <a class="logo-flex" href="{{ url('/') }}">
                    <img src="{{ asset('images/images/logos/cubos.png') }}" width="50" alt="">
                    <p>Giltec</p>
                </a>
            </li>
            <li>
                <a href="{{ route('obras') }}">Obras</a>
            </li>
            <li>
                <a href="{{ route('doctecnica') }}">Documentación técnica</a>
            </li>
            <li>
                <a href="{{ route('empresa') }}">Empresa</a>
            </li>
            <li>
                <a href="{{ route('contacto') }}">Contacto</a>
            </li>
        </ul>
        <div class="direccion_menu">
            <p>Foru Kalea, 1, 01001 Gasteiz, Araba</p>
        </div>
    </div>

    <nav class="navbar-container">
        <!-- navbar mobile -->
        <div class="navbar-mobile">
            <div class="navbar-mobile_logo">
                <img class="open-menu" src="{{ asset('images/images/logos/logo_black.png') }}" width="110" alt="">
            </div>
            <div class="navbar-mobile_menu">
                <div class="btn-close">
                    <i class="fas fa-times"></i>
                </div>
                <ul>
                    <li>
                        <a href="index.html">
                            <img src="{{ asset('images/images/logos/cubos.png') }}" width="75" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('obras') }}">Obras</a>
                    </li>
                    <li>
                        <a href="{{ route('doctecnica') }}">Documentación técnica</a>
                    </li>
                    <li>
                        <a href="{{ route('empresa') }}">Empresa</a>
                    </li>
                    <li>
                        <a href="{{ route('contacto') }}">Contacto</a>
                    </li>
                </ul>
                <div class="direccion_menu-mobile">
                    <p>Foru Kalea, 1, 01001 Gasteiz, Araba</p>
                </div>
            </div>
            <div class="navbar-mobile_icon_open_menu">
                <i class="fas fa-bars"></i>
            </div>
        </div>
        <!-- navbar mobile -->
    </nav>

    <header class="header-home"></header>


    <!-- Script -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- Script -->

</body>
</html>
