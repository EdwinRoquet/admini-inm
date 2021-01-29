<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprarCasa extends Model
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
        'id_operacion',
        'tel',
        'cel',
        'email',
        'id_metodo',
    ];


    public function metodo()
    {
        return $this->belongsTo(Metedo::class,'id_metodo');
    }

    public function operaciones()
    {
        return $this->belongsTo(Operacion::class,'id_operacion');
    }

    public function prospectador()
    {
        return $this->belongsTo(User::class,'id_prospectador');
    }



}
