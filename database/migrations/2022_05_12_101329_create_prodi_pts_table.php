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
        Schema::create('prodi_pts', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_perguruan_tinggi');
            $table->char('kode_perguruan_tinggi');
            $table->string('nama_perguruan_tinggi');
            $table->uuid('id_prodi');
            $table->string('kode_program_studi',10);
            $table->string('nama_program_studi',100);
            $table->char('status',1);
            $table->integer('id_jenjang_pendidikan');
            $table->string('nama_jenjang_pendidikan',50);
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
        Schema::dropIfExists('prodi_pts');
    }
};
