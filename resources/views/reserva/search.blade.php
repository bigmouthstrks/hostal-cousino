@extends('layouts.app')
@section('main')

    <h2 class="text-center">Reserva de habitación</h2>
    <div class="row d-flex justify-content-center pb-5">
        <div class="shadow col-6 mt-3">
            {{-- Mostrar mensajes de error si existen --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @include('partials.flash-message')

            <form class="p-4" method="POST" action="{{  route('reservas.consultar')  }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <h5>Tipo de habitación: <strong>{{ $tipo }}</strong></h5>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input id="tipo_habitacion" name="tipo_habitacion" value="{{ $tipo }}" class="form-control w-50 invisible" placeholder="Tipo de habitación seleccionado: {{ $tipo }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_habitacion">Seleccione habitación</label>
                    <select class="form-control" id="id_habitacion" name="id_habitacion">
                        @foreach ($habitaciones as $habitacion)
                            <option value={{$habitacion->id_habitacion}}>{{ "Numero: $habitacion->numero - ID: $habitacion->id_habitacion " }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="fecha_llegada">Fecha inicio</label>
                    <input value="{{ $hoy ?? '' }}" type="date" class="form-control" id="fecha_llegada" name="fecha_llegada" placeholder="Fecha de llegada">
                </div>
                <div class="form-group">
                    <label for="fecha_salida">Fecha salida</label>
                    <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" placeholder="Fecha de salida">
                </div>
                <button type="submit" class="btn btn-info">Consultar</button>
                <a href="{{ route('reservas.create') }}" class="btn btn-warning">Cancelar</a>
            </form>
        </div>
    </div>
    
@endsection


