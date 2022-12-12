<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    use HasFactory;

    protected $table = 'pruebas';

    function humanos() {
        return $this->belongsToMany(Humano::class, 'humano_prueba', 'idPrueba', 'idHumano');
    }
}
