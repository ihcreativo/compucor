<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(User_rolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(Contenido_tipoSeeder::class);
        $this->call(Productos_CatSeeder::class);
    }
}
