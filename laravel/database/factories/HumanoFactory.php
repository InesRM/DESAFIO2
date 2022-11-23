<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HUmanoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'dios-protector' => fake()->randomElement(['Zeus', 'Poseidon', 'Hades']),//esto está pendiente del algoritmo de asignación de dioses
            'destino' => 0,
            'cielo-infierno' =>fake()->randomElement(['Eliseos','Tártaros']),//esto depende de Mario
        ];
    }
}
