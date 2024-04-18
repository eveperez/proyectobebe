<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    protected $primaryKey = 'idu';
    protected $fillable=['idu','nombre','user','pasw','activo','tipo'];
}
