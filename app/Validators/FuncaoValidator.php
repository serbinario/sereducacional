<?php

namespace SerEducacional\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class FuncaoValidator extends LaravelValidator
{

    protected $attributes = [
        'nome' => 'Nome',
        'sigla' => 'Sigla',
        'funcao_professor' => " 'Função professor?' "
    ];

    protected $messages = [
        'required' => ':attribute é obrigatório',
        'max' => ':attribute deve conter no máximo :max caracteres',
        'serbinario_alpha_space' => ' :attribute deve conter apenas letras e espaços entre palavras',
        'numeric' => ':attribute deve conter apenas números',
        'email' => ':attribute deve seguir esse exemplo: exemplo@dominio.com',
        'digits_between' => ':attribute deve ter entre :min e :max caracteres',
        'unique' => ':attribute valor já cadastrado'
    ];

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'nome' => 'required|serbinario_alpha_space|max:60',
            'sigla' => 'max:20',
            'funcao_professor' => 'integer'
        ],

        ValidatorInterface::RULE_UPDATE => [
            'nome' => 'required|serbinario_alpha_space|max:60',
            'sigla' => 'max:20',
            'funcao_professor' => 'integer'
        ],
   ];
}
