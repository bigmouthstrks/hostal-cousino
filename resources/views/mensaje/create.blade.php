@extends('layouts.app')

@section('main')

	{{--
		Funcionalidad que permite enviar un mensaje al hostal, dicho mensaje se mostrará en la bandeja de mensajes de los funcionarios del hostal
	--}}
	<h1 class="title text-center">Envíanos un mensaje</h1>
	<div class="container row justify-content-center">
		<div class="d-inline col-12 col-md-8 col-lg-6 border rounded shadow mb-4">
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

            <form method="POST" action="{{ route('mensajes.send') }}" class="p-4">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" placeholder="Ingrese su primer nombre" id="nombre" name="nombre" value="{{ old('nombre') }}">
                </div>
                <div class="form-group">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" class="form-control @error('correo') is-invalid @enderror" placeholder="Ingresa una dirección de e-mail" id="correo" name="correo" value="{{ old('correo') }}">
                </div>
                <div class="form-group">
                    <label for="mensaje">Contenido del mensaje</label>
                    <textarea class="form-control @error('mensaje') is-invalid @enderror" placeholder="Escribe aquí tu mensaje para nosotros" id="mensaje" name="mensaje" maxlength="200" rows="3" value="{{ old('mensaje') }}"></textarea>
                    <small class="form-text text-muted">Carácteres restantes:<span class="text-danger" id="CaracteresRestantes"></span></small>
                </div>
                {{--<div class="d-flex justify-content-end">
                </div>--}}

                <button type="submit" class="btn btn-info mb-2 mr-1">Enviar</button>
                <button class="btn btn-warning mb-2">Limpiar</button>
            </form>
		</div>
	</div>

@endsection
