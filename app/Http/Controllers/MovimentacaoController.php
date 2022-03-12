<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovimentacaoRequest;
use App\Repository\MovimentacaoRepository;
use App\Service\MovimentacaoService;
use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{
    protected $movimentacaoService;

    public function __construct()
    {
        $this->movimentacaoService = new MovimentacaoService(new MovimentacaoRepository);
    }

    public function movimentar(MovimentacaoRequest $request)
    {

        $response = $this->movimentacaoService->store($request->validated());
        if (!isset($response)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocorreu um erro ao efetuar a movimentação'
            ]);
        } else if ($response == 404) {
            return response()->json([
                'status' => 'error',
                'message' => 'Produto não encontrado'
            ]);
        } else if ($response == 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'estoque insuficiente'
            ]);
        }
        return response()->json([
            'status'    => 'success',
            'message'   => 'Movimentação efetuada com sucesso',
            'items'     => $response
        ]);
    }

    public function historicoPorSku($sku)
    {

        $response = $this->movimentacaoService->listBySku($sku);

        if (count($response) == 0) {
            return response()->json([
                'status' => 'success',
                'message' => 'a busca não retornou resultados',
            ]);
        }

        return response()->json([
            'status'    => 'success',
            'message'   => 'Movimentação efetuada com sucesso',
            'items'     => $response
        ]);
    }
}
