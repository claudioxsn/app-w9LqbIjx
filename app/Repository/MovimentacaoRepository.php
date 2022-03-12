<?php

namespace App\Repository;

use App\Models\MovimentacaoProduto;

class MovimentacaoRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct(MovimentacaoProduto::class);
    }

    public function store(array $data)
    {
        return $this->getModel()->create($data);
    }

    public function getAll()
    {
        return $this->getModel()->paginate(10);
    }

    public function listBySku($sku)
    {
        return $this->getModel()->where('produto_sku', $sku)->paginate(10);
    }
}
