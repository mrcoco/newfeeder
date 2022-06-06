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
        Schema::create('nilai_transfer_pendidikan_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('riwayat_pendidikan_mahasiswa_id')->constrained()->onDelete('cascade');
            $table->char('kode_mata_kuliah_asal',20);
            $table->string('nama_mata_kuliah_asal',200);
            $table->char('sks_mata_kuliah_asal',20);
            $table->string('nilai_huruf_asal',3);
            $table->foreignId('mata_kuliah_id')->constrained()->onDelete('cascade');
            $table->integer('sks_mata_kuliah_diakui');
            $table->string('nilai_huruf_diakui',3);
            $table->integer('nilai_angka_diakui');
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
        Schema::dropIfExists('nilai_transfer_pendidikan_mahasiswas');
    }
};
