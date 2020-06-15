@extends('layouts.app')
@section('main')

    <div class="row">
        <div class="col-6 offset-3">
            <div class="card mt-5">
                <div class="card-header bg-info text-white">INICIAR SESIÓN</div>
                <div class="card-body">
                    <h5 class="card-title">Ingrese sus datos</h5>
                    <form method="POST" action="{{ route('login.usuario') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="nombre@ejemplo.com" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <a href="{{ route('create.usuario') }}">¿Desea registrarse?</a>
                            </div>
                            <div class="col text-right">
                                <button type="submit" class="btn btn-info">Iniciar Sesión</button>
                            </div>
                        </div>

                        <h5></h5>

                        {{-- MENSAJES DE ERROR --}}
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        {{-- FIN MENSAJES DE ERROR --}}

                    </form>  
                </div>
            </div>
        </div>
    </div>
    

@endsection