<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carrito';
    protected $fillable = [
        'fk_usuario',
        'fk_platillo',
        'cantidad',
    ];

    public function userMovil()
    {
        return $this->belongsTo(UserMovil::class, 'fk_usuario');
    }

    public function platillo()
    {
        return $this->belongsTo(Platillo::class, 'fk_platillo');
    }
}
