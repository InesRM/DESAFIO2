<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // return [
        //     'name' => fake()->unique()->randomElement(['Isabelakis',
        //     'Mariopoulou', 'Miriamtheka', 'Aliciciakas', 'Alejandrakis', 'Khattarikolau', 'Jaimeniadis',
        //     'Manuelinidis', 'Inesiakas', 'Sofia']),
        //     'email' => fake()->unique()->safeEmail(),
        //     'email_verified_at' => now(),
        //     'password' => bcrypt('1234'), // password
        //     'rol' =>  'humano',
        //     'activo' => 0,
        //     'sabiduria' => '',
        //     'nobleza' => '',
        //     'virtud' => '',
        //     'maldad' => '',
        //     'audacia' => '',
        //     'remember_token' => Str::random(10),
        // ];
        //****************ESTO LO HE HECHO PARA CREAR DIOSES DENTRO DE LOS USUARIOS para inicio sesión de todos */
         return [
            'name' => fake()->unique()->randomElement(['Poseidon', 'Zeus', 'Hades']),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('1234'), // password
            'rol' =>  'dios', // es enum se puede cambiar a hades
            'activo' => 0,
            'sabiduria' => '',
            'nobleza' => '',
            'virtud' => '',
            'maldad' => '',
            'audacia' => '',
            'remember_token' => Str::random(10),
        ];
    }

    // public function humano()
    // {
    //     return $this->belongsTo('App\Models\Humano');
    // }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
