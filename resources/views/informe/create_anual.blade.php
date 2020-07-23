@extends('layouts.informe')
@section(@'main')

    <div class="p-3" id="contenedor_principal">
        <p class="text-center font-weight-bold" id="titulo_documento"> {{ $title . ' ' . $año }}</p>
        <p class="text-center text-secondary"><small>{{ 'Generado por ' . Auth::user()->nombre . ' ' . Auth::user()->apellido_paterno . ' el ' . $date . ' a las ' . $time }}</small></p>
        <hr>
        <ul>
            <li>
                <p>Tipo de habitación favorito: <strong>{{ $tipo_favorito . ' (' . $tipo_favorito_cant .  ' estadías)' }}</strong></p>
            </li>
            <li>
                <p>Tipo de habitación menos preferido: <strong>{{ $tipo_menos_preferido . ' (' . $tipo_menos_preferido_cant . ' estadías)' }}</p>
            </li>
            <li>
                <p>Habitación con más estadías: <strong>Nº {{ $hab_favorita . ' (' . $hab_favorita_cant . ' estadías)' }}</strong></p>
            </li>
            <li>
                <p>Habitación con menos estadías: <strong>Nº {{ $hab_menos_preferida . ' (' . $hab_menos_preferida_cant . ' estadías)' }}</strong></p>
            </li>
            <li>
                <p>Cantidad total de pasajeros: <strong>{{ $cant_pasajeros . ' personas' }}</strong></p>
            </li>
        </ul>
        <hr>
        <p class="font-weight-bold text-center" id="ingreso_mensual">Total de ingresos: ${{ $total_ingresos }}.-</p>
    </div>

@endsection
