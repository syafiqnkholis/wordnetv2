<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToKataKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    dikomen
    public function up()
    {
        Schema::table('kata_kerjas', function (Blueprint $table) {
        $table->foreign('id_kategori', 'id_kategori_kk_foreign_key')->references('id_kategori')->on('kategori')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kata_kerjas', function (Blueprint $table) {
            $table->dropForeign('id_kategori_kk_foreign_key');
        });
    }
}
