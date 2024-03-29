<?php

namespace SerEducacional\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class TipoEmpresa extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'tipo_empresa';

    protected $fillable = [
    'nome'
    ];

}
