<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    protected $fillable = [
        'fk_usuario',
        'total',
        'fk_estado_pedido',
        'fk_metodo_pago',
        'hora_recojo',
        'hora_pedido',
        'num_orden',
    ];

    public function userMovil()
    {
        return $this->belongsTo(UserMovil::class, 'fk_usuario');
    }

    public function estadoPedido()
    {
        return $this->belongsTo(EstadosPedido::class, 'fk_estado_pedido');
    }

    // Assuming a MetodoPago model will be created later
    // public function metodoPago()
    // {
    //     return $this->belongsTo(MetodoPago::class, 'fk_metodo_pago');
    // }

    public function detallePedidos()
    {
        return $this->hasMany(DetallePedido::class, 'fk_pedido');
    }
}