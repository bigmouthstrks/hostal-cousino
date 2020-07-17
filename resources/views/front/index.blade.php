@extends('layouts.app')
@section('main')

	<div id="carouselExampleIndicators" class="carousel slide shadow-lg mb-4" data-ride="carousel">
	  	<ol class="carousel-indicators d-none d-md-flex">
	    	<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
	  	</ol>
  		<div class="carousel-inner">
		    <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/home_carousel/lobby.jpg') }}" alt="First slide">
                <div class="carousel-caption carousel-caption-bg d-none d-md-block">
                    <h4>¿Espera a alguien?</h4>
                    <p>Reúnase en nuestro lobby</p>
                </div>
                <!-- Vista de la leyenda desde un dispositivo móvil -->
                <div class="d-md-none d-block">
                    <h4>Comodidad a tu alcance</h4>
                    <p>Reserva una habitación a tu medida en precio y espacio</p>
                </div>
            </div>
		    <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('images/home_carousel/comfort.jpg') }}" alt="Second slide">
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
		      	<img class="d-block w-100" src="{{ asset('images/home_carousel/pool.jpg') }}" alt="Third slide">
	      		<div class="carousel-caption carousel-caption-bg d-none d-md-block">
		      		<h4>Espacios compartidos de lujo</h4>
		      		<p>Tome el sol en las comodidades de nuestro patio, donde encontrará piscinas de lujo en un tranquilo y elegante espacio compartido</p>
                </div>
                <!-- Vista de la leyenda desde un dispositivo móvil -->
		      	<div class="d-block d-md-none">
		      		<h4>Servicio de bar</h4>
		      		<p>¿Quieres compartir con amigos, amigas o familia? Acércate a nuestro bar y pasa un momento inolvidable.</p>
		      	</div>
		    </div>
		    <div class="carousel-item">
		      	<img class="d-block w-100" src="{{ asset('images/home_carousel/enjoy-city.jpg') }}" alt="Fourth slide">
		      	<div class="carousel-caption carousel-caption-bg d-none d-md-block">
		      		<h4>Disfrute de la ciudad</h4>
		      		<p>Conozca los lugares más importantes y atractivos que nos rodean, gracias a nuestra excelente ubicación</p>
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
    <hr>
	<div class="row p-2">
		@foreach($testimonios as $testimonio)
            <div class="shadow col- mr-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $testimonio->usuario_id }}</h5>
                    <div>
                        <p class="card-text">
                            @for ($i=0; $i <= $testimonio->calificacion; $i++)
                                <i class="fi-xnluxl-star"></i>
                            @endfor
                        </p>
                        <p>{{ $testimonio->comentario }}</p>
                        <p class="text-secondary">{{ 'Fecha:' . date('d-m-Y', strtotime($testimonio->created_at)) . ' Hora: ' . date('H:m', strtotime($testimonio->created_ad)) }}</p>
                    </div>
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
