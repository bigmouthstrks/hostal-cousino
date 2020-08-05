@extends('layouts.app')
@section('main')

<div class="d-flex justify-content-between p-2">
    <h3>Reservas</h3>
    <a class="btn btn-danger" href="{{ route('reservas.create') }}"><i class="fas fa-plus mr-2"></i>Nueva reserva</a>
</div>
<div class="row">
    <div class="col">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Término</th>
                        <th>Usuario</th>
                        <th>Fecha reserva</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservas as $reserva)
                    <tr>
                        <td>{{ $reserva->id_reserva }}</td>
                        <td>{{ $reserva->inicio }}</td>
                        <td>{{ $reserva->termino }} </td>
                        <td>{{ $reserva->usuario_id }}</td>
                        <td>{{ $reserva->created_at }}</td>
                        <td>
                            <div class="container">
                                <a data-toggle="tooltip" data-placement="top" title="Ver Detalles" href="{{ route('reservas.show', $reserva->id_reserva) }}" class="btn btn-warning">
                                    <i class="fas fa-info-circle text-white"></i>
                                </a>
                                <a data-toggle="tooltip" data-placement="top" title="Modificar" href="{{ route('reservas.edit', $reserva->id_reserva) }}" class="btn btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a data-toggle="tooltip" data-placement="top" title="Check-in" href="{{ route('checkin.create', $reserva->id_reserva) }}" class="btn btn-success">
                                    <i class="fas fa-check"></i>
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
