@extends('layouts.app')
@section('main')

    <div class="d-flex justify-content-between p-2">
        <h3>Artículos</h3>
        <a class="btn btn-danger" href="{{ route('articulo.create') }}"><i class="fas fa-plus mr-2"></i>Agregar</a>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articulos as $articulo)
                        <tr>
                            <td>{{ $articulo->id_articulo }}</td>
                            <td>{{ $articulo->nombre_articulo }}</td>
                            <td>
                                <div class="container">
                                    <a data-toggle="tooltip" data-placement="top" title="Ver Detalles" href="{{ route('articulo.show', $articulo->id_articulo) }}" class="btn btn-warning">
                                        <i class="fas fa-info-circle text-white"></i>
                                    </a>
                                    <a data-toggle="tooltip" data-placement="top" title="Modificar" href="{{ route('articulo.edit', $articulo->id_articulo) }}" class="btn btn-info">
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
