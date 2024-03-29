<?php

namespace SerEducacional\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Coordenadoria extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'coordenadoria';

    protected $fillable = [
        'nome'
    ];
}
