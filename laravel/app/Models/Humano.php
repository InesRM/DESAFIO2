<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Humano extends Model
{
    use HasFactory;
    protected $table = 'humanos';
    protected $fillable =
    ['destino','dios-protector','cielo-infierno'];
}
