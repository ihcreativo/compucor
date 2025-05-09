<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contenido_tipo;

class Contenido_tipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rol = new Contenido_tipo();
        $rol->tipo =  "CORPORATIVO";
        $rol->save();
        $rol1 = new Contenido_tipo();
        $rol1->tipo =  "NOTICIAS";
        $rol1->save();
        $rol2 = new Contenido_tipo();
        $rol2->tipo =  "PRINCIPAL";
        $rol2->save();
        $rol3 = new Contenido_tipo();
        $rol3->tipo =  "SERVICIOS";
        $rol3->save(); 
    }
}
