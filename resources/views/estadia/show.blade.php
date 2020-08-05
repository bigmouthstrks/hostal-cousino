@extends('layouts.app')
@section('main')

    <div class="shadow card flex-row flex-wrap m-2 row">
        <div class="card-block px-2 p-5 col-4">
            <h4 class="card-title"><strong>{{ $estadia->id_estadia }}</strong></h4>

            <div class="d-flex justify-content-center p-2">
                <a href="{{ route('estadia.index') }}" class="btn btn-warning">Volver</a>
            </div>
        </div>
    </div>

@endsection
