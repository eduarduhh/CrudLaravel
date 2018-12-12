<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->increments('codigo');
            $table->string('descricao');
            $table->unsignedInteger('codigo_categoria');
            $table->decimal('quantidade');
            $table->string('ativo',1)->nullable();
            $table->timestamps();

            $table->foreign('codigo_categoria')->references('codigo')->on('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto');
    }
}
