<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Registro;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salida>
 */
class SalidaFactory extends Factory
{
    private static $usedIds = [];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_salida' => $this->getUniqueRegistroId(),
            'cantidad_salida' => $this->faker->numberBetween(1, 100),
            'solicitante' => $this->faker->name(),

        ];
    }
    private function getUniqueRegistroId()
    {
        $registroIds = Registro::pluck('id_registro')->toArray();
        $availableIds = array_diff($registroIds, self::$usedIds);

        if (empty($availableIds)) {
            throw new \Exception('No more unique IDs available.');
        }

        $uniqueId = $this->faker->randomElement($availableIds);
        self::$usedIds[] = $uniqueId;

        return $uniqueId;
    }
}
