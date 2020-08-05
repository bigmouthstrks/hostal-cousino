@extends('layouts.app')
@section('main')

    <div class="shadow ">
        <div class="card-block px-2 p-5 col-4">
            <h4 class="card-title"><strong>{{ $checkin->id_check_in }}</strong></h4>
            <p class="text-secondary">Fecha de llegada: {{ $checkin->fecha_llegada }}</p>
            <p class="text-secondary">Hora de llegada: {{ $checkin->hora_llegada }}</p>
            <p class="text-secondary">Cantidad de noches: {{ $checkin->cant_noches }}</p>
            <div class="d-flex justify-content-center p-2">
                <button type="button" class="btn btn-danger mr-2" data-toggle="modal" data-target="#confirmacion">Eliminar</button>
                <a href="{{ route('checkin.index') }}" class="btn btn-warning">Volver</a>
            </div>
        </div>
    </div>

@endsection
