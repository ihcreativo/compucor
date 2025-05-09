<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\productoCat;

class Productos_CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cat = new productoCat();
        $cat->categoria =  "Monitores";
        $cat->descripcion =  "Monitores, pantallas, repuestos...";
        $cat->slug =  "monitores-pantallas-pc";
        $cat->banner =  "monitores.png";  
        $cat->save();
        
        $cat1 = new productoCat();
        $cat1->categoria =  "Camaras CCTV";
        $cat1->descripcion =  "Camaras, dvr, conectores...";
        $cat1->slug =  "camaras-de-seguridad";
        $cat1->banner =  "camaras.png";  
        $cat1->save();

        $cat2 = new productoCat();
        $cat2->categoria =  "PC Gamer";
        $cat2->descripcion =  "pc-gamer, video Juegos";
        $cat2->slug =  "pc-gamer-pantallas";
        $cat2->banner =  "gamer.png";  
        $cat2->save();

        $cat3 = new productoCat();
        $cat3->categoria =  "Conectividad";
        $cat3->descripcion =  "Conectores, cables, partes...";
        $cat3->slug =  "conectividad";
        $cat3->banner =  "conectividad.png";  
        $cat3->save();

        $cat4 = new productoCat();
        $cat4->categoria =  "PC Portatiles";
        $cat4->descripcion =  "Monitores, pantallas, repuestos...";
        $cat4->slug =  "computadaras-portatiles";
        $cat4->banner =  "portatil.png";  
        $cat4->save();

        $cat5 = new productoCat();
        $cat5->categoria =  "Zona Gamer";
        $cat5->descripcion =  "pantallas, repuestos...";
        $cat5->slug =  "zona-gamer";
        $cat5->banner =  "zona.png";  
        $cat5->save();

        $cat6 = new productoCat();
        $cat6->categoria =  "Accesorios";
        $cat6->descripcion =  "Cables, repuestos...";
        $cat6->slug =  "accesorios-tecnologia";
        $cat6->banner =  "accesorios.png";  
        $cat6->save();
        
    }
}
