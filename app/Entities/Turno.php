<?php

namespace SerEducacional\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Turno extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'turnos';

    protected $fillable = [
        'nome',
        'codigo'
    ];

}
