@extends('layouts.app')
@section('main')


	<h2 class="title text-center">Reservar</h2>
	<div class="container row d-flex justify-content-center">
		<div class="col-6 border rounded p-3">
            <form method="POST" action="{{ route('reservas.store') }}">
                @csrf
				<div class="form-group">
					<label for="fecha_llegada">Fecha llegada:</label>
					<input type="date" class="form-control" id="fecha_llegada">
				</div>
				<div class="form-group">
					<label for="fecha_salida">Fecha salida:</label>
					<input type="date" class="form-control" id="fecha_salida">
				</div>
				<div class="form-group">
					<label for="cantidad_adultos">Cantidad de Adultos</label>
					<input type="number" max="5" min="1" class="form-control" id="cantidad_adultos" placeholder="Cantidad de adultos">
				</div>
				<div class="form-group">
					<label for="cantidad_niños">Cantidad de Niños</label>
					<input type="number" max="2" min="0" class="form-control" id="cantidad_niños" placeholder="Cantidad de niños">
				</div>
				<hr>
				<button type="submit" class="btn btn-info">Confirmar</button>
				<button type="reset" class="btn btn-danger">Cancelar</button>
			</form>
		</div>
	</div>

@endsection
