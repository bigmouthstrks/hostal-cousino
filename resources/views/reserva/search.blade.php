@extends('layouts.app')
@section('main')

    <h2 class="text-center">Reserva de habitacion {{ $tipo }}</h2>
    <div class="row d-flex justify-content-center pb-5">
        <div class="shadow col-6 mt-3">
            {{-- Mostrar mensajes de error si existen --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @include('partials.flash-message')
            <form class="p-4" method="POST" action="{{ route('reservas.store') }}">
                @csrf
                <div class="d-flex p-2">
                    <h5 id="tipo_habitacion" name="tipo_habitacion" value="{{ $tipo }}">Tipo de habitación seleccionado: {{ $tipo }}</h5>
                    <a href="{{ route('reservas.create') }}" class="ml-5">Cambiar</a>
                </div>
                <div class="form-group">
                    <label for="fecha_llegada">Fecha inicio</label>
                    <input type="date" class="form-control" id="fecha_llegada" name="fecha_llegada" placeholder="Fecha de llegada">
                </div>
                <div class="form-group">
                    <label for="fecha_salida">Fecha salida</label>
                    <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" placeholder="Fecha de salida">
                </div>
                <button type="submit" class="btn btn-info">Reservar</button>
                <a href="{{ route('reservas.create') }}" class="btn btn-warning">Cancelar</a>
            </form>
        </div>
    </div>

@endsection
