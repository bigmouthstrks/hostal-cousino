<!-- Navbar Responsiva con opción de menú 'sandwich' para moviles -->
@auth
@if (Auth::user()->tipo=='U')
<nav class="nav navbar navbar-expand-lg navbar-light shadow bg-dark">
	<div class="container">
		<a class="navbar-brand text-light" href="{{ route('front.index') }}">Hostal Cousiño</a>
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon justify-content-end"></span>
  		</button>
	  	<div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
	    	<ul class="navbar-nav">
	      	<li class="nav-item active">
	        	<a class="nav-link text-light" href="{{ route('front.index') }}"><i class="fas fa-home mr-2"></i>Inicio</a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link text-light" href="{{ route('mensajes.create') }}"><i class="fas fa-id-card-alt mr-2"></i>Contacto</a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link text-light" href="{{ route('reservas.create') }}"><i class="fas fa-pencil-alt mr-2"></i>Reservar</a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link text-light" href="{{ route('front.about') }}"><i class="fas fa-info mr-2"></i>Acerca de</a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link text-light" href="{{ route('front.services') }}"><i class="fas fa-concierge-bell mr-2"></i>Servicios</a>
	      	</li>
	      	<li class="nav-item dropdown">
        		<a class="nav-link dropdown-toggle text-light btn btn-info mb-1 ml-1 mr-1 p-1 mt-1" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	            <i class="fas fa-user-circle mr-1"></i> Mi Cuenta
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	            <a class="dropdown-item" href="{{ route('usuarios.edit', Auth::user()->id_usuario) }}">Perfil</a>
                <a class="dropdown-item" href="{{ route('testimonios.index') }}">Testimonios</a>
                <a class="dropdown-item" href="#">Estadías</a>
                <a class="dropdown-item" href="{{ route('reservas.index') }}">Reservas</a>
	        </div>
	    	</li>
		</ul>
		</div>
	</div>
	<span class="text-white">Bienvenido(a), {{Auth::user()->nombre}}!</span>
	<li class="nav-item">
		<a class="nav-link text-light btn btn-danger mb-1 ml-3 mr-1 mt-1 p-1" href="{{ route('logout.usuario') }}"><i class="fas fa-sign-out-alt mr-1"></i></a>
	</li>
</nav>
@else
<nav class="nav navbar navbar-expand-lg navbar-light shadow bg-dark">
	<div class="container">
		<a class="navbar-brand text-light" href="{{ route('front.index') }}">Hostal Cousiño</a>
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon justify-content-end"></span>
  		</button>
	  		<div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
	    		<ul class="navbar-nav">
	      		<li class="nav-item active">
	        		<a class="nav-link text-light" href="{{ route('front.index') }}"><i class="fas fa-home mr-2"></i>Inicio</a>
	      		</li>
	      		<li class="nav-item">
	        		<a class="nav-link text-light" href="{{ route('mensajes.create') }}"><i class="fas fa-id-card-alt mr-2"></i>Contacto</a>
	      		</li>
	      		<li class="nav-item">
	        			<a class="nav-link text-light" href="{{ route('reservas.create') }}"><i class="fas fa-pencil-alt mr-2"></i>Reservar</a>
	      		</li>
	      		<li class="nav-item">
	        		<a class="nav-link text-light" href="{{ route('front.about') }}"><i class="fas fa-info mr-2"></i>Acerca de</a>
	      		</li>
	      		<li class="nav-item">
	        		<a class="nav-link text-light" href="{{ route('front.services') }}"><i class="fas fa-concierge-bell mr-2"></i>Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('usuarios.edit', Auth::user()->id_usuario) }}"><i class="fas fa-user-circle mr-2"></i>Perfil</a>
                </li>
	      		<li class="nav-item dropdown">
        			<a class="nav-link dropdown-toggle text-light btn btn-info mb-1 ml-1 mr-1 p-1 mt-1" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-tools mr-1"></i> Funciones
	        		</a>
	        		<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                		<a class="dropdown-item" href="{{ route('testimonios.index') }}">Testimonios</a>
                		<a class="dropdown-item" href="{{ route('habitaciones.index') }}">Habitaciones</a>
                        <a class="dropdown-item" href="{{ route('informes.index') }}">Informes</a>
                        <a class="dropdown-item" href="{{ route('estadias.index') }}">Estadías</a>
                        <a class="dropdown-item" href="{{ route('articulo.index') }}">Artículos</a>
                		<a class="dropdown-item" href="{{ route('reservas.index') }}">Reservas</a>
                		<a class="dropdown-item" href="{{ route('imagen.index') }}">Imagenes</a>
                        <a class="dropdown-item" href="{{ route('create.funcionario') }}">Registrar Funcionario</a>
                        <a class="dropdown-item" href="{{ route('checkin.index') }}">Check-in</a>
                        <a class="dropdown-item" href="{{ route('servicio.index') }}">Servicios</a>

	        		</div>
	    		</li>
			</ul>
	  	</div>
	</div>
	<span class="text-white">{{Auth::user()->nombre}} {{Auth::user()->apellido_paterno}} | {{Auth::user()->id_usuario}}</span>
	<li class="nav-item">
		<a class="nav-link text-light btn btn-danger mb-1 ml-3 mr-1 mt-1 p-1" href="{{ route('logout.usuario') }}"><i class="fas fa-sign-out-alt mr-1"></i></a>
	</li>
</nav>
@endif

@endauth

<!-- Navbar Sin inicio de sesión -->
@guest
<nav class="nav navbar navbar-expand-lg navbar-light shadow-lg bg-dark">

	<div class="container">
		<a class="navbar-brand text-light" href="{{ route('front.index') }}">Hostal Cousiño</a>
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon justify-content-end"></span>
  		</button>
	  	<div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
	    	<ul class="navbar-nav">
	      	<li class="nav-item active">
	        	<a class="nav-link text-light" href="{{ route('front.index') }}"><i class="fas fa-home mr-2"></i>Inicio</a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link text-light" href="{{ route('mensajes.create') }}"><i class="fas fa-id-card-alt mr-2"></i>Contacto</a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link text-light" href="{{ route('reservas.create') }}"><i class="fas fa-pencil-alt mr-2"></i>Reservar</a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link text-light" href="{{ route('front.about') }}"><i class="fas fa-info mr-2"></i>Acerca de</a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link text-light" href="{{ route('front.services') }}"><i class="fas fa-concierge-bell mr-2"></i>Servicios</a>
            </li>
	        <li class="nav-item">
	        	<a class="nav-link text-light btn btn-info mb-1 ml-1 mr-1 mt-1 p-1" href="{{ route('login') }}"><i class="fas fa-sign-out-alt mr-1"></i>Iniciar sesión</a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link text-light btn btn-secondary mb-1 ml-1 mr-1 mt-1 p-1" href="{{ route('create.usuario') }}"><i class="fas fa-user-plus"></i> Registrarse</a>
	      	</li>
	    	</ul>
	  </div>
</nav>
@endguest
