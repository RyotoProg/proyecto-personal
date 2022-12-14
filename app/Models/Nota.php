<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'id_user'
    ];

    public function User(){
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
}
