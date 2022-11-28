<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HumanoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_humano' => $this->faker->unique()->numberBetween(1,10),
            'name' => $this->faker->unique()->randomElement(['Isabelakis','Mariopoulou', 'Miriamtheka', 'Aliciciakas', 'Alejandrakis', 'Khattarikolau', 'Jaimeniadis','Manuelinidis', 'Inesiakas', 'Sofia']),
            'destino' => "",
            'dios-protector' => "",
            'cielo-infierno' => "",
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
