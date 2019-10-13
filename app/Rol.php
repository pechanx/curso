<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    // SE INCREMENTO PARA RELACION DE ROLES
    protected $table ='roles';
    protected $primaryKey='id';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable=[
        'id',
        'descripcion',
        'rol',
        'fecha_registro',
        'estado',
    ];
}
