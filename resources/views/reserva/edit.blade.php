@extends('layouts.app')
@section('main')

    <h2 class="text-center">Detalles de reserva</h2>
    <div class="row d-flex justify-content-center">
        <div class="p-4 pt-2 shadow col-6">
            <div class="p-2">
                <h4 class="card-title">ID Reserva: {{ $reserva->id_reserva }}</h4>
                <h5>Fecha de realización: <b>{{ $reserva->created_at}}</b></h5>
                <h5>Registrada por usuario: <b>{{ $reserva->id_usuario }}</b></h5>
                <h5>Estado actual: <b>{{ $reserva->estado }}</b></h5>
                <h5>Fecha llegada: <b>{{ $reserva->inicio }}</b></h5>
                <h5>Fecha salida <b>{{ $reserva->termino }}</b></h5>
                <h5>Ultima actualizacion: <b>{{ $reserva->updated_at }}</b></h5>
                <div class="p-2">
                    <button type="button" class="btn btn-danger mr-2 w-50" data-toggle="modal" data-target="#confirmacion"><b>Cancelar</b></button>
                    <a href="{{ route('reservas.index') }}" class="btn btn-warning">Volver</a>
                </div>
            </div>
        </div>
    </div>

@endsection
