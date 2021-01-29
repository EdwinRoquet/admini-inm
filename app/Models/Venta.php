<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

   protected $fillable = [
        't_credito',
        'id_propiedad',
        'id_usuario',
        'id_perfil',
        'nombre_empresa',
        'tel_empresa',
        'reg_patronal',
        'extension',
        'clave_inter',
        'uuid',
        'taller',
        'nota',
        'refer_uno',
        'refer_dos',
        'refer_tres',
    ];


    public function propiedades()
    {
        return $this->belongsTo(Propiedad::class,'id_propiedad');
    }

    public function perfiles()
    {
        return $this->belongsTo(Seguimiento::class,'id_perfil');
    }

    public function usuariofinal()
    {
        return $this->belongsTo(User::class,'id_usuario');
    }





}
