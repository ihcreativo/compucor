<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\producto_marca;

class Productos_MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $m1 = new producto_marca();
        $m1->marca =  "HP";
        $m1->icono =  "hp.png";
        $m1->save();

        $m2 = new producto_marca();
        $m2->marca =  "SAMSUNG";
        $m2->icono =  "samsung.png";
        $m2->save();

        $m3 = new producto_marca();
        $m3->marca =  "LG";
        $m3->icono =  "lg.png";
        $m3->save();

        $m4 = new producto_marca();
        $m4->marca =  "ACER";
        $m4->icono =  "acer.png";
        $m4->save();

        $m5 = new producto_marca();
        $m5->marca =  "ASUS";
        $m5->icono =  "asus.png";
        $m5->save();

        $m6 = new producto_marca();
        $m6->marca =  "HP";
        $m6->icono =  "hp.png";
        $m6->save();

        $m7 = new producto_marca();
        $m7->marca =  "APPLE";
        $m7->icono =  "apple.png";
        $m7->save();

        $m8 = new producto_marca();
        $m8->marca =  "LENOVO";
        $m8->icono =  "lenovo.png";
        $m8->save();

        $m9 = new producto_marca();
        $m9->marca =  "INTEL";
        $m9->icono =  "intel.png";
        $m9->save();

        $m10 = new producto_marca();
        $m10->marca =  "AMD";
        $m10->icono =  "amd.png";
        $m10->save();
        
        
    }
}
