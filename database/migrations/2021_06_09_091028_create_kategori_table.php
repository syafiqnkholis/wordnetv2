<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->bigIncrements('id_kategori');
            $table->string('nama_kategori', 37)->nullable();
            //pindah dari tabel add foreign keys to kata kerjas
            // $table->foreign('id_kategori', 'id_kategori_kk_foreign_key')->references('id_kategori')->on('kategori')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('id_kategori')->references('id_kategori')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori');
    }
}
