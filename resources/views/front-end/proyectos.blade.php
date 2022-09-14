@extends('front-end.layouts.app')
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
@section('title')
    {{ $proyecto->title }} - Proyectos
@endsection
@section('links-submenu-doctencnica-mobile')
    <li>
        <a href="{{ route('doctecnicaProyectos') }}">PROYECTOS</a>
    </li>
    <li>
        <a href="#">DIRECCIONES DE OBRA</a>
    </li>
    <li>
        <a href="#">ITES - INSTPECCIONES TÉCNICAS DE EDIFICIOS</a>
    </li>
    <li>
        <a href="#">TRAMITACIÓN DE LICENCIAS</a>
    </li>
    <li>
        <a href="#">C.E. - CERTIFICADOS ENERGÉTICOS</a>
    </li>
    <li>
        <a href="#">GESTIÓN DE SUBVENCIONES</a>
    </li>
@endsection

@section('main-content')

    <section class="proyectos-container">

        @if (count($proyectos) > 0)

         @foreach ($proyectos as $proyecto )
            <!-- Items -->
            <div class="card-proyecto">
                <div class="card_image">
                    <a href="{{ route('viewProyecto', ['id' => strtolower(trim(str_replace(' ', '-',$proyecto->title))) ]) }}">
                        <img src="{{ asset($proyecto->image_primary) }}" >
                    </a>
                </div>
                <div class="card_title">
                    <a href="{{ route('viewProyecto', ['id' => strtolower(trim(str_replace(' ', '-',$proyecto->title))) ]) }}">
                        <h3>
                            {{ $proyecto->title }}
                        </h3>
                    </a>
                </div>
            </div>
         @endforeach

        @else
            <style>
                .text-white{
                    color: #fff;
                    font-size: 2rem;
                    padding-top: 5px;
                }
            </style>
                <h1 class="text-white">No hay elementos disponibles...</h1>
        @endif
    </section>
@endsection
