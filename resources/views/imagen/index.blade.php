
@extends('layouts.app')
@section('main')

    <div class="d-flex justify-content-between p-2">
        <h3>Imágenes de habitaciones</h3>
        <a class="btn btn-danger" href="{{ route('imagen.create') }}"><i class="fas fa-plus mr-2"></i>Agregar</a>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Imagen</th>
                            <th>ID Habitacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($imagenes as $imagen)
                        <tr>
                            <td>{{ $imagen->id_imagen }}</td>
                            <td>{{ $imagen->habitacion_id }}</td>
                            <td>
                                <div class="container">
                                    <a data-toggle="tooltip" data-placement="top" title="Ver Detalles" href="{{ route('imagen.show', $imagen->id_imagen) }}" class="btn btn-warning">
                                        <i class="fas fa-info-circle text-white"></i>
                                    </a>
                                    <a data-toggle="tooltip" data-placement="top" title="Modificar" href="{{ route('imagen.edit', $imagen->id_imagen) }}" class="btn btn-info">
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
