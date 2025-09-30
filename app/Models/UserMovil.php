<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserMovil extends Model
{
    use HasFactory;

    protected $table = 'user_movil';

    protected $fillable = [
        'name',
        'email',
        'password',
        'estatus',
        'fk_tipo_usuario',
    ];

    public $timestamps = true;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function tipoUsuario()
    {
        return $this->belongsTo(TipoUsuario::class, 'fk_tipo_usuario');
    }

    public function promocionClientes()
    {
        return $this->hasMany(PromocionCliente::class, 'fk_cliente');
    }
}
