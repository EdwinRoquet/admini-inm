<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_usuario',
        'id_perfil',
        'pago_mes',
        'de_predial',
        'monto',
        'de_agua',
        'de_luz',
        'nota',
        'otros',
    ];


    public function perfilprospecto()
    {
        return $this->belongsTo(PerfilVendedor::class,'id_perfil');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class,'id_usuario');
    }


}
