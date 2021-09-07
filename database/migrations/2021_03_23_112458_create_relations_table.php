<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relations', function (Blueprint $table) {
            $table->bigIncrements('id', true);
            $table->unsignedBigInteger('id_kb')->nullable()->index('id_kata_benda_foreign_key');
            $table->unsignedBigInteger('id_hipernim')->nullable()->index('id_hipermim_foreign_key');
            $table->integer('kedalaman')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relations');
    }
}
