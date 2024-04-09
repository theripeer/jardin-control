<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        \App\Models\Type::insert([
            ['name' => 'Acacia'],
            ['name' => 'Aguacate'],
            ['name' => 'Álamo'],
            ['name' => 'Almendro'],
            ['name' => 'Arce'],
            ['name' => 'Cerezo'],
            ['name' => 'Ciruelo'],
            ['name' => 'Fresno'],
            ['name' => 'Eucalipto'],
            ['name' => 'Ficus'],
            ['name' => 'Gingko'],
            ['name' => 'Pino'],
            ['name' => 'Limonero'],
            ['name' => 'Mango'],
            ['name' => 'Manzano'],
            ['name' => 'Mimosa'],
            ['name' => 'Naranjo'],
            ['name' => 'Nogal'],
            ['name' => 'Olivo'],
            ['name' => 'Sauce'],
        ]);

        \App\Models\User::factory()->create([
            'id' => 1,
            'name' => 'Administrador',
            'username' => 'admin',
            'rol' => 'Administrador',
            'email' => 'admin@developer.com',
            'password' => Hash::make('password'),
            'is_active' => true
        ]);

        \App\Models\User::factory(10)->create();
    }
}
