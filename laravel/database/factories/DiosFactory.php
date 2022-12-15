<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dios>
 */
class DiosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @author Ines
     */

    public function definition()
    {
        // *********************************DE MOMENTO NO SE USA....********************
         return [
            'id_dios' => $this->faker->unique()->numberBetween(1, 100),
            'id' => fake()->unique()->randomElement(User::pluck('id')),
            'name' => fake()->unique()->randomElement(['Zeus', 'Poseidon']),
            'sabiduria' => fake()->randomElement(User::pluck('sabiduria')),
            'nobleza' => fake()->randomElement(User::pluck('nobleza')),
            'virtud' => fake()->randomElement(User::pluck('virtud')),
            'maldad' => fake()->randomElement(User::pluck('maldad')),
            'audacia' => fake()->randomElement(User::pluck('audacia')),
            // 'remember_token' => Str::random(10),
        ];

    }
}
