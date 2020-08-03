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
                            <th>Rut Pasajero</th>
                            <th>Inicio</th>
                            <th>Termino</th>
                            <th>Habitacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>EST001HAB001PAS001</td>
                            <td>19760917-6</td>
                            <td>18/07/1998</td>
                            <td>20/12/2020</td>
                            <td>Single - 15</td>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection