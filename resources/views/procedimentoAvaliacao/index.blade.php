@extends('menu')

@section('content')
    <section id="content">
        <div class="container">
            <div class="block-header">
                <h2>Listar Procedimentos de avaliação</h2>
            </div>

            <div class="card material-table">
                <div class="card-header">
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <em> {!! session('message') !!}</em>
                        </div>
                    @endif

                    @if(Session::has('errors'))
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    @permission('procedimento.avaliacao.store')
                    <!-- Botão novo -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="text-right">
                                <a class="btn btn-primary btn-sm m-t-10", href="{{ route('procedimentoAvaliacao.create') }}">Novo Procedimento de Avaliação</a>
                            </div>
                        </div>
                    </div>
                    <!-- Botão novo -->
                    @endpermission
                </div>

                <div class="table-responsive">
                    <table id="procedimentos-avaliacao-grid" class="table table-hover">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Codigo</th>
                                <th>Açao</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Codigo</th>
                                <th style="width: 15%;">Açao</th>
                            </tr>
                            </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </section>

    @include('procedimentoAvaliacao.modal_procedimentos')
    @include('procedimentoAvaliacao.modal_procedimentos_create')
@stop

@section('javascript')
    @parent
    <script type="text/javascript" src="{{ asset('/dist/procedimentoAvaliacao/modal_procedimentos.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/dist/procedimentoAvaliacao/modal_procedimentos_create.js') }}"></script>
    <script type="text/javascript">
        var table = $('#procedimentos-avaliacao-grid').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('procedimentoAvaliacao.grid') }}",
            columns: [
                {data: 'nome', name: 'procedimentos_avaliacoes.nome'},
                {data: 'codigo', name: 'procedimentos_avaliacoes.codigo'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });


        // Global idProcedimentoAvaliacao
        var idProcedimentoAvaliacao;

        // Evento para abrir o modal de cursos/turmas
        $(document).on("click", "#btnModalProcedimento", function () {
            // Recuperando o id do currículo
            idProcedimentoAvaliacao = table.row($(this).parents('tr')).data().id;

            // Recuperando o nome e o código
            var codigo = table.row($(this).parents('tr')).data().codigo;
            var nome   = table.row($(this).parents('tr')).data().nome;

            // prenchendo o titulo do nome do aluno
            $('#pNome').text(nome);
            $('#pCodigo').text(codigo);

            // Executando o modal
            runModalProcedimentos(idProcedimentoAvaliacao);
        });
    </script>
@stop