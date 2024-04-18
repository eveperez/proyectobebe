<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compras extends Model
{
    use HasFactory;
    protected $primaryKey = 'idcompra';
    protected $fillable=['idcompra','idcliente','idprove','fecha','total'];
}
