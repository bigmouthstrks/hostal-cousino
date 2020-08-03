@extends('layouts.app')
@section('main')

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
					<label for="id_habitacion">ID Reserva:</label>
					<input type="text" class="form-control" name="id_habitacion" value="{{ $reserva->id_reserva }}" placeholder="{{ $reserva->id_reserva }}" readonly>
                </div>
                <div class="form-group">
                    <label for="fecha_llegada">Fecha de llegada</label>
                    <input type="date" class="form-control" name="fecha_llegada" id="fecha_llegada">
                </div>
                <div class="form-group">
                    <label for="fecha_termino" name="fecha_salida" id="fecha_salida"></label>
                </div>
				<hr>
				<button type="submit" class="btn btn-info">Confirmar</button>
				<a href="{{ route('reservas.index') }}" class="btn btn-danger">Cancelar</a>
			</form>
		</div>
	</div>

@endsection
