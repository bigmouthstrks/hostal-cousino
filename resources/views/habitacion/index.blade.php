@extends('layouts.app')
@section('main')

    <div class="d-flex justify-content-between p-2">
        <h3>Habitaciones</h3>
        <a class="btn btn-danger" href="{{ route('habitaciones.create') }}"><i class="fas fa-plus mr-2"></i>Agregar</a>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Cantidad Camas</th>
                            <th>Precio Noche</th>
                            <th>Número</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($habitaciones as $habitacion)
                        <tr>
                            <td>{{ $habitacion->id_habitacion }}</td>
                            <td>{{ Str::ucfirst($habitacion->tipo) }}</td>
                            <td>{{ Str::ucfirst($habitacion->estado) }}</td>
                            <td>{{ $habitacion->cant_camas }}</td>
                            <td>{{ $habitacion->precio_noche }} </td>
                            <td>{{ $habitacion->numero }}</td>
                            <td>
                                <div class="container">
                                    <a data-toggle="tooltip" data-placement="top" title="Ver Detalles" href="{{ route('habitaciones.show',$habitacion->id_habitacion) }}" class="btn btn-info">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a data-toggle="tooltip" data-placement="top" title="Modificar" href="{{ route('habitaciones.edit',$habitacion->id_habitacion) }}" class="btn btn-info">
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
