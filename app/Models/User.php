<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'correo',
        'password',
    ];

    public function setPasswordAttribute($password) {

        $this->attributes['password'] = bcrypt($password);
    }
}
