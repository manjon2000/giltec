@extends('front-end.layouts.app')
@section('title')
    Documentacion tecnica - Giltec
@endsection
@section('documentacion-tecnica')
    <li>
        <a href="{{ route('doctecnicaProyectos') }}">PROYECTOS</a>
    </li>
    <li>
        <a href="">DIRECCIONES DE OBRA</a>
    </li>
    <li>
        <a href="">ITES - INSTPECCIONES TÉCNICAS DE EDIFICIOS</a>
    </li>
    <li>
        <a href="">TRAMITACIÓN DE LICENCIAS</a>
    </li>
    <li>
        <a href="">C.E. - CERTIFICADOS ENERGÉTICOS</a>
    </li>
    <li>
        <a href="">GESTIÓN DE SUBVENCIONES</a>
    </li>
@endsection
@section('main-content')
    <section class="proyectos-container">
        <style>
            .text-white{
                color: #fff;
                font-size: 2rem;
                padding-top: 5px;
            }
        </style>
            <h1 class="text-white">No hay elementos disponibles...</h1>
    </section>
@endsection
