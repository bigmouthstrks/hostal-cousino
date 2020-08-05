@extends('layouts.app')
@section('main')

    {{-- Formatear habitacion --}}
    @foreach ($habitacion as $item)
        @php
            $room = $item;
        @endphp
    @endforeach

    <h2 class="text-center">Modificar Reserva</h2>
    <div class="container row d-flex justify-content-center">
		<div class="col-6 border rounded p-2 shadow mb-4">
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

            {{-- Formulario de ingreso para una nueva habitación --}}
			<form method="POST" action={{ route('reservas.update', $reserva->id_reserva) }}>
                @csrf
                @method('PUT')
				<div class="form-group">
					<h5 for="id_habitacion">ID Reserva: <strong>{{$reserva->id_reserva}}</strong></h5>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="tipo">Tipo</label>
                            <input value="{{$room->tipo}}" class="form-control" name="tipo" id="tipo" readonly>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="numero">Número</label>
                            <input value="{{$room->numero}}" class="form-control" name="numero" id="numero" readonly>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="id_habitacion">Id habitación</label>
                            <input value="{{$room->id_habitacion}}" class="form-control" name="id_habitacion" id="id_habitacion" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="fecha_llegada">Fecha de llegada</label>
                            <input value="{{$reserva->inicio}}" type="date" class="form-control" name="fecha_llegada" id="fecha_llegada">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="fecha_salida" class="">Fecha de salida</label>
                            <input value="{{$reserva->termino}}" type="date" class="form-control" name="fecha_salida" id="fecha_salida">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col text-left">
                        <a href="{{ route('reservas.index') }}" class="btn btn-danger">Cancelar</a>
                    </div>
                    <div class="col text-right">
                        <button type="submit" class="btn btn-info">Confirmar</button>
                    </div>
                </div>
			</form>
		</div>
    </div>
@endsection
