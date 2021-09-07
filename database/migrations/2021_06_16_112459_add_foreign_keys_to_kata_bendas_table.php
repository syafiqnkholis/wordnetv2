<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToKataBendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kata_bendas', function (Blueprint $table) {
            $table->foreign('id_kategori', 'id_kategori_kb_foreign_key')->references('id_kategori')->on('kategori')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kata_bendas', function (Blueprint $table) {
            $table->dropForeign('id_kategori_kb_foreign_key');
        });
    }
}
