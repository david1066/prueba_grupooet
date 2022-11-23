<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Usuario extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='usuarios';
    public $fillable = [
        'tipo_documento_id', 
        'documento', 
        'primer_nombre', 
        'segundo_nombre', 
        'apellidos',
        'direccion',
        'telefono',
        'ciudad_id',
        'user_id'
    ];
}
