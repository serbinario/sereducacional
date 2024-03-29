<?php

namespace SerEducacional\Http\Controllers;

use Illuminate\Http\Request;
use SerEducacional\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SerEducacional\Repositories\ProcedimentoRepository;
use SerEducacional\Services\ProcedimentoService;
use SerEducacional\Validators\ProcedimentoValidator;
use Yajra\Datatables\Datatables;


class ProcedimentoController extends Controller
{
    /**
     * @var ProcedimentoRepository
     */
    protected $repository;

    /**
     * @var array
     */
    private $loadFields = [];

    /**
     * @var ProcedimentoService
     */
    private $service;

    /**
     * ProcedimentoController constructor.
     * @param ProcedimentoRepository $repository
     * @param ProcedimentoService $service
     */
    public function __construct(ProcedimentoRepository $repository,
                                ProcedimentoService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # Retorno para view
        return view('Procedimento.index');
    }

    /**
     * @return mixed
     */
    public function grid($id)
    {
        #Criando a consulta
        $rows = \DB::table('procedimentos')
            ->join('periodos', 'periodos.id', '=', 'procedimentos.periodo_avaliacao_id')
            ->join('formas_avaliacoes', 'formas_avaliacoes.id', '=', 'procedimentos.forma_avaliacao_id')
            ->join('procedimentos_avaliacoes', 'procedimentos_avaliacoes.id', '=', 'procedimentos.procedimento_avaliacao_id')
            ->where('procedimentos_avaliacoes.id', $id)
            ->select([
                'procedimentos.id',
                'formas_avaliacoes.nome as forma_avaliacao',
                'periodos.nome as periodo',
                \DB::raw('IF(aparecer_boletim = 1, "Sim", "Não") as boletim')
            ]);

        #Editando a grid
        return Datatables::of($rows)->addColumn('action', function ($row) {
            # Variáveis de uso
            $html  = '';
            $html .= '<a id="btnDestroyProcedimento" title="Remover Procedimento" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-remove"></i></a>';

            # Retorno
            return $html;
        })->make(true);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        #Carregando os dados para o cadastro
        $loadFields = $this->service->load($this->loadFields);

        #Retorno para view
        return view('Procedimento.create', compact('loadFields'));
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            #Recuperando os dados da requisição
            $data = $request->all();

            #Executando a ação
            $this->service->store($data);

            #Retorno para a view
            return \Illuminate\Support\Facades\Response::json(['success' => true, 'msg' => "Cadastro realizado com sucesso!"]);
        } catch (\Throwable $e) {
            return \Illuminate\Support\Facades\Response::json(['success' => true, 'msg' => $e->getMessage()]);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        try {
            #Recuperando a empresa
            $model = $this->repository->find($id);

            #Retorno para a view
            return \Illuminate\Support\Facades\Response::json(['success' => true, 'model' => $model]);
        } catch (\Throwable $e) {
            return \Illuminate\Support\Facades\Response::json(['success' => true, 'msg' => $e->getMessage()]);
        }
    }


    /**
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try {
            #Recuperando os dados da requisição
            $data = $request->all();

            #Executando a ação
            $this->service->update($data, $id);

            #Retorno para a view
            return \Illuminate\Support\Facades\Response::json(['success' => true, 'msg' => "Edição realizada com sucesso!"]);
        } catch (\Throwable $e) {
            return \Illuminate\Support\Facades\Response::json(['success' => true, 'msg' => $e->getMessage()]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        try {
            #Executando a ação
            $this->service->destroy($id);

            #Retorno para a view
            return \Illuminate\Support\Facades\Response::json(['success' => true, 'msg' => "Remoção realizada com sucesso!"]);
        } catch (\Throwable $e) {
            return \Illuminate\Support\Facades\Response::json(['success' => true, 'msg' => $e->getMessage()]);
        }
    }

    /**
     * @param Request $request
     * @return mixed
     *
     */
    public function getLoadFields(Request $request)
    {
        try {
            return $this->service->load($request->get("models"), true);
        } catch (\Throwable $e) {
            return \Illuminate\Support\Facades\Response::json([
                'error' => $e->getMessage()
            ]);
        }
    }
}
