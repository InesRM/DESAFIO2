<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dios extends Model
{
    // de momento este modelo no se usa

    use HasFactory;
    protected $table = 'dioses';
    protected $primaryKey = 'id_dios';
    protected $foreingKey = 'id'; //IDENTIFICADOR DE LA TABLA USERS
    protected $fillable = [
        'id_dios',
        'id',
        'name',
        'sabiduria',
        'nobleza',
        'virtud',
        'maldad',
        'audacia',
    ];

    function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
