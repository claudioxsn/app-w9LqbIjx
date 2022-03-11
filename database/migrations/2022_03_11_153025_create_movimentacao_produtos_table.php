<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentacaoProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacao_produtos', function (Blueprint $table) {
            $table->id();
            $table->string('produto_sku')->nullable(false);
            $table->integer('quantidade')->nullable(false);
            $table->dateTime('data_movimentacao')->nullable(false);
            $table->foreign('produto_sku')->references('sku')->on('produtos'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimentacao_produtos');
    }
}
