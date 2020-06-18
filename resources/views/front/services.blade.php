@extends('layouts.app')
@section('main')

	<h2 class="title text-center">Servicios</h2>
	<div class="row m-1 rounded border p-2 shadow mb-4">
		<div class="col-4">
			<img src="{{ asset('images/food_service.jpg') }}" class="w-100">
		</div>
		<div class="col-8 p-5">
			<div>
				<h3 class="text-center">Conexión Wifi</h4>
				<p class="text-center">Las instalaciones del Hostal Cousiño cuentan con conexión a internet vía Wi-fi desde cualquier ubicación, ya sea desde las habitaciones, el saón, los baños o la recepción.</p>
			</div>
		</div>
	</div>
	<div class="row m-1 rounded border p-2 shadow mb-4">
		<div class="col-8 p-5">
			<div>
				<h3 class="text-center">Conexión Wifi</h4>
				<p class="text-center">Las instalaciones del Hostal Cousiño cuentan con conexión a internet vía Wi-fi desde cualquier ubicación, ya sea desde las habitaciones, el saón, los baños o la recepción.</p>
			</div>
		</div>
		<div class="col-4">
			<img src="{{ asset('images/food_service.jpg') }}" class="w-100">
		</div>
	</div>

@endsection
