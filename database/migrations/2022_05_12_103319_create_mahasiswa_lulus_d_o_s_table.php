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
        Schema::create('mahasiswa_lulus_d_o_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('riwayat_pendidikan_mahasiswa_id')->constrained()->onDelete('cascade');
            $table->foreignId('jenis_keluar_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_keluar');
            $table->integer('periode_keluar_id');
            $table->string('nomor_ijazah',80);
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
        Schema::dropIfExists('mahasiswa_lulus_d_o_s');
    }
};
