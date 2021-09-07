<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarKbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_kb', function (Blueprint $table) {
            $table->bigIncrements('id_komentar_kb');
            $table->string('komentar_kb')->nullable();
            $table->string('desc_kb')->nullable();
            $table->unsignedBigInteger('id_kb')->nullable()->index('id_kb_foreign_key');
            $table->unsignedBigInteger('id_user')->nullable()->index('id_user_kb_foreign_key');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentar_kb');
    }
}
