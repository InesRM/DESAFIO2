<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PruebaValoracion extends Model
{
    use HasFactory;

    protected $table = 'pruebas_valoracion';
    public $incrementing = false;
}
