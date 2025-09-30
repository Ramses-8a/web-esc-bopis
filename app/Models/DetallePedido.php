<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;

    protected $table = 'detalle_pedido';

    protected $fillable = [
        'fk_pedido',
        'fk_platillo',
        'cantidad',
        'precio',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'fk_pedido');
    }

    public function platillo()
    {
        return $this->belongsTo(Platillo::class, 'fk_platillo');
    }
}