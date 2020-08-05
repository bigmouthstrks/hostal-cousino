@extends('layouts.app')
@section('main')


    <div class="shadow card flex-row flex-wrap m-2 row">
        <div class="mt-5 border-0 col-8">
            <img src="{{ Storage::url($imagen->ruta_imagen) }}" class="img-fluid" alt="Imágen habitación">
        </div>
        <div class="card-block px-2 p-5 col-4">
            <h4 class="card-title"><strong>{{ $imagen->id_imagen }}</strong></h4>
            <p class="text-secondary">Ésta imágen corresponde a la habitación: {{ $imagen->habitacion_id }}</p>
            <p class="text-secondary">{{ $imagen->ruta_imagen }}</p>
            <div class="d-flex justify-content-center p-2">
                <button type="button" class="btn btn-danger mr-2" data-toggle="modal" data-target="#confirmacion">Eliminar</button>
                <a href="{{ route('imagen.index') }}" class="btn btn-warning">Volver</a>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
            ¿Está seguro de que desea eliminar la imagen {{ $imagen->id_imagen}}?
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('imagen.destroy', $imagen->id_imagen) }}">
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
