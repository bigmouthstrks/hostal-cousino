@extends('layouts.app')
@section('main')

    <h2 class="text-center">Agregar Habitación</h2>
    <div class="container row d-flex justify-content-center">
		<div class="col-6 border rounded p-2">
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
			<form method="POST" action={{ route('habitaciones.update', $habitacion->id_habitacion) }}>
                @csrf
                @method('PUT')
				<div class="form-group">
					<label for="id_habitacion">ID Habitacion:</label>
					<input type="text" class="form-control" name="id_habitacion" value="{{ $habitacion->id_habitacion }}" placeholder="{{ $habitacion->id_habitacion }}" readonly>
				</div>
				<div class="form-group">
					<label for="estado">Estado:</label>
					<div class="input-group mb-3">
						<select class="custom-select" id="estado" name="estado">
                            @foreach($estados as $estado)
                                @if($estado == $habitacion->estado)
                                    <option selected value="{{ $habitacion->estado }}">{{ $habitacion->estado }}</option>
                                @else
                                    <option value="{{ $estado }}">{{ $estado }}</option>
                                @endif
                            @endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="cant_camas">Cantidad de Camas:</label>
					<input type="number" max="5" class="form-control" id="cant_cant" name="cant_camas" placeholder="Cantidad de camas" value="{{ $habitacion->cant_camas }}">
				</div>
				<div class="form-group">
					<label for="tipo">Tipo:</label>
					<div class="input-group mb-3">
						<select class="custom-select" id="tipo" name="tipo">
                            @foreach($tipos_hab as $tipo)
                                @if($tipo == $habitacion->tipo)
                                    <option selected value="{{ $habitacion->tipo }}">{{ $habitacion->tipo }}</option>
                                @else
                                    <option value="{{ $tipo }}">{{ $tipo }}</option>
                                @endif
                            @endforeach
						</select>
					  </div>
				</div>
				<div class="form-group">
					<label for="precio_noche">Precio por noche:</label>
					<input type="number" class="form-control" id="precio_noche" name="precio_noche" placeholder="Precio por cada noche" value="{{ $habitacion->precio_noche }}">
				</div>
				<div class="form-group">
					<label for="tamaño">Tamaño:</label>
					<div class="input-group mb-3">
					    <select class="custom-select" id="tamaño" name="tamaño">
                            @foreach($tipos_hab as $tipo)
                                @if($tipo == $habitacion->tipo)
                                    <option selected value="{{ $habitacion->tipo }}">{{ $habitacion->tipo }}</option>
                                @else
                                    <option value="{{ $tipo }}">{{ $tipo }}</option>
                                @endif
                            @endforeach
						</select>
					  </div>
                </div>
                <div class="form-group">
                    <label for="numero">Número:</label>
                    <input type="number" class="form-control" max="99" id="numero" name="numero" placeholder="Número de la habitación">
                </div>
				<div class="form-group">
					<label for="room_images">Imágenes:</label>
					<input type="file" class="form-control" id="room_images" name="room_images" multiple>
				</div>
				<hr>
				<button type="submit" class="btn btn-info">Confirmar</button>
				<a href="{{ route('habitaciones.index') }}" class="btn btn-danger">Cancelar</a>
			</form>
		</div>
	</div>

@endsection
