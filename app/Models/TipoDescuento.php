<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDescuento extends Model
{
    use HasFactory;

    protected $table = 'tipo_descuento';

    protected $fillable = [
        'nom_tipo',
        'estatus',
    ];

    public function promociones()
    {
        return $this->hasMany(Promocion::class, 'fk_tipo_descuento');
    }
}
