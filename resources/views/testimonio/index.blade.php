@extends('layouts.app')
@section('main')

    <div class="d-flex justify-content-between p-2">
        <h3>Testimonios</h3>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Calificacion</th>
                            <th>Contenido</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testimonios as $testimonio)
                        <tr>
                            <td>{{ $testimonio->id_testimonio }}</td>
                            <td>{{ $testimonio->calificacion }}</td>
                            <td>{{ $testimonio->contenido }}</td>
                            <td>{{ $testimonio->fecha }}</td>
                            <td>
                                <div class="container">
                                    <a data-toggle="tooltip" data-placement="top" title="Ver Detalles" href="#" class="btn btn-info">
                                        <i class="fas fa-info-circle"></i>
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