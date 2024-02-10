<?php

namespace Database\Factories;

use App\Models\Etiqueta;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtiquetaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Etiqueta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $colores = ['#ffb3ba', '#ffdfba', '#ffffba', '#baffc9', '#bae1ff', '#ffc1ff', '#ffdfba', '#baffc9', '#bae1ff', '#ffc1ff'];
        $nombreEtiquetas = ['En Proceso', 'Realizado', 'Cancelado', 'Pendiente', 'Urgente', 'Importante', 'Tarea', 'Revisión', 'Completado', 'Prioritario'];

        return [
            'nombre' => $this->faker->unique()->randomElement($nombreEtiquetas),
            'color' => $this->faker->randomElement($colores),
        ];
    }
}
