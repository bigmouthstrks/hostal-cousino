@extends('layouts.app')
@section('main')


<h2 class="text-center">Registrar Servicio en Estadía</h2>
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

        <form class="p-4" method="POST" action="{{  route('estadia.store_service') }}">
            @csrf
            <div class="form-group">
                <label for="estadia_id">Id Estadia</label>
                <input type="text" name="estadia_id" id="estadia_id" class="form-control" readonly value="{{ $estadia->id_estadia }}">
            </div>
            <div class="form-group">
                <label for="servicio_id">Nombre servicio</label>
                <select class="form-control" name="servicio_id">
                    @foreach($servicios as $servicio)
                        <option value="{{ $servicio->id_servicio }}">{{ $servicio->nombre_servicio }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" class="form-control" name="cantidad" id="cantidad">
            </div>
            <hr>
            <button type="submit" class="btn btn-info">Guardar</button>
            <a href="{{ route('estadia.index') }}" class="btn btn-warning">Cancelar</a>
        </form>
    </div>
</div>

@endsection
