@extends('front-end.layouts.app')
@section('main-content')
@section('title')
    @foreach ($proyecto as $proyectos)
        {{ $proyectos->title }} - Obras
    @endforeach
@endsection
<section class="title-content">
    @foreach ($proyecto as $proyectos )
        <h2>{{ $proyectos->title }}</h2>
    @endforeach
</section>
<section class="collage-images">
    @foreach ($proyectoImages as $images )
        <!-- Item -->
        <div class="collage-item">
            <img src="{{ asset($images->image_url) }}" alt="">
        </div>
    @endforeach
</section>
@endsection
