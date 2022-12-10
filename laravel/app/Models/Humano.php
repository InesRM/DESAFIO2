<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Humano extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_humano';

    protected $table = 'humanos';
    protected $fillable =
    [
    'id_humano',
    'destino',
    'dios-protector',
    'cielo-infierno'];

    function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    function pruebas() {
        return $this->belongsToMany(Prueba::class, 'humano_prueba', 'idHumano', 'idPrueba');
    }

}
