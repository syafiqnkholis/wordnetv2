<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHipernimsKkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hipernims_kk', function (Blueprint $table) {
            $table->bigIncrements('id_hipernim_kk');
            $table->string('hipernim_kk', 111)->nullable();
            $table->string('desc_hipernim_kk')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hipernims_kk');
    }
}
