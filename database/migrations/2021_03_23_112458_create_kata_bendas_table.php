<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKataBendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kata_bendas', function (Blueprint $table) {
            $table->bigIncrements('id_kb');
            $table->string('nama_kb', 37)->nullable();
            $table->string('desc_kb')->nullable();
            $table->unsignedBigInteger('id_kategori')->nullable()->index('id_kategori_foreign_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kata_bendas');
    }
}
