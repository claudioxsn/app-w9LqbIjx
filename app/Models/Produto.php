<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;    

    protected $fillable = ['nome', 'sku', 'quantidade_inicial', 'quantidade_estoque']; 

}
