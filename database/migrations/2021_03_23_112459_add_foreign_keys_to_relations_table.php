<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relations', function (Blueprint $table) {
            $table->foreign('id_hipernim', 'id_hipermim_foreign_key')->references('id_hipernim')->on('hipernims')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('id_kb', 'id_kata_benda_foreign_key')->references('id_kb')->on('kata_bendas')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relations', function (Blueprint $table) {
            $table->dropForeign('id_hipermim_foreign_key');
            $table->dropForeign('id_kata_benda_foreign_key');
        });
    }
}
