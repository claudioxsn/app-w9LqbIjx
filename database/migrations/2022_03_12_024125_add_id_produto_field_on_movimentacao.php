<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdProdutoFieldOnMovimentacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movimentacao_produtos', function (Blueprint $table) {
            $table->bigInteger('produto_id')->unsigned()->nullable(false);
            $table->foreign('produto_id')->references('id')->on('produtos'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movimentacao_produtos', function (Blueprint $table) {
            $table->dropColumn('produto_id');
        });
    }
}
