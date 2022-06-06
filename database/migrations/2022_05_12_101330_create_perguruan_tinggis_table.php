<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perguruan_tinggis', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_perguruan_tinggi');
            $table->char('kode_perguruan_tinggi',8);
            $table->char('nama_perguruan_tinggi',20);
            $table->string('nama_singkat',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perguruan_tinggis');
    }
};
