<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRelationsKkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relations_kk', function (Blueprint $table) {
            $table->foreign('id_hipernim', 'id_hipermim_kk_foreign_key')->references('id_hipernim_kk')->on('hipernims_kk')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('id_kk', 'id_kata_kerja_foreign_key')->references('id_kk')->on('kata_kerjas')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relations_kk', function (Blueprint $table) {
            $table->dropForeign('id_hipermim_kk_foreign_key');
            $table->dropForeign('id_kata_kerja_foreign_key');
        });
    }
}
