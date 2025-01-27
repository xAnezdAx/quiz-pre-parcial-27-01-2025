<?php

namespace Database\Factories;

use App\Models\Generos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\bandas>
 */
class BandasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word,
            'genero_id' => Generos::factory(),
        ];
    }
}
