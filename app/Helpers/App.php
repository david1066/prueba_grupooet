<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Models\TipoDocumento;
use App\Models\Ciudad;
use App\Models\TipoVehiculo;
use App\Models\Color;
use App\Models\Usuario;
use App\Models\Vehiculo;

    function getTipoDocumento(){
        
        //si no esta en la cache
        if (!Cache::has('tipos_documentos'))
        {
            //entonces consultamos en base de datos y la agregamos a la cache por 15 minutos
            $tipos_documentos = TipoDocumento::all();
            Cache::put('tipos_documentos', $tipos_documentos, Carbon::now()->addMinutes(15));
        }
        else{
            //sino la traemos de la cache
            $tipos_documentos = Cache::get('tipos_documentos');
        }
        return $tipos_documentos;
    }

    function getCiudad(){
        
        //si no esta en la cache
        if (!Cache::has('ciudades'))
        {
            //entonces consultamos en base de datos y la agregamos a la cache por 15 minutos
            $ciudades = Ciudad::all();
            Cache::put('ciudades', $ciudades, Carbon::now()->addMinutes(15));
        }
        else{
            //sino la traemos de la cache
            $ciudades = Cache::get('ciudades');
        }
        return $ciudades;
    }
    
    
    function getTipoVehiculo(){
        
        //si no esta en la cache
        if (!Cache::has('tipos_vehiculos'))
        {
            //entonces consultamos en base de datos y la agregamos a la cache por 15 minutos
            $tipos_vehiculos = TipoVehiculo::all();
            Cache::put('tipos_vehiculos', $tipos_vehiculos, Carbon::now()->addMinutes(15));
        }
        else{
            //sino la traemos de la cache
            $tipos_vehiculos = Cache::get('tipos_vehiculos');
        }
        return $tipos_vehiculos;
    }

    function getColor(){
        
        //si no esta en la cache
        if (!Cache::has('colores'))
        {
            //entonces consultamos en base de datos y la agregamos a la cache por 15 minutos
            $colores = Color::all();
            Cache::put('colores', $colores, Carbon::now()->addMinutes(15));
        }
        else{
            //sino la traemos de la cache
            $colores = Cache::get('colores');
        }
        return $colores;
    }


    function getUsuario(){
        
        
        $usuarios = Usuario::all();
          
       
        return $usuarios;
    }

    function getVehiculo(){
        
        
        $vehiculos = Vehiculo::all();
          
       
        return $vehiculos;
    }

   




?>