@extends('layouts.app')

@section('main')


	<h1 class="title text-center">Envíanos un mensaje</h1>
	<div class="container row justify-content-center">
		<div class="d-inline col-12 col-md-8 col-lg-6 border rounded">
		<form class="p-4">
 			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" class="form-control" placeholder="Ingresa tu primer nombre" id="nombre">
			</div>
			<div class="form-group">
				<label for="correo">Correo Electrónico</label>
				<input type="email" class="form-control" placeholder="Ingresa una dirección de e-mail" id="correo">
			</div>
		  	<div class="form-group">
			    <label for="mensaje">Example textarea</label>
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

	<script type="text/javascript"></script>

@endsection