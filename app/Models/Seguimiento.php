<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    use HasFactory;

    protected $fillable = [
       'id_cliente',
       'id_admin',
       'capacidad_compra',
       'des_mensual',
       'reembolso',
       'nota',
    ];





    public function cliente()
    {
        return $this->belongsTo(ComprarCasa::class,'id_cliente');
    }

    public function oficina()
    {
        return $this->belongsTo(User::class,'id_admin');
    }


}
