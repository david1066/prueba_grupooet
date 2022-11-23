<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;
class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $color = new Color();
        $color->nombre='Amarillo';
        $color->save();
        
        $color = new Color();
        $color->nombre='Rojo';
        $color->save();
        
        $color = new Color();
        $color->nombre='Blanco';
        $color->save();
        
        $color = new Color();
        $color->nombre='Negro';
        $color->save();
        
        $color = new Color();
        $color->nombre='Azul';
        $color->save();
        
        $color = new Color();
        $color->nombre='Naranja';
        $color->save();
    }
}
