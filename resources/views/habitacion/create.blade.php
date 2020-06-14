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

            {{-- Formulario de ingreso para una nueva habitación --}}
			<form method="POST" action={{ route('habitaciones.store') }}>
				@csrf
				<div class="form-group">
					<label for="id_habitacion">ID Habitacion:</label>
					<input type="text" class="form-control" name="id_habitacion" value="{{ $id_habitacion }}" placeholder="{{ $id_habitacion }}" readonly>
				</div>
				<div class="form-group">
					<label for="estado">Estado:</label>
					<div class="input-group mb-3">
						<select class="custom-select" id="estado" name="estado" required>
						  <option value="Disponible">Disponible</option>
						  <option value="Ocupada">Ocupada</option>
						  <option value="Bloqueada">Bloqueada</option>
						</select>
					  </div>
				</div>
				<div class="form-group">
					<label for="cant_camas">Cantidad de Camas:</label>
					<input type="number" max="5" class="form-control" id="cant_cant" name="cant_camas" placeholder="Cantidad de camas">
				</div>
				<div class="form-group">
					<label for="tipo">Tipo:</label>
					<div class="input-group mb-3">
						<select class="custom-select" id="tipo" name="tipo" required>
						  <option value="Single">Single</option>
						  <option value="Doble Matrimonial">Doble Matrimonial</option>
						  <option value="Doble Twin">Doble Twin</option>
						  <option value="Triple">Triple</option>
						  <option value="Familiar">Familiar</option>
						</select>
					  </div>
				</div>
				<div class="form-group">
					<label for="precio_noche">Precio por noche:</label>
					<input type="number" class="form-control" id="precio_noche" name="precio_noche" placeholder="Precio por cada noche">
				</div>
				<div class="form-group">
					<label for="tamaño">Tamaño:</label>
					<div class="input-group mb-3">
						<select class="custom-select" id="tamaño" name="tamaño" required>
						  <option value="Pequeña">Pequeña</option>
						  <option value="Mediana">Mediana</option>
						  <option value="Grande">Grande</option>
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
