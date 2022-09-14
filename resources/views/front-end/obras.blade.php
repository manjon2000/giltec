@extends('front-end.layouts.app')
@section('title')
     Obras - Giltec
@endsection
@section('link-submenu-desktop')
    @if (count($Catobras) > 0)
        @foreach ( $Catobras as $Catobra )
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
    @if (count($Catobras) > 0)
        @foreach ( $Catobras as $Catobra )
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
        {{-- Item --}}
        @if (count($obras) > 0)
            @foreach ($obras as $obra )
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
        @else
        <style>
            .text-white{
                color: #fff;
                font-size: 3rem;
                padding-top: 5px;
            }
        </style>
            <h1 class="text-white">No hay obras disponibles...</h1>
        @endif
    </section>
@endsection
