<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User; 
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 30) as $index) {
            User::create([
                'name' => $faker->name, // Genera un nombre falso
                'email' => $faker->unique()->safeEmail, // Genera un correo electrónico único
                'password' => bcrypt('password'), // Genera una contraseña, siempre hasheada
                'created_at' => now(), // Fecha de creación
                'updated_at' => now(), // Fecha de actualización
            ]);
        }
    }
}
