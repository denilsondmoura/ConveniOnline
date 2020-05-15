<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrequenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frequencia', function (Blueprint $collection) {
            $collection->string('estagiario');
            $collection->string('segunda');
            $collection->string('terca');
            $collection->string('quarta');
            $collection->string('quinta');
            $collection->string('sexta');
            $collection->int('ch');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frequencias');
    }
}
