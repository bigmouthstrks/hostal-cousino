@extends('layouts.app')
@section('main')

<div class="shadow card flex-row flex-wrap m-2 row">
    <div class="mt-5 border-0 col-8">
        <img src="{{ Storage::url($habitacion->imagen) }}" class="img-fluid" alt="Imágen habitación">
    </div>
    <div class="card-block px-2 p-5 col-4">
        <h4 class="card-title"><strong>{{ $habitacion->id_habitacion }}</strong></h4>
        <p class="text-secondary">{{ $habitacion->descripcion }}</p>
        <p>Cantidad de camas: <strong>{{ $habitacion->cant_camas}}</strong></p>
        <p>Tipo de habitación: <strong>{{ $habitacion->tipo }}</strong></p>
        <p>Tamaño: <strong>{{$habitacion->tamaño}}</strong></p>
        <p>Estado: <strong>{{ Str::ucfirst($habitacion->estado) }}</strong></p>
        <p>Número: <strong>{{$habitacion->numero}}</strong></p>
        <h5>Precio por noche: <b>$ {{ $habitacion->precio_noche / 1000  . '.000' }}</b></h5>

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
