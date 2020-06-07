@extends('layouts.app')
@section('main')
    
    <div class="d-flex justify-content-between p-2">
        <h3>Habitaciones</h3>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Búsqueda" aria-label="Search">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Filtrar por
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">ID</a>
                  <a class="dropdown-item" href="#">Tipo</a>
                  <a class="dropdown-item" href="#">Estado</a>
                  <a href="#" class="dropdown-item">Cant. camas</a>
                </div>
              </div>
        </form>
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