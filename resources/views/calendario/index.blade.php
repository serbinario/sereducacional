@extends('menu')

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


                    <!-- Botão novo -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="text-right">
                                <a class="btn btn-primary btn-sm m-t-10", href="{{ route('calendario.create') }}">Novo Calendário</a>
                            </div>
                        </div>
                    </div>
                    <!-- Botão novo -->
                </div>

                <div class="table-responsive">
                    <table id="calendario-grid" class="table table-hover">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data inicial</th>
                                <th>Data final</th>
                                <th>Data de r. final</th>
                                <th>Dias letivos</th>
                                <th>Semanas letivas</th>
                                <th>Passivo</th>
                                <th>Duração</th>
                                <th style="width: 10%;">Açao</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Data inicial</th>
                                <th>Data final</th>
                                <th>Data de r. final</th>
                                <th>Dias letivos</th>
                                <th>Semanas letivas</th>
                                <th>Passivo</th>
                                <th>Duração</th>
                                <th style="width: 10%;">Açao</th>
                            </tr>
                            </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </section>
@stop

@section('javascript')
    <script type="text/javascript">
        var table = $('#calendario-grid').DataTable({
            processing: true,
            serverSide: true,
            ajax: laroute.route('calendario.grid'),
            columns: [
                {data: 'nome', name: 'calendarios.nome'},
                {data: 'data_inicial', name: 'calendarios.data_inicial'},
                {data: 'data_final', name: 'calendarios.data_final'},
                {data: 'data_resultado_final', name: 'calendarios.data_resultado_final'},
                {data: 'dias_letivos', name: 'calendarios.dias_letivos'},
                {data: 'semanas_letivas', name: 'calendarios.semanas_letivas'},
                {data: 'status', name: 'status.nome'},
                {data: 'duracao', name: 'duracoes.nome'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            /*"oLanguage": {
                "sStripClasses": "",
                "sSearch": "",
                "sSearchPlaceholder": "Enter Keywords Here",
                "sInfo": "_START_ - _END_ de _TOTAL_",
                "sLengthMenu": '<span>Linhas por Página:</span><select class="browser-default">' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="40">40</option>' +
                '<option value="50">50</option>' +
                '<option value="-1">All</option>' +
                '</select></div>'
            },*/
        });
    </script>
@stop