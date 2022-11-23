<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\TipoDocumento;
use App\Models\User;
class Usuario extends Model
{
    use HasFactory;
    //eliminacion por softdeltes
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
    //relacion llave foranea
    public function TipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class,'tipo_documento_id');
    }
    //relacion llave foranea
    public function Ciudad()
    {
        return $this->belongsTo(Ciudad::class,'ciudad_id');
    }
    //relacion llave foranea
    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
