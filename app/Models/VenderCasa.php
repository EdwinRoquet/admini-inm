<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenderCasa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_prospectador',
        'nombre',
        'fec_nacimiento',
        'direccion',
        'nacionalidad',
        'colonia',
        'municipio',
        'estado',
        'imss',
        'curp',
        'rfc',
        'lat',
        'lng',
        'id_operacion',
        'tel',
        'cel',
        'email',
        'uuid',
        'predial',
        'c_agua',
        'c_luz',
    ];

    public function prospectador()
    {
        return $this->belongsTo(User::class,'id_prospectador');
    }


    public function operaciones()
    {
        return $this->belongsTo(Operacion::class,'id_operacion');
    }

    public function propiedades()
    {
        return $this->hasMany(Propiedad::class,'id_usuario');
    }



}
