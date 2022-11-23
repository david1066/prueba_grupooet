<?php

namespace Database\Seeders;

use App\Models\TipoVehiculo;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        
        $this->call(CiudadSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(TipoDocumentoSeeder::class);
        $this->call(TipoVehiculoSeeder::class);
    }
}
