<?php

namespace SerEducacional\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class TipoTelefone extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'tipo_telefones';

    protected $fillable = [
        'nome',
    ];

}
