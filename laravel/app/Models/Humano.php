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
    'dios-protector',
    'cielo-infierno'];

    function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
