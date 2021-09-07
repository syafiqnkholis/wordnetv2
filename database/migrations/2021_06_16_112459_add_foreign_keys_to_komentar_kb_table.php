<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToKomentarKbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('komentar_kb', function (Blueprint $table) {
            $table->foreign('id_kb', 'id_kb_foreign_key')->references('id_kb')->on('kata_bendas')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('id_user', 'id_user_kb_foreign_key')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

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
            $table->dropForeign('id_kb_foreign_key');
            $table->dropForeign('id_user_kb_foreign_key');
        });
    }
}
