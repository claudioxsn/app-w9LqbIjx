<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Repository\ProdutoRepository;
use App\Service\ProdutoService;

class ProdutoController extends Controller
{
    protected $produtoService;

    public function __construct()
    {
        $this->produtoService = new ProdutoService(new ProdutoRepository);
    }

    public function index()
    {
        $response = $this->produtoService->getAll();

        if (count($response) == 0) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Não há produtos cadastrados',
            ]);
        }

        return response()->json([
            'status'    => 'success',
            'message'   => 'Consulta realizada com sucesso',
            'items'     => $response
        ]);
    }

    public function store(ProdutoRequest $request)
    {
        $response = $this->produtoService->store($request->validated());
        if (!isset($response)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocorreu um erro ao cadastrar o produto'
            ]);
        }
        return response()->json([
            'status'    => 'success',
            'message'   => 'Produto cadastrado com sucesso',
            'items'     => $response
        ]);
    }

    public function findBySku($sku)
    {
        $response = $this->produtoService->findBySku($sku);

        if (!isset($response)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Produto não encontrado'
            ]);
        }

        return response()->json([
            'status'    => 'success',
            'message'   => 'Consulta realizada com sucesso',
            'items'     => $response
        ]);
    }

    public function findById($id)
    {
        $response = $this->produtoService->findById($id);

        if (!isset($response)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Produto não encontrado'
            ]);
        }

        return response()->json([
            'status'    => 'success',
            'message'   => 'Consulta realizada com sucesso',
            'items'     => $response
        ]);
    }


    public function update(ProdutoRequest $request)
    {        
        $produto = $this->produtoService->findById($request->input('id'));

        if(!isset($produto)){
            return response()->json([
                'status' => 'error',
                'message' => 'Produto não encontrado'
            ]);
        }
            
        $response = $this->produtoService->update($request->all());

        if(!isset($response)){
            return response()->json([
                'status' => 'error',
                'message' => 'erro ao atualizar produto'
            ]);
        }

        return response()->json([
            'status'    => 'success',
            'message'   => 'Produto atualizado com sucesso',
        ]);
    }

    public function delete($id)
    {
        $produto = $this->produtoService->findById($id);

        if(!isset($produto)){
            return response()->json([
                'status' => 'error',
                'message' => 'Produto não encontrado'
            ]);
        }

        $response = $this->produtoService->delete($id);

        if (!isset($response)) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Erro ao excluir produto'
            ]);
        }

        return response()->json([
            'status'    => 'success',
            'message'   => 'produto excluído com sucesso'
        ]);
    }
}
