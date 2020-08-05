@extends('layouts.app')
@section('main')

    <div class="d-flex justify-content-between p-2">
        <h3>Estadías</h3>
        <a class="btn btn-danger" href="#"><i class="fas fa-plus mr-2"></i>Agregar</a>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Estadía</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Termino</th>
                            <th>Id Check-in</th>
                            <th>Id Check-out</th>
                            <th>Id Pasajero</th>
                            <th>Id Reserva</th>
                            <th>Id Habitacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($estadias as $estadia)
                        <tr>
                            <td>{{ $estadia->id_estadia }}</td>
                            <td>{{ $estadia->fecha_inicio }}</td>
                            <td>{{ $estadia->fecha_termino }}</td>
                            <td>{{ $estadia->check_in_id }}</td>
                            <td>{{ $estadia->check_out_id }}</td>
                            <td>{{ $estadia->pasajero_id }}</td>
                            <td>{{ $estadia->reserva_id }}</td>
                            <td>{{ $estadia->habitacion_id }}</td>
                            <td>
                                <div class="container">
                                    <a data-toggle="tooltip" data-placement="top" title="Ver Detalles" href="#" class="btn btn-warning">
                                        <i class="fas fa-info-circle text-white"></i>
                                    </a>
                                    <a data-toggle="tooltip" data-placement="top" title="Modificar" href="#" class="btn btn-info">
                                        <i class="fas fa-edit"></i>
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
