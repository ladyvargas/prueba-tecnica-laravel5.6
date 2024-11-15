<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Cases; 
use Faker\Factory as Faker;

class CasesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 40) as $index) {
            Cases::create([
                'title' => $faker->sentence, // Genera un título falso
                'description' => $faker->paragraph, // Genera una descripción falsa
                'status' => $faker->randomElement(['open', 'in_progress', 'closed']), // Genera un estado aleatorio
                'user_id' => $faker->numberBetween(1, 10), // Asocia el caso a un usuario (asegúrate de tener usuarios previamente creados)
                'created_at' => now(), // Fecha de creación
                'updated_at' => now(), // Fecha de actualización
            ]);
        }
    }
}
