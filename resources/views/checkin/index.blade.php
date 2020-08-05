
@extends('layouts.app')
@section('main')

    <div class="d-flex justify-content-between p-2">
        <h3>Check-in</h3>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Fecha llegada</th>
                            <th>Hora llegada</th>
                            <th>Cantidad noches</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lista_checkin as $checkin)
                        <tr>
                            <td>{{ $checkin->id_check_in }}</td>
                            <td>{{ $checkin->fecha_llegada }}</td>
                            <td>{{ $checkin->hora_llegada }}</td>
                            <td>{{ $checkin->cant_noches }}</td>
                            <td>
                                <div class="container">
                                    <a data-toggle="tooltip" data-placement="top" title="Ver Detalles" href="{{ route('checkin.show', $checkin->id_check_in) }}" class="btn btn-warning">
                                        <i class="fas fa-info-circle text-white"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
