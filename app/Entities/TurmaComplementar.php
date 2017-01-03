<?php

namespace SerEducacional\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class TurmaComplementar extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'turmas';

    protected $fillable = [
        'codigo',
        'nome',
        'escola_id',
        'tipo_atendimento_id',
        'calendario_id',
        'turno_id',
        'dependencia_id',
        'vagas',
        'aprovacao_automatica',
        'observacao',
        'tipo_turma_id',
        'quantidade_atividade_id'
    ];

}