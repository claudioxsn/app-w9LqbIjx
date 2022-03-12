<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentacaoProduto extends Model
{
    use HasFactory;

    protected $fillable = ['produto_id', 'produto_sku', 'quantidade','tipo_movimentacao', 'data_movimentacao']; 
    
}
