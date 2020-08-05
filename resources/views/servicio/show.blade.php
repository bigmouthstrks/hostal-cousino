@extends('layouts.app')
@section('main')

    <div class="shadow card flex-row flex-wrap m-2 row">
        <div class="card-block px-2 p-5 col-4">
            <h4 class="card-title"><strong>{{ $servicio->id_servicio }}</strong></h4>
            <p class="text-secondary">Servicio de {{ $servicio->nombre_servicio }}</p>
            <p>Precio de servicio: <strong>${{ $servicio->precio_servicio}}</strong></p>

            <div class="d-flex justify-content-center p-2">
                <button type="button" class="btn btn-danger mr-2" data-toggle="modal" data-target="#confirmacion">Eliminar</button>
                <a href="{{ route('servicio.index') }}" class="btn btn-warning">Volver</a>
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
            ¿Está seguro de que desea eliminar el servicio de {{ $servicio->nombre_servicio}}?
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('servicio.destroy', $servicio->id_servicio) }}">
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
