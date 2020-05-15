<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConveniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenios', function (Blueprint $collection) {
            $collection->strig('login');
            $collection->strig('representante');
            $collection->string('rsocial');
            $collection->strig('cnpj');
            $collection->strig('ie');
            $collection->string('endereco');
            $collection->strig('cep');
            $collection->strig('contato');
            $collection->enum('status', ['d', 'i', 'a']);
            $collection->strig('observacao');
            $collection->date('data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convenios');
    }
}
