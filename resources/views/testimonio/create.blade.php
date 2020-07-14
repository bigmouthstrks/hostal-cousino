@extends('layouts.app')
@section('main')

    <h2 class="text-center">Agregar Testimonio</h2>
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

            {{-- Formulario de ingreso para un nuevo testimonio --}}
            <form method="POST" action="{{ route('testimonios.store') }}">
                @csrf
				<div class="form-group">
					<label for="id_testimonio">ID Testimonio:</label>
					<input type="text" class="form-control" name="id_testimonio" value="{{ $id_testimonio }}" placeholder="{{ $id_testimonio }}" readonly>
                </div>
                <div class="form-group">
					<label for="id_usuario">ID Usuario:</label>
					<input type="text" class="form-control" name="id_usuario" value="{{ $id_usuario }}" placeholder="{{ $id_usuario }}" readonly>
                </div>
                <div class="form-group">
                    <label for="calificacion">Calificación</label>
                    <input type="number" class="form-control @error('cant_camas') is-invalid @enderror" name="calificacion" placeholder="Calificacion">
                </div>
                <div class="form-group">
                    <label for="descripcion">comentario:</label>
                    <textarea class="form-control @error('cant_camas') is-invalid @enderror" placeholder="Escriba aquí el comentario de su testimonio" id="comentario" name="comentario" rows="3" value="{{old('comentario')}}"></textarea>
                </div>
				<hr>
				<button type="submit" class="btn btn-info">Confirmar</button>
				<a href="{{ route('testimonios.index') }}" class="btn btn-danger">Cancelar</a>
            </form>

        </div>
    </div>

@endsection
