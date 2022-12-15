<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Summary of Humano
 * @property int $id_humano
 *@author Ines
 *
 */
class Humano extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_humano';

    protected $table = 'humanos';
    protected $fillable =
    [
    'id_humano',
    'destino',
    'idDios',
    'cieloInfierno'
    ];

    function dios()
    { // Mario
        return $this->belongsTo(User::class, 'idDios', 'id');
    }

    function pruebas() { // Mario
        return $this->belongsToMany(Prueba::class, 'humano_prueba', 'idHumano', 'idPrueba');
    }

}
