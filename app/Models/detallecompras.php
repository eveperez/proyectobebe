<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detallecompras extends Model
{
    use HasFactory;
    protected $primaryKey = 'iddetalle';
    protected $fillable=['iddetalle','idcompra','idpro','cantidad','precio'];
}
