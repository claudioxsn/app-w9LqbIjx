<?php

use App\Http\Controllers\MovimentacaoController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('produto')->group(function () {
   
    Route::get('/', [ProdutoController::class, 'index'])->name('produto.all'); 
    Route::post('/', [ProdutoController::class, 'store'])->name('produto.store'); 
    Route::get('/search/{sku}', [ProdutoController::class, 'findBySku'])->name('produto.findBySku'); 
    Route::get('/{id}', [ProdutoController::class, 'findById'])->name('produto.findById'); 
    Route::put('/update', [ProdutoController::class, 'update'])->name('produto.update'); 
    Route::delete('/delete/{id}', [ProdutoController::class, 'delete'])->name('produto.delete');

});


Route::prefix('movimentacao')->group(function () {
   
    Route::post('/', [MovimentacaoController::class, 'movimentar'])->name('movimentar');

    Route::get('/historico/{sku}', [MovimentacaoController::class, 'historicoPorSku'])->name('movimentacao.history.bysku'); 
});


