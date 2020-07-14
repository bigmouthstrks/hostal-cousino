@extends('layouts.app')
@section('main')

	<h2 class="text-center">Servicios</h2>
	<div class="row m-1 rounded p-2 shadow mb-4">
		<div class="col-4">
			<img src="{{ asset('images/services/wifi.jpg') }}" class="w-100">
		</div>
		<div class="col-8 p-5">
			<div>
				<h3 class="text-center">Conexión Wifi</h4>
                <p class="text-center">Las instalaciones del Hostal Cousiño cuentan con conexión a internet vía Wi-fi desde cualquier ubicación, ya sea desde las habitaciones, el saón, los baños o la recepción.</p>
                <p class="text-center text-secondary"><small>Servicio sin costo adicional</small></small></p>
			</div>
		</div>
	</div>
	<div class="row m-1 p-2 shadow rounded mb-4">
		<div class="col-8 p-5">
			<div>
				<h3 class="text-center">Cable y servicios de streaming</h4>
				<p class="text-center">Disfrute de series, películas, documentales y noticias sin restricciones. Ofrecemos Netflix, Amazon Prime Video y cable con antena satelital para que sus días y noches en Hostal Cousiño sean más entretenidas.</p>
                <p class="text-center text-secondary"><small>Servicio sin costo adicional</small></small></p>
			</div>
		</div>
		<div class="col-4">
			<img src="{{ asset('images/services/tv.jpg') }}" class="w-100">
		</div>
	</div>
	<div class="row m-1 p-2 shadow rounded mb-4">
		<div class="col-4">
			<img src="{{ asset('images/services/lavanderia.jpg') }}" class="w-100">
		</div>
		<div class="col-8 p-5">
			<div>
				<h3 class="text-center">Lavandería</h4>
				<p class="text-center">¿Se queda más tiempo de lo esperado? No hay problema. Solicite a el o la recepcionista de turno las tarifas y horarios para eviar su ropa a nuestro socio de lavandería.</p>
                <p class="text-center text-secondary"><small>Servicio sujeto a costos adicionales</small></small></p>
			</div>
		</div>
    </div>
	<div class="row m-1 p-2 shadow rounded mb-4">
		<div class="col-8 p-5">
			<div>
				<h3 class="text-center">Desayuno continental</h4>
				<p class="text-center">Disfrute de un rico y contundente desayuno continental en nuestro comedor compartido, o al interior de su habitación si así lo prefiere.</p>
                <p class="text-center text-secondary"><small>Servicio sin costo adicional</small></small></p>
			</div>
        </div>
		<div class="col-4">
			<img src="{{ asset('images/food_service.jpg') }}" class="w-100">
		</div>
	</div>
	<div class="row m-1 p-2 shadow rounded mb-4">
		<div class="col-4">
			<img src="{{ asset('images/services/pets.jpg') }}" class="w-100">
		</div>
		<div class="col-8 p-5">
			<div>
				<h3 class="text-center">Recibimos mascotas pequeñas</h4>
				<p class="text-center">Si viaja junto a su mascota, éste es el lugar perfecto, recibimos mascotas de tamaño pequeño siempre y cuando estén limpios y en su jaula mientras se encuentren en espacios compartidos.</p>
                <p class="text-center text-secondary"><small>Servicio sin costo adicional</small></small></p>
			</div>
        </div>
    </div>
	<div class="row m-1 p-2 shadow rounded mb-4">
		<div class="col-8 p-5">
			<div>
				<h3 class="text-center">Recepción 24/7</h4>
				<p class="text-center">Nuestro staff de recepción trabaja se turna para recibir pasajeros las 24 horas del día, los 7 días de la semana. No dude en consultar por disponibilidad por cualquiera de nuestros medio de <a href="{{ route('mensajes.create') }}">contacto</a></p>
                <p class="text-center text-secondary"><small>Servicio sin costo adicional</small></small></p>
			</div>
        </div>
		<div class="col-4">
			<img src="{{ asset('images/services/recepcion.png') }}" class="w-100">
		</div>
	</div>

@endsection
