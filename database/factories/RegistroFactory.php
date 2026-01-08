<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{
    Producto,
    Persona
};
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\registro>
 */
class registroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'producto_id' => Producto::inRandomOrder()->first()->id_producto,
            'persona_id' => Persona::inRandomOrder()->first()->id_persona,
            'fecha_registro' => $this->faker->dateTimeBetween('1990-01-01', 'now'),
            //Tipo de registro: 0 = Salida, 1 = Entrada
            'tipo_registro' => $this->faker->boolean(),
            'cantidad_registro' => $this->faker->numberBetween(0, 100),
            
        ];
    }
}
