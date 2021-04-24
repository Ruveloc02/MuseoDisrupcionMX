<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;


    protected $fillable = [
        'titulo',
        'autor',
        'tipo',
        'tamanio',
        'precio',
        'imagen',
        'urlCompra',
    ];
}
