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
			<form method="POST" action={{ route('articulo.store') }}>
				@csrf
				<div class="form-group">
                    <label for="id_habitacion">Nombre Artículo:</label>
                    <input type="text" class="form-control @error ('nombre_articulo') is-invalid @enderror" id="nombre_articulo" name="nombre_articulo" placeholder="Ingrese nombre del artículo">
                </div>
				<hr>
				<button type="submit" class="btn btn-info">Guardar</button>
				<a href="{{ route('articulo.index') }}" class="btn btn-danger">Cancelar</a>
			</form>
		</div>
    </div>

@endsection
