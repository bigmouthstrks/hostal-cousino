@extends('layouts.app')

@section('main')

	{{--
		Funcionalidad que permite enviar un mensaje al hostal, dicho mensaje se mostrará en la bandeja de mensajes de los funcionarios del hostal
	--}}
	<h1 class="title text-center">Envíanos un mensaje</h1>
	<div class="container row justify-content-center">
		<div class="d-inline col-12 col-md-8 col-lg-6 border rounded">
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

            <form class="p-4">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" placeholder="Ingresa tu primer nombre" id="nombre">
                </div>
                <div class="form-group">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" class="form-control" placeholder="Ingresa una dirección de e-mail" id="correo">
                    <small class="text-secondary">*Su correo elecrónico será utilizado sólo para el fin indicado</small>
                </div>
                <div class="form-group">
                    <label for="mensaje">Contenido del mensaje</label>
                    <textarea class="form-control" placeholder="Escribe aquí tu mensaje para nosotros" id="mensaje" maxlength="200" rows="3"></textarea>
                    <small class="form-text text-muted">Carácteres restantes:<span class="text-danger" id="CaracteresRestantes"></span></small>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-info mb-2 mr-1">Enviar</button>
                    <button type="reset" class="btn btn-warning mb-2">Limpiar</button>
                </div>
            </form>
		</div>
	</div>


	{{--
		Función para contar carácteres restantes del mensaje a enviar
	--}}
	<script type="text/javascript">

		var max_caracteres = 200;
		var mensaje_input = document.getElementById("mensaje");
		var caracteres_restantes = document.getElementById("CaracteresRestantes");

		caracteres_restantes.innerHTML = max_caracteres;

		mensaje_input.addEventListener("keydown",contar);

		function contar(e){
			var cant_caracteres = mensaje_input.value.length;
			if (cant_caracteres >= max_caracteres){
				e.preventDefault();
			} else{
				caracteres_restantes.innerHTML = max_caracteres - (cant_caracteres-1);
			}
		}

	</script>



@endsection
