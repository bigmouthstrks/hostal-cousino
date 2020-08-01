@extends('layouts.app')
@section('main')

    <h2 class="text-center">Reservar</h2>
    <h5 class="text-secondary text-center mb-2"><small>Reservas sujetas a disponibilidad</small></h5>
    @foreach($tipos_habitaciones as $tipo)
        <div class="shadow rounded flex-row flex-wrap mb-4 row">
            <div class="border-0 col-12 col-md-8">
                <img src="{{ asset("images/tipos/$tipo->tipo.jpg") }}" class="img-fluid">
            </div>
            <div class="card-block px-2 p-5 col-12 col-md-4">
                <form method="POST" action="{{ route('reservas.search', $tipo->tipo) }}">
                    @csrf
                    <h4 class="card-title" id="tipo_habitacion" name="tipo_habitacion" value="{{ $tipo->tipo }}">{{ $tipo->tipo }}</h4>
                    <p class="text-secondary">{{ $tipo->descripcion }}</p>
                    <p class="card-text"><i class="fas fa-bed mr-2"></i> {{ $tipo->cant_camas }} @if($tipo->cant_camas > 1) Camas @elseif($tipo->cant_camas <= 1) Cama @endif </p>
                    <p class="card-text"><i class="fas fa-toilet mr-2"></i>Baño privado</p>
                    <h5><strong>${{ $tipo->precio_noche / 1000  . '.000' }}</strong></h5>
                    <button type="submit" class="btn btn-warning w-100 mt-3 p-3">Ver Disponibilidad</button>
                </form>
            </div>
        </div>
    @endforeach

@endsection
