<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTorcedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torcedores', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 256);
            $table->string('documento', 30)->unique();
            $table->string('cep', 8);
            $table->string('endereco', 256);
            $table->string('bairro', 100);
            $table->string('cidade', 50);
            $table->string('uf', 2);
            $table->string('telefone', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->boolean('ativo');
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
        Schema::dropIfExists('torcedors');
    }
}
