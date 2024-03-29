<?php

namespace SerEducacional\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PosGraduacao extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'pos_graduacao';

    protected $fillable = [
        'nome'
    ];

}
