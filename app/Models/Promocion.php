<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;

    protected $table = 'promociones';

    protected $fillable = [
        'codigo',
        'descripcion',
        'fk_tipo_descuento',
        'valor_descuento',
        'fecha_inicio',
        'fecha_fin',
        'estatus',
        'nombre_promo',
    ];

    protected $casts = [
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime',
        'estatus' => 'boolean',
    ];

    public function tipoDescuento()
    {
        return $this->belongsTo(TipoDescuento::class, 'fk_tipo_descuento');
    }

    public function promocionClientes()
    {
        return $this->hasMany(PromocionCliente::class, 'fk_promocion');
    }
}