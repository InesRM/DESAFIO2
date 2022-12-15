<?php
// Mario
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PruebaEleccion extends Model
{
    use HasFactory;

    protected $table = 'pruebas_eleccion';
    public $incrementing = false;
}
