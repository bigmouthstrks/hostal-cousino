@extends('layouts.app')
@section('main')

	<h2 class="title text-center">Inicio</h2>
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	  	<ol class="carousel-indicators d-none d-md-flex">
	    	<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	  	</ol>
  		<div class="carousel-inner">
		    <div class="carousel-item active">
		      	<img class="d-block w-100" src="{{ asset('images/room_3.jpg') }}" alt="First slide">
	      		<div class="carousel-caption carousel-caption-bg d-none d-md-block">
		      		<h4>Servicio de bar</h4>
		      		<p>¿Quieres compartir con amigos, amigas o familia? Acércate a nuestro bar y pasa un momento inolvidable.</p>
		      	</div>
		      	<div class="d-block d-md-none">
		      		<h4>Servicio de bar</h4>
		      		<p>¿Quieres compartir con amigos, amigas o familia? Acércate a nuestro bar y pasa un momento inolvidable.</p>
		      	</div>
		    </div>
		    <div class="carousel-item">
		      	<img class="d-block w-100" src="{{ asset('images/bar2.jpg') }}" alt="Second slide">
		      	<div class="carousel-caption carousel-caption-bg d-none d-md-block">
		      		<h4>Comodidad a tu alcance</h4>
		      		<p>Reserva una habitación a tu medida en precio y espacio</p>
	      		</div>
	  	      	<!-- Vista de la leyenda desde un dispositivo móvil -->
		      	<div class="d-md-none d-block">
		      		<h4>Comodidad a tu alcance</h4>
		      		<p>Reserva una habitación a tu medida en precio y espacio</p>
		      	</div>
		    </div>
		    <div class="carousel-item">
		      	<img class="d-block w-100" src="{{ asset('images/room2.jpg') }}" alt="Third slide">
		      	<div class="carousel-caption carousel-caption-bg d-none d-md-block">
		      		<h4>Comodidad a tu alcance</h4>
		      		<p>Reserva una habitación a tu medida en precio y espacio</p>
	      		</div>
	  	      	<!-- Vista de la leyenda desde un dispositivo móvil -->
		      	<div class="d-md-none d-block">
		      		<h4>Comodidad a tu alcance</h4>
		      		<p>Reserva una habitación a tu medida en precio y espacio</p>
		      	</div>
		    </div>
	  	</div>
  		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    		<span class="sr-only">Previous</span>
  		</a>
  		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
  		</a>
	</div>
	<hr>
	<h2 class="title text-center">Testimonios</h2>
	<div class="card-group">
		@foreach($testimonios as $testimonio)
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">{{ $testimonio->id_testimonio }}</h5>
				<p class="card-text">
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
				</p>
				<p class="card-text">{{ $testimonio->contenido }}</p>
			</div>
		</div>
		@endforeach
	</div>
	<hr>
	<div class="card-group">
		<div class="card">
		  	<img class="card-img-top" src="{{ asset('images/food_service.jpg') }}" alt="Card image cap">
		  	<div class="card-body">
		    	<h5 class="card-title">Una cena con clase</h5>
		    	<p class="card-text">Lleva a quienes te acompañan a una cena elegante, tú pones la gente y nosotros el resto.</p>
		  	</div>
		  	<div class="card-footer text-muted">
		  		<a href="#" class="btn btn-info w-100">Ver Más</a>
		  	</div>
		</div>
		<div class="card">
		  	<img class="card-img-top" src="{{ asset('images/room_service.jpg') }}" alt="Card image cap">
	  		<div class="card-body">
		    	<h5 class="card-title">Habitaciones a tu medida</h5>
		    	<p class="card-text">No pagues de más por espacio que no utilizarás. Reserva una habitación a tu medida.</p>
		  	</div>
		  	<div class="card-footer text-muted">
		  		<a href="{{ route('front.rooms') }}" class="btn btn-info w-100">Ver habitaciones</a>
		  	</div>
		</div>
		<div class="card">
		  	<img class="card-img-top" src="{{ asset('images/breakfast_service.jpg') }}" alt="Card image cap">
		  	<div class="card-body">
		    	<h5 class="card-title">Desayuno continental</h5>
		    	<p class="card-text">Disfruta de un desayuno contundente, fresco y lleno de variedad directo a la comodidad de tu habitación.</p>
		  	</div>
		  	<div class="card-footer text-muted">
		  		<a href="#" class="btn btn-info w-100">Ver Menu</a>
		  	</div>
		</div>
	</div>

@endsection
