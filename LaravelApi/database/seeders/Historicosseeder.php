<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Historico;
use Carbon\Carbon;

class Historicosseeder extends Seeder
{
    /**Run the database seeds.*/
  public function run(): void{$ciudades = ['Irun', 'Errenteria', 'Hondarribia', 'Usurbil', 'Donostia/San Sebastian'];

        foreach ($ciudades as $ciudad) {
            $fecha = Carbon::create(2023, 1, 1); // Inicializar la fecha en '2023-01-01'

            for ($i = 0; $i < 365; $i++) {
                Historico::factory()->ciudad($ciudad)->create([
                    'FechaActualizacion' => $fecha->format('Y-m-d'),
                ]);
                // Incrementar la fecha en un día para la próxima iteración
                $fecha->addDay();
            }
        }
    }
}