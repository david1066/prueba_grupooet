<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoDocumento;
class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipodocumento = new TipoDocumento();
        $tipodocumento->nombre='C.C';
        $tipodocumento->save();
      
        $tipodocumento = new TipoDocumento();
        $tipodocumento->nombre='C.E';
        $tipodocumento->save();
     
    }
}
