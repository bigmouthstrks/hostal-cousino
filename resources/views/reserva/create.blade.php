@extends('layouts.app')
@section('main')

	<h2 class="title text-center">Reservar</h2>
	<div class="container row d-flex justify-content-center">
		<div class="col-6 border rounded p-3 shadow mb-4">
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

            <form method="POST" action="{{ route('reservas.store') }}">
                @csrf
				<div class="form-group">
					<label for="fecha_llegada">Fecha llegada:</label>
					<input type="date" class="form-control" id="fecha_llegada" name="fecha_llegada">
				</div>
				<div class="form-group">
					<label for="fecha_salida">Fecha salida:</label>
					<input type="date" class="form-control" id="fecha_salida" name="fecha_salida">
				</div>
				<hr>
				<button type="submit" class="btn btn-info">Confirmar</button>
				<button type="{{ route('front.index') }}" class="btn btn-danger">Cancelar</button>
			</form>
		</div>
	</div>

@endsection
