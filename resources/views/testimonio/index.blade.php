@extends('layouts.app')
@section('main')

    <div class="d-flex justify-content-between p-2">
        <h3>Testimonios</h3>
        <a class="btn btn-danger" href="{{ route('testimonios.create') }}"><i class="fas fa-plus mr-2"></i>Agregar</a>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Calificacion</th>
                            <th>Fecha creación</th>
                            <th>Hora creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testimonios as $testimonio)
                        <tr>
                            <td>{{ $testimonio->id_testimonio }}</td>
                            <td>{{ $testimonio->calificacion }}/5</td>
                            <td>{{ date('d m Y' ,strtotime($testimonio->created_at)) }}</td>
                            <td>{{ date('H:m:s A' ,strtotime($testimonio->created_at)) }}</td>
                            <td>
                                <div class="container">
                                    <a data-toggle="tooltip" data-placement="top" title="Ver Detalles" href="{{ route('testimonios.show',$testimonio->id_testimonio) }}" class="btn btn-info">
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
