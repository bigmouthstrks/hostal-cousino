@extends('layouts.app')
@section('style')
    <style>
        input {
        text-align: center;
        }

        ::-webkit-input-placeholder {
        text-align: center;
        }

        :-moz-placeholder {
        text-align: center;
        }
    </style>
@endsection
@section('main')

    @foreach ($habitacion as $habitacion)
        @php
            $room = $habitacion
        @endphp
    @endforeach

    <h2 class="text-center">Registrar Reserva</h2>
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

            <div class="alert alert-info alert-block row">
                <strong>La habitación se encuentra disponible</strong>
            </div>

            @include('partials.flash-message')

            <form class="p-4" method="POST" action="{{ route('reservas.store') }}">
                @csrf
                <div class="container">
                    <div class="row">
                      <div class="col-sm">
                        <div class="form-group">
                            <label for="tipo_habitacion" class="d-flex justify-content-center">Tipo</label>
                            <input id="tipo_habitacion" name="tipo_habitacion" value="{{ $room->tipo }}" class="form-control w-70 d-flex justify-content-center" placeholder="{{ $room->tipo }}" readonly>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="form-group">
                            <label for="tipo_habitacion" class="d-flex justify-content-center">Número</label>
                            <input id="numero" name="numero" value="{{ $room->numero }}" class="form-control w-70 d-flex justify-content-center" placeholder="{{ $room->numero }}" readonly>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="form-group">
                            <label for="tipo_habitacion" class="d-flex justify-content-center">Id habitación</label>
                            <input id="id_habitacion" name="id_habitacion" value="{{ $room->id_habitacion }}" class="form-control w-70" placeholder="{{ $room->id_habitacion }}" readonly>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="d-flex justify-content-center" for="fecha_llegada">Fecha inicio</label>
                                <input value="{{ $llegada ?? '' }}" class="form-control d-flex justify-content-center " id="fecha_llegada" name="fecha_llegada" placeholder="Fecha de llegada" readonly>
                            </div>
                        </div>
                        <div class="col">             
                            <div class="form-group">
                                <label class="d-flex justify-content-center" for="fecha_salida">Fecha salida</label>
                                <input value="{{ $salida ?? '' }}" class="form-control d-flex justify-content-center " id="fecha_salida" name="fecha_salida" placeholder="Fecha de salida" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-left">
                        <a href="{{ route('reservas.create') }}" class="btn btn-warning">Cancelar</a>                       
                    </div>
                    <div class="col text-right">
                        <button type="submit" class="btn btn-info">Registrar</button> 
                    </div>
                </div>            
            </form>
        </div>
    </div>
    
@endsection


