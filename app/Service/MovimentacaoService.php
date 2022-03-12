<?php

namespace App\Service;

use App\Models\Produto;
use App\Repository\MovimentacaoRepository;
use App\Repository\ProdutoRepository;

class MovimentacaoService
{
    public $movimentacaoRepository;

    public function __construct(MovimentacaoRepository $movimentacaoRepository)
    {
        $this->movimentacaoRepository = $movimentacaoRepository;
    }

    public function store(array $data)
    {
        $produto = new Produto();

        if ($data['tipo_movimentacao'] == 'add') {
            $produtoRepository = new ProdutoRepository();
            $produto = $produtoRepository->findBySku($data['produto_sku']);
            if (isset($produto)) {
                $produto->quantidade_estoque += $data['quantidade'];
            } else {
                return 404;
            }
        }

        if ($data['tipo_movimentacao'] == 'remove') {
            $produtoRepository = new ProdutoRepository();
            $produto = $produtoRepository->findBySku($data['produto_sku']);
            if (isset($produto)) {
                if ($produto->quantidade_estoque < $data['quantidade']) {
                    return 0;
                } else {
                    $produto->quantidade_estoque -= $data['quantidade'];
                }
            } else {
                return 404;
            }
        }

        $data['data_movimentacao'] = now();
        $data['produto_id'] = $produto->id;

        $response = $this->movimentacaoRepository->store($data);
        $produto->update();

        if (!isset($response)) {
            return;
        }
        return $response;
    }

    public function getAll()
    {
        $movimentacaos = $this->movimentacaoRepository->getAll();
        if (!isset($movimentacaos)) {
            return;
        }
        return $movimentacaos;
    }

    public function listBySku($sku)
    {
        $movimentacao = $this->movimentacaoRepository->listBySku($sku);
        if (!isset($movimentacao)) {
            return;
        }
        return $movimentacao;
    }
}
