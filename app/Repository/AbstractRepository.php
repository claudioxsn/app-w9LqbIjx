<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository extends Model
{

    protected $modelClass;

    public function __construct($modelClass)
    {
        $this->modelClass = $modelClass;
    }

    public function getAll()
    {
        return $this->modelClass->all();
    }

    public function findById($id)
    {
        return $this->modelClass->find($id);
    }

    public function create(array $data)
    {
        return $this->modelClass->create($data);
    }

    protected function getModel()
    {
        return app($this->modelClass);
    }
}
