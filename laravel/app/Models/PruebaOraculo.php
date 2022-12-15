<?php
// Mario
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PruebaOraculo extends Prueba
{
    use HasFactory;

    protected $table = 'pruebas_oraculo';
    public $incrementing = false;


}
