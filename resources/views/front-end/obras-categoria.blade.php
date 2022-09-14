@extends('front-end.layouts.app')

@section('title')
    Obras - Viviendas
@endsection
@if (count($obrasCategories) < 0)
    @section('link-submenu-desktop')
        @if (count($catObras) > 0)
            @foreach ( $catObras as $Catobra )
            <li>
                <a href="{{ route('categoriaObras',
                    ['id' => strtolower(trim(str_replace(' ', '-',$Catobra->name)))]) }}">
                    {{ $Catobra->name }}
                </a>
            </li>
            @endforeach
        @endif
    @endsection

    @section('links-submenu-mobile')
    @if (count($catObras) > 0)
        @foreach ( $catObras as $Catobra )
        <li>
            <a href="{{ route('categoriaObras',
                ['id' => strtolower(trim(str_replace(' ', '-',$Catobra->name)))]) }}">
                {{ $Catobra->name }}
            </a>
        </li>
        @endforeach
    @endif
    @endsection
    @section('main-content')
    <section class="obras-container">
        <style>
            .text-white{
                color: #fff;
                font-size: 3rem;
                padding-top: 5px;
            }
        </style>
            <h1 class="text-white">No hay obras disponibles...</h1>
    </section>
    @endsection
@else

    @section('link-submenu-desktop')
        @if (count($catObras) > 0)
            @foreach ( $catObras as $Catobra )
            <li>
                <a href="{{ route('categoriaObras',
                    ['id' => strtolower(trim(str_replace(' ', '-',$Catobra->name)))]) }}">
                    {{ $Catobra->name }}
                </a>
            </li>
            @endforeach
        @endif
    @endsection

    @section('links-submenu-mobile')
    @if (count($catObras) > 0)
        @foreach ( $catObras as $Catobra )
        <li>
            <a href="{{ route('categoriaObras',
                ['id' => strtolower(trim(str_replace(' ', '-',$Catobra->name)))]) }}">
                {{ $Catobra->name }}
            </a>
        </li>
        @endforeach
    @endif
    @endsection

    @section('main-content')
        <section class="obras-container">
            @foreach ($obrasCategories as $obra )
                <div class="card-obras">
                    <div class="card_image">
                        <a href="{{ route('obra', ['id' => strtolower(trim(str_replace(' ', '-',$obra->title))) ]) }}">
                            <img src="{{ asset($obra->image_primary) }}" alt="">
                        </a>
                    </div>
                    <div class="card_title">
                        <a href="{{ route('obra', ['id' => strtolower(trim(str_replace(' ', '-',$obra->title))) ]) }}">
                            <h3>
                                {{ $obra->title }}
                            </h3>
                        </a>
                    </div>
                </div>
            @endforeach
        </section>
    @endsection

@endif

