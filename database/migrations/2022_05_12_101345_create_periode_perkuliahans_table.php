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
        Schema::create('periode_perkuliahans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prodi_id')->constrained()->onDelete('cascade');
            $table->foreignId('semester_id')->constrained()->onDelete('cascade');
            $table->integer('jumlah_target_mahasiswa_baru');
            $table->integer('jumlah_pendaftar_ikut_seleksi');
            $table->integer('jumlah_pendaftar_lulus_seleksi');
            $table->integer('jumlah_daftar_ulang');
            $table->integer('jumlah_mengundurkan_diri');
            $table->date('tanggal_awal_perkuliahan');
            $table->date('tanggal_akhir_perkuliahan');
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
        Schema::dropIfExists('periode_perkuliahans');
    }
};
