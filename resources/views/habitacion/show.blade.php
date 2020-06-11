@extends('layouts.app')
@section('main')

<div class="card flex-row flex-wrap m-2">
    <div class="card-header border-0">
        <img src="//placehold.it/700x400" alt="">
    </div>
    <div class="card-block px-2 p-5">
        <h4 class="card-title">{{ $habitacion->id_habitacion }}</h4>
        <p>Cantidad de camas: {{ $habitacion->cant_camas}}</p>
        <p>Tipo de habitación: {{ $habitacion->tipo }}</p>
        <p>Estado: {{ Str::ucfirst($habitacion->estado) }}</p>
        <p>Número: {{ $habitacion->numero }}</p>
        <h5>Precio por noche: <b>${{ $habitacion->precio_noche }}</b></h5>

        <div class="d-flex justify-content-center p-2">
            <button type="button" class="btn btn-danger mr-2" data-toggle="modal" data-target="#confirmacion">Eliminar</button>
            <a href="{{ route('habitaciones.index') }}" class="btn btn-warning">Volver</a>
        </div>
    </div>
</div>

{{--
    Modal de confirmación de eliminación
--}}
  <div class="modal fade" id="confirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          ¿Está seguro de que desea eliminar la habitación {{ $habitacion->id_habitacion }}?
        </div>
        <div class="modal-footer">
            <form method="POST" action="{{ route('habitaciones.destroy', $habitacion->id_habitacion) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Confirmar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection
