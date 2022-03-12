<?php

namespace App\Repository;

use App\Models\Produto;

class ProdutoRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct(Produto::class);
    }

    public function store(array $data)
    {
        return $this->getModel()->create($data);
    }

    public function getAll()
    {
        return $this->getModel()->paginate(10);
    }

    public function findBySku($sku)
    {
        return $this->getModel()->where('sku', $sku)->first();
    }

    public function findById($id)
    {
        return $this->getModel()->find($id);
    }

    public function updateProduto(array $data)
    {
        return $this->getModel()->findOrFail($data['id'])->update($data);
    }

    public function searchByName($data)
    {
        return $this->getModel()->where('name', 'like', '%' . $data . '%')->get();
    }

    public function deleteProduto($data)
    {
        return $this->getModel()->where('id', $data)->delete();
    }
}
