<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoVehiculo;

class TipoVehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipovehiculo = new TipoVehiculo();
        $tipovehiculo->nombre='Particular';
        $tipovehiculo->save();
      
        $tipovehiculo = new TipoVehiculo();
        $tipovehiculo->nombre='Público';
        $tipovehiculo->save();
     
    }
}
