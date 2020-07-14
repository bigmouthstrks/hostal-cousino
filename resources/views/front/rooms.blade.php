@extends('layouts.app')
@section('main')

    <h2 class="text-center mb-3">Habitaciones</h2>
    @foreach($tipos_habitaciones as $tipo)
        <div class="shadow rounded flex-row flex-wrap mb-4 row">
            <div class="border-0 col-8">
                <img src="{{ asset('images/rooms/doble_twin2.jpg') }}" class="img-fluid">
            </div>
            <div class="card-block px-2 p-5 col-4">
                <h4 class="card-title">{{ $tipo->tipo }}</h4>
                <p class="text-secondary">{{ $tipo->descripcion }}</p>
                <p class="card-text"><i class="fas fa-bed mr-2"></i> {{ $tipo->cant_camas }} @if($tipo->cant_camas > 1) Camas @elseif($tipo->cant_camas <= 1) Cama @endif </p>
                <p class="card-text"><i class="fas fa-toilet mr-2"></i>Baño privado</p>
                <h5><strong>${{ $tipo->precio_noche / 1000  . '.000' }}</strong></h5>
                <a href="#" class="btn btn-info w-100">Ver Disponibilidad</a>
            </div>
        </div>
    @endforeach

@endsection
