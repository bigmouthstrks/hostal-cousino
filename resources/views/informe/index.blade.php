@extends('layouts.app')
@section('main')

    <h2 class="text-center">Generar informes</h2>

    <div class="container row justify-content-center">
		<div class="d-inline col-12 col-md-8 col-lg-6 shadow rounded mb-4">
            {{-- Mostrar mensajes de error si existen --}}
            @if ($errors->any())
                <div class="alert alert-danger mt-2 mb-0">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @include('partials.flash-message')

            <div class="container justify-content-center p-5">
                <p>Tipo de informe:</p>
                <div class="form-check p-2 m-2">
                    <input class="form-check-input" onchange="checkType();" type="radio" name="tipo_informe" id="informe_mensual" value="1">
                    <label class="form-check-label" for="informe_mensual">Informe mensual</label>
                </div>
                <div class="form-check p-2 m-2">
                    <input class="form-check-input" onchange="checkType();" type="radio" name="tipo_informe" id="informe_anual" value="2">
                    <label class="form-check-label" for="informe_anual">Informe anual</label>
                </div>

                <p class="text-center text-secondary" id="mensaje_inicial">Seleccione tipo de informe</p>

                <div class="form-group border rounded p-5" id="date-div" hidden>
                    <form method="POST" id="form_informe">
                        @csrf
                        <div id="div_año" class="form-group">
                            <label for="año_informe">Seleccione año: </label>
                            <input name="año_informe" id="año_informe" type="text" class="form-control @error('año_informe') is-invalid @enderror" placeholder="Ingrese año">
                        </div>
                        <div id="div_mes" class="form-group mt-2">
                            <label for="mes_informe">Seleccione mes: </label>
                            <select class="form-control @error('mes_informe') is-invalid @enderror" name="mes_informe" id="mes_informe">
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                              </select>
                        </div>
                        <div id="div_button" class="mt-2">
                        <button type="submit" class="w-100 btn btn-info" id="btn_generar">Generar informe</button>
                        </div>
                    </form>
                </div>
            </div>
		</div>
    </div>

@endsection

@section('scripts')
    <script>
        function checkType(){
            var tipos = document.getElementsByName('tipo_informe');
            var container = document.getElementById('date-div');

            // asigna valor true o false a la variable según si el radio button está o no activo //
            var informeMensual = tipos[0].checked;
            var informeAnual = tipos[1].checked;
            document.getElementById('mensaje_inicial').hidden = true;

            if( informeAnual ){
                document.getElementById('form_informe').action = "{{ route('informe.create_anual') }}";
                document.getElementById('date-div').hidden = false;
                document.getElementById('div_mes').hidden = true;
                document.getElementById('')
                console.log('El informe es de tipo ANUAL');
            }else{
                if ( informeMensual ){
                    document.getElementById('form_informe').action = "{{ route('informe.create_mensual') }}";
                    document.getElementById('date-div').hidden = false;
                    document.getElementById('div_mes').hidden = false;
                    console.log('El informe es de tipo MENSUAL');
                }
            }
        }
    </script>
@endsection
