@extends('layouts.app')
@section('main')

	<h2 class="title text-center">Habitaciones</h2>

	<div class="card flex-row flex-wrap">
        <div class="card-header border-0">
            <img src="//placehold.it/700x400" alt="">
        </div>
        <div class="card-block px-2 p-5">
            <h4 class="card-title">Doble</h4>
            <p class="card-text text-secondary">Sencilla habitación para dos personas.</p>
			<p class="card-text"><i class="fas fa-bed mr-2"></i>2 Camas Individuales</p>
			<p class="card-text"><i class="fas fa-toilet mr-2"></i>Baño privado</p>
            <p class="card-text"><i class="fas fa-user mr-1"></i><i class="fas fa-user mr-2"></i>2 Personas</p>
            <a href="#" class="btn btn-info w-100">Ver Disponibilidad</a>
        </div>
    </div>

    <div class="card flex-row flex-wrap">
        <div class="card-header border-0">
            <img src="//placehold.it/700x400" alt="">
        </div>
        <div class="card-block px-2 p-5">
            <h4 class="card-title">Doble</h4>
            <p class="card-text text-secondary">Elegante habitación para dos personas.</p>
			<p class="card-text"><i class="fas fa-bed mr-2"></i>1 Cama doble</p>
			<p class="card-text"><i class="fas fa-toilet mr-2"></i>Baño privado</p>
			<p class="card-text"></i><i class="fas fa-user mr-1"></i><i class="fas fa-user mr-2"></i>2 Personas</p>
            <a href="#" class="btn btn-info w-100">Ver Disponibilidad</a>
        </div>
    </div>

    <div class="card flex-row flex-wrap">
        <div class="card-header border-0">
            <img src="//placehold.it/700x400" alt="">
        </div>
        <div class="card-block px-2 p-5">
            <h4 class="card-title">Familiar</h4>
            <p class="card-text text-secondary">Amplia habitación para toda la familia.</p>
            <p class="card-text"><i class="fas fa-bed mr-2"></i>5 Camas Individuales</p>
            <p class="card-text"><i class="fas fa-toilet mr-2"></i>Baño compartido</p>
            <p class="card-text"><i class="fas fa-user mr-1"></i><i class="fas fa-user mr-1"></i><i class="fas fa-user mr-1"></i><i class="fas fa-user mr-1"></i><i class="fas fa-user mr-2"></i>5 Personas</p>
            <a href="#" class="btn btn-info w-100">Ver Disponibilidad</a>
        </div>
    </div>

    <div class="card flex-row flex-wrap">
        <div class="card-header border-0">
            <img src="//placehold.it/700x400" alt="">
        </div>
        <div class="card-block px-2 p-5">
            <h4 class="card-title">Triple</h4>
            <p class="card-text text-secondary">Cómoda habitación para tres personas.</p>
            <p class="card-text"><i class="fas fa-bed mr-2"></i>1 Cama Matrimonial</p>
            <p class="card-text"><i class="fas fa-toilet mr-2"></i>Baño compartido</p>
            <p class="card-text"><i class="fas fa-user mr-1"></i><i class="fas fa-user mr-1"></i><i class="fas fa-user mr-2"></i>3 Personas</p>
            <a href="#" class="btn btn-info w-100">Ver Disponibilidad</a>
        </div>
    </div>

@endsection