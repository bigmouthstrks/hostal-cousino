@extends('layouts.app')
@section('main')

    <h2 class="text-center">Editar Imágen</h2>
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
			<form method="POST" action={{ route('imagen.update', $imagen->id_imagen) }} enctype="multipart/form-data">
				@csrf
                @method('PUT')
				<div class="form-group" hidden>
					<label for="id_imagen">ID Imagen:</label>
					<input type="text" class="form-control" name="id_imagen" id="id_imagen" value="{{ $imagen->id_imagen }}" placeholder="{{ $imagen->id_imagen }}" readonly>
				</div>
                <div class="container p-2 border rounded mt-2 mb-2">
                    <label>Imagen:</label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('ruta_imagen') is-invalid @enderror" id="ruta_imagen" name="ruta_imagen" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="ruta_imagen">Imágen</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="habitacion_id">Seleccione habitación</label>
                    <select id="habitacion_id" name="habitacion_id" class="form-control w-100">
                        @foreach($habitaciones as $habitacion)
                            <option value="{{ $habitacion->id_habitacion }}">{{ $habitacion->id_habitacion }}</option>
                        @endforeach
                    </select>
                </div>
                <hr>
                <button type="submit" class="btn btn-info">Confirmar</button>
                <a href="{{ route('imagen.index') }}" class="btn btn-danger">Cancelar</a>
			</form>
        </div>
    </div>

    <script>
        $('#ruta_imagen').on('change',function(){
          var archivo = $(this).val().replace('C:\\fakepath\\','');
          $(this).next('.custom-file-label').html(archivo);
        });
    </script>

@endsection

