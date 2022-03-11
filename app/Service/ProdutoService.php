<?php

namespace App\Service;

use App\Repository\ProdutoRepository;

class ProdutoService
{
    public $produtoRepository;

    public function __construct(ProdutoRepository $produtoRepository)
    {
        $this->produtoRepository = $produtoRepository;
    }

    public function store(array $data)
    {
        $response = $this->produtoRepository->store($data);

        if (!isset($response)) {
            return;
        }
        return $response;
    }

    public function getAll()
    {
        $produtos = $this->produtoRepository->getAll();
        if (!isset($produtos)) {
            return;
        }
        return $produtos;
    }

    public function findById($id)
    {
        $produto = $this->produtoRepository->findById($id);
        if (!isset($produto)) {
            return;
        }
        return $produto;
    }

    public function update(array $data)
    {
        $response = $this->produtoRepository->updateProduto($data);

        if (!isset($response)) {
            return;
        }
        return $response;
    }

    public function delete($data)
    {
        return $this->produtoRepository->deleteProduto($data);
    }
}
