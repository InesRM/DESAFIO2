<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Dios;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HadesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_dios' => $this->faker->unique()->randomNumber(),
            'id' => fake()->unique()->randomElement(User::pluck('id')),
            'name' => fake()->unique()->randomElement(['Hades']),
            // 'email' => fake()->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            // 'password' => bcrypt('1234'), // password
            // 'rol' => 'Hades',
            // 'activo' => 0,
            'sabiduria' => '',
            'nobleza' => '',
            'virtud' => '',
            'maldad' => '',
            'audacia' => '',
            // 'remember_token' => Str::random(10),
        ];
    }

    function dios()
    {
        return $this->belongsTo('App\Models\Dios');

    }

    function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
