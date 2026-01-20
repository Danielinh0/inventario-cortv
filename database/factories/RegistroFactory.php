<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{
    Producto,
    User,
    Log,
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
        $producto = Producto::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();
        $tipo = $this->faker->boolean();

        Log::create([
            'user_id' => $user->id,
            'action' => 'Creación de registro de '.($tipo ? 'entrada' : 'salida').' de producto ID '.$producto->id_producto,
        ]);


        return [
            'producto_id' => $producto->id_producto,
            'user_id' => $user->id,
            'fecha_registro' => $this->faker->dateTimeBetween('1990-01-01', 'now'),
            //Tipo de registro: 0 = Salida, 1 = Entrada
            'tipo_registro' => $tipo,
            'cantidad_registro' => $this->faker->numberBetween(0, 100),
            
        ];
    }
}
