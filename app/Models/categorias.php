<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    use HasFactory;
    protected $primaryKey = 'idcate';
    protected $fillable=['idcate','nombre'];

    public function categoria()
    {
        return $this->belongsTo('App\categorias', 'idcate', 'idcate');
    }
}
