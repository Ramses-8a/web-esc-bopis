<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromocionCliente extends Model
{
    use HasFactory;

    protected $table = 'promocion_cliente';

    protected $fillable = [
        'fk_promocion',
        'fk_cliente',
        'fecha_aplicacion',
        'estatus',
    ];

    protected $casts = [
        'fecha_aplicacion' => 'datetime',
        'estatus' => 'boolean',
    ];

    public function promocion()
    {
        return $this->belongsTo(Promocion::class, 'fk_promocion');
    }

    public function cliente()
    {
        return $this->belongsTo(UserMovil::class, 'fk_cliente');
    }
}
