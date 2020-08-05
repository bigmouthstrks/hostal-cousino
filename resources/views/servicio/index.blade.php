@extends('layouts.app')
@section('main')

<div class="d-flex justify-content-between p-2">
    <h3>Servicios</h3>
    <a class="btn btn-danger" href="{{ route('servicio.create') }}"><i class="fas fa-plus mr-2"></i>Nuevo</a>
</div>
<div class="row">
    <div class="col">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($servicios as $servicio)
                    <tr>
                        <td>{{ $servicio->id_servicio }}</td>
                        <td>{{ $servicio->nombre_servicio }}</td>
                        <td>${{ $servicio->precio_servicio }}</td>
                        <td>
                            <div class="container">
                                <a data-toggle="tooltip" data-placement="top" title="Ver Detalles" href="{{ route('servicio.show', $servicio->id_servicio) }}" class="btn btn-warning">
                                    <i class="fas fa-info-circle text-white"></i>
                                </a>
                                <a data-toggle="tooltip" data-placement="top" title="Modificar" href="{{ route('servicio.edit', $servicio->id_servicio) }}" class="btn btn-info">
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
