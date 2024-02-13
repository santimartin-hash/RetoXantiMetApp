<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historico;
use Illuminate\Support\Facades\DB;

class HistoricoController extends Controller
{
    public function consultarHistorico(Request $request)
    {
       // Obtener los parámetros de consulta de la solicitud
       $fechaInicio = $request->query('fecha_inicio');
       $fechaFin = $request->query('fecha_fin');
       $nombreCapital = $request->query('nombre_capital');
   
        // Realizar la consulta para calcular el promedio de temperatura por mes
    $promedioTemperaturaPorMes = Historico::select(
        DB::raw('MONTH(FechaActualizacion) as mes'),
        DB::raw('AVG(Temperatura) as avg_temperatura')
    )
    ->where('NOMBRE_CAPITAL', $nombreCapital)
    ->whereBetween('FechaActualizacion', [$fechaInicio, $fechaFin])
    ->groupBy(DB::raw('MONTH(FechaActualizacion)'))
    ->get();
   
       // Devolver los resultados como JSON
       return response()->json($promedioTemperaturaPorMes);
    }
}
