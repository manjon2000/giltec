@extends('front-end.layouts.app')
@section('title')
    @foreach ($obra as $obras )
        {{ $obras->title }} - Obras
    @endforeach
@endsection
@section('main-content')
<section class="title-content">
    @foreach ($obra as $obras )
        <h2>{{ $obras->title }}</h2>
    @endforeach
</section>
<section class="collage-images">
    @foreach ($obraImages as $images )
        <!-- Item -->
        <div class="collage-item">
            <img src="{{ asset($images->image_url) }}" alt="">
        </div>
    @endforeach
</section>
@endsection
