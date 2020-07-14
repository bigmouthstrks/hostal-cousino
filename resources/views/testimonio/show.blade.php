@extends('layouts.app')
@section('main')

<div class="m-2 row d-flex justify-content-center">
    <div class="p-5 shadow col-6">
        <div class="p-2">
            <h4 class="card-title"><strong>{{ $testimonio->id_testimonio }}</strong></h4>
            <p>Fecha de realización: <strong>{{ $testimonio->created_at}}</strong></p>
            <p>Comentario: <strong>{{$testimonio->comentario}}</strong></p>
            <h5>Calificación: <b>{{ $testimonio->calificacion }}/5</b></h5>
            <div class="p-2">
                <button type="button" class="btn btn-danger mr-2" data-toggle="modal" data-target="#confirmacion">Eliminar</button>
                <a href="{{ route('testimonios.index') }}" class="btn btn-warning">Volver</a>
            </div>
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
                ¿Está seguro de que desea eliminar la habitación {{ $testimonio->id_testimonio}}?
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{-- route('testimonios.destroy', $testimonio->id_testimonio) --}}#">
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
