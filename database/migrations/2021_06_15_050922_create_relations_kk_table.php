<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationsKkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relations_kk', function (Blueprint $table) {
            $table->bigIncrements('id', true);
            $table->unsignedBigInteger('id_kk')->nullable()->index('id_kata_kerja_foreign_key');
            $table->unsignedBigInteger('id_hipernim')->nullable()->index('id_hipermim_kk_foreign_key');
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
        Schema::dropIfExists('relations_kk');
    }
}
