<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaAlimento extends Model
{
    protected $table = 'categoria_alimento';
    protected $fillable = ['nom_cat', 'estatus'];
}
