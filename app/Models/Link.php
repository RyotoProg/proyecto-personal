<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'link',
        'id_user'
    ];

    public function User(){
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
}
