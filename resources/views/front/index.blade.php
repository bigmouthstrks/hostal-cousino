@extends('layouts.app')
@section('main')

	<h1 class="title text-center">Hostal Cousiño - Bed & Breakfast</h1>
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	  	<ol class="carousel-indicators d-none d-md-flex">
	    	<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	  	</ol>
  		<div class="carousel-inner">
		    <div class="carousel-item active">
		      	<img class="d-block w-100" src="{{ asset('images/bar2.jpg') }}" alt="First slide">
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
		      	<img class="d-block w-100" src="{{ asset('images/cook_team.jpg') }}" alt="Second slide">
		      	<div class="carousel-caption carousel-caption-bg d-none d-md-block">
		      		<h4>Almuerzos y Cenas</h4>
		      		<p>Acércate a nuestro restaurant para disfrutar de las mejores cenas y almuerzo en compañía de nuestro excelente equipo de cocina.</p>
		      	</div>
		      	<!-- Vista de la leyenda desde un dispositivo móvil -->
		      	<div class="d-block d-md-none">
	      			<h4>Almuerzos y Cenas</h4>
		      		<p>Acércate a nuestro restaurant para disfrutar de las mejores cenas y almuerzo en compañía de nuestro excelente equipo de cocina.</p>
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
	<div class="card-group">
		<div class="card">
		  	<img class="card-img-top" src="{{ asset('images/food_service.jpg') }}" alt="Card image cap">
		  	<div class="card-body">
		    	<h5 class="card-title">Una cena con clase</h5>
		    	<p class="card-text">Lleva a quienes te acompañan a una cena elegante, tú pones la gente y nosotros el resto.</p>
		    	<a href="#" class="btn btn-info w-100">Ver disponibilidad</a>
		  	</div>
		</div>
		<div class="card">
		  	<img class="card-img-top" src="{{ asset('images/room_service.jpg') }}" alt="Card image cap">
	  		<div class="card-body">
		    	<h5 class="card-title">Habitaciones a tu medida</h5>
		    	<p class="card-text">No pagues de más por espacio que no utilizarás. Reserva una habitación a tu medida.</p>
		    	<a href="#" class="btn btn-info w-100">Ver habitaciones</a>
		  	</div>
		</div>
		<div class="card">
		  	<img class="card-img-top" src="{{ asset('images/breakfast_service.jpg') }}" alt="Card image cap">
		  	<div class="card-body">
		    	<h5 class="card-title">Desayuno buffet</h5>
		    	<p class="card-text">Disfruta de un desayuno contundente y delicioso todas las mañanas.</p>
		    	<a href="#" class="btn btn-info w-100">Ver menu</a>
		  	</div>
		</div>
	</div>

@endsection
