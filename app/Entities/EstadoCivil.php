<?php

namespace SerEducacional\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class EstadoCivil extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'estado_civil';

    protected $fillable = [
        'nome'
    ];
}