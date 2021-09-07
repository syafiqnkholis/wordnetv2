<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarKkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_kk', function (Blueprint $table) {
            $table->bigIncrements('id_komentar_kk');
            $table->string('komentar_kk')->nullable();
            $table->string('desc_kk')->nullable();
            $table->unsignedBigInteger('id_kk')->nullable()->index('id_kk_foreign_key');
            $table->unsignedBigInteger('id_user')->nullable()->index('id_user_kk_foreign_key');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentar_kk');
    }
}
