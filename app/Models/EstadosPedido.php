<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadosPedido extends Model
{
    use HasFactory;

    protected $table = 'estados_pedido';

    protected $fillable = [
        'nom_estado',
        'estatus',
    ];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'fk_estado_pedido');
    }
}