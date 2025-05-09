<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenido_tipo extends Model
{
    use HasFactory;
    protected $table = "contenido_tipos";
    protected $fillable = [
        'id',
        'tipo',
    ];
}
