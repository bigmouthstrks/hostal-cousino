@extends('layouts.app')
@section('main')

    <div class="shadow card flex-row flex-wrap m-2 row">
        @if(count($imagenes) >= 1)
            <div class="mt-5 border-0 col-8">
                    <div id="carouselExampleIndicators" class="carousel slide shadow-lg mb-4" data-ride="carousel">
                        <ol class="carousel-indicators d-none d-md-flex">
                            @foreach($imagenes as $key => $imagen)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" @if($key == 0) class="active" @endif></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($imagenes as $key => $imagen)
                                @if ($imagen == '' or $imagen == null)
                                    Sin imágen
                                @else
                                    <div class="carousel-item @if($key == 0) active @endif">
                                        <img class="d-block w-100" src="{{ Storage::url($imagen->ruta_imagen) }}" alt="First slide">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                        </a>
                </div>
            </div>
        @else
            <div class="mt-5 border-0 col-8 d-flex justify-content-center">
                <p>Sin imagenes</p>
            </div>
        @endif
        <div class="card-block px-2 p-5 col-4">
            <h4 class="card-title"><strong>{{ $habitacion->id_habitacion }}</strong></h4>
            <p class="text-secondary">{{ $habitacion->descripcion }}</p>
            <p>Cantidad de camas: <strong>{{ $habitacion->cant_camas}}</strong></p>
            <p>Tipo de habitación: <strong>{{ $habitacion->tipo }}</strong></p>
            <p>Estado: <strong>{{ Str::ucfirst($habitacion->estado) }}</strong></p>
            <p>Número: <strong>{{$habitacion->numero}}</strong></p>
            <h5>Precio por noche: <b>$ {{ $habitacion->precio_noche / 1000  . '.000' }}</b></h5>

            <div class="d-flex justify-content-center p-2">
                <button type="button" class="btn btn-danger mr-2" data-toggle="modal" data-target="#confirmacion">Eliminar</button>
                <a href="{{ route('habitaciones.index') }}" class="btn btn-warning">Volver</a>
            </div>
        </div>
    </div>

    {{--
        Modal de confirmación de eliminación
    --}}
    <div class="modal fade" id="confirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
            ¿Está seguro de que desea eliminar la habitación {{ $habitacion->id_habitacion }}?
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('habitaciones.destroy', $habitacion->id_habitacion) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Confirmar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
        </div>
    </div>

@endsection
