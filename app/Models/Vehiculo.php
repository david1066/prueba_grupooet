<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
        'user_id'
    ];
}
