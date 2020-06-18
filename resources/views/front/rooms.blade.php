@extends('layouts.app')
@section('main')

	<h2 class="title text-center">Habitaciones</h2>
	<div class="card flex-row flex-wrap shadow mb-4">
        <div class="card-header border-0">
            <img src="//placehold.it/700x400">
        </div>
        @foreach($tipos_habitaciones as $tipo)
            <div class="card-block px-2 p-5">
                <h4 class="card-title">{{ $tipo->tipo }}</h4>
                <p class="text-secondary">Hermosa habitación</p>
                <p class="card-text"><i class="fas fa-bed mr-2"></i> {{ $tipo->cant_camas }} @if($tipo->cant_camas > 1) Camas @elseif($tipo->cant_camas <= 1) Cama @endif </p>
                <p class="card-text"><i class="fas fa-toilet mr-2"></i>Baño privado</p>
                <h5><strong>${{ $tipo->precio_noche / 1000  . '.000' }}</strong></h5>
                <a href="#" class="btn btn-info w-100">Ver Disponibilidad</a>
            </div>
        @endforeach
    </div>

@endsection
