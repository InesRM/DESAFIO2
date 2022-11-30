<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PruebaPuntual extends Model
{
    use HasFactory;

    protected $table = 'pruebas_puntuales';
    public $incrementing = false;

}
