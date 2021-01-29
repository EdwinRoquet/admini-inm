<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaluo extends Model
{
    use HasFactory;

    protected $fillable  = [
        'id_propiedad',
        'id_usuario',
        'ruta_plano',
        'expediente',
        'status',
        'uuid',
        'valor',
        'nota',
    ];

    public function propiedades()
    {
        return $this->belongsTo(Propiedad::class,'id_propiedad');
    }

    // public function perfiles()
    // {
    //     return $this->belongsTo(Seguimiento::class,'id_perfil');
    // }

    public function usuariofinal()
    {
        return $this->belongsTo(User::class,'id_usuario');
    }



}
