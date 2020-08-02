@extends('layouts.app')
@section('main')

    <h2 class="text-center">Modificar Articulo</h2>
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
			<form method="POST" action={{ route('articulo.update', $articulo->id_articulo) }}>
                @csrf
                @method('PUT')
				<div class="form-group">
                    <label for="nombre_articulo">Nombre artículo</label>
                    <input type="text" value="{{ $articulo->nombre_articulo }}" id="nombre_articulo" name="nombre_articulo" class="form-control" placeholder="Ingrese nuevo nombre del articulo">
                </div>
				<hr>
				<button type="submit" class="btn btn-info">Confirmar</button>
				<a href="{{ route('articulo.index') }}" class="btn btn-danger">Cancelar</a>
			</form>
		</div>
	</div>

@endsection
