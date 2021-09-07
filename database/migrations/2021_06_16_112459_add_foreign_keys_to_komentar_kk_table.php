<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToKomentarKkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('komentar_kk', function (Blueprint $table) {
            $table->foreign('id_kk', 'id_kk_foreign_key')->references('id_kk')->on('kata_kerjas')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('id_user', 'id_user_kk_foreign_key')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('komentar_kb', function (Blueprint $table) {
            $table->dropForeign('id_kk_foreign_key');
            $table->dropForeign('id_user_kk_foreign_key');
        });
    }
}
