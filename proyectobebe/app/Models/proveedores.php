<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedores extends Model
{
    use HasFactory;
    protected $primaryKey = 'idprove';
    protected $fillable=['idprove','nombrepro','telefono'];
}
