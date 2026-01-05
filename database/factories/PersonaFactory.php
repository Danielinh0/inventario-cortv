<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_persona' => $this->faker->name(),
            'apellido_persona' => $this->faker->lastName(),
            'email_persona' => $this->faker->unique()->safeEmail(),
            'departamento' => $this->faker->randomElement(['Ventas', 'Compras', 'Inventario', 'Administración', 'Soporte Técnico']),
            'fecha_creacion' => $this->faker->date(),
        ];
    }
}
