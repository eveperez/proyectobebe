<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    use HasFactory;
    protected $primaryKey = 'idpro';
    protected $fillable=['idpro','nombre','descripcion','idcate','cantidad','precio','talla', 'genero','color','archivo','idpedido','activo','created_at','updated_at'];
}
