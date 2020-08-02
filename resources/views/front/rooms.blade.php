@extends('layouts.app')
@section('main')

    <h2 class="text-center mb-3">Habitaciones</h2>
    <div id="carouselExampleIndicators" class="carousel slide shadow-lg mb-4" data-ride="carousel">
        <ol class="carousel-indicators d-none d-md-flex">
            @foreach($tipos_habitaciones as $key => $tipo)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" @if($key == 0) class="active" @endif></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($tipos_habitaciones as $key => $tipo)
                <div class="carousel-item @if($key == 1) active @endif">
                    <img class="d-block w-100" src="{{ asset("images/tipos/$tipo->tipo.jpg") }}" alt="First slide">
                    <div class="carousel-caption carousel-caption-bg d-none d-md-block">
                        <h4>{{ $tipo->tipo }}</h4>
                        <p>{{ $tipo->descripcion }}</p>
                    </div>
                    <!-- Vista de la leyenda desde un dispositivo móvil -->
                    <div class="d-md-none d-block">
                        <h4>{{ $tipo->tipo }}</h4>
                        <p>{{ $tipo->descripcion }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>

@endsection
