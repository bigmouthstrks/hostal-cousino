@extends('layouts.app')
@section('main')

    <h2 class="text-center">Modificar Habitación</h2>
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
			<form method="POST" action={{ route('servicio.update', $servicio->id_servicio) }}>
                @csrf
                @method('PUT')
				<div class="form-group">
					<label for="id_servicio">ID Servicio:</label>
					<input type="text" class="form-control" name="id_servicio" value="{{ $servicio->id_servicio }}" placeholder="{{ $servicio->id_servicio }}" readonly>
				</div>
                <div class="form-group">
                    <label for="nombre_servicio">Nombre Servicio</label>
                    <input type="text" name="nombre_servicio" id="nombre_servicio" class="form-control @error('nombre_servicio') is-invalid @enderror" placeholder="{{ $servicio->nombre_servicio }}" value="{{ $servicio->nombre_servicio }}">
                </div>
                <div class="form-group">
                    <label for="precio_servicio">Nombre Servicio</label>
                    <input type="number" name="precio_servicio" id="precio_servicio" class="form-control @error('precio_servicio') is-invalid @enderror" placeholder="{{ $servicio->precio_servicio }}" value="{{ $servicio->precio_servicio }}">
                </div>
				<hr>
				<button type="submit" class="btn btn-info">Confirmar</button>
				<a href="{{ route('servicio.index') }}" class="btn btn-danger">Cancelar</a>
			</form>
		</div>
	</div>

@endsection
