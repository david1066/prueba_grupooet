<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Color;
use App\Models\TipoVehiculo;
use App\Models\Usuario;
class Vehiculo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='vehiculos';
    public $fillable = [
        'placa', 
        'color_id', 
        'marca', 
        'tipo_vehiculo_id', 
        'conductor_id',
        'propietario_id',
        'user_id'
    ];

    //relacion llave foranea
    public function Color()
    {
        return $this->belongsTo(Color::class,'color_id');
    }
    //relacion llave foranea
    public function TipoVehiculo()
    {
        return $this->belongsTo(TipoVehiculo::class,'tipo_vehiculo_id');
    }
    //relacion llave foranea
    public function Conductor()
    {
        return $this->belongsTo(Usuario::class,'conductor_id');
    }
    //relacion llave foranea
    public function Propietario()
    {
        return $this->belongsTo(Usuario::class,'propietario_id');
    }
    //relacion llave foranea
    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
