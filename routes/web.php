<?php

# Middleware de autenticação
Route::group(['middleware' => 'auth'], function () {
    # Rota index
    Route::get('index', ['as' => 'index', 'uses' => 'DefaultController@index']);

    # Rotas do cgm
    Route::group(['prefix' => 'pessoaFisica', 'as' => 'pessoaFisica.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'PessoaFisicaController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'PessoaFisicaController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'PessoaFisicaController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'PessoaFisicaController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'PessoaFisicaController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'PessoaFisicaController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'PessoaFisicaController@destroy']);

        Route::post('findBairro', ['as' => 'findBairro', 'uses' => 'PessoaFisicaController@findBairro']);
        Route::post('findCidade', ['as' => 'findCidade', 'uses' => 'PessoaFisicaController@findCidade']);
        Route::post('searchCpf', ['as' => 'searchCpf', 'uses' => 'PessoaFisicaController@searchCpf']);
    });

    Route::group(['prefix' => 'pessoaJuridica', 'as' => 'pessoaJuridica.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'PessoaJuridicaController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'PessoaJuridicaController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'PessoaJuridicaController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'PessoaJuridicaController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'PessoaJuridicaController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'PessoaJuridicaController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'PessoaJuridicaController@destroy']);

        Route::post('findBairro', ['as' => 'findBairro', 'uses' => 'PessoaJuridicaController@findBairro']);
        Route::post('findCidade', ['as' => 'findCidade', 'uses' => 'PessoaJuridicaController@findCidade']);
        Route::post('searchCnpj', ['as' => 'searchCnpj', 'uses' => 'PessoaJuridicaController@searchCnpj']);
    });
    # Fim rotas cgm

    # Rotas de funcao
    Route::group(['prefix' => 'funcao', 'as' => 'funcao.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'FuncaoController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'FuncaoController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'FuncaoController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'FuncaoController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'FuncaoController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'FuncaoController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'FuncaoController@destroy']);
    });

    # Rotas de escola
    Route::group(['prefix' => 'escola', 'as' => 'escola.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'EscolaController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'EscolaController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'EscolaController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'EscolaController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'EscolaController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'EscolaController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'EscolaController@destroy']);

        # Rotas para endereço
        Route::post('findBairro', ['as' => 'findBairro', 'uses' => 'EscolaController@findBairro']);
        Route::post('findCidade', ['as' => 'findCidade', 'uses' => 'EscolaController@findCidade']);

        # Rotas para cursos
        Route::get('curso/gridCursos/{id}', ['as' => 'curso.gridCursos', 'uses' => 'EscolaCursoController@gridCursos']);
        Route::post('curso/select2', ['as' => 'curso.select2', 'uses' => 'EscolaCursoController@cursosSelect2']);
        Route::post('curso/adicionarCursos', ['as' => 'curso.adicionarCursos', 'uses' => 'EscolaCursoController@adicionarCursos']);
        Route::post('curso/removerCurso/{idEscolaCurso}', ['as' => 'curso.removerCurso', 'uses' => 'EscolaCursoController@removerCurso']);

        # Rotas para turnos
        Route::get('turno/gridTurnos/{idEscolaCurso}', ['as' => 'turno.gridTurnos', 'uses' => 'EscolaCursoTurnoController@gridTurnos']);
        Route::post('turno/select2', ['as' => 'turno.select2', 'uses' => 'EscolaCursoTurnoController@turnosSelect2']);
        Route::post('turno/adicionarTurnos', ['as' => 'turno.adicionarTurnos', 'uses' => 'EscolaCursoTurnoController@adicionarTurnos']);
        Route::post('turno/removerTurno', ['as' => 'turno.removerTurno', 'uses' => 'EscolaCursoTurnoController@removerTurno']);
    });

    #Rotas servidor
    Route::group(['prefix' => 'servidor', 'as' => 'servidor.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'ServidorController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'ServidorController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'ServidorController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'ServidorController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ServidorController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'ServidorController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'DisciplinasController@destroy']);
    });

    # ROtas de disciplinas
    Route::group(['prefix' => 'disciplina', 'as' => 'disciplina.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'DisciplinasController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'DisciplinasController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'DisciplinasController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'DisciplinasController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'DisciplinasController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'DisciplinasController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'DisciplinasController@destroy']);
    });

    # ROtas do curso
    Route::group(['prefix' => 'curso', 'as' => 'curso.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'CursosController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'CursosController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'CursosController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'CursosController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'CursosController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'CursosController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'CursosController@destroy']);
    });

    # ROtas do Cargos
    Route::group(['prefix' => 'cargo', 'as' => 'cargo.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'CargosController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'CargosController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'CargosController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'CargosController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'CargosController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'CargosController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'CargosController@destroy']);
    });

    # ROtas do série
    Route::group(['prefix' => 'dependencia', 'as' => 'dependencia.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'DependenciasController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'DependenciasController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'DependenciasController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'DependenciasController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'DependenciasController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'DependenciasController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'DependenciasController@destroy']);
    });

    # ROtas do série
    Route::group(['prefix' => 'instituicao', 'as' => 'instituicao.'], function () {
        Route::get('edit', ['as' => 'edit', 'uses' => 'InstituicaosController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'InstituicaosController@update']);
    });

    # ROtas do currículo
    Route::group(['prefix' => 'curriculo', 'as' => 'curriculo.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'CurriculosController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'CurriculosController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'CurriculosController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'CurriculosController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'CurriculosController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'CurriculosController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'CurriculosController@destroy']);

        # Rotas de disciplinas do currículo
        Route::get('gridSerie/{id}', ['as' => 'gridSerie', 'uses' => 'CurriculoDisciplinaController@gridSerie']);
        Route::get('gridAdicionarDisciplina/{idCurriculoSerie}', ['as' => 'gridAdicionarDisciplina', 'uses' => 'CurriculoDisciplinaController@grid']);
        Route::post('disciplna/select2', ['as' => 'disciplina.select2', 'uses' => 'CurriculoDisciplinaController@disciplinasSelect2']);
        Route::post('adicionarDisciplina', ['as' => 'adicionarDisciplina', 'uses' => 'CurriculoDisciplinaController@adicionarDisciplina']);
        Route::post('removerDisciplina', ['as' => 'removerDisciplina', 'uses' => 'CurriculoDisciplinaController@removerDisciplina']);
    });

    # Rotas de Modalidade de ensino
    Route::group(['prefix' => 'modalidadeEnsino', 'as' => 'modalidadeEnsino.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'ModalidadeEnsinoController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'ModalidadeEnsinoController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'ModalidadeEnsinoController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'ModalidadeEnsinoController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ModalidadeEnsinoController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'ModalidadeEnsinoController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ModalidadeEnsinoController@destroy']);

        Route::post('uniqueNome', ['as' => 'uniqueNome', 'uses' => 'ModalidadeEnsinoController@uniqueNome']);
        Route::post('uniqueCodigo', ['as' => 'uniqueCodigo', 'uses' => 'ModalidadeEnsinoController@uniqueCodigo']);
    });

    # Rotas de Modalidade de ensino
    Route::group(['prefix' => 'nivelEnsino', 'as' => 'nivelEnsino.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'NivelEnsinoController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'NivelEnsinoController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'NivelEnsinoController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'NivelEnsinoController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'NivelEnsinoController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'NivelEnsinoController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'NivelEnsinoController@destroy']);

        Route::post('uniqueNome', ['as' => 'uniqueNome', 'uses' => 'NivelEnsinoController@uniqueNome']);
        Route::post('uniqueCodigo', ['as' => 'uniqueCodigo', 'uses' => 'NivelEnsinoController@uniqueCodigo']);
    });

    # Rotas de funcao
    Route::group(['prefix' => 'calendario', 'as' => 'calendario.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'CalendariosController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'CalendariosController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'CalendariosController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'CalendariosController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'CalendariosController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'CalendariosController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'CalendariosController@destroy']);
    });

    Route::group(['prefix' => 'aluno', 'as' => 'aluno.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'AlunoController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'AlunoController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'AlunoController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'AlunoController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'AlunoController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'AlunoController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'AlunoController@destroy']);

        Route::post('findBairro', ['as' => 'findBairro', 'uses' => 'AlunoController@findBairro']);
        Route::post('findCidade', ['as' => 'findCidade', 'uses' => 'AlunoController@findCidade']);
        Route::post('searchCpf', ['as' => 'searchCpf', 'uses' => 'AlunoController@searchCpf']);
    });
});

# ROtas de autenticação
Route::group(['middleware' => 'web'], function () {
    Route::get('login', ['as' => 'index', 'uses' => 'Authentication\LoginController@login']);
    Route::post('attempt', ['as' => 'attempt', 'uses' => 'Authentication\LoginController@attempt']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'Authentication\LoginController@logout']);
});