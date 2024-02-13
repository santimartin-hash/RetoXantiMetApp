<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class HistoricoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ciudades = [
            'Irun' => '43.3371, -1.7885',
            'Errenteria' => '43.3097, -1.9035',
            'Hondarribia' => '43.3689, -1.7993',
            'Usurbil' => '43.2657, -2.0401',
            'Donostia/San Sebastian' => '43.3183, -1.9807',
        ];
        
        $estado_cielo = ['Nuboso', 'Soleado', 'Nublado'];
        
        // Generar una fecha aleatoria dentro de un rango
        $fecha = $this->faker->dateTimeBetween('2023-01-01', '2023-12-31')->format('Y-m-d');
        
        $nombre_ciudad = $this->faker->randomElement(array_keys($ciudades));
        $coordenadas = $ciudades[$nombre_ciudad];
        
        return [
            'NOMBRE_CAPITAL' => $nombre_ciudad,
            'Coordenadas' => $coordenadas,
            'Descripcion' => $this->faker->randomElement($estado_cielo),
            'Temperatura' => $this->faker->randomFloat(2, -10, 40), // Temperatura en grados Celsius
            'SensacionTermica' => $this->faker->randomFloat(2, -10, 40), // Sensación térmica en grados Celsius
            'Presion' => $this->faker->randomFloat(2, 900, 1100), // Presión atmosférica en hPa
            'Humedad' => $this->faker->randomFloat(2, 0, 100), // Humedad relativa en porcentaje
            'VelocidadDelViento' => $this->faker->randomFloat(2, 0, 30), // Velocidad del viento en km/h
            'FechaActualizacion' => $fecha,
        ];
        
    }

    /**
     * Define the state of the factory.
     *
     * @param string $ciudad
     * @return $this
     */
    public function ciudad(string $ciudad): HistoricoFactory
    {
        return $this->state(function (array $attributes) use ($ciudad) {
            return ['NOMBRE_CAPITAL' => $ciudad];
        });
    }
}