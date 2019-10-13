<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRol extends Model
{
    protected $table ='user_rol';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'id',
        'user_id',
        'rol_id',

    ];
}
// SON RELACIONES DE ROLES Y USUARIOS