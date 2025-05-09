<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    use HasFactory;
    protected $table = "contenidos";
    protected $fillable = [
        'id',
        'contenido',
        'img',
        'frompage',
        'publicar',
        'id_tipo'
    ];
}
