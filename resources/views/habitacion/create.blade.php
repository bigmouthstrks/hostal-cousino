@extends('layouts.app')
@section('main')

    <h2 class="text-center">Agregar Habitación</h2>
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
			<form method="POST" action={{ route('habitaciones.store') }} enctype="multipart/form-data">
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
                <div class="d-flex justify-content-around row">
                    <div class="form-group col-4">
                        <label for="cant_camas">Nº de Camas:</label>
                        <input type="number" class="form-control @error('cant_camas') is-invalid @enderror" min="1" max="10" id="cant_camas" name="cant_camas" placeholder="Nº de camas" value="{{ old('cant_camas') }}">
                    </div>
                    <div class="col-4">
                        <label for="precio_noche">Precio por noche:</label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text">$</div>
                          </div>
                          <input type="number" min="15000" class="form-control @error('precio_noche') is-invalid @enderror  " id="precio_noche" name="precio_noche" placeholder="Precio" value="{{ old('precio_noche') }}">
                        </div>
                      </div>
                    <div class="form-group col-4">
                        <label for="numero">Número:</label>
                        <input type="number" class="form-control @error('numero') is-invalid @enderror" min="1" id="numero" name="numero" placeholder="Número" value="{{ old('numero') }}">
                    </div>
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
                    <label for="descripcion">Descripción:</label>
                    <textarea class="form-control" placeholder="Escriba aquí una descripción para la habitación" id="descripcion" name="descripcion" rows="3" value="{{old('descripcion')}}"></textarea>
                </div>
				<hr>
				<button type="submit" class="btn btn-info">Confirmar</button>
				<a href="{{ route('habitaciones.index') }}" class="btn btn-danger">Cancelar</a>
			</form>
		</div>
    </div>

@endsection

@section('scripts')
    <script>
        $('#imagen').on('change',function(){
          var archivo = $(this).val().replace('C:\\fakepath\\','');
          $(this).next('.custom-file-label').html(archivo);
        });
    </script>
@endsection
