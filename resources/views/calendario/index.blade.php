@extends('menu')


@section('css')
    @parent
    <style type="text/css">
        .select2-container {
            width: 100% !important;
            padding: 0;
        }

        .select2-close-mask{
            z-index: 2099;
        }

        .select2-dropdown{
            z-index: 3051;
        }

        .row_selected {
            background-color: #6A5ACD !important;
            color: #FFF;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
    <section id="content">
        <div class="container">
            <div class="block-header">
                <h2>Listar Calendários</h2>
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

                    @permission('calendario.store')
                    <!-- Botão novo -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="text-right">
                                <a class="btn btn-primary btn-sm m-t-10", href="{{ route('calendario.create') }}">Novo Calendário</a>
                            </div>
                        </div>
                    </div>
                    <!-- Botão novo -->
                    @endpermission
                </div>

                <div class="table-responsive">
                    <table id="calendario-grid" class="table table-hover">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Ano</th>
                                <th>Data inicial</th>
                                <th>Data final</th>
                                <th>Data de r. final</th>
                                <th>Dias letivos</th>
                                <th>Semanas letivas</th>
                                <th>Passivo</th>
                                <th>Duração</th>
                                <th style="width: 13%;">Açao</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Ano</th>
                                <th>Data inicial</th>
                                <th>Data final</th>
                                <th>Data de r. final</th>
                                <th>Dias letivos</th>
                                <th>Semanas letivas</th>
                                <th>Passivo</th>
                                <th>Duração</th>
                                <th style="width: 15%;">Açao</th>
                            </tr>
                            </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </section>

    @include('calendario.modal_adicionar_periodos_avaliacao')
    @include('calendario.modal_adicionar_eventos')
@stop

@section('javascript')
    @parent
    <script type="text/javascript" src="{{ asset('/dist/calendario/loadFields.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/dist/calendario/modal_controller_calendario.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/dist/calendario/modal_adicionar_periodos.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/dist/calendario/modal_adicionar_eventos.js') }}"></script>
    <script type="text/javascript">
        var table = $('#calendario-grid').DataTable({
            processing: true,
            serverSide: true,
            ajax: laroute.route('calendario.grid'),
            columns: [
                {data: 'nome', name: 'calendarios.nome'},
                {data: 'ano', name: 'calendarios.ano'},
                {data: 'data_inicial', name: 'calendarios.data_inicial'},
                {data: 'data_final', name: 'calendarios.data_final'},
                {data: 'data_resultado_final', name: 'calendarios.data_resultado_final'},
                {data: 'dias_letivos', name: 'calendarios.dias_letivos'},
                {data: 'semanas_letivas', name: 'calendarios.semanas_letivas'},
                {data: 'status', name: 'status.nome'},
                {data: 'duracao', name: 'duracoes.nome'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

        // Máscaras
        $(document).ready(function() {
            $('#dtInicial').mask('00/00/0000');
            $('#dtFinal').mask('00/00/0000');
            $('#dtFeriado').mask('00/00/0000');
        });

    </script>
@stop