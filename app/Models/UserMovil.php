<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMovil extends Model
{
    protected $table = 'user_movil';
    protected $fillable = ['name', 'email', 'password','remember_token','estatus', 'fk_tipo_usuario'];
}
