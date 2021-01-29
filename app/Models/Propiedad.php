<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'recamaras',
        'baños',
        'estacionamiento',
        'estructura_cons',
        'titulo',
        'nota',
        'm_terreno',
        'm_construccion',
        'uuid'
     ];


     public function dueño()
     {
         return $this->belongsTo(VenderCasa::class,'id_usuario');
     }

}
