<?php

namespace App\Http\Controllers;
use Exception;
use App\Http\Requests\InformeAnualRequest;
use App\Http\Requests\InformeMensualRequest;
use App\Rules\RuleAñoInforme;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class InformeController extends Controller
{

    public function index()
    {
        return view('informe.index');
    }

    public function create_mensual(InformeMensualRequest $request)
    {
        /*
        Datos necesarios:
        - Tipo de habitación favorito-> Habitacion(tipo), Cant. de estadías mensual para ese tipo
        - Tipo de habitación menos preferido-> Habitacion(tipo), Cant. de estadías mensual para ese tipo
        - Habitación con más estadías-> Habitacion(numero), Cant. de estadías mensual para esa habitación
        - Habitación con menos estadías-> Habitacion(numero), Cant. de estadías mensual para esa habitación
        - Cantidad total de pasajeros-> Cant. total de pasajeros en el mes
        - Total de ingresos-> Suma de todos los pagos en el mes
        */

        try{

            $mes_ingresado = $request->mes_informe;
            $meses = [
                1 => 'Enero',
                2 => 'Febrero',
                3 => 'Marzo',
                4 => 'Abril',
                5 => 'Mayo',
                6 => 'Junio',
                7 => 'Julio',
                8 => 'Agosto',
                9 => 'Septiembre',
                10 => 'Octubre',
                11 => 'Noviembre',
                12 => 'Diciembre'
            ];

            $año_ingresado = $request->año_informe;

            $this->validate($request, ['año_informe' => new RuleAñoInforme]);

            $reservas = DB::table('reservas')
                            ->whereYear('created_at', $año_ingresado)
                            ->whereMonth('created_at', $mes_ingresado)
                            ->get();

            $cantidad_reservas = count($reservas);

            $current_date = [
                'date' => date('d/m/Y', time()),
                'time' => date('H:i:s a', time())
            ];

            $data = [
                'title' => 'Informe mensual',
                'mes' => $meses[$mes_ingresado],
                'año' => $año_ingresado,
                'total_ingresos' => '1.643.000',

                // Total de reservas en el mes (después cambiar por estadías) //
                'total_reservas' => $cantidad_reservas,

                // Habitación más demandada en el mes y su respectiva cnatidad //
                'hab_favorita' => '45',
                'hab_favorita_cant' => '12',

                // Habitación menos demandada en el mes y su respectiva cnatidad //
                'hab_menos_preferida' => '23',
                'hab_menos_preferida_cant' => '0',

                // Tipo de habitación con más reservas y su respectiva cantidad //
                'tipo_favorito' => 'Doble Matrimonial',
                'tipo_favorito_cant' => '18',

                // Tipo de habitación menos preferido y su respectiva cantidad //
                'tipo_menos_preferido' => 'Triple',
                'tipo_menos_preferido_cant' => '1',

                // Cantidad de pasajeros total recibida en el mes //
                'cant_pasajeros' => '58',
            ];

            $pdf = PDF::loadView('informe.create_mensual', $data, $current_date);
            return $pdf->download('informe_mensual.pdf');
        }catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }

    public function create_anual(InformeAnualRequest $request)
    {
        try{

            $año_ingresado = $request->año_informe;
            $this->validate($request, ['año_informe' => new RuleAñoInforme]);

            $current_date = [
                'date' => date('d/m/Y', time()),
                'time' => date('H:i:s a', time())
            ];

            $data = [
                'title' => 'Informe anual',
                'año' => $año_ingresado,
                'total_ingresos' => '1.643.000',

                // Habitación más demandada en el mes y su respectiva cnatidad //
                'hab_favorita' => '45',
                'hab_favorita_cant' => '12',

                // Habitación menos demandada en el mes y su respectiva cnatidad //
                'hab_menos_preferida' => '23',
                'hab_menos_preferida_cant' => '0',

                // Tipo de habitación con más reservas y su respectiva cantidad //
                'tipo_favorito' => 'Doble Matrimonial',
                'tipo_favorito_cant' => '18',

                // Tipo de habitación menos preferido y su respectiva cantidad //
                'tipo_menos_preferido' => 'Triple',
                'tipo_menos_preferido_cant' => '1',

                // Cantidad de pasajeros total recibida en el mes //
                'cant_pasajeros' => '58',
            ];

            $pdf = PDF::loadView('informe.create_anual', $data, $current_date);
            return $pdf->download('informe_anual.pdf');
        }catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
}
