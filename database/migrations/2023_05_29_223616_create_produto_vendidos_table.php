<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoVendidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_vendidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('produto_id')->unsigned()->nullable();
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->bigInteger('venda_id')->unsigned()->nullable();
            $table->foreign('venda_id')->references('id')->on('vendas');
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
        Schema::dropIfExists('produto_vendidos');
    }
}
