<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKataKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kata_kerjas', function (Blueprint $table) {
            $table->bigIncrements('id_kk');
            $table->string('nama_kk', 37)->nullable();
            $table->string('desc_kk')->nullable();
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
        Schema::dropIfExists('kata_kerjas');
    }
}
