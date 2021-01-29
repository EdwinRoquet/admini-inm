<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilVendedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_vendedor',
        'id_admin',
        'deuda',
        'nota',
    ];




    public function vendedor()
    {
        return $this->belongsTo(VenderCasa::class,'id_vendedor');
    }

    public function oficina()
    {
        return $this->belongsTo(User::class,'id_admin');
    }

}
