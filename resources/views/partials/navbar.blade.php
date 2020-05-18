
<!-- Navbar Responsiva con opción de menú 'sandwich' para moviles -->
<nav class="nav navbar navbar-expand-lg navbar-light bg-dark">
	<div class="container">
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon justify-content-end"></span>
  		</button>
	  	<div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
	    	<ul class="navbar-nav">
	      	<li class="nav-item active">
	        	<a class="nav-link text-light" href="#">Inicio</a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link text-light" href="{{ route('mensajes.create') }}">Contacto</a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link text-light" href="#">Reservar</a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link text-light" href="#">Acerca de</a>
	      	</li>
	      	<li class="nav-item dropdown">
        		<a class="nav-link dropdown-toggle text-light btn btn-info mb-1 ml-1 mr-1" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Mi Cuenta
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="#">Action</a>
	          <a class="dropdown-item" href="#">Another action</a>
	          <a class="dropdown-item" href="#">Something else here</a>
	        </div>
	    	</li>
	      	<li class="nav-item">
	        	<a class="nav-link text-light btn btn-danger mb-1 ml-1 mr-1" href="#">Cerrar sesión</a>
	      	</li>
	    </ul>
	  </div>
	  </div>
</nav>


<!-- Navbar Sin inicio de sesión
<div class="p-1">
	<ul class="container">
		<div class="nav justify-content-center">
			<li class="nav-item">
				<a href="#" class="nav-link text-light">Inicio</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link text-light">Contacto</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link text-light">Reservar</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link text-light">Acerca de</a>
			</li>
			<li class="nav-item">
				<a href="#" class="btn btn-info nav-link text-light ml-2">Iniciar Sesión</a>
			</li>
			<li class="nav-item">
				<a href="#" class="btn btn-danger nav-link text-light ml-2">Registrarse</a>
			</li>
		</div>
	</ul>
</div>
-->

<!-- Navbar con inicio de sesión
<div class="bg-dark">
	<ul class="container pt-2 pb-2">
		<div class="nav justify-content-center">
			<li class="nav-item">
				<a href="#" class="nav-link text-light">Inicio</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link text-light">Contacto</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link text-light">Reservar</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link text-light">Acerca de</a>
			</li>
            <li class="nav-item ml-2">
                <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle p-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Mi Cuenta
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Reservas</a>
                        <a class="dropdown-item" href="#">Estadías</a>
                        <a class="dropdown-item" href="#">Configuración</a>
                        <a class="dropdown-item" href="#">Cerrar sesión</a>
                    </div>
                </div>
            </li>
			<li class="nav-item">
				<div>
					<a href="#" class="btn btn-danger nav-link text-light ml-2 p-2">Cerrar sesión</a>
				</div>
			</li>
		</div>
	</ul>
</div>

-->