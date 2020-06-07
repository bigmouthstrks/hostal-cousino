@extends('layouts.app')
@section('main')

    <h2>Agregar Habitación</h2>
    <div class="container">
		<form>
			<div class="form-group">
				<label for="exampleInputEmail1">Estado:</label>
				<input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Cantidad de Camas:</label>
				<input type="date" class="form-control" id="exampleInputPassword1">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Tipo:</label>
				<input type="number" class="form-control" id="exampleInputPassword1" placeholder="Cantidad de adultos">
            </div>
			<div class="form-group">
				<label for="exampleInputPassword1">Precio por noche:</label>
				<input type="number" class="form-control" id="exampleInputPassword1" placeholder="Cantidad de adultos">
            </div>
			<div class="form-group">
				<label for="exampleInputPassword1">Tamaño:</label>
				<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Cantidad de adultos">
            </div>
			<div class="form-group">
                <label for="files">Imágenes:</label>
                <input type="file" class="form-control" id="files" name="files" multiple>
			</div>
			<hr>
			<button type="submit" class="btn btn-info">Confirmar</button>
			<button type="reset" class="btn btn-danger">Cancelar</button>
		  </form>
	</div>

@endsection