@extends('layouts.app')
@section('main')

    <h2 class="text-center">Registrar Check-in</h2>
    <div class="container row d-flex justify-content-center">
		<div class="col-6 border rounded p-2 shadow mb-4 mt-2">
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
			<form method="POST" action={{ route('checkin.store', $id_check_in) }} class="p-3">
                @csrf
                <div class="form-group text-center">
                    <h5>ID Check-in: {{ $id_check_in }}</h5>
                    <input class="form-control" type="text" id="id_check_in" name="id_check_in" value="{{ $id_check_in }}" hidden>
                </div>
				<div class="form-group text-center">
                    <h5>Fecha de llegada: {{ date('d-m-Y') }}</h5>
                    <input class="form-control" type="text" id="fecha_llegada" name="fecha_llegada" value="{{ date('Y-m-d') }}" hidden>
                </div>
                <div class="form-group text-center">
                    <h5>Hora de llegada: {{ date('h:i:s a') }}</h5>
                    <input type="text" class="form-control" id="hora_llegada" name="hora_llegada" value="{{ date('h:i:s') }}" hidden>
                </div>
                <div class="form-group text-center">
                    <h5>Cantidad de noches: {{ $cant_noches }}</h5>
                    <input type="number" id="cant_noches" name="cant_noches" class="form-control" value={{ $cant_noches }} hidden>
                </div>
                <div class="form-group text-center">
                    <h5>ID RESERVA: {{ $id_reserva }}</h5>
                    <input type="text" id="id_reserva" name="id_reserva" value="{{ $id_reserva }}" class="form-control"" hidden>
                </div>
				<hr>
				<button type="submit" class="btn btn-info">Confirmar</button>
				<a href="{{ route('reservas.index') }}" class="btn btn-danger">Cancelar</a>
			</form>
		</div>
    </div>

@endsection

